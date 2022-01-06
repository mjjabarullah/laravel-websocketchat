// noinspection JSUnresolvedVariable,JSUnresolvedFunction

import log from "tailwindcss/lib/util/log";

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
import Alpine from 'alpinejs'
// import Peer from 'peerjs';

window.Pusher = require('pusher-js')
window.$ = require('jquery')
window.Swal = require('sweetalert2')

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
})

/*
*  listen to chat room channel
* */

function joinToChannel(roomId) {
    window.Echo.join(`chat.${roomId}`)
        .subscribed(()=>{
            window.livewire.emit('subscribed')
        })
        .here(users => {
            window.livewire.emit('here', users)
        })
        .joining(user => {
            window.livewire.emit('joining', user)
            // console.log("joining" + JSON.stringify(user))
        })
        .leaving(user => {
            window.livewire.emit('leaving', user)
            // console.log("joining" + JSON.stringify(user))
        })
        .listen('NewMessage', message => {
            window.livewire.emit('newMessage', message)
            // console.log("newMessage" + JSON.stringify(message))
        })
        .listen('MessageDelete', data => {
            window.livewire.emit('removeMessage', data)
            // console.log("deleteMessage" + JSON.stringify(data))
        })
        .error(error => {
            sweetAlert(error)
        })
}

joinToChannel(window.roomId)


function sweetAlert(title){
    window.Swal.fire({
        title: title,
        target: '#error-target',
        customClass: {
            container: '!absolute'
        },
        icon: 'error',
        timer: 2000,
        timerProgressBar: true,
        toast: true,
        position: 'top',
        showConfirmButton: false,
    })
}

/*
   * change the room when user click to change room
   * */
$(window).on('roomChanged', e => {
    window.Echo.leave(`chat.${window.roomId}`)
    window.roomId = e.detail.roomId
    joinToChannel(window.roomId)
    window.livewire.emit('roomChanged', window.roomId)
})

$(window).on('listeners', e=>{
    console.log(e.detail);
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

window.Alpine = Alpine
Alpine.start()


/*
* custom functions
*
*/
const chatMessages = $('#chat-messages')
const mobile = window.matchMedia('(max-width: 768px)')
const desktop = window.matchMedia('(min-width: 1024px)')
const leftMenu = $("#left-menu")
const userList = $("#user-list")
const headerLeft = $('#header-left')

$(document).ready(function () {

    /*
    * toggle right and left menu
    */
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
        if (Math.abs($(this).scrollTop()) === 20) {
            page = 1
            isAvailable = true
            isScrolling = false
            window.livewire.emit('scrolledBottom')
        }
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

    $(window).on('message-received', e => {
        if (!isScrolling) chatMessages.scrollTop($(chatMessages)[0].scrollHeight)
        $('#message-sound')[0].play();
    })

    $(window).on('message-sent', e => {
        if (!isScrolling) chatMessages.scrollTop($(chatMessages)[0].scrollHeight)
    })

   /*
    *  show toast when sending empty message
    * */

    $(window).on('chatError', e => {
       sweetAlert(e.detail.title)
    })

    /*
    * Record audio and send
    * */
    const MicRecorder = require('mic-recorder-to-mp3');
    const recorder = new MicRecorder({bitRate: 128});

    function startRecording(){
        recorder.start().then(() => {

        }).catch((e) => {
            console.error(e);
        });
    }

    recorder
        .stop()
        .getMp3().then(([buffer, blob]) => {
        const file = new File(buffer, 'music.mp3', {
            type: blob.type,
            lastModified: Date.now()
        });
    }).catch((e) => {
        console.log(e);
    });

})




