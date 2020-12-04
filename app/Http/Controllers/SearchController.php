<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $_q = $request->_q;

        if (!$_q) {
            return redirect()->route('home');
        }

        $users = User::where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', "%{$_q}%")
            ->orWhere('username', 'LIKE', "%{$_q}%")
            ->get();

        return view('search.results', [
            'q' => $_q,
            'users' => $users
        ]);
    }
}
