<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class MainController extends Controller
{
    public function userPage () {
        return view('user');
    }

    public function adminPage () {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login.page');
        }
        return view('admin');
    }

    public function adminLoginPage () {
        if (!Auth::guard('admin')->check()) {
            return view('adminLogin');
            // return redirect()->route('admin.login');
        }
        return redirect('/admin');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        try {
            $validatedData = $request->validate($rules);
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/admin');
        }
        else {
            // Authentication failed
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

}
