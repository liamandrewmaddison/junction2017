<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    /**
     * Necessary variable for generalization of REST actions
     */
    public $key = 'id';
    public $name = 'shop';

    protected $table = 'shops';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'stripe_id',
    ];
}
