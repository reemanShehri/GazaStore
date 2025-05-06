<?php

namespace App\Models;

use App\Models\User;

use App\Models\Payment;
use App\Models\Order_details;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $guarded =[];

    function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    function order_details()
    {
        return $this->hasMany(Order_details::class);
    }



    // has one payment has one order just
    function payments()
    {
        return $this->hasOne(Payment::class);


    }
}
