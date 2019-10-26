<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMenu extends Model
{
    //
    protected $fillable = [
        'menuId', 'productId'
    ];
}
