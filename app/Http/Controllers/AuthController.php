<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Redirect to admin login for Laravel auth compatibility.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToAdminLogin()
    {
        return redirect()->route('admin.login');
    }

    /**
     * Show the admin login form.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        }
        
        return view('admin.login');
    }

    /**
     * Handle admin login attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.index'));
        }

        throw ValidationException::withMessages([
            'email' => 'প্রদত্ত তথ্য আমাদের রেকর্ডের সাথে মেলে না।',
        ]);
    }

    /**
     * Handle admin logout.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}