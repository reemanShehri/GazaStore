<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //

    protected $guarded =[];


    function products()
    {
        return $this->belongsTo(Products::class)->withDefault();
    }

    function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    


}
