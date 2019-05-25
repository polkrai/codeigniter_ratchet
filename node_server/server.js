var server     = require('http').createServer(),
    io         = require('socket.io')(server),
    winston    = require('winston'),
    port       = 1337;

var logger = winston.createLogger({
        transports: [
                new winston.transports.Console(),
                new winston.transports.File({filename: 'logs/combined.log', level: 'info'}),
				new winston.transports.File({filename: 'logs/errors.log', level: 'error'})
        ]
    });

winston.info('SocketIO > listening on port ' + port);

io.on('connection', function (socket){

    logger.info('SocketIO > Connected socket ID : 	' + socket.id);
	
	//socket.on('room', function(group) {
        //socket.join(group);
    //});

    socket.on('broadcast', function (message) {

		io.emit('broadcast', message);

        logger.info('SocketIO emit to Client broadcast :' + JSON.stringify(message));
    });

    socket.on('screening', function (message) {

        io.emit('screening', message);

        logger.info('SocketIO emit to Client screening :' + JSON.stringify(message));
    });

    socket.on('disconnect', function () {
		
        logger.info('SocketIO > Disconnected socket :' + socket.id);
		
    });
});

server.listen(port);

