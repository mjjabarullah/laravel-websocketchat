<div class="relative flex justify-end flex-grow flex-col bg-primary/5 h-full rounded-xl lg:rounded-none bg-[url('/storage/assets/img/bg-main-lobby.png')] bg-repeat">
    <div class="absolute inset-0 w-full h-full rounded-xl lg:rounded-none ">
        <img class="w-full h-full object-fill opacity-20" src="{{asset('storage/assets/img/bg-main-lobby.png')}}" alt="">
    </div>
    <div class="flex flex-col h-full justify-end w-full">
        <div class="h-full w-full">
            <div class="z-10 relative h-full">
                <div id="error-target" class=" hidden !absolute w-full h-[100px] flex justify-center items-center"></div>
                <div id="loader" class="hidden z-50 absolute top-0 left-0 h-full w-full flex items-center justify-center">
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
                <livewire:messages :messages="$messages"/>
            </div>
        </div>
        {{--                        input panel--}}
        <div class="z-10 h-16 w-full bg-white">
            <div class="w-full h-full bottom-0 gap-2 shadow  ">
                <div class="flex items-center h-full px-2 w-full">
                    <button class="flex-none">
                        <svg class="w-6 h-6 text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <button wire:click.prevent="uploadImage" class="ml-1 flex-none">
                        <svg class="w-6 h-6 text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div class="flex items-center grow h-full w-full">
                        <label class="w-full h-12">
                            <input
                                wire:keydown.enter.prevent="sendMessage"
                                wire:model.defer="input"
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
                        <svg class=" w-full h-full text-primary-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <button wire:click.prevent="sendMessage" class="ml-2 h-8 w-8text-[14px] text-white rounded-lg flex-none bg-primary-800">
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
    </div>
</div>
