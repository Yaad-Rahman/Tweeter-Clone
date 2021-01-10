<div class="flex  p-4 {{$loop->last ? '' : 'border-b border-b-gray-400'}}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{route('profile', $tweet->user)}}">
            <img src="{{ $tweet->user->avatar }}" alt="profile" class="rounded-full mr-2"
            width="50" height="50">
        </a>
        
    </div>
    <div>
        <a href="{{route('profile', $tweet->user)}}">
            <h5 class="font-bold mb-4">{{ $tweet->user->name}}</h5>
        </a>

        <p class="text-sm mb-3">
            {{$tweet->body}}
        </p>
        @if($tweet->pic)
        <img src="{{$tweet->pic}}" width="500"  />
        @endif

        <x-like-buttons :tweet="$tweet" />


    </div>
    <div>
            <button wire:click="deleteTweet({{$tweet->id}}, '{{$tweet->pic}}')" class="font-bold">X</button>
    </div>
</div>
