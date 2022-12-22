<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <stats-card>
            <div slot="header" class="icon-warning">
              <i class="nc-icon nc-satisfied text-warning"></i>
            </div>
            <div slot="content">
              <p class="card-category">Followings</p>
              <h4 class="card-title">{{ followings.cnt }}</h4>
            </div>
            <div slot="footer" @click="fetchFollowings">
              <i class="fa fa-refresh"></i>Refresh
            </div>
          </stats-card>
        </div>

        <div class="col-xl-3 col-md-6">
        </div>

        <div class="col-xl-3 col-md-6">
          <stats-card>
            <div slot="header" class="icon-info">
              <i class="nc-icon nc-favourite-28 text-primary"></i>
            </div>
            <div slot="content">
              <p class="card-category">Followers</p>
              <h4 class="card-title">{{ followers.cnt }}</h4>
            </div>
            <div slot="footer" @click="fetchFollowers">
              <i class="fa fa-refresh"></i>Refresh
            </div>
          </stats-card>
        </div>
      </div><!--end:row-->

      <div class="row">
        <div class="col-12">
          <card class="strpied-tabled-with-hover">
            <template slot="header">
              <h4 class="card-title">关注</h4>
              <p class="card-category">Nice 关注了这么多好朋友</p>
            </template>
            <div v-if="followings.hasFollowing">
              <l-table class="table-hover table-striped"
                       :columns="columns"
                       :data="followings.data">
              </l-table>
            </div>
          </card>
        </div>

        <div class="col-12">
          <card class="strpied-tabled-with-hover">
            <template slot="header">
              <h4 class="card-title">粉丝</h4>
              <p class="card-category">社交达人</p>
            </template>

            <div v-if="followers.hasFollower">
              <l-table class="table-hover table-striped"
                       :columns="columns"
                       :data="followers.data">
              </l-table>
            </div>
          </card>
        </div>
      </div><!--end:row-->
    </div>
  </div>
</template>
<script>
import LTable from "../components/Table.vue";
import Card from "../components/Cards/Card.vue";
import StatsCard from '../components/Cards/StatsCard.vue'

import api from "../../assets/js/const/api";
import notify from "../../assets/js/utils/notify";

const tableColumns = ['Name', 'Created_at']
export default {
  components: {
    LTable,
    StatsCard,
    Card
  },

  data() {
    return {
      columns: [...tableColumns],
      followers: {
        cnt: 0,
        hasFollower: false,
        data: this.fetchFollowers()
      },

      followings: {
        cnt: 0,
        hasFollowing: false,
        data: this.fetchFollowings()
      }
    }
  },

  methods: {
    hasFollower: function () {
      return this.followers.hasFollower
    },
    fetchFollowers: function (e) {
      let url = api.getRequestUrl('follower')
      console.log('request url', url);
      axios.get(url)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              let respData = response.data

              this.followers.hasFollower = respData.total > 0
              if (this.hasFollower()) {
                this.followers.cnt = respData.total
                this.followers.data = respData.data
                notify.success(this.$notifications, '粉丝列表获取成功');
              }
            } else {
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '粉丝列表获取失败')
          });

      return []
    },

    hasFollowing: function () {
      return this.followings.hasFollowing;
    },

    fetchFollowings: function (e) {
      let url = api.getRequestUrl('following')
      console.log('request url', url);
      axios.get(url)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              let respData = response.data

              this.followings.hasFollowing = respData.total > 0
              if (this.hasFollowing()) {
                this.followings.cnt = respData.total
                this.followings.data = respData.data
                notify.success(this.$notifications, '关注列表获取成功')
              }
            } else {
              // alert(' user profile request err.');
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '关注列表获取失败')
          });

      return []
    },

  }
}
</script>
<style>
</style>
