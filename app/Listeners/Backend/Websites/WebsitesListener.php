<?php

namespace App\Listeners\Backend\Websites;

use App\Events\Backend\Websites\Websites;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WebsitesListener
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
     * @param  Websites  $event
     * @return void
     */
    public function handle(Websites $event)
    {
        //
    }
}
