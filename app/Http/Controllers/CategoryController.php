<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::latest('id')->paginate(10);
        return view('admin.categories.index', compact('categories'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $categories = Category::latest('id')->paginate(10);
        $category = new Category();
        return view('admin.categories.create', compact('category'));
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

// dd($request->all());

        $data = $request->except('_token','image');
        $category =Category::create($data);


        // add image
      $img_name=rand(1000,9999).time().'.'.$request->image->extension();
      $request->image->move(public_path('images'),$img_name);

        $category->images()->create([
            'path' => $img_name,
            // 'type' => 'main',
        ]);
        return redirect()
        ->route('admin.categories.index')
        ->with('msg', 'Category created successfully.')
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
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }





public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $category->update([
        'name' => $validated['name'],
        'description' => $validated['description']
    ]);

    if ($request->hasFile('image')) {
        // حذف الصورة القديمة إذا كانت موجودة
        if ($category->image) {
            Storage::delete('public/'.$category->image->path);
            $category->image()->delete();
        }

        // حفظ الصورة الجديدة
        $path = $request->file('image')->store('categories', 'public');

        $category->image()->create([
            'path' => $path,
            'imageable_type' => Category::class
        ]);
    }

    return redirect()->route('admin.categories.index')
                   ->with('success', 'done successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }


    // advanced way

    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()
        ->route('admin.categories.index')
        ->with('msg', 'Category deleted successfully.')
        ->with('type', 'danger');
    }

}
