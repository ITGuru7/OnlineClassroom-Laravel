
console.log('socket-io-client');

const socket = require('socket.io-client')('http://localhost:9090');

socket.on('connect', () => {
    if ( $("#user_id").length ) {
        socket.user_id = $("#user_id").val();
        socket.emit('user_login', {
            user_id: socket.user_id,
        });
    }
});

socket.on('user_login', (data) => {
    let attendance = $('tr#user_'+data.user_id+' .attendance');
    attendance.removeClass('offline');
    attendance.addClass('online');
    attendance.html('Online');
});

socket.on('user_logout', (data) => {
    console.log(data.user_id);
    let attendance = $('tr#user_'+data.user_id+' .attendance');
    attendance.removeClass('online');
    attendance.addClass('offline');
    attendance.html('Offline');
});

socket.on('users_list', (data) => {
    data.users_list.forEach((user_id) => {
        let attendance = $('tr#user_' + user_id + ' .attendance');
        attendance.removeClass('offline');
        attendance.addClass('online');
        attendance.html('Online');
    });
});
