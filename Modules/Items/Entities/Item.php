<?php

namespace Modules\Items\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Cart\Entities\Cart;

class Item extends Model
{
    protected $fillable = ['name', 'price', 'description', 'quantity'];
    protected $events = [
        'deleted' => Cart::class,
    ];

    public function cart(){

        return $this->hasMany(Cart::class);
    }
}
