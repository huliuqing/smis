<template>
  <card>
    <h4 slot="header" class="card-title">添加学生</h4>

    <form>
      <div class="col-md-5">
        <!-- name input -->
        <div class="form-outline mb-4">
          <input type="text" id="typeUsername" class="form-control form-control-lg" v-model:name="name"/>
          <label class="form-label" for="typeUsername">用户名</label>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="typeEmail" class="form-control form-control-lg" v-model:email="email"/>
          <label class="form-label" for="typeEmail">Email</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="typePassword" class="form-control form-control-lg"
                 v-model:password="password"/>
          <label class="form-label" for="typePassword">密码</label>
        </div>

        <div class="form-outline mb-4">
          <select class="form-control" id="typeSchoolId" v-model:schoolId="schoolId">
            <option v-for="school in schools" v-bind:value="school.id">{{ school.name }}</option>
          </select>
          <label class="form-label" for="typeSchoolId">学校</label>
        </div>
      </div>

      <div class="row text-center">

        <div class="col-md-1">
          <router-link class="btn btn-fill"  to="/smis/user/browser">返回</router-link>
        </div>
        <div class="col-md-1">
          <button type="submit" class="btn btn-info btn-fill" @click.prevent="userCreate">添加</button>
        </div>
      </div>
    </form>
  </card>
</template>


<script>
import api from "../../../assets/js/const/api";
import notify from "../../../assets/js/utils/notify";

let min = 1;
let max = 100;
let rand = Math.floor(Math.random() * (max - min + 1) + min);

export default {
  props: {
    name: {
      default: 'amin' + rand,
      // default: '',
      type: String
    },
    email: {
      default: 'admin' + rand + '@smis.com',
      // default: '',
      type: String
    },
    password: {
      default: '12345678',
      // default: '',
      type: String
    },

    schoolId: {
      default: 0,
      type: Number
    },

  },

  data() {
    return {
      schools: this.fetchAllSchool(),
    }
  },

  methods: {
    userCreate: function (e) {
      console.log(this.name, this.email, this.password)

      let userCreateData = {
        name: this.name,
        email: this.email,
        password: this.password,
        school_id: this.schoolId,
      }

      let url = api.getRequestUrl('userCreate')
      axios.post(url, userCreateData)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              notify.success(this.$notifications, '创建成功')
              this.$router.push('/smis/user/browser')
            } else {
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '创建请求失败')
          });
    },

    fetchAllSchool: function (kw) {
      let url = api.getRequestUrl('fetchAllSchool')
      axios.get(url)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              this.schools = response.data
            } else {
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '学校列表请求失败')
          });
    },
  }
}
</script>

<style>

</style>