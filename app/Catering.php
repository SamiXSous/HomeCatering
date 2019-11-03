<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catering extends Model
{
    //
    protected $fillable = [
        'name', 'adminId', 'description', 'active',
    ];

    public function admin_id()
    {
        return $this->belongsTo('App\User', 'foreign_key');
    }
}
