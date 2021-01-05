<x-app>
    <div>
       
       
        <ul>
            @foreach ($notifications as $notification)
               <li><a href="{{$notification->data['action']}}">{{$notification->data['message']}} {{$notification->data['followingUser']}}</a></li>
              
            @endforeach
        </ul>
           
       
    </div>
               
                            
    
</x-app>