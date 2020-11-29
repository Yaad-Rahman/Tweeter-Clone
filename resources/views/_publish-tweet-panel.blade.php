<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets" enctype="multipart/form-data">
        @csrf
        <textarea name="body" class="w-full" placeholder="What's up doc?" required autofocus></textarea>
        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img src="{{ auth()->user()->avatar }}" alt="profile" class="rounded-full mr-2" width="50" height="50">
            <div class="image-upload">
                <label for="file-input">
                    <img src="/addImageIcon.png" width="60"/>
                </label>
            
                <input id="file-input" type="file" style="display: none; cursor: pointer"/>
            </div>
             
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10">Tweet-a-roo!</button>
        </footer>

        
    </form>

    @error('body')
    <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror

</div>