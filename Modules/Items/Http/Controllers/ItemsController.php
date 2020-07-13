<?php

namespace Modules\Items\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Cart\Entities\Cart;
use Modules\Items\Entities\Item;
use Modules\Items\Http\Requests\AddItemRequest;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function view()
    {
       $item = Item::all();

        return  response( )->json($item);
    }
    public function addItem(AddItemRequest $req){
        $item = $req->validated();
        Item::create([
            'name' => $item['name'],
            'price' => $item['price'],
            'description' => $item['description'],
            'quantity' => $item['quantity'],
        ]);
        return response()->json($item, 201);
    }

    public function updateitem(AddItemRequest $req, $id)
    {
        dd($id);
        $item = $req->validated();
        $data = ([
            'name' => $item['name'],
            'price' => $item['price'],
            'description' => $item['description'],
            'quantity' => $item['quantity'],
        ]);

        Item::findOrFail($id)->update($data);

        return response()->json($data, 200);
    }

}
