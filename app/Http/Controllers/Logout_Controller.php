<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout_Controller extends Controller
{
    //
    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}