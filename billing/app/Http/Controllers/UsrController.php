<?php
namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Response;
use Session;
use Validator;
class UsrController extends BaseController {
	public function __construct() {
		$this->middleware('auth');
	}
	public function index() {
		$users = DB::table('admin')
			->leftJoin('roles', 'roles.id', 'admin.role_id')
			->select('admin.id', 'admin.username', 'admin.email', 'roles.name', 'admin.status')
			->get();
		return view('UserManagement.Users.index', ['users' => $users]);
	}
	public function create() {
		$roles = DB::table('roles')->where('status', 1)->get();
		return View('UserManagement.Users.create',['roles' => $roles]);
	}
	public function store(Request $request) {
		$validator = Validator::make($request->all(), [
			'username' => 'required',
			'email' => 'required',
			'role_id' => 'required',
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
		if ($request->usr_id) {
			$cities = DB::table("admin")
				->where('id', $request->usr_id)
				->update(['role_id' => $request->role_id, 'username' => $request->username,'status'=>$status,'auth_id'=>Auth::user()->id]);
			Session::flash('alert-success', 'User Updated Successfully');
			return redirect()->action('App\Http\Controllers\UsrController@index');
		}
		$cities = DB::table("admin")
			->where('email', $request->email)
			->get();
		if(count($cities)>0) { 
		Session::flash('alert-success', 'User Already Exists');
		return redirect()->action('App\Http\Controllers\UsrController@create');
		}
		$password = bcrypt($request->password);
		$values = array('username'=>$request->username,'email'=>$request->email,'password'=>$password,'role_id'=>$request->role_id,'status'=>$status,'auth_id'=>Auth::user()->id);
		DB::table('admin')->insert($values);
		Session::flash('alert-success', 'User Added Successfully');
		return redirect()->action('App\Http\Controllers\UsrController@index');
	}
	public function show($id) {

		$users = DB::table('admin')
			->leftJoin('roles', 'roles.id', 'admin.role_id')
			->where('admin.id', $id)
			->select('admin.*')
			->first();
		$roles = DB::table('roles')->where('status', 1)->get();
		return view('UserManagement.Users.edit', ['users' => $users,'roles' => $roles]);
	}
	public function edit($id) {
		if ($id) {
			$a = explode(',', $id);
			print_r($a);
			$cities = DB::table("admin")->where("id", $a[0])
				->update(['status' => $a[1]]);
		}
		return redirect()->action('App\Http\Controllers\UsrController@index');
	}
	public function update(Request $request) {
		print_r($request->all());
		exit();
	}
	public function destroy($id) {
	}
	public function changePassword(Request $request) {
		if ($request->usr_id) {
			$ussr = DB::table("admin")
				->where('id', $request->usr_id)
				->update(['password' => bcrypt($request->pass)]);
			echo "sucess";
		}
	}
}
?>
