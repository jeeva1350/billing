<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use DB;
use Session;

class CheckAge {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		// print_r($request->segment(1));
		$ab = $request->segment(2);

		$a = \Request::getRequestUri();

		// print_r($a);
		// exit();

		if (Auth::user()->role_id == 1) {
			return $next($request);

		} elseif (Auth::user()->role_id == 2) {

			// if ($ab == "sales") {products-in-cart
			if (($ab == "sales") || ($ab == "customers") || ($ab == "products-in-cart") || ($ab == "products-in-wishlist") || ($ab == "added-to-cart") || ($ab == "most-viewed") || ($ab == "top-search-terms") || ($ab == "products-views") || ($ab == "customerimport")) {
				return $next($request);
			}

		} elseif (Auth::user()->role_id == 3) {

			if ($ab == "sales") {
				return $next($request);
			} else {

			}

		} elseif (Auth::user()->role_id == 4) {

			if (($ab == "product") || ($ab == "product-sort")) {
				return $next($request);
			} else {

			}
		} elseif (Auth::user()->role_id == 5) {

			if (($ab == "sales") || ($ab == "importProductStock") || ($ab == "mailerpendingorders") || ($ab == "pendingorders")) {
				return $next($request);
			} else {

			}
		} elseif (Auth::user()->role_id == 6) {

			if (($ab == "online-survey")) {
				return $next($request);
			} else {

			}

		}

		$permissions = DB::table('permission_role')
			->leftJoin('permissions', 'permissions.id', 'permission_role.permission_id')
			->where('permission_role.role_id', Auth::user()->role_id)
			->select('permissions.slug')
			->get();

		if (count($permissions) > 0) {

			foreach ($permissions as $permission) {
				if ($permission->slug == $a) {
					return $next($request);
				}

			}

		}

		Session::flash('message', 'You Dont Have Access !');
		return back();
		// return back()->with('errors', ["No Access to The View"]);
		// return redirect('/home');

		// return "Hello";s

		// exit();
		// $slug = Post::where('slug', $request->segment(3))->first();

		// if ($slug == null) {
		// 	return redirect('/contact');
		// } else if ($slug->slug == $request->segment(3)) {
		// 	return $next($request);
		// } else {
		// 	return redirect('/blog');
		// }

		// return $next($request);
	}
}
