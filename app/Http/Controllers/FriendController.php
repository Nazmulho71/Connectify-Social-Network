<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendrequests();

        return view('friends.index', [
            'friends' => $friends,
            'requests' => $requests
        ]);
    }

    public function getAdd(User $user)
    {
        if ($user == auth()->user()) {
            return redirect()->route('home');
        }

        if (auth()->user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(auth()->user())) {
            return redirect()
                ->route('profile.index', $user)
                ->with('info', 'Friend request is already pending!');
        }

        if (auth()->user()->isFriendsWith($user)) {
            return redirect()
                ->route('profile.index', $user)
                ->with('info', 'You are already friends!');
        }

        auth()->user()->addFriend($user);

        return redirect()
            ->route('profile.index', $user)
            ->with('info', 'Friend request sent!');
    }

    public function getAccept(User $user)
    {
        if ($user == auth()->user()) {
            return redirect()->route('home');
        }

        if (!auth()->user()->hasFriendRequestRecieved($user)) {
            return redirect()->route('home');
        }

        if (auth()->user()->isFriendsWith($user)) {
            return redirect()
                ->route('profile.index', $user)
                ->with('info', 'You are already friends!');
        }

        auth()->user()->acceptFriendRequest($user);

        return redirect()
            ->route('profile.index', $user)
            ->with('info', 'Friend request accepted!');
    }

    public function postRemove(User $user)
    {
        if (!auth()->user()->isFriendsWith($user)) {
            return redirect()->back();
        }

        auth()->user()->removeFriend($user);

        return redirect()->back()->with('error', 'Friend removed!');
    }
}
