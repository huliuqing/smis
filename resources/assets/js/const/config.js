// dev | production
const production = 'production';
const develop = 'dev';

// const env = develop;
const env = production;

let isProduction = function () {
    return env === production
}

let pusherConfig = {
    notification: {
        channel: 'school-notification',
        event: 'NotificationEvent',
    },

    chat: {
        channel: 'chat.',// chat.{your.id}
        event: 'ChatEvent',
    }
}

const prod = {
    host: 'http://smis.metaprogramer.com',
    pusher: pusherConfig,
    isProduction
}

const dev = {
    host: 'http://127.0.0.1:8000',
    pusher: pusherConfig,
    isProduction
}


const config = isProduction ? prod : dev;

export default config