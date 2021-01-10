<x-app>
    <div>
        @livewire('publish-tweet-panel')
        @livewire('timeline')

        @if (session('message'))
        <div id="message" class="bg-blue-100 text-blue-600 p-5 border-2 border-blue-400 absolute bottom-5 left-5">
            {{session()->get('message')}}
        </div>
            
        @endif

    </div>
    <script>
        function messageDisplay(){
 
        document.getElementById('message').style.display = "none";
        }
        setTimeout(messageDisplay, 2000);
    </script>
               
                            
    
</x-app>
