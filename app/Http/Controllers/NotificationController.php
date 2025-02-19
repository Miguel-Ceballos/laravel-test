<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $notifications = auth()->user()->unreadNotifications;
        // Mark all notifications as read when the user visits the notifications page.
//        auth()->user()->unreadNotifications->markAsRead();
        return view('notifications.index', [
            'notifications' => $notifications,
        ]);
    }
}
