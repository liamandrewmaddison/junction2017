<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionsController extends RESTActions
{
    /**
     * Specify Repository class name
     *
     * @return mixed
     */
    public function repository()
    {
        return 'App\Repositories\TransactionRepository';
    }
}
