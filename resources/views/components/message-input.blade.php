<div class="z-10 h-16 w-full bg-white">
    <div class="w-full h-full bottom-0 gap-2 shadow  ">
        <div class="flex items-center h-full px-2 w-full">
            <button wire:click.prevent="onChangeRoom(2)" class="flex-none">
                <svg class="w-6 h-6 text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <button wire:click.prevent="onChangeRoom(1)" class="flex-none">
                <svg class="w-6 h-6 text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <button @click.prevent="$dispatch('record')" class="ml-1 flex-none">
                <svg class="w-6 h-6 text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div  class="flex items-center grow h-full w-full">
                <label class="w-full h-12">
                    <input
                        wire:keydown.enter.prevent="sendMessage"
                        wire:model.defer="input"
                        x-ref="input"
                        autofocus
                        class="grow ml-1 bg-primary-800/10 rounded-full h-full w-full px-2 md:px-3 outline-none text-sm"
                        type="text"
                        spellcheck="false"
                        placeholder="Write something here..."
                        autocomplete="off"
                    >
                </label>
            </div>
            <div class="ml-2 relative grow-0 flex-none h-6 w-6 ">
                <input wire:model="image" class="absolute top-0 left-0 opacity-0 w-full h-full" type="file">
                <svg wire:loading wire:target="image" class="bg-white animate-spin absolute w-full h-full text-primary-800" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                       fill="currentColor" stroke="none">
                        <path d="M2380 5114 c-19 -2 -78 -9 -130 -14 -330 -36 -695 -160 -990 -336 -375 -224 -680 -529 -904 -904 -175 -292 -291 -632 -338 -990 -16 -123 -16 -497 0 -620 82 -623 356 -1150 820 -1581 256 -239 575 -425 922 -539 274 -91 491 -124 800 -124 228 0 329 9 530 50 689 141 1304 583 1674 1204 175 292 291 632 338 990 16 123 16 497 0 620 -47 357 -164 698 -337 988 -226 378 -529 682 -905 906 -289 173 -634 291 -980 336 -88 12 -438 21 -500 14z m350 -234 c320 -25 591 -100 875 -243 654 -328 1117 -948 1245 -1667 17 -98 39 -310 40 -387 l0 -23 -264 0 -264 0 -7 98 c-22 321 -114 608 -272 855 -258 403 -639 679 -1091 791 -155 38 -256 50 -434 51 l-168 0 0 262 0 262 58 4 c114 7 159 6 282 -3z m55 -771 c337 -50 639 -202 880 -444 299 -298 458 -681 458 -1105 0 -424 -159 -807 -458 -1105 -299 -299 -681 -458 -1105 -458 -424 0 -806 159 -1105 458 -299 299 -458 681 -458 1105 0 196 27 353 93 537 150 421 512 783 933 933 250 89 510 116 762 79z"/>
                    </g>
                </svg>
                <svg class="w-full h-full text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <button wire:click.prevent="sendMessage" @click="$refs.input.focus()" class="ml-2 h-8 w-8text-[14px] text-white rounded-lg flex-none bg-primary-800">
                <svg class="w-full h-full text-white p-[6px] " fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 512.662 512.662" xml:space="preserve">
                    <path d="M505.021,5.868c-0.064-0.043-0.085-0.107-0.128-0.149c-0.128-0.107-0.256-0.128-0.384-0.235 c-1.131-0.981-2.475-1.621-3.797-2.325c-0.427-0.213-0.747-0.576-1.195-0.768c-0.064-0.021-0.107-0.021-0.149-0.043 c-0.469-0.192-0.853-0.533-1.323-0.704c-1.771-0.661-3.648-0.875-5.547-1.045c-0.576-0.043-1.131-0.299-1.707-0.299
                        c-2.475-0.021-4.971,0.384-7.403,1.259L14.055,172.225c-7.445,2.709-12.779,9.323-13.867,17.173
                        c-1.045,7.851,2.304,15.637,8.768,20.245l141.888,101.355l20.032,140.309c1.237,8.533,7.488,15.488,15.851,17.643
                        c1.749,0.448,3.541,0.661,5.291,0.661c6.592,0,12.971-3.072,17.045-8.533l50.347-67.093l132.032,113.237
                        c3.947,3.371,8.875,5.141,13.909,5.141c2.389,0,4.779-0.405,7.125-1.216c7.168-2.56,12.48-8.768,13.845-16.277l85.995-468.928
                        C513.725,18.262,510.738,10.71,505.021,5.868z M240.125,348.396l-1.536,2.219l-32.747,43.669l-12.395-86.827l185.109-160.448
                        L240.125,348.396z">
                    </path>
                </svg>
            </button>
        </div>
    </div>
</div>
