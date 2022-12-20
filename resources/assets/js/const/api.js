import config from "./config";

/**
 * api: 后端访问接口
 */
const api = {
    login: '/api/v1/auth/login',
    logout: '/api/v1/auth/logout',
    profile: '/api/v1/auth/profile',

    register: '/api/v1/user/register',
    userCreate: '/api/v1/user/create',
    userInvite: '/api/v1/user/invite',
    browserSchool: '/api/v1/user/school',

    follow: '/api/v1/follow/:id',
    unfollow: '/api/v1/follow/:id',
    follower: '/api/v1/user/follower',
    following: '/api/v1/user/following',

    schoolCreate: '/api/v1/school/store',
    schoolJoin: '/api/v1/school/join',
    schoolBrowser: '/api/v1/school/browser',
    notification: '/notification/send',
    chat: '/chat/send',

    getApi: function (field) {
        if (field in this) {
            return this[field]
        }

        return false
    },

    getRequestUrl: function (field) {
        let path = this.getApi(field)
        if (path === false) {
            alert('request api field:' + field + ' not exists.')
        }

        return config.host + path;
    },

    /**
     * 获取前端 Home Page
     * @returns {{path: string}}
     */
    getHomePageUrl: function () {
        return {path: '/'}
    }
}

export default api
