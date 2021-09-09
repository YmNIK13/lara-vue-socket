<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Чтоб не зависить от очереди. отправляем через интерфей ShouldBroadcastNow
 */
class NewEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $result; // ['result' => 'Что-нибудь']

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->result = $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
//        return new PrivateChannel('news-action');
//        return ['news-action'];
        return new Channel('news-action.');
    }


//
//    /**
//     * Название канала
//     *
//     * @return string
//     */
//    public function broadcastAs()
//    {
//        return "news-action:App\\Events\\NewEvent";
//    }
//
//    /**
//     * Построение ответа
//     *
//     * @return string[]
//     */
//    public function broadcastWith()
//    {
//        return ['title'=>'This notification from ItSolutionStuff.com'];
//    }
}
