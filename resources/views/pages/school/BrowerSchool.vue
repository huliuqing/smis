<template>
  <div class="content">
    <div class="container-fluid">

      <ul class="nav ">
        <li class="nav-item">
          <router-link class="nav-link" to="/school/add">
            <button type="button" class="btn btn-info btn-fill">
              <i class="nc-icon nc-simple-add"></i>
            </button>
          </router-link>
        </li>
      </ul>


      <div class="row">
        <div class="col-12">
          <div class="col-12">
            <card class="strpied-tabled-with-hover">
              <template slot="header">
                <h4 class="card-title">学校列表</h4>
              </template>

              <school-table class="table-hover table-striped"
                            :columns="columns"
                            :data="schools.data">
              </school-table>
            </card>
          </div>
        </div><!--end:row-->
      </div>
    </div>
  </div>
</template>

<script>
import SchoolTable from "./SchoolTable.vue";
import Card from "../../components/Cards/Card.vue";
import StatsCard from '../../components/Cards/StatsCard.vue'

import api from "../../../assets/js/const/api";
import notify from "../../../assets/js/utils/notify";

const tableColumns = ['id', 'name', 'created_at', 'updated_at']
export default {
  components: {
    SchoolTable,
    StatsCard,
    Card
  },

  data() {
    return {
      columns: [...tableColumns],
      schools: {
        data: this.fetchSchools()
      },
    }
  },

  methods: {
    fetchSchools: function (e) {
      let url = api.getRequestUrl('schoolBrowser')
      console.log('request url', url);
      axios.get(url)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              let respData = response.data
              this.schools.data = respData.data
            } else {
              // alert(' user profile request err.');
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '请求「学校」获取失败')
          });

      return []
    },
  }
}
</script>
<style>
</style>
