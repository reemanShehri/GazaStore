<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //

    protected $guarded =[];



    function order()
    {
        return $this->belongsTo(Order::class)->withDefault();
    }

    function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }


}
