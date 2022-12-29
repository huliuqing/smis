<template>
  <div class="wrapper">
    <side-bar>
      <mobile-menu slot="content"></mobile-menu>

      <sidebar-link v-for="(menu, idx) in menus" :key="idx" :to="menu.uri">
        <i class="nc-icon" v-bind:class="menu.icon"></i>
        <p>{{ menu.name }}</p>
      </sidebar-link>

    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>
      <dashboard-content @click="toggleSidebar"></dashboard-content>
      <content-footer></content-footer>
    </div>
  </div>
</template>

<style>

</style>

<script>
import TopNavbar from './TopNavbar.vue'
import ContentFooter from './ContentFooter.vue'
import DashboardContent from './Content.vue'
import MobileMenu from './MobileMenu.vue'
import api from "../../../assets/js/const/api";
import notify from "../../../assets/js/utils/notify";

export default {
  components: {
    TopNavbar,
    ContentFooter,
    DashboardContent,
    MobileMenu
  },
  data() {
    return {
      menus: this.fetchMenus(1),
    }
  },
  methods: {
    toggleSidebar() {
      if (this.$sidebar.showSidebar) {
        this.$sidebar.displaySidebar(false)
      }
    },

    fetchMenus: function ($userRoleType) {
      let url = api.getRequestUrl('menu')
      axios.get(url,)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              this.menus = response.data
              console.log('menus ', this.menus)
            } else {
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '菜单列表获取失败')
          });
    }
  }
}
</script>