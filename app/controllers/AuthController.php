<?php

class AuthController extends BaseController {

    public function showLoginForm()
    {
        if (Auth::check())
            return Redirect::intended('admin');

        return View::make('login');
    }

    public function attemptLogin()
    {
        if (Auth::attempt(array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'active' => 1
        ), Input::get('remember', false)))
        {
            // TODO: Update last_seen every 60 seconds

            Auth::user()->touchLastSeen();

            return Redirect::intended('admin');
        }

        return Redirect::to('login')->with('msg_type', 'danger')->with('msg', 'Neispravno korisničko ime i/ili lozinka');
    }

    public function attemptLogout()
    {
        if (Auth::check())
        {
            Auth::logout();
            return Redirect::to('login')->with('msg_type', 'success')->with('msg', 'Korisnik uspješno odjavljen');
        }

        return Redirect::to('login');
    }

}
