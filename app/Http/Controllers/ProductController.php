<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::latest('id')
            // ->with('category')
            ->paginate(10);

            return view('admin.products.index', compact('products'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $categories = Category::select('id','name')->get();
        return view('admin.products.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery'=>'nullable',
            'description' => 'required',
            'quantity' => 'required|numeric',
        ]);

        $data=$request->except('_token','image');

        $product = Products::create($data);

           // add image
       if ($request->hasFile('image')) {
         $img_name=rand(1000,9999).time().'.'.$request->image->extension();
         $request->image->move(public_path('images'),$img_name);

        $product->images()->create([
            'path' => $img_name,
            // 'type' => 'main',
        ]);
    }

    if ($request->has('gallery')) {

        foreach ($request->gallery as $img) {

            $img_name=rand(1000,9999).time().'.'.$img->extension();
            $img->move(public_path('images'),$img_name);

           $product->images()->create([
               'path' => $img_name,
                'type' => 'gallery',
           ]);
        }
    }

        return redirect()
        ->route('admin.products.index')
        ->with('msg', 'Product created successfully.')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $product = Products::findOrFail($id);
        $categories = Category::select('id','name')->get();
        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery'=>'nullable',
            'description' => 'required',
            'quantity' => 'required|numeric',
        ]);
        $data=$request->except('_token','image');
        $product = Products::findOrFail($id);
        $product->update($data);

        // add image
        if ($request->
        hasFile('image')) {
            if ($product->images) {
                File::delete(public_path('images/'.$product->images->path));
                $product->images->delete();
            }
            $img_name=rand(1000,9999).time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$img_name);

            $product->images()->create([
                'path' => $img_name,
                // 'type' => 'main',
            ]);
        }
        if ($request->has('gallery')) {
            foreach ($request->gallery as $img) {
                $img_name=rand(1000,9999).time().'.'.$img->extension();
                $img->move(public_path('images'),$img_name);

                $product->images()->create([
                    'path' => $img_name,
                    'type' => 'gallery',
                ]);
            }
        }
        return redirect()
        ->route('admin.products.index')
        ->with('msg', 'Product updated successfully.')
        ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //

    //     $product = Products::findOrFail($id);
    //     $product->delete();
    //     return redirect()
    //     ->route('admin.products.index')
    //     ->with('msg', 'Product deleted successfully.')
    //     ->with('type', 'success');
    // }

    // public function destroy(Products $product)
    // {
    //     // Delete the product
    //    File::delete(public_path('images/'.$product->image->path));
    //    foreach ($product->gallery as $image) {
    //         File::delete(public_path('images/'.$image->path));
    //     }

    //     // $product->images()->delete();
    //     $product->delete();

    //     // Redirect back with a success message
    //     return redirect()
    //         ->route('admin.products.index')
    //         ->with('msg', 'Product deleted successfully.')
    //         ->with('type', 'success');
    // }




public function destroy(Products $product)
{
    // حذف الصورة الرئيسية إذا موجودة
    if ($product->images && File::exists(public_path('images/' . $product->images->path))) {
        File::delete(public_path('images/' . $product->images->path));
    }

    // حذف صور المعرض (gallery)
    foreach ($product->gallery as $image) {
        if (File::exists(public_path('images/' . $image->path))) {
            File::delete(public_path('images/' . $image->path));
        }
    }

    // حذف المنتج من قاعدة البيانات
    $product->delete();

    return redirect()->route('admin.products.index')
        ->with('msg', 'Product deleted successfully.')
        ->with('type', 'danger');
}

}
