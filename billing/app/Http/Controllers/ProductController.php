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

class ProductController extends Controller
{

//index page view

    public function index() {
        $result['products'] = DB::table('products')->get();
        
        return view('products.index', $result);
    }
// Display the view for adding new data
    public function create() {
        return view('products.add');
    }
    public function show($id) {
        $result['item'] = DB::table('products')->where('id',$id)->first();
        return view('products.add',$result);
    }
    public function store(Request $request) {
       
        $values = ['name'=>$request->name,'product_id'=>$request->product_id,'available_stocks'=>$request->available_stocks,'price_per_unit'=>$request->price_per_unit,'tax_percentage'=>$request->tax_percentage];
    
        if($request->item_id){
           
            $update = DB::table('products')->where('id',$request->item_id)->update($values);
            Session::flash('alert-success', 'Products Updated Successfully');
        }else{
           
            $store = DB::table('products')->insert($values);
            Session::flash('alert-success', 'Products Inserted Successfully');
        }
        return redirect()->action('App\Http\Controllers\ProductController@index');    
    }
   

}