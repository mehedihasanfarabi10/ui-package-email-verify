<?php

namespace App\Listeners;

use App\Events\PostProcess;
use App\Mail\UserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Mail;

class SendPostProcessingMail
{
    /**
     * Create the event listener.
     */
    
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostProcess $event): void
    {
        //

        \Mail::to(Auth::user()->email)->send(new UserMail($event->post));
    }
}
