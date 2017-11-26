<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    /**
     * Necessary variable for generalization of REST actions
     */
    public $key = 'id';
    public $name = 'cart';

    protected $table = 'carts';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'shop_id',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
