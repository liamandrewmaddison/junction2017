<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    /**
     * Necessary variable for generalization of REST actions
     */
    public $key = 'id';
    public $name = 'transaction';

    protected $table = 'transactions';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cart_id',
    ];
}
