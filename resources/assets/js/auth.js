import api from "./const/api";
import notify from "./utils/notify";

const guard = (to, from, next) => {
    console.group('Auth')
    console.log('Auth handle', sessionStorage)

    let isAuthenticated = sessionStorage.getItem('token')

    console.log('Auth token:', isAuthenticated)
    console.log('to', to)
    console.log('from', from)
    if (isAuthenticated) {
        if (to.name === 'Login') {
            next('/')
        } else {
            console.log('guard not from login')
        }
    } else {
        if (to.name === 'Login' || to.name === 'Register' || to.name === 'LineCallback') {
            // next()
        } else {
            next('/smis/user/login')
        }
    }

    next()
    console.groupEnd()

}


const BindIdenKey = 'line';
const bindIdenProfile = 'profile_bind';
const bindIdenLogin = 'line_login';
const line = {
    BindIdenKey: BindIdenKey,
    bindIdenProfile: bindIdenProfile,
    bindIdenLogin: bindIdenLogin,

    setBindIden: (iden) => {
        localStorage.setItem(BindIdenKey, iden)
        return this
    },

    getBindIden: () => {
        return localStorage.getItem(BindIdenKey)
    },

    isFromBindPage: () => {
        return localStorage.getItem(BindIdenKey) === bindIdenProfile
    },

    isFromLoginPage: () => {
        return localStorage.getItem(BindIdenKey) === bindIdenLogin
    },

    clearBindIden: () => {
        localStorage.removeItem(BindIdenKey)
        return this
    },

    redirect: () => {
        let url = api.getRequestUrl('lineRedirect')
        console.log('[Line::redirect] line logic bind line or login:', url)
        axios.get(url, )
            .then((response) => {
                console.log(response);
                if (response.status === 200) {
                    location.href = response.data.redirect_url
                } else {

                }
            })
            .catch((error) => {
                notify.danger(this.$notifications, error)
            });

        return []
    },

    callback: function(that) {
        let code = that.$route.query.code
        let apiIden = this.isFromBindPage() ? 'lineBind' : 'lineLogin';

        let url = api.getRequestUrl(apiIden)
        console.log('[LineCallback::bindOrLogin] line logic bind line or login:', url + '?code=' + code, 'iden: ' + apiIden)
        axios.get(url + '?code=' + code)
            .then((response) => {
                if (response.status === 200) {
                    console.log('this.isFromLoginPage()', this.isFromLoginPage())
                    if (this.isFromLoginPage()) {
                        let oauthToken = response.data.token;
                        sessionStorage.setItem('token', oauthToken)
                        window.axios.defaults.headers.common['Authorization'] = oauthToken ? 'Bearer ' + oauthToken : '';
                        this.loadUser()
                    }

                    that.$router.push('/smis/user')
                    notify.success(that.$notifications, this.isFromBindPage() ? '用户绑定成功' : '用户登录成功')
                } else {}
            })
            .catch((error) => {
                notify.danger(that.$notifications, error);
            });

        return []
    },

    loadUser: function() {
        let url = api.getRequestUrl('profile')
        axios.get(url, )
            .then((response) => {
                console.log(response);
                if (response.status === 200) {
                    sessionStorage.setItem('user', JSON.stringify(response.data.user))
                } else {
                }
            })
            .catch(function(error) {
                alert('user profile:' + error);
            });

        return []
    }
}

export default {
    guard,
    line
}