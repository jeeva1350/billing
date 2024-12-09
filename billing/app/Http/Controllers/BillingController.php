<?php
namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Response;
use Session;
use Validator;
use Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseConfirmation;

class BillingController extends Controller
{

//index page view

    public function index() {
        $result['products'] = DB::table('products')->select('product_id', 'name', 'price_per_unit as price', 'tax_percentage as tax')->get();
        $result['denominations'] = DB::table('denominations')->get();
        return view('Billing.index', $result);
    }

    
    public function store(Request $request)
{
    // Calculate balance
    $balance = $request->amount - $request->rounded_net_price;
    
    // Store purchase data into the 'purchases' table
    $purchaseId = DB::table('purchases')->insertGetId([
        'c_mail' => $request->c_mail,
        'total_without_tax' => $request->total_without_tax,
        'net_price' => $request->net_price,
        'rounded_net_price' => $request->rounded_net_price,
        'amount' => $request->amount,
        'balance' => $balance,
    ]);
    
    // Loop through the products and store data into the 'purchase_items' table
    foreach ($request->Product as $index => $productId) {
        $quantity = $request->Qty[$index];
    
        // Fetch product details based on product_id
        $product = DB::table('products')->where('product_id', $productId)->first();
    
        if ($product) {
            // Calculate tax and price details
            $unitPrice = $product->price_per_unit;
            $taxPercentage = $product->tax_percentage;
            $taxPayable = ($unitPrice * $taxPercentage) / 100;
            $purchasePrice = $unitPrice * $quantity;
            $totalPrice = $purchasePrice + ($taxPayable * $quantity);
    
            // Insert the purchase item data
            DB::table('purchase_items')->insert([
                'purchase_id' => $purchaseId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'tax_percentage' => $taxPercentage,
                'tax_payable' => $taxPayable,
                'purchase_price' => $purchasePrice,
                'total_price' => $totalPrice,
            ]);
        }
    }

    // Retrieve the denominations from the database
    $denominations = DB::table('denominations')->get();

    // Initialize the balance breakdown array
    $balanceBreakdown = [];

    // Loop through the denominations in descending order of value
    foreach ($denominations as $denomination) {
        $value = $denomination->value;
        $count = $denomination->count;

        // Calculate how many of this denomination can be used
        if ($balance >= $value && $count > 0) {
            $neededCount = floor($balance / $value); // Max count of this denomination that can be used
            $usedCount = min($neededCount, $count);  // Reduce by available count

            // Store the denomination used
            $balanceBreakdown[] = [
                'value' => $value,
                'used' => $usedCount,
            ];

            // Reduce the balance
            $balance -= $usedCount * $value;

            // Update the count in the database
            DB::table('denominations')
                ->where('id', $denomination->id)
                ->update(['count' => $count - $usedCount]);
        }

        // Stop once balance is zero
        if ($balance <= 0) {
            break;
        }
    }

    // Prepare the email data
    $purchaseDetails = [
        'total_without_tax' => $request->total_without_tax,
        'net_price' => $request->net_price,
        'rounded_net_price' => $request->rounded_net_price,
        'amount' => $request->amount,
        'balance' => $balance,
        'balanceBreakdown' => $balanceBreakdown, // Pass balance breakdown to view
    ];

    // Send email to the customer (optional)
    // Mail::to($request->c_mail)->send(new PurchaseConfirmation($purchaseDetails));

    // Retrieve the purchase details and items
    $purchaseDetails = DB::table('purchases')->where('id', $purchaseId)->first();
    $purchaseItems = DB::table('purchase_items')->where('purchase_id', $purchaseId)->get();

    // Prepare data for the view
    $result = [
        'purchaseDetails' => $purchaseDetails,
        'purchaseItems' => $purchaseItems,
        'balanceBreakdown' => $balanceBreakdown,
        'mail' => $request->c_mail,
    ];

    // Redirect to the billing page with purchase details
    return view('Billing.page', $result);
}

    

}