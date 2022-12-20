<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <card class="strpied-tabled-with-hover"
                body-classes="table-full-width table-responsive"
          >
            <template slot="header">
              <h4 class="card-title">所属学校</h4>
            </template>

            <div v-if="hasSchool">
              <l-table class="table-hover table-striped"
                       :columns="columns"
                       :data="schools">
              </l-table>
            </div>

            <div v-else>
              <div class="col-12">
                your are alone :)
              </div>
            </div>

          </card>
        </div>
      </div>
    </div>
  </div>

</template>
<script>
import LTable from "../../../components/Table.vue";
import Card from "../../../components/Cards/Card.vue";
import api from "../../../../assets/js/const/api";
import notify from "../../../../assets/js/utils/notify";

const tableColumns = ['ID', 'Name']

export default {
  components: {
    LTable,
    Card
  },
  data() {
    return {
      hasSchool: false,
      columns: [...tableColumns],
      schools: this.fetchSchools()
    }
  },

  methods: {
    fetchSchools: function (e) {
      let url = api.getRequestUrl('browserSchool')
      console.log('request url', url);
      axios.get(url)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              let respData = response.data

              console.log('hasSchool b:', this.hasSchool)
              this.hasSchool = respData.total > 0
              console.log('hasSchool a:', this.hasSchool)
              if (this.hasSchool) {
                this.schools = respData.data
              }
            } else {
              // alert(' user profile request err.');
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '用户「所属学校」获取失败')
          });

      return []
    }
  }
}
</script>
<style>
</style>
