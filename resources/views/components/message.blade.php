@props(['message' => $message, 'user'=> $user])
<li wire:key="{{ $message['id']}}"  class="w-full flex {{$message['user_id'] === $user->id ? 'justify-end':''}}">
    <div class="{{$message['user_id'] === $user->id ? 'group flex-row-reverse min-w-[20%]': 'min-w-[60%] lg:min-w-[40%]'}} flex p-1  max-w-[90%] lg:max-w-[70%]">
        @if($message['user_id'] !== $user->id)
            <img class="object-fit ml-1 rounded-lg w-10 h-10 shadow-md border-[4px] border-pink-500 drop-shadow-lg text-black text-[12px]" src="{{asset('storage/images/'. $message['user']['avatar'])}}" alt="">
        @endif
        <div class="{{$message['type'] === 'system' ? 'bg-primary-800' : 'bg-white'}} {{$message['user_id'] !== $user->id?'ml-2':''}} rounded-b-lg rounded-tr-lg drop-shadow-lg w-full">
            @if($message['user_id'] !== $user->id)
                <div class="pt-1 flex justify-between {{$message['type'] === 'system' ? 'pt-2' : 'text-primary pt-1'}} ">
                    <div class="flex items-center mx-2 min-w-[3 0%]">
                        <img class="w-4 h-4 " src="{{asset('storage/assets/img/diamonds.png')}}" alt="">
                        <p class="ml-1 text-[12px] font-bold {{$message['type'] === 'system' ? 'text-white' : 'text-primary'}}">
                            {{$message['user']['name']}}
                        </p>
                    </div>
                    <div class="flex items-center gap-2 mr-2">
                        @if($message['type'] != 'system')
                            <button wire:click.prevent="reportMessage({{$message['id']}})">
                                <svg class="h-[8px] w-[8px] text-gray-400" aria-hidden="true" focusable="false" data-prefix="far" data-icon="flag" class="svg-inline--fa fa-flag fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M336.174 80c-49.132 0-93.305-32-161.913-32-31.301 0-58.303 6.482-80.721 15.168a48.04 48.04 0 0 0 2.142-20.727C93.067 19.575 74.167 1.594 51.201.104 23.242-1.71 0 20.431 0 48c0 17.764 9.657 33.262 24 41.562V496c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-83.443C109.869 395.28 143.259 384 199.826 384c49.132 0 93.305 32 161.913 32 58.479 0 101.972-22.617 128.548-39.981C503.846 367.161 512 352.051 512 335.855V95.937c0-34.459-35.264-57.768-66.904-44.117C409.193 67.309 371.641 80 336.174 80zM464 336c-21.783 15.412-60.824 32-102.261 32-59.945 0-102.002-32-161.913-32-43.361 0-96.379 9.403-127.826 24V128c21.784-15.412 60.824-32 102.261-32 59.945 0 102.002 32 161.913 32 43.271 0 96.32-17.366 127.826-32v240z"></path>
                                </svg>
                            </button>
                        @endif
                        <button wire:click.prevent="deleteMessage({{$message['id']}})">
                            <svg class="h-3 w-3 {{$message['type'] === 'system' ? 'text-white' : 'text-gray-400'}}" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                                <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            <div class=" {{$message['user_id'] === $user->id ? 'px-1 pt-1': 'pr-2 pt-1 pl-6'}}  {{$message['type'] === 'system' ? 'text-white mb-1 pl-2' : 'text-black'}}">
                @isset($message['image'])
                    <img class="object-fill max-w-full h-24 lg:h-32 mb-1 rounded-md" src="{{asset('storage/main/images/'.$message['image'])}}" alt="">
                @endisset
                @isset($message['audio'])
                    <audio id="audio_{{$message['id']}}" class="hidden " preload="auto">
                        <source src="{{asset('storage/main/audios/'.$message['audio'])}}">
                    </audio>
                    <div class="text-[12px] audio-player w-[280px] bg-primary-800 text-white m-1 flex flex-col rounded-md">
                        <div class="flex items-center w-full p-1">
                            <button @click.prevent="playAudio({{$message['id']}})" class="ml-1 play_{{$message['id']}}">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <button @click.prevent="pauseAudio({{$message['id']}})" class="ml-1 hidden pause_{{$message['id']}}">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                            <div class="relative timeline_{{$message['id']}} bg-primary-200 cursor-pointer h-2 rounded-md flex-grow mx-1">
                                <div class="rounded-md absolute progress_{{$message['id']}} bg-white h-full "></div>
                            </div>
                        </div>
                        <p class="bg-primary-900 px-1 pl-2 rounded-b-md">Voice Upload</p>
                    </div>
                @endisset
                <p class="text-[12px]">
                    {!! $message['message'] !!}
                </p>
            </div>
            @if($message['type'] != 'system')
                <p class="{{$message['user_id'] === $user->id ? 'w-full px-2 mt-1' :'mr-2 ml-4 '}}  text-[10px] italic font-light text-gray-400 text-right">
                    {{$message['created_at']}}
                </p>
            @endif
        </div>
        @if($message['user_id'] === $user->id)
            <div class="h-full items-center hidden flex-col justify-center group-hover:flex mr-1">
                <button wire:click.prevent="deleteMessage({{$message['id']}})">
                    <svg class="h-3 w-3 text-gray-400" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                        <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                    </svg>
                </button>
            </div>
        @endif
    </div>
</li>
