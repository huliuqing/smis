var auth = (to, from, next) => {
    console.group('Auth')
    console.log('Auth handle', sessionStorage)

    let isAuthenticated = sessionStorage.getItem('token')

    console.log('Auth token:', isAuthenticated)
    console.log('to', to)
    console.log('from', from)
    if(isAuthenticated) {
        if(to.name === 'Login') {
            next('/')
        } else {
            console.log('auth not from login')
            // next()
        }
    } else {
        if(to.name === 'Login' || to.name === 'Register') {
            // next()
        } else {
            next('/smis/user/login')
        }
    }

    next()
    console.groupEnd()

}
export default auth