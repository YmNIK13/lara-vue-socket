<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Events\PrivateMessage;
use App\Models\User;
use App\Traits\APIResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{
    use APIResponse;

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


    /**
     * Получаем сообщение от пользователя и пересылаем всем подписчикам
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function sendMessage(Request $request): JsonResponse
    {
        $fields = $request->all();
        $fields['create'] = now()->format('Y-m-d H:i:s');

        // вызываем событие
        event(new NewMessage($fields));

        return $this->sendResponse($fields);
    }


    /**
     * Получаем сообщение от пользователя и рассылаем приватным подписчикам
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function sendPrivateMessage(Request $request): JsonResponse
    {
        $fields = $request->all();

        // вызываем событие
        PrivateMessage::dispatch($fields);

        return $this->sendResponse($fields);
    }
}
