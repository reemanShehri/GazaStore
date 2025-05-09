<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //

    protected $guarded =[];
    protected $fillable = ['path', 'imageable_id', 'imageable_type'];

    function imageable()
    {
        return $this->morphTo();
    }

    // function products()
    // {
    //     return $this->belongsTo(Products::class);
    // }
    // function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
    // function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
