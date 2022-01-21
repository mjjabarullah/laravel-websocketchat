<div id="left-menu" class="hidden z-[60] lg:z-0 bg-white lg:block bg-white h-screen absolute top-0 inset-y-0 lg:relative w-56 lg:w-80 lg:h-full rounded-tr-xl rounded-br-xl lg:rounded-none drop-shadow-lg lg:drop-shadow-none">
    <div class="h-full w-full flex flex-col rounded-tr-xl lg:rounded-none absolute">
        <div class="w-full flex-none top-0 z-10 h-12 lg:h-14 flex justify-between items-center bg-primary-900 lg:bg-primary-800 flex-none w-full rounded-tr-xl lg:rounded-none">
            <div class=" text-white text-[22px] px-2 tracking-wide">
                <a class="font-bold">Chat<span class="font-light">Net</span></a>
            </div>
            <div class="h-full flex items-center justify-end p-2 w-full">
                    <p class="hidden lg:flex px-4 py-1 bg-yellow-500 rounded-lg text-white text-[14px]">{{$room->name}}</p>
                <button class="lg:hidden mr-1 rounded-full" @click="toggleMenu">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="left top-0 flex flex-col overflow-y-auto overflow-x-hidden h-full w-full">
            <div class="flex-none w-full items-center justify-center h-56 flex flex-col text-white bg-[url('/storage/assets/img/bg-user-greetings.jpg')]">
                <img class="rounded-full w-20 h-20 shadow-md border-[3px] border-white" src="{{asset("storage/images/$user->avatar")}}"  alt="">
                <span class="pt-1 text-[13px] font-light">Good Afternooon,</span>
                <div class="text-[18px]">{{$user->name}}</div>
            </div>
            {{--                        menulist--}}
            <div class="flex flex-col w-full ">
                <div class="flex items-center p-2 border-b border-gray-200 lg:hover:bg-primary-800/5">
                    <svg class="w-6 h-6 text-primary-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span class="pl-2 text-sm text-primary-800 font-medium">Friends Wall</span>
                </div>
                <div class="flex items-center p-2  border-b border-gray-200 lg:hover:bg-primary-800/5">
                    <svg class="w-6 h-6 text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
                        <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                    </svg>
                    <span class="pl-2 text-sm text-primary-800 font-medium">News</span>
                </div>
                <div class="flex items-center p-2  border-b border-gray-200 lg:hover:bg-primary-800/5">
                    <svg class="w-6 h-6 text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                    </svg>
                    <span class="pl-2 text-sm text-primary-800 font-medium">User Rank</span>
                </div>
                <div class="flex items-center p-2  border-b border-gray-200 lg:hover:bg-primary-800/5">
                    <svg class="w-6 h-6 text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                    </svg>
                    <span class="pl-2 text-sm text-primary-800 font-medium">Contact Us</span>
                </div>
            </div>
        </div>
    </div>
</div>
