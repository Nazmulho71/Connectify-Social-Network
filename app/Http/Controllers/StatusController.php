<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postStatus(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:1000'
        ]);

        auth()->user()->statuses()->create([
            'body' => $request->status
        ]);

        return redirect()
            ->route('home')
            ->with('info', 'Status posted!');
    }

    public function postReply(Request $request, $statusId)
    {
        $this->validate($request, [
            "reply-$statusId" => 'required|max:255'
        ], [
            'required' => 'The reply field is required!'
        ]);

        $status = Status::notReply()->find($statusId);

        if (!$status) {
            return redirect()->route('home');
        }

        if (auth()->user()->id !== $status->user->id && !auth()->user()->isFriendsWith($status->user)) {
            return redirect()->route('home');
        }

        $reply = Status::create([
            'user_id' => auth()->user()->id,
            'body' => $request->input("reply-$statusId")
        ])->user()->associate(auth()->user());

        $status->replies()->save($reply);

        return redirect()->back();
    }

    public function getLike(Status $status)
    {
        if (!auth()->user()->isFriendsWith($status->user)) {
            return redirect()->route('home');
        }

        if (auth()->user()->id === $status->user->id) {
            return redirect()->route('home');
        }

        if (auth()->user()->hasLikedStatus($status)) {
            return redirect()->back();
        }

        $like = Like::create([
            'user_id' => auth()->user()->id,
            'likeable_id' => $status->id,
            'likeable_type' => get_class($status)
        ]);

        auth()->user()->likes()->save($like);

        return redirect()->back();
    }
}
