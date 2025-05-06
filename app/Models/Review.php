<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //

    protected $guarded =[];

    function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    //معناها التقييم ينتمي ل منتج و ينتمي ل يوزر

    function product()
    {
        return $this->belongsTo(Products::class)->withDefault();
    }
}
