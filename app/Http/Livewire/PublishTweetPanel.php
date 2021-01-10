<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Tweet;

class PublishTweetPanel extends Component
{
    use WithFileUploads;
    public $tweet;
    public $tweetPic;

    protected $rules = [
        'tweet' => 'required|max:255',
        'tweetPic' => 'image',
    ];

    public function tweetPost()
    {
        $data = $this->validate();
        if($data['tweetPic'])
            $data['tweetPic'] = $data['tweetPic']-> store('tweets');
        

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $data['tweet'],
            'pic' => $data['tweetPic']
        ]);

        $this->emit('tweet-created');
        session()->flash('message', "Your tweet created successfully!");
        $this->resetFields;

    }

    public function render()
    {
        return view('livewire.publish-tweet-panel');
    }

    public function resetFields()
    {
        $this->tweet = '';
        $this->tweetPic = '';
    }
}
