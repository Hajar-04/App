<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Jobs\SendMessage;
use App\Models\Message;
use App\Models\Friendlist;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id', auth()->id())->select([
            'id', 'name', 'email',
        ])->first();

        return view('home', [
            'user' => $user,
        ]);
    }

    public function messages(): JsonResponse
    {
        $messages = Message::with('user')->get()->append('time');

        return response()->json($messages);
    }

    public function message(Request $request): JsonResponse
    {
        $message = Message::create([
            'user_id' => auth()->id(),
            'text' => $request->get('text'),
        ]);

        SendMessage::dispatch($message);

        return response()->json([
            'success' => true,
            'message' => "Message created and job dispatched.",
        ]);
    }

    public function fetchAllFriends () {

        $friends_id = [];

        $query = Friendlist::where('first_user', Auth::user()->id)
        ->orWhere('second_user', Auth::user()->id)
        ->get();

        if ($query) {
            foreach ($query as $user_id) {
                if ($user_id->first_user == Auth::user()->id) {
                    $friends_id[] = $user_id->second_user;
                } else {
                    $friends_id[] = $user_id->first_user;
                }
            }

            $friends = User::whereIn('id', $friends_id)->orderBy('name', 'asc')->get(['id', 'name', 'email', 'photo']);

            return $friends;
        } else {
            return ['error' => 'You dont have any friends.'];
        }
    }
}
