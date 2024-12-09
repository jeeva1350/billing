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

class DenominationsController extends Controller
{

//index page view

    public function index() {
        $result['denominations'] = DB::table('denominations')->get();
        return view('denominations.index', $result);
    }
// Display the view for adding new data
    public function create() {
        return view('denominations.add');
    }
    public function show($id) {
        $result['item'] = DB::table('denominations')->where('id',$id)->first();
        return view('denominations.add',$result);
    }
    public function store(Request $request) {
       
        $values = ['value'=>$request->value,'count'=>$request->count,];
    
        if($request->item_id){
           
            $update = DB::table('denominations')->where('id',$request->item_id)->update($values);
            
            Session::flash('alert-success', 'denominations Updated Successfully');
        }else{
           
            $store = DB::table('denominations')->insert($values);
            Session::flash('alert-success', 'denominations Inserted Successfully');
        }
        return redirect()->action('App\Http\Controllers\DenominationsController@index');    
    }
   

}