<x-app>
    <div>
       
       
        <ul>
            @foreach ($notifications as $notification)
            <li><p>{{$notification->data}}</p></li>
            @endforeach
        </ul>
           
       
    </div>
               
                            
    
</x-app>