
import VTooltip from 'v-tooltip'

import GlobalComponents from './globalComponents'
import GlobalDirectives from './globalDirectives'
import Notifications from "../../views/components/NotificationPlugin"
import SideBar from '../../views/components/SidebarPlugin'

/**
 * This is the main Light Bootstrap Dashboard Vue plugin where dashboard related plugins are registerd.
 */
export default {
  install (Vue) {
    Vue.use(GlobalComponents)
    Vue.use(GlobalDirectives)
    Vue.use(SideBar)
    Vue.use(Notifications)
    Vue.use(VTooltip)
  }
}