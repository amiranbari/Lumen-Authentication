import Echo from 'laravel-echo'

let e = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
})

e.channel('test')
    .listen('.message.created', function (e) {
        console.log('ok event listener')
    })

console.log("ok service")
