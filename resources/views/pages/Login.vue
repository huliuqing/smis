<template>
  <section class="vh-100">
    <!--    <div class="container py-5 h-100">-->
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
               class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="typeEmail" class="form-control form-control-lg" v-model="email"/>
              <label class="form-label" for="typeEmail">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="typePassword" class="form-control form-control-lg" v-model="password"/>
              <label class="form-label" for="typePassword">Password</label>
            </div>

            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="typeRememberMe" checked/>
                <label class="form-check-label" for="typeRememberMe"> 记住我 </label>
              </div>
              <a href="#!">忘记密码?</a>
            </div>

            <!-- Submit button -->
            <button type="button" class="btn btn-primary btn-lg btn-block" @click="login">登录</button>

            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0 text-muted">或</p>
            </div>

            <a class="btn btn-fill btn-lg btn-block"
               style="background-color: #00be00"
               href="#!"
               role="button" @click.prevent="redirect">
              <i class="fa-brands fa-line"></i> Line 登录
            </a>

            <div class="d-flex justify-content-around align-items-center mb-4">
              <p class="fw-bold mt-2 pt-1 mb-0">没有账号?
                <a href="#!" class="link-danger">
                  <router-link :to="{ name: 'Register' }">注册</router-link>
                </a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script>

import axios from 'axios'
import api from "../../assets/js/const/api";
import auth from "../../assets/js/auth";

export default {
  // props: ["email", "password"],
  props: {
    email: {
      default: 'admin@smis.com',
      type: String
    },
    password: {
      default: '12345678',
      type: String
    },
  },
  methods: {
    redirect: function () {
      auth.line.setBindIden(auth.line.bindIdenLogin)
      auth.line.redirect()
    },

    login: function (e) {
      console.log(this.email, this.password)

      let loginData = {
        email: this.email,
        password: this.password,
      }

      let url = api.getRequestUrl('login')
      console.log('request url', url);
      axios.post(url, loginData)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              console.log('resp token:', response.data.token)

              let oauthToken = response.data.token;
              sessionStorage.setItem('token', oauthToken)
              window.axios.defaults.headers.common['Authorization'] = oauthToken ? 'Bearer ' + oauthToken : '';

              this.loadUser()
              this.$router.push({path: '/'})
            } else {
              alert(error);
            }
          })
          .catch(function (error) {
            console.log(error);
          });
    },
    loadUser: function () {
      let url = api.getRequestUrl('profile')
      console.log('request url', url);
      axios.get(url,)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              console.log('resp:', response)
              sessionStorage.setItem('user', JSON.stringify(response.data.user))
              this.user = response.data.user
            } else {
              alert(' user profile request err.');
            }
          })
          .catch(function (error) {
            alert('user profile:' + error);
          });

      return []
    }
  }
}
</script>

<style>
</style>