<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cart\Entities\Cart;
use Modules\Cart\Http\Requests\CartRequest;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('cart::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function addToCart(CartRequest $req)
    {
        $data = $req->validated();
        $check_item = Cart::where(['user_id' => $data['user_id'], 'item_id' => $data['item_id']])->first();

        if($check_item === null)
        {

            Cart::create([
                'user_id' => $data['user_id'],
                'item_id' => $data['item_id'],
                'quantity' => 1
            ]);
            return response()->json($data, 201);
        }
else
    $items = $check_item->quantity;
        $quentity =  $items+=1;
        //dd($quentity);
$id = $check_item->id;
        $data = ([
            'user_id' => $data['user_id'],
            'item_id' => $data['item_id'],
            'quantity' =>$quentity
        ]);
    Cart::findOrFail($id)->update($data);

        return response()->json($data, 200);
    }


    public function view($id)
    {
        $data = Cart::all()->where('user_id', $id);
        return response()->json($data, 200);
    }


    public function deleteitem($id)
    {
        $item = Cart::findOrFail($id);
        if($item)
            $item->delete();
        else
            return response()->json(error);
        return response()->json($item);
    }
}
