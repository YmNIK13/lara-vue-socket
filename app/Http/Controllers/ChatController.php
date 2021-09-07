<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Events\PrivateMessage;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        $users = User::query()
            ->select('id', 'email')
            ->where('id', '!=', Auth::id())
            ->pluck('email', 'id')
            ->toArray();

        return view('pages.chat', [
            'user' => Auth::user(),
            'users' => json_encode($users),
        ]);
    }


    public function sendMessage(Request $request)
    {
        // вызываем событие
        event(new NewMessage($request->input('message')));
    }


    public function sendPrivateMessage(Request $request)
    {
        // вызываем событие
        PrivateMessage::dispatch($request->all());

        return $request->all();
    }
}
