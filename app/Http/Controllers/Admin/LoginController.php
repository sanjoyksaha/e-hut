<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validator($request);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => '1'], $request->get('remember'))) {
            return redirect()->intended(route('admin.dashboard'))->with('success', 'You are logged in');
        }
        return back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'This account is not activate.']);
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect('/admin/login');
    }

    private function validator(Request $request)
    {
        $rules = [
            'email'    => 'required|email|exists:admins',
            'password' => 'required|min:6',
        ];

        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        $request->validate($rules,$messages);
    }
}

