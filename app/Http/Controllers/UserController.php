<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Message;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->get('query');

        if ($query) {
            // Filter users based on search query
            $users = User::where('name', 'LIKE', "%{$query}%")->get();
        } else {
            // Return all users if no query is provided
            $users = User::all();
        }

        return response()->json($users);
    }

        public function show(Request $request)
    {
        $user = User::findOrFail($id);
        return view('users.profile', compact('user'));
    }

    public function getUsers(Request $request)
    {
        $query = $request->input('query');

        // Fetch users with messages based on search query
        $users = User::where('name', 'like', "%$query%")
                    ->with('messages') // Charger les messages associés
                    ->get();

        return response()->json($users);
    }

}
