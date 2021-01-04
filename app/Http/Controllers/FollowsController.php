<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\followed;
use App\Notifications\Unfollow;
use Illuminate\Notifications\Notifiable;


class FollowsController extends Controller
{

    use Notifiable;
    public function store(User $user)
    {
        if(auth()->user()->following($user))
        {
            auth()->user()->unfollow($user);
            current_user()->notify(new Unfollow($user->name));
            
        }
        else {
            auth()->user()->follow($user);
            current_user()->notify(new followed($user->name));
            
        }
        
        return back();
    }
}
