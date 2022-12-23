<template>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Dashboard</a>
      <button type="button"
              class="navbar-toggler navbar-toggler-right"
              :class="{toggled: $sidebar.showSidebar}"
              aria-controls="navigation-index"
              aria-expanded="false"
              aria-label="Toggle navigation"
              @click="toggleSidebar">
        <span class="navbar-toggler-bar burger-lines"></span>
        <span class="navbar-toggler-bar burger-lines"></span>
        <span class="navbar-toggler-bar burger-lines"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
<!--        <ul class="nav navbar-nav mr-auto">-->
<!--          <li class="nav-item">-->
<!--            <a class="nav-link" href="#" data-toggle="dropdown">-->
<!--              <i class="nc-icon nc-palette"></i>-->
<!--            </a>-->
<!--          </li>-->

<!--          <li class="nav-item">-->
<!--            <a href="#" class="nav-link">-->
<!--              <i class="nc-icon nc-zoom-split"></i>-->
<!--              <span class="d-lg-block">&nbsp;Search</span>-->
<!--            </a>-->
<!--          </li>-->
<!--        </ul>-->

        <ul class="navbar-nav ml-auto">

          <base-dropdown tag="li" id="inbox" v-tooltip.top-center="inboxTooltip" @click="$emit('browserNotification')">
            <template slot="title">
              <i class="nc-icon nc-bell-55"></i>
              <b class="caret" v-if="notificationCnt > 0"></b>
              <span class="notification" id="inbox-cnt" v-if="notificationCnt > 0">{{ notificationCnt }}</span>
            </template>

<!--            <a class="dropdown-item" href="#">Notification 1</a>-->
          </base-dropdown>

          <li class="nav-item">
            <router-link class="nav-link" to="/smis/user/invite"><i class="nc-icon nc-simple-add"></i> 邀请 </router-link>
          </li>

          <li class="nav-item">
            <sidebar-link to="/smis/user/profile">
              <i class="nc-icon nc-single-02"></i>
            </sidebar-link>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" @click="logout">
              退出
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import api from "../../../assets/js/const/api";
import config from "../../../assets/js/const/config";

export default {
  computed: {
    routeName() {
      const {name} = this.$route
      return this.capitalizeFirstLetter(name)
    }
  },
  data() {
    return {
      activeNotifications: false,
      notificationCnt: 0,
      inboxTooltip: '站内信',
    }
  },
  mounted() {
    this.watchNotification()
  },
  methods: {
    capitalizeFirstLetter(string) {
      return string.charAt(0).toUpperCase() + string.slice(1)
    },
    toggleNotificationDropDown() {
      this.activeNotifications = !this.activeNotifications
    },
    closeDropDown() {
      this.activeNotifications = false
    },
    toggleSidebar() {
      this.$sidebar.displaySidebar(!this.$sidebar.showSidebar)
    },
    hideSidebar() {
      this.$sidebar.displaySidebar(false)
    },

    watchNotification() {
      let channel = config.pusher.notification.channel
      let listenEvent = config.pusher.notification.event

      console.log(`TopNavbar[watchNotification] channel[${channel}], event[${listenEvent}]`)
      Echo.channel(channel)
          .listen(listenEvent, (e) => {
            let auth = JSON.parse(sessionStorage.getItem('user'))
            if (e.message.msg_to === auth.id) {
              return
            }

            this.notificationCnt++
            let dropdown = document.getElementById('inbox').querySelector('.dropdown-menu')
            let elem = `<a class="dropdown-item" href="#">${e.message.message}</a>`
            dropdown.innerHTML = elem + dropdown.innerHTML
          })

    },
    resetNotificationCnt() {
        this.notificationCnt = 0
    },

    browserNotification() {
      this.resetNotificationCnt()
    },

    logout() {
      console.log('Logout Click')
      localStorage.clear()
      window.sessionStorage.clear()

      let url = api.getRequestUrl('logout')
      console.log('request url', url);
      axios.post(url)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              console.log('resp:', response)
              this.$router.push('/')
            } else {
              alert('log out request err.');
            }
          })
          .catch(function (error) {
            alert('log out:' + error);
          });
    },
  }
}

</script>
<style>

</style>
