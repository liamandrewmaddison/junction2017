<?php

namespace App\Repositories;

class ShopRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\Shop';
    }
}