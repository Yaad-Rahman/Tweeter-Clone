<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'body' => ['required', 'max:255'],
            'pic' => ['file'=>'max:1500'],
            ]);

        if (request('pic')) {
            $attributes['pic'] = request('pic')->store('tweets');
        }

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
            'pic' => $attributes['pic']
        ]);

        return redirect()->route('home');
    }

    public function index()
    {

        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }
}
