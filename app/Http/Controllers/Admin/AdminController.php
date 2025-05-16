<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function profile(){

    $admin=Auth::user();


    return view('admin.profile', compact('admin'));
    }

    // function profile_data(Request $request){


    //     $request->validate([
    //         'name' => 'required',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     //@var User $admin
    //     $admin = Auth::user();

    //    $admin->update([
    //         'name' => $request->name,

    //     ]);


    //     if ($request->hasFile('image')) {
    //         if ($admin->image) {
    //             File::delete(public_path($admin->image->path));
    //             $admin->image->delete();
    //         }



    //         $img_name = time() . '.' . $request->image->extension();
    //         $request->file('image')->move(public_path('images'), $img_name);

    //         $admin->image()->create([
    //             'path' => 'images/' . $img_name,
    //             'image' => $img_name,
    //         ]);
    //     }


    //     $admin->save();




    //     return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    // }


function profile_data(Request $request)
{
    $request->validate([
        'name' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    /** @var \App\Models\User $admin */
    $admin = Auth::user();

    // بداية transaction للتأكد من سلامة البيانات
    DB::beginTransaction();

    try {
        // تحديث البيانات الأساسية
        $admin->update([
            'name' => $request->name,
        ]);

        // التعامل مع الصورة إذا تم رفعها
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($admin->image) {
                // حذف الملف الفعلي من التخزين
                if (File::exists(public_path($admin->image->path))) {
                    File::delete(public_path($admin->image->path));
                }
                // حذف السجل من قاعدة البيانات
                $admin->image()->delete();
            }

            // حفظ الصورة الجديدة
            $img_name = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->file('image')->move(public_path('images'), $img_name);

            // إنشاء سجل الصورة الجديد
            $admin->image()->create([
                'path' => 'images/' . $img_name,
                'imageable_id' => $admin->id,
                'imageable_type' => get_class($admin),
            ]);
        }

        DB::commit();

        return redirect()->route('admin.profile')->with('success', 'تم تحديث الملف الشخصي بنجاح');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'حدث خطأ أثناء تحديث الملف الشخصي: ' . $e->getMessage());
    }
}



function orders(){
    return 'Order page';
}

function notification2(){
    Auth::user()->notifications->markAsRead();
    // $notifications = Auth::user()->notifications()->paginate(10);
    return view('admin.notification');

}


public function notification()
{
    $notifications = auth()->user()->unreadNotifications;
    return view('dashboard', compact('notifications'));
}


// في Controller
public function markAsRead($id)
{
    auth()->user()->notifications->where('id', $id)->markAsRead();
    return back();
}

}

