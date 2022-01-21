@props(['message' => $message])
<div class="w-full flex flex-col bg-primary-200 my-1 ">
    <div class="flex p-2 w-full ">
        <img class="object-fit ml-1 rounded-lg w-10 h-10 shadow-md border-[4px] " src="{{asset('storage/assets/img/sample.jpg')}}" alt="">
        <div class="flex flex-col flex-grow px-2 py-1" >
            <div class="flex justify-between text-black">
                <p class="text-[12px] font-bold ">Topic</p>
            </div>
            <div class="text-[12px]">
                {{$message['message']}}
            </div>
        </div>
        <button class="h-3 w-3" wire:click.prevent="deleteTopic({{$message['id']}})">
            <svg class="h-full w-full" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
            </svg>
        </button>
    </div>
</div>
