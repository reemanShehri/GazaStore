<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    //

    protected $guarded =[];

    function order()
    {
        return $this->belongsTo(Order::class)->withDefault();
    }

    function product()
    {
        return $this->belongsTo(Products::class)->withDefault();
    }

    function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    
}
