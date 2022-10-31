<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\SendEmailNotidicaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ServicioListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        User::where('id', $event->servicio->familiar->usuario->id)->each(function(User $user) use($event){
            Notification::send($user, new SendEmailNotidicaction($event->servicio));
        });
    }
}
