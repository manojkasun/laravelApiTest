<?php

namespace Modules\Items\Listeners;

use Modules\Items\Listeners\Events\ItemEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ItemListner
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

            public function handle(ItemEvent $event)
            {
                $event->item->cart()->delete();
            }


}
