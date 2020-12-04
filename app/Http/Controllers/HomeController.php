<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $statuses = Status::notReply()->where(function($query) {
                return $query->where('user_id', auth()->user()->id)
                    ->orWhereIn('user_id', auth()->user()->friends()->pluck('id'));
            })->latest()->paginate(10);
            
            return view('timeline.index', [
                'statuses' => $statuses
            ]);
        }

        return view('home');
    }
}
