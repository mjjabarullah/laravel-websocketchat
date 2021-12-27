<div id="chat-messages" class=" absolute bottom-0 flex flex-col-reverse overflow-y-auto h-full w-full pt-8 ">
    @foreach ($messages as $message)
        @if($loop->index %5 !=0)
            <div class="w-full flex">
                <div id="{{$message->id}}" class="flex p-1 min-w-[60%] lg:min-w-[40%] max-w-[90%] lg:max-w-[70%]">
                    <img class="ml-1 rounded-lg w-10 h-10 shadow-md border-[4px] border-pink-500 drop-shadow-lg" src="{{asset('storage/assets/img/sample.jpg')}}" alt="avatar">
                    <div class="log-message ml-2 bg-white rounded-b-lg rounded-tr-lg drop-shadow-lg w-full border border-gray-100 ">
                        <div class="mt-2 flex justify-between">
                            <div class="flex items-center mx-2 min-w-[3 0%]">
                                <img class=" w-3 h-3 " src="https://mytamilchat.com/chat/default_images/roommod.svg" alt="">
                                <p class="ml-1 text-[12px] text-primary font-bold">
                                    Name-{{$message->id}}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <button wire:click.prevent="reportMessage({{$message->id}})" class="mr-1">
                                    <svg class="h-3 w-3 text-gray-400" aria-hidden="true" focusable="false" data-prefix="far" data-icon="flag" class="svg-inline--fa fa-flag fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M336.174 80c-49.132 0-93.305-32-161.913-32-31.301 0-58.303 6.482-80.721 15.168a48.04 48.04 0 0 0 2.142-20.727C93.067 19.575 74.167 1.594 51.201.104 23.242-1.71 0 20.431 0 48c0 17.764 9.657 33.262 24 41.562V496c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-83.443C109.869 395.28 143.259 384 199.826 384c49.132 0 93.305 32 161.913 32 58.479 0 101.972-22.617 128.548-39.981C503.846 367.161 512 352.051 512 335.855V95.937c0-34.459-35.264-57.768-66.904-44.117C409.193 67.309 371.641 80 336.174 80zM464 336c-21.783 15.412-60.824 32-102.261 32-59.945 0-102.002-32-161.913-32-43.361 0-96.379 9.403-127.826 24V128c21.784-15.412 60.824-32 102.261-32 59.945 0 102.002 32 161.913 32 43.271 0 96.32-17.366 127.826-32v240z"></path>
                                    </svg>
                                </button>
                                <button wire:click.prevent="deleteMessage({{$message->id}})" class="mr-2">
                                    <svg class="h-3 w-3 text-gray-400" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                                        <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="text-justify pl-6 pr-4 pt-1">
                            <p class="text-black text-[12px]">
                                {{$message['message']}}
                            </p>
                        </div>
                        <p class="mx-4 mb-1 text-right text-[10px] text-gray-400 italic font-light">
                            16/12 10:{{$message->id}}PM
                        </p>
                    </div>
                </div>
            </div>
        @else
            <div class="w-full flex justify-end">
                <div id="{{$message->id}}" class="flex p-1 flex-row-reverse max-w-[90%] lg:max-w-[70%]">
                    <img class="ml-1 rounded-lg w-10 h-10 shadow-md border-[4px] border-pink-500 drop-shadow-lg" src="{{asset('storage/assets/img/sample.jpg')}}" alt="avatar">
                    <div class="ml-2 bg-white rounded-b-lg rounded-tl-lg drop-shadow-lg w-full border border-gray-100 ">
                        <div class="text-justify px-4 pt-2">
                            <p class="text-black text-[12px]">
                                {{$message['message']}}
                            </p>
                        </div>
                        <div class="flex justify-between ml-2 mr-4 mb-1 mt-1">
                            <button wire:click.prevent="deleteMessage({{$message->id}})" class="mr-2">
                                <svg class="h-3 w-3 text-gray-400" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                                    <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                                </svg>
                            </button>
                            <p class="text-right text-[10px] text-gray-400 italic font-light">
                                16/12 10:{{$message->id}} PM</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>

