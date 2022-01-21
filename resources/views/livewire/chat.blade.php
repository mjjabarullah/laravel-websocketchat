<div class="flex w-full flex-1 justify-between" >
    {{--                menus--}}
    <livewire:chat-left :user="$user" :room="$room " />

    <div class="flex flex-col h-full w-full">

        <div class="flex flex-grow">
            {{--                messages--}}
            <livewire:main-lobby :user="$user" :room="$room"/>
            {{--                users--}}
            <livewire:chat-right />
        </div>
    </div>

</div>
