<x-app>
    <div>
        @foreach ($users as $user)
        <a href="{{$user->path()}}" class="flex items-center mb-6">
            <img class="mr-4 rounded" src="{{ $user->avatar}}" alt="{{ $user->name}}" width="60">
            <div>
                <h4 class="font-bold">{{ '@' .$user->name}}</h4>
            </div>
        </a>
        @endforeach
    </div>
</x-app>