var express = require('express')();
var server = require('http').Server(express);
var io = require('socket.io')(server);

var users_list = [];

io.on('connection', function (socket) {
  socket.used_id = 0;

  socket.on('disconnect', () => {
    io.emit('user_logout', {
      user_id: socket.user_id
    });
    if (users_list.indexOf(socket.user_id) >= 0) {
      users_list.splice(users_list.indexOf(socket.user_id), 1);
    }
  });

  socket.on('user_login', (data) => {
    socket.user_id = data.user_id;
    io.emit('user_login', data);

    if (users_list.indexOf(data.user_id) >= 0) {
      users_list.splice(users_list.indexOf(data.user_id), 1);
    }
    users_list.push(data.user_id);

    socket.emit('users_list', {
      users_list: users_list
    });
  });

});

server.listen(9090, function () {
  console.log('socket.io server listen at 9090');
});