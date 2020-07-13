<?php

namespace Modules\Cart\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Items\Entities\Item;

class Cart extends Model
{

    protected $fillable = ['user_id', 'item_id', 'quantity'];


    public function item(){
        return $this->hasOne(Item::class);
    }

}

