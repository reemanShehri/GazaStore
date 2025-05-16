<?php

namespace App\Models;
use App\Models\Order_details;
use App\Models\Image;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    public $timestamps = false;



    protected $guarded =[];



    function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }


    // هنا لانه ال برودكت اله نوعين صور بيختلف ف حطينا الدالتين بشرط where
    function images()
    {
        return $this->morphOne(Image::class, 'imageable')->where('type', 'main');
    }

    function gallery()
    {
        return $this->morphMany(Image::class, 'imageable')->where('type', 'gallery');
    }

// البرودكت عنده كتير reviews
    function reviews()
    {
        return $this->hasMany(Review::class);
    }

    function order_details()
    {
        return $this->hasMany(Order_details::class);
    }



    function getImgPathAttribute(){
        $url='https://via.placeholder.com/100x80';

        if($this->images){

            $url =asset('images/'.$this->images->path);
        }
        return $url;
        }

}
