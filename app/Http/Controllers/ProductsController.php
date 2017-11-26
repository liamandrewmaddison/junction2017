<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Container\Container as App;
use App\Repositories\CartRepository;

class ProductsController extends RESTActions
{

    private $cart;

    /**
     */
    public function __construct(App $app, CartRepository $cart)
    {
        parent::__construct($app);
        $this->cart = $cart;
    }

    /**
     * Specify Repository class name
     *
     * @return mixed
     */
    public function repository()
    {
        return 'App\Repositories\ProductRepository';
    }

    /**
     * GET PRODUCT FROM BARCODE
     *
     * @param Request $request - Array $barcodes
     * @return Array - Product
     */
    public function getProductFromBarCodes(Request $request)
    {
        $barcodes = $request->barcodes;
        $found = false;
        $product = [];
        foreach ($barcodes as $barcode) {
            if (!$found) {
                $product = $this->repository->findBy('barcode', $barcode);
                if ($product) {
                    $found = true;
                    break;
                }
            }
        }

        if ($found) {
            $this->cart->addProduct($request, $product);
        }

        return $this->respond($product);
    }
}
