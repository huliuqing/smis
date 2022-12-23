<template>
  <footer class="footer">
    <div class="container-fluid">
      <nav>
        <ul class="footer-menu">
          <li>
            <router-link :to="{path:'/smis'}">Dashboard</router-link>
          </li>
        </ul>
      </nav>

      <div class="fixed-plugin">
        <div class="dropdown show-dropdown" v-bind:class="show ? 'show' : ''">
          <a data-toggle="dropdown" @click.prevent="toggle">
            <i class="fa fa-paper-plane fa-2x"></i>
          </a>
          <ul class="dropdown-menu">
            <li class="header-title">发送通知</li>
            <li class="colors-line"></li>

            <div class="row">
              <form class="col-md-12">
                <div class="form-group">
                  <textarea class="form-control"
                            id="typeInMessage"
                            rows="3"
                            placeholder="请输入信息"
                            v-model="messageContent">
                    {{ messageContent }}
                  </textarea>
                </div>

              </form>
            </div>

            <li class="button-container">
              <button type="button" class="btn btn-info btn-block btn-fill" @click.prevent="send">发送</button>
            </li>
          </ul>
        </div>
      </div>

      <div class="copyright text-center">
      </div>
    </div>
  </footer>
</template>
<script>
import notify from "../../../assets/js/utils/notify";
import api from "../../../assets/js/const/api";

export default {
  data() {
    return {
      sendNotice: '发送通知',
      show: false,
      messageContent: '',
    }
  },
  methods: {
    toggle: function () {
      this.messageContent = 'test inbox :' + (new Date()).getSeconds()
      this.show = !this.show
    },

    send: function () {
      this.messageContent = this.messageContent.trim()

      if (this.messageContent.length === 0) {
        notify.danger(this.$notifications, '发送消息不能为空')
        return
      }

      let auth = JSON.parse(sessionStorage.getItem('user'))
      let messageJson = {
        to: auth.id,
        message: this.messageContent,
      }

      let url = api.getRequestUrl('notification')
      console.log('inbox send', url, messageJson)
      axios.post(url, messageJson)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              this.messageContent = ''
              notify.success(this.$notifications, '通知发送成功')
            } else {
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '通知发送失败')
          });

      return []
    },
  }
}

</script>
<style>

.fixed-plugin .fa-paper-plane {
  color: #fff;
  padding: 10px;
  border-radius: 0 0 6px 6px;
  width: auto;
}
</style>