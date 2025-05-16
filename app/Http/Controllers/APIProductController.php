<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class APIProductController extends Controller
{
    //

    public function products()
    {

        $products=HTTP::get('https://dummyjson.com/products')->json();
        $products=$products['products'];
        return view('api.products', compact('products'));
    }


    public function weather()
    {
        $weather=HTTP::get('https://api.open-meteo.com/v1/forecast?latitude=35.6895&longitude=139.6917&current_weather=true')->json();
        $weather=$weather['current_weather'];
        return view('api.weather', compact('weather'));
    }
}
