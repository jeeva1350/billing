<?php
namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Response;
use Session;use Validator;
class RoleController extends BaseController {
	public function __construct() {
		$this->middleware('auth');
	}
	public function index() {
		$roles = DB::table('roles')->paginate(5);
		return view('UserManagement.Roles.index', ['roles' => $roles]);
	}
	public function create() {
		return view('UserManagement.Roles.create');
	}
	public function store(Request $request) {
		$validator = Validator::make($request->all(), [
			'name' => 'required',
		]);
		$errors = $validator->errors();
		if ($validator->fails()) {
			return back()->with('errors', $errors);
		}
		if ($request->status) {
			$status = 1;
		} else {
			$status = 0;
		}
		if ($request->role_id) {
			$cities = DB::table("roles")->where("id", $request->role_id)
				->update(['name' => $request->name,'status'=>$status,'auth_id'=>Auth::user()->id]);
			Session::flash('alert-success', 'Roles Updated Successfully');
			return redirect()->action('App\Http\Controllers\RoleController@index');
		}
		$roles = DB::table("roles")->where("name", $request->name)
			->get();
		if (count($roles) > 0) {
			Session::flash('alert-success', 'Role Exists');
			return back();
		}
		$values = array('name' => $request->name,'status'=>$status,'auth_id'=>Auth::user()->id);
		$users = DB::table('roles')->insert($values);
		Session::flash('alert-success', 'Roles Added Successfully');
		return redirect()->action('App\Http\Controllers\RoleController@index');
	}
	public function show($id) {
		$role = DB::table('roles')->where('id', $id)->first();
		return view('UserManagement.Roles.edit', ['role' => $role]);
	}
	public function edit($id) {
		if ($id) {
			$a = explode(',', $id);
			print_r($a);
			$cities = DB::table("roles")->where("id", $a[0])
				->update(['status' => $a[1]]);
		}
		return redirect()->action('App\Http\Controllers\RoleController@index');
	}
	
}
?>
