<?php

namespace App\Http\Livewire;

use App\Models\Tweet;

use Livewire\Component;

class Timeline extends Component
{
   
    protected $listeners = [
        'tweet-created' => 'render',
    ];

    public function render()
    {
        return view('livewire.timeline',[
            'tweets' => auth()->user()->timeline(),
        ]);
    }

    public function deleteTweet($id, $image)
    {
        $imagePath = ltrim($image, "http://127.0.0.1:8000");
        if(file_exists($imagePath)){
            unlink(public_path() .'/' .$imagePath);
        }
        Tweet::destroy($id);
        
        
    }
}
