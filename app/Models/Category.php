<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $guarded =[];


    function products()
    {
        return $this->hasMany(Products::class);
    }

    function images()
    {
        return $this->morphOne(Image::class, 'imageable')->where('type', 'main');
    }


    function getImgPathAttribute(){
    $url='https://via.placeholder.com/100x80';

    if($this->images){

        $url =asset('images/'.$this->images->path);
    }
    return $url;
    }




}
