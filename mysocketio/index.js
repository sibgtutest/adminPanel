var PORT = 3000;

var options = {
    //'log level': 0
};


const io = require('socket.io')();
io.listen(3000);

io.sockets.on('connection', function (client) {
    client.on('message', function (message) {

        try {
            //send a message to yourself
            client.emit('message', message);
            //send a message to all customers except yourself
            client.broadcast.emit('message', message);
        } catch (e) {
            console.log(e);
            client.disconnect();
        }
    });
});


