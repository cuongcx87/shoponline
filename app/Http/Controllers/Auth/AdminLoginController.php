<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest:admin')->except('adminLogout');
    }

    public function showLoginForm () {
    	return view('auth.admin-login');
    }

    public function login (Request $request) {
    	$request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:6',
		]);

		if (Auth::guard('admin')->attempt(['name' => $request->name, 'email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Authentication passed...
            return redirect()->route('admin.category');
        }
        return redirect()->back()->withInput($request->only('name', 'email', 'remember'));
    }

    public function adminLogout () {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
