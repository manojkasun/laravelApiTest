<?php

namespace Modules\Items\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Items\Entities\Item;

class ItemEvent
{
    use SerializesModels;

    /**
     * @var Item
     */
    public $item;

    /**
     * Create a new event instance.
     *
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }
   /* public function broadcastOn()
    {
        return [];
    }*/
}
