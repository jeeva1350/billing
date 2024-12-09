<?php
namespace App\Http\Controllers;
use DateTime;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Mail;
use Validator;
class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
}
