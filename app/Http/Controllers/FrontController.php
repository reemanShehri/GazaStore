<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;




class FrontController extends Controller
{
    //
    public function index()
    {

        $categories = Category::with('images')->get(); // جلب جميع الفئات مع صورها
        $products = Products::with(['images'])->latest('id')->paginate(9); // جلب المنتجات مع صورها
        return view('frontt.index', compact('categories', 'products'));
    }

    public function about()
    {

        // $team=Team::all();
        return view('frontt.about');
    }

    public function contact()
    {
        return view('frontt.contact');
    }

    public function category($id)
    {

        $category = Category::with('images')->findOrFail($id);
        $products = $category->products()->with('images')->latest('id')->paginate(9);
        return view('frontt.category', compact('category', 'products'));

    }

    public function products()
    {

        $products = Products::all();
        return view('frontt.products',compact('products'));

    }

    public function single_product($id)
    {
        $product = Products::with('images')->findOrFail($id);
        $productImages = $product->images;

       

        return view('frontt.single-product', compact('product', 'productImages'));
    }


    public function r(){
        return view('frontt.single-product');
    }

    public function submitContact(){

        // dd(request()->all());
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
          
            'message' => 'required|string|max:1000',
        ]);

        // هنا بدي احفظها بجدول ال contact
        //  Contact::create($data);

        Mail::to('admin@example.com')->send(new ContactMail($data));
        return redirect()
            ->route('front.contact')
            ->with('msg', 'Message sent successfully.')
            ->with('type', 'success');

    }





// public function submitContact()
// {
//     $data = request()->validate([
//         'name' => 'required',
//         'email' => 'required|email',
  
//         'message' => 'required'
//     ]);

//     try {
//         Mail::to('admin@example.com')->send(new ContactMail($data));
        
//         return back()->with([
//             'msg' => 'تم الإرسال بنجاح',
//             'type' => 'success'
//         ]);
        
//     } catch (\Exception $e) {
//         return back()->with([
//             'msg' => 'حدث خطأ: ' . $e->getMessage(),
//             'type' => 'danger'
//         ]);
//     }
// }

  
    // public function submitContact(Request $request)
    // {
    //     // التحقق من صحة البيانات
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'subject' => 'required|string|max:255',
    //         'message' => 'required|string',
    //     ]);
    
    //     // حفظ البيانات في قاعدة البيانات
    //     $contact = Contact::create($validatedData);
    
    //     // إرسال البريد الإلكتروني
    //     Mail::to('admin@example.com')->send(new ContactMail($validatedData));
    
    //     return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح!');
    // }
}

