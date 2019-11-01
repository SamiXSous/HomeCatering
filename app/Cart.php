<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'userId', 'cateringId', 'date',
    ];

    public function user_id()
    {
        return $this->belongsTo('App\User', 'foreign_key');
    }

    public function catering_id()
    {
        return $this->belongsTo('App\Catering', 'foreign_key');
    }
}
