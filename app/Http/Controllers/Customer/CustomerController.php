<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function login()
    {
        return view('web.login');
    }
    public function loginbyphone()
    {
        return view('web.loginphone');
    }
    public function forgot()
    {
        return view('web.forgot');
    }
    public function signup()
    {
        return view('web.signup');
    }
   
    public function myaccount()
    {
        return view('web.myaccount');
    }
   


    
}