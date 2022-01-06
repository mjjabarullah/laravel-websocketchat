<div class="flex w-full flex-1 justify-between">
    {{--                menus--}}
    <livewire:chat-left />
    {{--                messages--}}
    <livewire:main-lobby :user="$user" :room="$room"/>
    {{--                users--}}
    <livewire:chat-right  />
</div>
