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

class LoanDetailsController extends Controller
{

//index page view

    public function index() {
        $result['loan_details'] = DB::table('loan_details')->get();
        return view('loan-details.index', $result);
    }
// Display the view for adding new data
    public function create() {
        return view('loan-details.add');
    }
    public function show($id) {
        $result['item'] = DB::table('loan_details')->where('id',$id)->first();
        return view('loan-details.add',$result);
    }
    public function store(Request $request) {
        $values = ['client_id'=>$request->client_id,'num_of_payment'=>$request->num_of_payment,'first_payment_date'=>$request->first_payment_date,'last_payment_date'=>$request->last_payment_date,'loan_amount'=>$request->loan_amount];
        if($request->item_id){
            $update = DB::table('loan_details')->where('id',$request->item_id)->update($values);
            Session::flash('alert-success', 'Loan Details Updated Successfully');
        }else{
            $store = DB::table('loan_details')->insert($values);
            Session::flash('alert-success', 'Loan Details Inserted Successfully');
        }
        return redirect()->action('App\Http\Controllers\LoanDetailsController@index');    
    }
    public function emi() {
        $loanDetails = DB::table('loan_details')->get();
        
        // Get the min first_payment_date and max last_payment_date
        $minFirstPaymentDate = DB::table('loan_details')->min('first_payment_date');
        $maxLastPaymentDate = DB::table('loan_details')->max('last_payment_date');
        
        // Convert dates to Carbon instances to calculate the months
        $startDate = \Carbon\Carbon::parse($minFirstPaymentDate);
        $endDate = \Carbon\Carbon::parse($maxLastPaymentDate);
        
        // Get all months between startDate and endDate
        $months = [];
        while ($startDate->lte($endDate)) {
            $months[] = $startDate->format('Y_M'); // Format as "YYYY_Month"
            $startDate->addMonth(); // Move to next month
        }
    
        // Check if the emi_details table exists before fetching
        if (Schema::hasTable('emi_details')) {
            $result['emi_details'] = DB::table('emi_details')->get();
        } else {
            $result['emi_details'] = []; // Set as an empty array if table does not exist
        }
    
        $result['months'] = $months;
    
        return view('loan-details.emi', $result);
    }
    
    public function emi_process()
{
    // Fetch loan details
    $loanDetails = DB::table('loan_details')->get();
    
    // Get the min first_payment_date and max last_payment_date
    $minFirstPaymentDate = DB::table('loan_details')->min('first_payment_date');
    $maxLastPaymentDate = DB::table('loan_details')->max('last_payment_date');
    
    // Convert dates to Carbon instances to calculate the months
    $startDate = \Carbon\Carbon::parse($minFirstPaymentDate);
    $endDate = \Carbon\Carbon::parse($maxLastPaymentDate);
    
    // Get all months between startDate and endDate
    $months = [];
    while ($startDate->lte($endDate)) {
        $months[] = $startDate->format('Y_M'); // Format as "YYYY_Month"
        $startDate->addMonth(); // Move to next month
    }
    
    // Build the SQL to create the table with dynamic columns
    $columns = implode(',', array_map(function ($month) {
        return "`$month` DECIMAL(10,2) DEFAULT 0"; // Each month column
    }, $months));
    
    // Drop the table if it exists, then create it again
    DB::statement('DROP TABLE IF EXISTS bs_emi_details');
    $createTableSQL = "CREATE TABLE bs_emi_details (
        client_id INT NOT NULL,
        $columns
    )";
    DB::statement($createTableSQL);
    
    // Process each row in loan_details
    foreach ($loanDetails as $loan) {
        $emiAmount = $loan->loan_amount / $loan->num_of_payment;
        $paymentMonth = \Carbon\Carbon::parse($loan->first_payment_date);
    
        // Prepare an array for the EMI data for the client
        $emiData = ['client_id' => $loan->client_id];
    
        // Distribute EMI payments across months
        for ($i = 0; $i < $loan->num_of_payment; $i++) {
            $month = $paymentMonth->format('Y_M');
            if (isset($emiData[$month])) {
                // Add the EMI for that month
                $emiData[$month] += $emiAmount;
            } else {
                // Set the EMI for the month
                $emiData[$month] = $emiAmount;
            }
    
            // Move to the next month
            $paymentMonth->addMonth();
        }
    
        // Insert the EMI data for the client into emi_details
        DB::table('emi_details')->insert($emiData);
    }
    
    // Fetch the EMI details from the table
    $emiDetails = DB::table('emi_details')->get();

    // Pass the data to the view
    return view('loan-details.emi', [
        'loan_details' => $loanDetails,
        'emi_details' => $emiDetails, // Correct the variable name here
        'months' => $months // Pass the months array to be used in the table header
    ]);
}

    

}