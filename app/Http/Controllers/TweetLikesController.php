<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Like;

use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        $tweet->like(current_user());

        return back();
    }

    public function unlike(Tweet $tweet)
    {
        $tweet->unlike(current_user());

        return back();
    }



    public function destroy(Tweet $tweet)
    {
        $tweet->dislike(current_user());

        return back();
    }
}
