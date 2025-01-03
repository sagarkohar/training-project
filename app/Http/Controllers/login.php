<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    //

    public function loginPage()
    {
        return view("login.login_page");
    }

    public function login(Request $request)
    {
        $credentail =  $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']], true)) {
            $request->session()->regenerate();

            return redirect("/designations");
        } else {
            return redirect()->back()->with("error", "Invalid credentials.");
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back()->with("error", "You are no longer logged in ");
    }
}
