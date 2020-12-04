<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'except' => ['getSignout']
        ]);
    }

    public function getSignup()
    {
        return view('auth.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'location' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'location' => $request->location,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        $remember = $request->remember = true;

        Auth::attempt($request->only('username', 'password'), $remember);

        return redirect()
            ->route('home')
            ->with('info', 'Welcome aboard! You\'re now a part of the Connectify members.');
    }

    public function getSignin()
    {
        return view('auth.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|exists:users',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only(['username', 'password']), $request->has('remember'))) {
            return redirect()
                ->back()
                ->with('error', 'Please type the correct password!');
        }

        return redirect()->route('home');
    }

    public function getSignout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
