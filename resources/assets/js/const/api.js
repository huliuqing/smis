import config from "./config";

const pagination = {
    /**
     * @example
     * data.current_page: 1,
     * data.first_page_url: "http://127.0.0.1:8000/api/v1/user/browser?page=1",
     * data.from: 1,
     * data.last_page: 1,
     * data.last_page_url: "http://127.0.0.1:8000/api/v1/user/browser?page=1",
     * data.next_page_url: null,
     * data.path: "http://127.0.0.1:8000/api/v1/user/browser",
     * data.per_page: 30,
     * data.prev_page_url: null,
     * data.to: 8,
     * data.total: 8,
     */
    data: null,

    canPagination: function () {
        return this.data !== null
    },

    hasPreviousPage: function () {
        return this.data.prev_page_url !== null
    },

    getPreviousPage: function () {
        if (this.hasPreviousPage()) {
            return ''
        }

        return this.data.prev_page_url
    },

    hasNextPage: function () {
        return this.data.next_page_url !== null
    },

    getNextPage: function () {
        if (this.hasNextPage()) {
            return ''
        }

        return this.data.next_page_url
    }
};

/**
 * api: 后端访问接口
 */
const api = {
    login: '/api/v1/auth/login',
    logout: '/api/v1/auth/logout',
    profile: '/api/v1/auth/profile',

    register: '/api/v1/user/register',
    userBrowser: '/api/v1/user/browser',
    userCreate: '/api/v1/user/create',
    userInvite: '/api/v1/user/invite',
    browserSchool: '/api/v1/user/school',

    follow: '/api/v1/user/follow/',// /api/v1/follow/{:id}
    unfollow: '/api/v1/user/follow/',
    follower: '/api/v1/user/follower',
    following: '/api/v1/user/following',

    schoolCreate: '/api/v1/school/store',
    schoolJoin: '/api/v1/school/join',
    schoolBrowser: '/api/v1/school/browser',
    notification: '/api/v1/notification/send',
    chat: '/api/v1/chat/send',

    fetchAllSchool: '/api/v1/school/browserAll',

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
    },
    pagination: pagination,
}

export default api
