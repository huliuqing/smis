<template>
  <card class="card-user">
    <img slot="image"
         src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400"
         alt="..."/>
    <div class="author">
      <a href="#">
        <img class="avatar border-gray" src="img/faces/face-3.jpg" alt="..."/>

        <h4 class="title">{{user.id}}:{{ user.name }}<br/>
          <small>{{ user.email }}</small>
        </h4>
      </a>
    </div>

    <p class="description text-center">

      <button v-if='canBind' v-tooltip.top-center="bindLineTooltip" class="btn btn-simple" @click.prevent="redirect">
        <i class="fa fa-brands fa-line" style="color:#00b900"></i>
      </button>

      <button v-else class="btn btn-simple">
        <i class="fa fa-brands fa-line"></i>
      </button>
    </p>

    <div slot="footer" class="text-center d-flex justify-content-center">
      <div class="legend">
        <div v-if="user.status === 1"><i class="fa fa-circle text-success"></i>正常</div>
        <div v-else><i class="fa fa-circle text-danger"></i>禁用</div>
      </div>

    </div>
  </card>
</template>
<script>
import Card from "../../../components/Cards/Card.vue";
import api from "../../../../assets/js/const/api";
import notify from "../../../../assets/js/utils/notify";
import auth from "../../../../assets/js/auth";

export default {
  components: {
    Card
  },
  data() {
    return {
      user: this.getUserProfile(),
      bindLineTooltip: 'Line 绑定',
      canBind: false,
    }
  },
  methods: {
    auth() {
      return auth
    },
    getUserProfile: function () {
      let url = api.getRequestUrl('profile')
      console.log('[UserCard::getUserProfile] request url:', url);
      axios.get(url,)
          .then((response) => {
            if (response.status === 200) {
              sessionStorage.setItem('user', JSON.stringify(response.data.user))
              this.user = response.data.user
              this.canBind = this.user.can_bind
            } else {
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, error);
          });

      return []
    },

    redirect: function () {
      auth.line.setBindIden(auth.line.bindIdenProfile)
      auth.line.redirect()
    },

    bindLine: function () {
      let url = api.getRequestUrl('lineRedirect')
      console.log('[UserCard::getUserProfile] get bind line redirect url:', url);
      axios.get(url,)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              window.location.href = response.data.redirect_url;
            } else {
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, error);
          });

      return []
    }
  }
}

</script>
<style>

</style>
