<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;

class NotificationController extends Controller
{
    //
    public function index()
    {
        $notifications_blade = Notification::where('to_user_id', auth()->user()->id)->paginate(20);

        return view('dashboard.notifications.index')
                ->with('notifications_blade', $notifications_blade);
    }

    public function update() {
        $notification = Notification::where('to_user_id', auth()->user()->id)->update(['status' => 0]);
        echo 'updated';
    }
}
