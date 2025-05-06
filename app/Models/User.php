<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Image;
use App\Models\Order;
use App\Models\Review;
use App\Models\Payment;
use App\Models\Testimonial;
use App\Models\Order_details;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [

        'name',
        'email',
        'password',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];

        function role()
        {
            return $this->belongsTo(Role::class)->withDefault();
        }


        function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }


// الشخص الواحد عنده كتيير اراء بيقدر يكتبها

    function reviews()
    {
        return $this->hasMany(Review::class);
    }


    function orders()
    {
        return $this->hasMany(Order::class);
    }

    function order_details()
    {
        return $this->hasMany(Order_details::class);
    }

    function payments()
    {
        return $this->hasMany(Payment::class);


    }

    function testimonial()
    {
        return $this->hasMany(Testimonial::class);


    }



}
}
