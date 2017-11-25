<?php

namespace App\Repositories;

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
}