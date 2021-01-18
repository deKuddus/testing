<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Modules\Reseller\Entities\ResellerModel;
use \Modules\Customer\Entities\Customer;
use \App\User;
use Session;
use DB;
use Str;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    


}
