const server = require('http').createServer()
const io = require('socket.io')(server, {
    cors: {
        origin: "*",
        methods: ["GET", "POST"]
    }
})

const Redis = require('ioredis')


// const pub = new Redis(6379);
//
// setInterval(() => {
//     const message = { foo: Math.random() };
//     // Publish to my-channel-1 or my-channel-2 randomly.
//     const channel = `news-action`;
//
//     // Message can be either a string or a buffer
//     pub.publish(channel, JSON.stringify(message));
//     console.log("Published %s to %s", message, channel);
// }, 1000);


const redis = new Redis()
redis.psubscribe("news-action.*", (err, count) => {
    if (err) {
        console.error("Failed to subscribe: %s", err.message);
    } else {
        console.log(`Subscribed successfully! This client is currently subscribed to ${count} channels.`);
    }
});

redis.on("pmessage", function (pattern, channel, message) {
    console.log(`Received ${message} from ${channel}`)

    const messageIo = JSON.parse(message)
    const channelIo = channel + ':' + messageIo.event

    console.log(`Socket to message ${messageIo} from ${channelIo}`)
    io.emit(channelIo, messageIo)
})


//
// // There's also an event called 'messageBuffer', which is the same as 'message' except
// // it returns buffers instead of strings.
// // It's useful when the messages are binary data.
// redis.on("messageBuffer", (channel, message) => {
//     // Both `channel` and `message` are buffers.
//     console.log('messageBuffer', channel, message);
// });

server.listen(4242, () => console.log('Listening on Port: 4242'))
