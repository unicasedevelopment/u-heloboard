<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class Login_Controller extends Controller
{
    //
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with('error','Login Failed');

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }



    // public function login(LoginRequest $request)
    // {
    //     $credentials = $request->getCredentials();

    //     // return response()->json([
    //     //     'status' => Auth::validate($credentials)
    //     //  ]);

    //     // if(!Auth::validate($credentials)):

    //     //     // return redirect()->to('login')
    //     //     //     ->withErrors(trans('auth.failed'));
    //     // endif;

    //     $user = Auth::getProvider()->retrieveByCredentials($credentials);

    //     Auth::login($user);

    //     return $this->authenticated($request, $user);
    // }

    // /**
    //  * Handle response after user authenticated
    //  *
    //  * @param Request $request
    //  * @param Auth $user
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // protected function authenticated(Request $request, $user)
    // {
    //     return redirect()->intended();
    //     // return view('dashboard.index');
    // }
}