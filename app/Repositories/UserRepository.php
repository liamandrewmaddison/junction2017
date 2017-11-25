<?php

namespace App\Repositories;

class UserRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\User';
    }
}