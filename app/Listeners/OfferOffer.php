<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\VedioViewer;

class OfferOffer
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
    public function handle( VedioViewer $event )
    {
       $this->UpdateViewer($event->video);
    }
    public function UpdateViewer($video){
        $video->viewers++;
        $video->save();

    }
}
