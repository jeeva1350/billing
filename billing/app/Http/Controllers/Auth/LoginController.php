<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class LoginController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Login Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles authenticating users for the application and
		    | redirecting them to your home screen. The controller uses a trait
		    | to conveniently provide its functionality to your applications.
		    |
	*/

	//use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = 'billing';
	public function login(Request $request)
    	{
        return view('auth.login');
    	}
	public function authenticate(Request $request)
    	{
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
	$credentials['status'] = '1';
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('billing')->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    	} 
	public function __construct() {
		$this->middleware('guest')->except('logout');
	}
	public function logout(Request $request)
    	{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->withSuccess('You have logged out successfully!');;
    	} 
}
