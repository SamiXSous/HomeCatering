<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProducts extends Model
{
    //
    protected $fillable = [
        'cartId', 'productId', 'amount',
    ];

    public function cart_id()
    {
        return $this->belongsTo('App\Cart', 'foreign_key');
    }

}
