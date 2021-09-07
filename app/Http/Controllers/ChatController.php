<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class ChatController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        return view('pages.chat');
    }


    public function sendMessage(Request $request)
    {
        // вызываем событие
        event(new NewMessage($request->input('message')));
    }
}
