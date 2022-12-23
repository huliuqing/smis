<template>
  <div class="content">
    <div class="container-fluid">

      <ul class="nav ">
        <li class="nav-item">
          <router-link class="nav-link" to="/smis/user/add">
            <button type="button" class="btn btn-info btn-fill">
              <i class="nc-icon nc-simple-add"></i>
            </button>
          </router-link>
        </li>
      </ul>

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

            <nav aria-label="Page navigation example" v-if="pagination">
              <ul class="pagination justify-content-end">
                <li class="page-item" v-bind:class="pagination.hasPreviousPage() ? '' : 'disabled'">
                  <a class="page-link" href="javascript: void(0)"
                     @click="fetchUsers(pagination.data.prev_page_url)">Previous</a>
                </li>

                <li class="page-item">
                  <a class="page-link" href="javascript: void(0)">{{ pagination.data.current_page }}</a>
                </li>

                <li class="page-item" v-bind:class="pagination.hasNextPage() ? '' : 'disabled'">
                  <a class="page-link" href="javascript: void(0)" @click="fetchUsers(pagination.data.next_page_url)">Next</a>
                </li>
              </ul>
            </nav>

          </card>

        </div>
      </div><!--end:row-->
    </div>
  </div>
</template>

<script>
import UserTable from "./UserProfile/UserTable.vue";

import api from "../../../assets/js/const/api";
import notify from "../../../assets/js/utils/notify";

const tableColumns = ['Id', 'Name', 'Created_At', 'Status', 'Type']
export default {
  components: {
    UserTable,
  },

  data() {
    return {
      pagination: null,
      columns: [...tableColumns],
      users: {
        cnt: 0,
        data: this.fetchUsers()
      },
    }
  },

  methods: {
    fetchUsers: function (url) {
      if (url === undefined) {
        url = api.getRequestUrl('userBrowser')
      }

      axios.get(url)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              let respData = response.data
              this.users.data = respData.data

              // 分页处理
              delete respData.data// 删除记录数，仅保留分页
              api.pagination.data = respData
              this.pagination = api.pagination
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
