<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        //return auth()->user()->notifications;
        return view('notifications', [
            'notifications' => auth()->user()->notifications,
        ]);
    }
}
