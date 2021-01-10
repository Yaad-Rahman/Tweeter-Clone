<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form wire:submit.prevent="tweetPost">
        @csrf
        <textarea wire:model="tweet" class="w-full" placeholder="What's up doc?" required autofocus></textarea>
        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img src="{{ auth()->user()->avatar }}" alt="profile" class="rounded-full mr-2" width="50" height="50">
            <div class="image-upload">
                <label for="file-input">
                    <img src="/addImageIcon.png" width="40"/>
                </label>

                <input id="file-input" wire:model="tweetPic" type="file" style="display: none; cursor: pointer" onchange="loadFile(event)"/>
            </div>
            @if ($tweetPic)
            <img src="{{ $tweetPic->temporaryUrl() }}" width="100">
            @endif

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10">Tweet-a-roo!</button>
        </footer>


    </form>

    @error('body')
    <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror

    @error('pic')
    <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror

</div>



