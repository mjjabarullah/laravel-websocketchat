window._ = require('lodash')

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo'
// import Peer from 'peerjs';

window.Pusher = require('pusher-js')
window.$ = require('jquery')
window.Swal = require('sweetalert2')

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'wbc_key',
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
})

/*
*  listen to chat channel and log every event on that channel
* */
window.Echo.channel('chat')
    .listen("MessageEvent", function (e) {
        console.log(window.Echo.socketId())
        console.log(e.message.id + " received")
    }).listen("MessageDeleteEvent", function (e) {
    console.log(e.id + " deleted")
})


/*
* peerjs client connection
* */
// window.Peer = new Peer(undefined, {
//     host: '/',
//     port: 3000,
// })
// window.Peer.on('open', id => {
//     const getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
//     getUserMedia({ video: false, audio: true },stream => {
//         console.log("granted");
//     },(error)=>{
//        alert("canceled")
//     })
//     console.log(id)
// })

/**
 *
 * Alpine Js
 */
import Alpine from 'alpinejs'

window.Alpine = Alpine
Alpine.start()


/*
* custom functions
*
*/

$(document).ready(function () {
    const mobile = window.matchMedia('(max-width: 768px)')
    const desktop = window.matchMedia('(min-width: 1024px)')
    const leftMenu = $("#left-menu")
    const userList = $("#user-list")
    const chatMessages = $('#chat-messages')
    const headerLeft = $('#header-left')
    const loader = $('#loader')

    /*
    * show or hide loader
    * */
    loader.removeClass('hidden')
    chatMessages.addClass('hidden')
    setTimeout(() => {
        loader.addClass('hidden')
        chatMessages.removeClass('hidden')
    }, 1500);

    /*
    * toggle right and left menu
    * */
    window.toggleMenu = () => {
        if (mobile.matches) userList.hide()
        leftMenu.toggle()
    }
    window.toggleUserList = () => {
        if (mobile.matches) leftMenu.hide()
        userList.toggle()
    }
    desktop.onchange = (e) => {
        if (desktop.matches) {
            leftMenu.show()
            userList.show()
            headerLeft.show()
        } else {
            leftMenu.hide()
            userList.hide()
            headerLeft.hide()
        }
    }

    /*
    * load more messages on scrolling
    * */
    let isLoading = false
    let isAvailable = true
    let isScrolling = false
    let page = 1

    chatMessages.scroll(function () {
        isScrolling = true
        if ((Math.abs($(this).scrollTop()) + $(this).innerHeight()) >= $(this)[0].scrollHeight - 5) {
            if (isAvailable && !isLoading) {
                window.livewire.emit('load-more-messages', page++)
            }
        }
        if (Math.abs($(this).scrollTop()) === 1) {
            page = 1
            isAvailable = true
            window.livewire.emit('scrolled-bottom')
        }
    })

    $(window).on('scrolled-bottom', e => {
        isScrolling = false
    })

    $(window).on('on-load-more-messages', e => {
        isLoading = e.detail.loading
        isAvailable = e.detail.available
    })

    $(window).on('no-more-messages', e => {
        console.log("event: no-more-messages  " + page + " loading: " + isLoading + " available: " + e.detail.available)
        isLoading = e.detail.loading
        isAvailable = e.detail.available
    })

    /*
    * scroll to bottom when new message arrives
    * */

    $(window).on('message-sent', function (e) {
        if (!isScrolling) chatMessages.scrollTop($(chatMessages)[0].scrollHeight)
        $('#message-sound')[0].play();
    })

    /*
    *  show toast when sending empty message
    * */

    $(window).on('empty-input', function (event) {
        $('#error-target').show()
        window.Swal.fire({
            title: event.detail.title,
            target: '#error-target',
            customClass: {
                container: '!absolute'
            },
            icon: 'error',
            timer: 1500,
            timerProgressBar: true,
            toast: true,
            position: 'top',
            showConfirmButton: false,
        })
    })
})


