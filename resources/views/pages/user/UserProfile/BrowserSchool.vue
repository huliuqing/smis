<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <card class="strpied-tabled-with-hover">
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

const tableColumns = ['ID', 'Name', 'School_Role']

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
      axios.get(url)
          .then((response) => {
            if (response.status === 200) {
              let respData = response.data

              this.hasSchool = respData.total > 0
              if (this.hasSchool) {
                this.schools = this.fmtSchools(respData.data)
                console.log(this.schools)
              }
            } else {
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '用户「所属学校」获取失败')
          });

      return []
    },
    fmtSchools: function (schools) {
      for (let idx in schools) {
        schools[idx]['school_role'] = this.schoolRoleName(schools[idx].pivot.type)
        schools[idx]['school_role_type'] = schools[idx].pivot.type
      }
      return schools
    },
    schoolRoleName: function (type) {
      // 0:default,1:学校管理员,2:普通教师,3:普通学生
      switch (type) {
        case 1:
          return '学校管理员';
        case 2:
          return '教师';
        case 3:
          return '学生';
        default:
          return '待审核';
      }
    }
  }
}
</script>
<style>
</style>
