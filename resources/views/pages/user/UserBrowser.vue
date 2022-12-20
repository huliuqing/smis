<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <card class="strpied-tabled-with-hover">
            <template slot="header">
              <h4 class="card-title">用户列表</h4>
              <p class="card-category"></p>
            </template>

            <user-table class="table-hover table-striped"
                     :columns="columns"
                     :data="users.data">

            </user-table>

          </card>
        </div>
      </div><!--end:row-->
    </div>
  </div>
</template>
<script>
import UserTable from "./UserProfile/UserTable.vue";
import Card from "../../components/Cards/Card.vue";
import StatsCard from '../../components/Cards/StatsCard.vue'

import api from "../../../assets/js/const/api";
import notify from "../../../assets/js/utils/notify";

const tableColumns = ['Id', 'Name', 'Created_At', 'Status', 'Type']
export default {
  components: {
    UserTable,
  },

  data() {
    return {
      columns: [...tableColumns],
      users: {
        cnt: 0,
        data: this.fetchUsers()
      },
    }
  },

  methods: {
    fetchUsers: function (e) {
      let url = api.getRequestUrl('userBrowser')
      axios.get(url)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              let respData = response.data
              this.users.data = respData.data
            } else {
              // alert(' user profile request err.');
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '用户列表获取失败')
          });

      return []
    },

  }
}
</script>
<style>
</style>
