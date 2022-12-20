// dev | production
const production = 'production';
const develop = 'dev';

const env = develop;

let isProduction = function () {
    return env === production
}

const prod = {
    host: 'http://127.0.0.1:8000',
    isProduction
}

const dev = {
    host: 'http://127.0.0.1:8000',
    isProduction
}


const config = isProduction ? prod : dev;

export default config