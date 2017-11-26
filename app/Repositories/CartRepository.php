<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\Cart';
    }

    /**
     * GET CART
     *
     */
    public function getCart(Request $request)
    {
        $user = $request->user();
        $shop = 1; //should be dynamic
        var_dump($user);
        $cart = $this->model->firstOrCreate([
            'user_id' => $user->id,
            'shop_id' => $shop,
            'status' => 'active',
        ])->first();

        return $cart;
    }

    /**
     * ADD PRODUCT
     *
     * @param Product
     * @return Cart
     */
    public function addProduct(Request $request, $product)
    {
        $cart = $this->getCart($request);
        $items = [];
        array_push($items, $product);
        $items = $cart->items;
        $items = array_merge($items, $items['items']);
        $cart->items = $items;
        $cart->save();
        // return [];
    }
}