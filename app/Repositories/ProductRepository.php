<?php

namespace App\Repositories;

class ProductRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\Product';
    }
}