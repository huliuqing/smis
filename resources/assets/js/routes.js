import DashboardLayout from '../../views/components/Layout/DashboardLayout.vue'
// GeneralView
// import NotFound from '../pages/NotFoundPage.vue'

// Admin pages
import Overview from '../../views/pages/Overview.vue'

import User from "../../views/pages/user/User.vue"
import Login from "../../views/pages/Login.vue"
import Register from "../../views/pages/Register.vue"

import UserProfile from "../../views/pages/user/UserProfile.vue"
import UserInvite from "../../views/pages/user/Invite.vue"
import BrowserUserSchool from "../../views/pages/user/UserProfile/BrowserSchool.vue";
import Friends from "../../views/pages/Friends.vue";


import AddSchool from "../../views/pages/school/AddSchool.vue";
import BrowerSchool from "../../views/pages/school/BrowerSchool.vue";
import UserBrowser from "../../views/pages/user/UserBrowser.vue";
import AddUser from "../../views/pages/user/AddUser.vue";
import LineCallback from "../../views/pages/Auth/LineCallback.vue";

// import TableList from 'src/pages/TableList.vue'
// import Typography from 'src/pages/Typography.vue'
// import Icons from 'src/pages/Icons.vue'
// import Maps from 'src/pages/Maps.vue'
// import Notifications from 'src/pages/Notifications.vue'
// import Upgrade from 'src/pages/Upgrade.vue'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: DashboardLayout,
        redirect: '/smis/user/profile'
    },

    {
        path: '/smis/invite/register',
        name: 'InviteRegister',
        component: User,
        redirect: '/smis/user/register'
    },

    {
        path: '/smis/user',
        name: 'User',
        component: User,
        redirect: '/smis/user/login',
        children: [
            {
                path: 'login',
                name: 'Login',
                component: Login,
            },
            {
                path: 'register',
                name: 'Register',
                component: Register,
            },

            {
                path: 'line/login',
                name: 'LineLogin',
                component: User,
            },

            {
                path: 'line/callback',
                name: 'LineCallback',
                component: LineCallback,
            }
        ]
    },

    {
        path: '/smis',
        component: DashboardLayout,
        redirect: '/smis/overview',
        children: [
            {
                path: 'overview',
                name: 'Overview',
                component: Overview
            },

            {
              path: 'user/profile',
              name: 'UserProfile',
              component: UserProfile
            },

            {
              path: 'user/browser',
              name: 'UserBrowser',
              component: UserBrowser
            },

            {
              path: 'user/add',
              name: 'AddUser',
              component: AddUser
            },


            {
              path: 'user/invite',
              name: 'UserInvite',
              component: UserInvite
            },

            {
              path: 'user/schools',
              name: 'UserSchools',
              component: BrowserUserSchool
            },

            {
              path: 'user/friends',
              name: 'UserFriends',
              component: Friends
            },
        ]
    },

    {
        path: '/smis/school',
        component: DashboardLayout,
        redirect: '/smis/school/browser',
        children: [
            {
              path: 'browser',
              name: 'SchoolBrowser',
              component: BrowerSchool
            },

            {
              path: 'add',
              name: 'AddSchool',
              component: AddSchool
            },
        ]
    }
    // {path: '*', component: NotFound}
]

/**
 * Asynchronously load view (Webpack Lazy loading compatible)
 * The specified component must be inside the Views folder
 * @param  {string} name  the filename (basename) of the view to load.
 function view(name) {
   var res= require('../components/Dashboard/Views/' + name + '.vue');
   return res;
};**/

export default routes
