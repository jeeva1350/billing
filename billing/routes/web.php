<?php

use Illuminate\Support\Facades\Route;

//Backend Routes
Route::get('admin', function () {
    return redirect('admin/login');
});
Route::get('login', function () {
    return redirect('admin/login');
});
Route::group(array('prefix' => 'admin'), function () { 
//login
//Route::get('login',function () { return view('auth/login'); });
Route::get('login','App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::get('register', function () {
    return redirect('admin/login');
});
Route::any('authenticate', array('uses' => 'App\Http\Controllers\Auth\LoginController@authenticate'))->name('authenticate');
Route::get('logout', array('uses' => 'App\Http\Controllers\Auth\LoginController@logout'))->name('logout');

// Products

Route::get('products','App\Http\Controllers\ProductController@index')->name('products');
Route::get('products/create','App\Http\Controllers\ProductController@create')->name('products.create');
Route::get('products/{id}','App\Http\Controllers\ProductController@show')->name('products.show');
Route::Post('products/store','App\Http\Controllers\ProductController@store')->name('products.new');

// denominations

Route::get('denominations','App\Http\Controllers\DenominationsController@index')->name('denominations');
Route::get('denominations/create','App\Http\Controllers\DenominationsController@create')->name('denominations.create');
Route::get('denominations/{id}','App\Http\Controllers\DenominationsController@show')->name('denominations.show');
Route::Post('denominations/store','App\Http\Controllers\DenominationsController@store')->name('denominations.new');

// Billing

Route::get('billing','App\Http\Controllers\BillingController@index')->name('billing');
Route::Post('billing/store','App\Http\Controllers\BillingController@store')->name('billing.new');




// USer MAnagement
	//Users
	Route::resource('users', 'App\Http\Controllers\UsrController', [
		'names' => [
			'index' => 'users',
			'store' => 'users.new',
			'edit' => 'users.edit',
			'update' => 'users.update',

		],
	]);
	Route::any('user/changePassword', 'App\Http\Controllers\UsrController@changePassword')->name('changePassword');
	//Roles
	Route::resource('roles', 'App\Http\Controllers\RoleController', [
		'names' => [
			'index' => 'roles',
			'store' => 'roles.new',
			'edit' => 'roles.edit',
			'update' => 'roles.update',
		],
	]);

	


});








