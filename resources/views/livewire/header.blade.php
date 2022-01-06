<div x-data="{ showMenu: @entangle('showMenu') }" @click.away="showMenu= false" class="z-50 h-12 flex w-screen items-center justify-between shadow-md shadow-primary/30 ">
    <div class="flex w-full items-center flex-1 h-full">
       <div id="header-left" class="h-full hidden lg:flex w-56 lg:w-72 bg-primary-800 gap-2 px-2 items-center justify-between ">
           <div class="text-white text-[22px] px-2 tracking-wide">
               <a class="font-bold">Chat<span class="font-light">Net</span></a>
           </div>
           <p class="px-4 py-1 bg-yellow-500 rounded-lg text-white text-[14px]">{{$room->name}}</p>
       </div>
        <div class="h-full flex grow justify-between bg-primary-800 lg:bg-primary-900">
            <div class="h-full flex pl-2 gap-4 items-center">
                <button @click="toggleMenu" class="">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="flex flex-col text-white">
                    <p class="font-medium text-[12px] lg:text-[14px]">{{$room->name}}</p>
                    <p class="font-light  text-[10px] lg:text-[12px]">#{{\Illuminate\Support\Str::slug($room->name)}}</p>
                </div>
            </div>
            <div class="h-full flex lg:w-80 bg-primary-800 justify-end items-center gap-2 pr-1">
                <svg class="w-6 h-6 text-white " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                </svg>
                <svg class="w-6 h-6 text-white " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                </svg>
                <svg class="w-6 h-6 text-white " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                </svg>
                <svg class="w-6 h-6 text-white " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path>
                </svg>
                <button wire:click.prevent="showMenu">
                    <svg class="w-12 h-12 text-white " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div
        x-cloak
        x-show="showMenu"
        class="rounded-xl ease-in-out transition duration-1000 border border-gray-200 absolute top-12 right-0 flex flex-col bg-white w-52 lg:w-60 drop-shadow-lg"
    >
        <div @click="alert('menu opened')" class="border-b border-gray-200 flex gap-2 p-2 lg:hover:bg-primary-800/5 hover:rounded-t-xl">
            <svg class="w-6 h-6 text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
            </svg>
            <p class="font-normal text-[13px] lg:text-[14px] whitespace-nowrap text-primary-800">Profile</p>
        </div>
        <div class="border-b border-gray-200 flex gap-2 p-2 lg:hover:bg-primary-800/5">
            <svg class="w-6 h-6 text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
            </svg>
            <p class="font-normal text-[13px] lg:text-[14px] whitespace-nowrap text-primary-800">Lobby</p>
        </div>
        <div class="border-b border-gray-200 flex gap-2 p-2 lg:hover:bg-primary-800/5">
            <svg class="w-6 h-6 text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
            </svg>
            <p class="font-normal text-[13px] lg:text-[14px] whitespace-nowrap text-primary-800">Room Settings</p>
        </div>
        <div class="border-b border-gray-200 flex gap-2 p-2 lg:hover:bg-primary-800/5">
            <svg class="w-6 h-6 text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z" clip-rule="evenodd"></path>
            </svg>
            <p class="font-normal text-[13px] lg:text-[14px] whitespace-nowrap text-primary-800">Admin Panel</p>
        </div>
        <div class="flex gap-2 p-2 lg:hover:bg-primary-800/5 hover:rounded-b-xl">
            <svg class="w-6 h-6 text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
            </svg>
            <p class="font-normal text-[13px] lg:text-[14px] whitespace-nowrap text-primary">Logout</p>
        </div>
    </div>
</div>
