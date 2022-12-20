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
        <ul class="nav navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="nc-icon nc-palette"></i>
            </a>
          </li>
          <base-dropdown tag="li">
            <template slot="title">
              <i class="nc-icon nc-planet"></i>
              <b class="caret"></b>
              <span class="notification">5</span>
            </template>
            <a class="dropdown-item" href="#">Notification 1</a>
            <a class="dropdown-item" href="#">Notification 2</a>
            <a class="dropdown-item" href="#">Notification 3</a>
            <a class="dropdown-item" href="#">Notification 4</a>
            <a class="dropdown-item" href="#">Another notification</a>
          </base-dropdown>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nc-icon nc-zoom-split"></i>
              <span class="d-lg-block">&nbsp;Search</span>
            </a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <router-link class="nav-link" to="/admin/user/invite"><i class="nc-icon nc-simple-add"></i> 邀请</router-link>
          </li>

          <li class="nav-item">
            <sidebar-link to="/admin/user">
              <i class="nc-icon nc-single-02"></i>
            </sidebar-link>
          </li>

          <base-dropdown title="Dropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something</a>
            <div class="divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </base-dropdown>
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

export default {
  computed: {
    routeName() {
      const {name} = this.$route
      return this.capitalizeFirstLetter(name)
    }
  },
  data() {
    return {
      activeNotifications: false
    }
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
