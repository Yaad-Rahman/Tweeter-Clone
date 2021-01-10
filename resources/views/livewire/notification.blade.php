<div>
    @if(auth()->check())
    <i wire:click="list" style="font-size: 25px" class="fa fa-bell text-yellow-400" aria-hidden="true">
    <span style="font-size: 15px; left: -14px; top: -12px" class="text-white bg-red-500 px-1 rounded-full relative">{{$notificationsNum}}</span>
    </i>

    @if($toggle)
        <div class="bg-gray-200 absolute border-2 shadow-2xl float-right right-1/12 w-1/5 z-10">
            <ul>
                @forelse ($notifications as $notification)
                <li class="{{$loop->last ? '' : 'border-b-2'}}"><a  href="{{$notification->data['action']}}">{{$notification->data['message']}} {{$notification->data['followingUser']}}</a></li>
                @empty 
                <li><p>No Unseen notifications</p></li>
                @endforelse
            </ul>
        </div>
    @endif
    @endif
</div>

