<?php

namespace App\Listeners;

use App\Events\Indexshowed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\TESTEMAIL;

class SendingNoticationAfterIndexShowed
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
     * @param  Indexshowed  $event
     * @return void
     */
    public function handle(Indexshowed $event)
    {
        Mail::to("oussama@gmail.Com")->send(
            new TESTEMAIL($event->entities , $event->utilisateurs)
        );
    }
}
