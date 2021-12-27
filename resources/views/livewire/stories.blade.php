<div x-data={showStories:false}>
    <div class="p-2">
        <div
            @click="showStories=!showStories"
            class="p-1 bg-primary-800 flex justify-center items-center w-24 rounded-lg ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span class="text-center pl-1 text-white text-[12px]">Stories(10)</span>
        </div>
    </div>
    <div x-cloak x-show="showStories" class="bg-white flex flex-row pl-2 pr-16 pb-4 pt-2 gap-4 overflow-x-auto">
        @for ($i = 0; $i < 8; $i++)
            <div class="rounded-full bg-gradient-to-br from-sky-500 to-pink-500 flex flex-col justify-center">
                <div class="flex flex-col justify-center w-20 h-20 rounded-full ">
                    <div class="flex flex-col justify-center h-full w-full">
                        <img  class=" p-[6px] h-full w-full object-fill rounded-full" src="{{asset('storage/assets/img/sample.jpg')}}"  alt=""/>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
{{--<div class="border-4 border-primary rounded-full">--}}
{{--    <div class="rounded-full shadow-lg shadow-primary/70 bg-primary-800 w-24 h-24">--}}
{{--        <img class="object-fill rounded-full w-full h-full" src="{{asset('storage/assets/img/sample.jpg')}}" alt="avatar">--}}
{{--    </div>--}}
{{--</div>--}}
