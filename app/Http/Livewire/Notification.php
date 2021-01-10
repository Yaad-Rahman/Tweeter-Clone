<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $toggle;



    public function list(){
         $this->toggle = !$this->toggle;
         auth()->user()->unreadNotifications->markAsRead();
    }

    public function render()
    {   
        $notifications = auth()->check() ? auth()->user()->unreadNotifications : 0;

        $notificationsNum = auth()->check() ? $notifications->count() : 0;

        return view('livewire.notification',[
            'notifications' => $notifications,
            'notificationsNum' => $notificationsNum,
        ]);
    }
}
