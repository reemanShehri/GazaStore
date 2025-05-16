<?php

namespace App\Http\Controllers\API;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class Product2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // first way
        // $products = [];
        // $pro=Products::all();
        // foreach($pro as $product){
        //     $products[] = [

        //         'name' => $product->name,
        //         'price' => $product->price,
        //         // 'description' => $product->description,
        //         // 'category_id' => $product->category_id,
        //         // 'created_at' => $product->created_at,
        //     ];
        // }
        // return $products;

        // 2nd way make resource its name ProductResource  and make in it an array as up then

        // return ProductResource::collection(Products::all());
   return[

    'status'=>true,
    'message'=>'Products fetched successfully',
    'products'=>ProductResource::collection(Products::all()),
   ];



    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

       $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:1',

        ]);

        $product = Products::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Product created successfully',
            'product' => new ProductResource($product),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Products::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Product fetched successfully',
            'product' => new ProductResource($product),
        ]);
        // return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
