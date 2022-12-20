import DashboardLayout from '../../views/components/layout/DashboardLayout.vue'
// GeneralViews
// import NotFound from '../pages/NotFoundPage.vue'

// Admin pages
import Overview from '../../views/pages/Overview.vue'

import User from "../../views/pages/user/User.vue"
import Login from "../../views/pages/user/Login.vue"
import Register from "../../views/pages/user/Register.vue"

import UserProfile from "../../views/pages/user/UserProfile.vue"
import UserInvite from "../../views/pages/user/Invite.vue"
import BrowserUserSchool from "../../views/pages/user/UserProfile/BrowserSchool.vue";
import Friends from "../../views/pages/Friends.vue";


import AddSchool from "../../views/pages/school/AddSchool.vue";
import BrowerSchool from "../../views/pages/school/BrowerSchool.vue";

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
        redirect: '/admin/overview'
    },

    // {
    //     path: 'login',
    //     name: 'Login',
    //     component: Login,
    // },
    // {
    //     path: 'register',
    //     name: 'Register',
    //     component: Register,
    // },
    {
        path: '/user',
        name: 'User',
        component: User,
        redirect: '/user/login',
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
            }
        ]
    },

    {
        path: '/admin',
        component: DashboardLayout,
        redirect: '/admin/overview',
        children: [

            {
                path: 'overview',
                name: 'Overview',
                component: Overview
            },
            {
              path: 'user',
              name: 'User',
              component: UserProfile
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

            // {
            //   path: 'table-list',
            //   name: 'Table List',
            //   component: TableList
            // },
            // {
            //   path: 'typography',
            //   name: 'Typography',
            //   component: Typography
            // },
            // {
            //   path: 'icons',
            //   name: 'Icons',
            //   component: Icons
            // },
            // {
            //   path: 'maps',
            //   name: 'Maps',
            //   component: Maps
            // },
            // {
            //   path: 'notifications',
            //   name: 'Notifications',
            //   component: Notifications
            // },
            // {
            //   path: 'upgrade',
            //   name: 'Upgrade to PRO',
            //   component: Upgrade
            // }
        ]
    },

    {
        path: '/school',
        component: DashboardLayout,
        redirect: '/school/browser',
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
