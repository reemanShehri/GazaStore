<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\NewNotification;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    //

    public function send(){


        // if single admin
        // $admin=User::find(1);
        // $admin->notify(new NewOrderNotification());

        // if many admins
        $admins=User::where('type','admin')->get();
        Notification::send($admins, new NewNotification('reeman','t-shirt','66'));
        // foreach($admins as $admin){
        //     $admin->notify(new NewOrderNotification());
        // }


        return 'done ::';


    }


    public function send2(){


        // if single admin
        // $admin=User::find(1);
        // $admin->notify(new NewOrderNotification());

        // if many admins
        $admins=User::where('type','admin')->get();
        Notification::send($admins, new NewNotification());
        // foreach($admins as $admin){
        //     $admin->notify(new NewOrderNotification());
        // }


        return 'done Notification::send ::';


    }
}
