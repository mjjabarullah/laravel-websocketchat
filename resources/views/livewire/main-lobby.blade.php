<div x-data="{ showLoader: @entangle('showLoader') }" class="relative flex justify-end flex-grow flex-col bg-primary/5 h-full rounded-xl lg:rounded-none bg-[url('/storage/assets/img/bg-main-lobby.png')] bg-repeat">
    <div class="z-10 absolute inset-0 w-full h-full rounded-xl lg:rounded-none bg-white invisible">
        <img class="w-full h-full object-fill opacity-20" src="{{asset('storage/assets/img/bg-main-greetings.png')}}" alt="">
    </div>
    {{-- header --}}
    <livewire:header :user="$user" :room="$room"/>

    <div class="flex flex-col h-full justify-end w-full">
        <div class="h-full w-full">
            <div class="z-10 relative h-full">
                <div id="error-target" class="!absolute w-full h-[100px] flex justify-center items-center"></div>
                <div x-cloak x-show="showLoader" id="loader" class="z-50 absolute top-0 left-0 h-full w-full flex items-center justify-center">
                    <div class="shadow-primary/30 shadow-md lg:h-14 lg:w-14 h-12 w-12 rounded-md bg-white">
                        <svg class="text-primary-800 h-full w-full  p-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                            <path fill="currentColor" d="M31.6,3.5C5.9,13.6-6.6,42.7,3.5,68.4c10.1,25.7,39.2,38.3,64.9,28.1l-3.1-7.9c-21.3,8.4-45.4-2-53.8-23.3 c-8.4-21.3,2-45.4,23.3-53.8L31.6,3.5z">
                                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="2s" from="0 50 50" to="360 50 50" repeatCount="indefinite"/>
                            </path>
                            <path fill="currentColor" d="M42.3,39.6c5.7-4.3,13.9-3.1,18.1,2.7c4.3,5.7,3.1,13.9-2.7,18.1l4.1,5.5c8.8-6.5,10.6-19,4.1-27.7 c-6.5-8.8-19-10.6-27.7-4.1L42.3,39.6z">
                                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="-360 50 50" repeatCount="indefinite"/>
                            </path>
                            <path fill="currentColor" d="M82,35.7C74.1,18,53.4,10.1,35.7,18S10.1,46.6,18,64.3l7.6-3.4c-6-13.5,0-29.3,13.5-35.3s29.3,0,35.3,13.5 L82,35.7z">
                                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="2s" from="0 50 50" to="360 50 50" repeatCount="indefinite"/>
                            </path>
                        </svg>
                    </div>
                </div>
                {{--messages--}}
                <ul x-cloak x-show="!showLoader" id="chat-messages" class="absolute bottom-0 flex flex-col-reverse overflow-y-auto overflow-x-hidden h-full w-full pt-8 ">
                    @foreach ($chatMessages as $message)
                        @if($message['type'] == 'topic')
                            <x-topic :message="$message"></x-topic>
                        @else
                            <x-message :message="$message" :user="$user"></x-message>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        {{--                        input panel--}}
        <x-message-input></x-message-input>
    </div>
</div>
