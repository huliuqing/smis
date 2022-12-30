<template>
  <card>
    <h4 slot="header" class="card-title">添加学校</h4>
    <form>
      <div class="row">
        <div class="col-md-5">
          <base-input type="text"
                      label="学校名称"
                      placeholder="请输入学校名称"
                      v-model="name" required>
          </base-input>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-md-1">
          <router-link class="btn btn-fill"  to="/smis/school/browser">返回</router-link>
        </div>
        <div class="col-md-1">
          <button type="submit" class="btn btn-info btn-fill" @click.prevent="createSchool">添加</button>
        </div>
      </div>
      <div class="clearfix"></div>
    </form>
  </card>
</template>

<script>
import Card from "../../components/Cards/Card.vue";
import api from "../../../assets/js/const/api";
import notify from "../../../assets/js/utils/notify";

export default {
  components: {
    Card
  },
  props: ["name"],
  methods: {
    createSchool() {
      let newSchool = {
        name: this.name,
      }

      let url = api.getRequestUrl('schoolCreate')
      axios.post(url, newSchool)
          .then((response) => {
            if (response.status === 200) {
              notify.success(this.$notifications, '学校 <b>' + this.name + '</b> 创建成功')
            } else {
              alert(error);
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '学校 <b>' + this.name + '</b> 创建失败')
          });
    }
  }
}

</script>
<style>

</style>
