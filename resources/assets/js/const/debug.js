import config from "./config";

var debug = console

debug.group = function () {
    if (config.isProduction()) {
        return false
    }

    console.group.apply(console, arguments)
}

debug.groupEnd = function () {
    if (config.isProduction()) {
        return false
    }

    console.groupEnd.apply(console, arguments)
}

debug.info = function () {
    if (config.isProduction()) {
        return false
    }

    console.info.apply(console, arguments)
}

debug.log = function () {
    if (config.isProduction()) {
        return false
    }

    console.log.apply(console, arguments)
}

export default debug

