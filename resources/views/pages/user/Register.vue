<template>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
               class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form>
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
                <option value="11">北京大学</option>
              </select>
              <label class="form-label" for="typeSchoolId">学校</label>
            </div>

            <!-- Submit button -->
            <button type="button" class="btn btn-primary btn-lg btn-block" @click="register">注册</button>

            <div class="d-flex justify-content-around align-items-center mb-4">
              <p class="fw-bold mt-2 pt-1 mb-0"> 返回
                <router-link :to="{ name: 'Login' }">登录</router-link>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>


<script>
import api from "../../../assets/js/const/api";

let min = 1;
let max = 100;
let rand = Math.floor(Math.random() * (max - min + 1) + min);

export default {
  props: {
    name: {
      default: 'amin' + rand,
      type: String
    },
    email: {
      default: 'admin' + rand + '@smis.com',
      type: String
    },
    password: {
      default: '12345678',
      type: String
    },

    schoolId: {
      default: 0,
      type: Number
    },
  },
  methods: {
    register: function (e) {
      console.log(this.name, this.email, this.password)

      let registerData = {
        name: this.name,
        email: this.email,
        password: this.password,
        school_id: this.password,
      }

      let url = api.getRequestUrl('register')
      console.log('request url', url, registerData);
      axios.post(url, registerData)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              // console.log('resp token:', response.data.token)
              // sessionStorage.setItem('token', response.data.token)
              this.$router.push(api.getHomePageUrl())
            } else {
              alert(error);
            }
          })
          .catch(function (error) {
            console.log(error);
          });
    }
  }
}
</script>

<style>

</style>