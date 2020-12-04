<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => 'index'
        ]);
    }

    public function index(User $user)
    {
        $statuses = $user->statuses()->notReply()->latest()->paginate(10);

        return view('profile.index', [
            'user' => $user,
            'statuses' => $statuses,
            'authUserIsFriend' => auth()->user()->isFriendsWith($user)
        ]);
    }

    public function getEdit(User $user)
    {
        if ($user != Auth::user()) {
            return redirect()->route('profile.index', $user);
        }

        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function postEdit(Request $request, User $user)
    {
        if ($user != Auth::user()) {
            return redirect()->route('profile.index', $user);
        }

        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'location' => 'required|max:255'
        ]);

        Auth::user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'location' => $request->location
        ]);

        return redirect()->route('profile.index', $user)->with('info', 'Your profile has been updated successfully!');
    }
}
