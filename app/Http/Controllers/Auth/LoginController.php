<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user_provider = Socialite::driver('facebook')->user();
        $user = User::where('email', $user_provider->email)->first();
        if ($user) {
            Auth::login($user);
        } else {
            $user           = new User;
            $user->name     = $user_provider->name;
            $user->email    = $user_provider->email;
            $user->password = bcrypt($user_provider->name);
            $user->save();
            Auth::login($user);
        }
        return redirect()->route('home');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user_provider = Socialite::driver('google')->user();
        $user = User::where('email', $user_provider->email)->first();
        if ($user) {
            Auth::login($user);
        } else {
            // dd($user_provider);
            $user           = new User;
            $user->name     = $user_provider->name;
            $user->email    = $user_provider->email;
            $user->password = bcrypt($user_provider->name);
            $user->save();
            Auth::login($user);
        }
        return redirect()->route('home');
    }
}
