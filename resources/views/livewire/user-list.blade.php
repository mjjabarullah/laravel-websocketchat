<div class="flex flex-col w-full ">
    <div class="p-2 border-t border-gray-200">
        <div
            @click="showStories=!showStories"
            class="p-1 bg-primary-800 flex justify-center items-center w-24 rounded-lg ">
            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.05 3.636a1 1 0 010 1.414 7 7 0 000 9.9 1 1 0 11-1.414 1.414 9 9 0 010-12.728 1 1 0 011.414 0zm9.9 0a1 1 0 011.414 0 9 9 0 010 12.728 1 1 0 11-1.414-1.414 7 7 0 000-9.9 1 1 0 010-1.414zM7.879 6.464a1 1 0 010 1.414 3 3 0 000 4.243 1 1 0 11-1.415 1.414 5 5 0 010-7.07 1 1 0 011.415 0zm4.242 0a1 1 0 011.415 0 5 5 0 010 7.072 1 1 0 01-1.415-1.415 3 3 0 000-4.242 1 1 0 010-1.415zM10 9a1 1 0 011 1v.01a1 1 0 11-2 0V10a1 1 0 011-1z" clip-rule="evenodd"></path>
            </svg>
            <span class="text-center pl-1 text-white text-[12px]">Online(20)</span>
        </div>
    </div>
    @for ($i = 0; $i < 10; $i++)
        <div class="w-full bg-white border-t border-gray-200 p-2 lg:hover:bg-primary-800/5">
            <div class="w-full h-12 gap-2 ">
                <div class="flex h-full w-full">
                    <div class="flex items-center">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <img class="ml-1 rounded-lg w-10 h-10 shadow-md border-2 border-pink-500 flex-none" src="{{asset('storage/assets/img/sample.jpg')}}" alt="avatar">
                    </div>
                    <div class="flex flex-grow h-full relative">
                        <div class="flex flex-col justify-center h-full w-full px-1 absolute ">
                            <p class=" text-[14px] text-primary-900 font-semibold whitespace-nowrap overflow-hidden text-ellipsis">
                                User-{{$i}}
                            </p>
                            <p class="text-[11px] text-primary-900 whitespace-nowrap  overflow-hidden text-ellipsis">
                                User status messageUserUser status messageUserUser status messageUse
                            </p>
                        </div>
                    </div>
                    <div class="h-full flex flex-col items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span class="text-[10px] text-green-900">Lv.{{$i}}</span>
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>
{{--
<div class=" bg-white relative flex items-center py-2 pl-2 border-b border-gray-200 w-full">
    <div class="w-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
        </svg>
    </div>
    <img class="ml-1 rounded-lg w-10 h-10 shadow-md border-2 border-pink-500" src="{{asset('storage/assets/img/sample.jpg')}}" alt="avatar">
    <div class="w-4/6 flex flex-col h-full ">
        <p class="ml-1 text-[14px] text-green-900 font-bold">User-{{$i}}</p>
        <p class="ml-1 text-[12px] text-green-900 whitespace-nowrap overflow-hidden">
            User status
            messageUserjahfhajfhajhfjafkhafghhgfagfagfhaghagfagfagfafafaaaaaaaaaaaaaaaaaakajfgajggggggggbf-{{$i}}</p>
    </div>
    <div class="bg-white w-1/6 flex flex-col items-center px-2  ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
        </svg>
        <span class="text-[10px] text-green-900">Lv.{{$i}}</span>
    </div>
</div>
--}}
