<template>
  <card>
    <h4 slot="header" class="card-title">邀请用户</h4>
    <form>
      <div class="row">
        <div class="col-md-6">
          <base-input type="email"
                      label="Email"
                      placeholder="Email"
                      v-model="email">
          </base-input>
        </div>
      </div>


      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label" for="typeSchoolId">学校</label>

            <select class="form-control" id="typeSchoolId" placeholder="选择学校" v-model:schoolId="schoolId">
              <option value="11">北京大学</option>
            </select>
          </div>
        </div>
      </div>

      <div class="text-left">
        <button type="submit" class="btn btn-info btn-fill left" @click.prevent="inviteUser">
          邀请
        </button>
      </div>
      <div class="clearfix"></div>
    </form>
  </card>
</template>


<script>
import api from "../../../assets/js/const/api";
import toastNotify from "../../../assets/js/utils/notify";

let min = 1;
let max = 100;
let rand = Math.floor(Math.random() * (max - min + 1) + min);

export default {
  props: {
    email: {
      default: 'admin' + rand + '@smis.com',
      type: String
    },
    schoolId: {
      default: 0,
      type: Number
    },
  },

  methods: {
    inviteUser: function (e) {
      let inviteUserData = {
        email: this.email,
        school_id: this.schoolId
      }

      let url = api.getRequestUrl('userInvite')
      console.log('Invite', url, inviteUserData);
      axios.post(url, inviteUserData)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              toastNotify.success(this.$notifications, `<span>用户 <b>` + this.email + `</b> 邀请成功</span>`)
            } else {
              this.$notifications.notify({
                message: `<span>用户 <b>` + this.email + `</b> 邀请失败</span>`,
                icon: 'nc-icon nc-app',
                type: 'warning'
              })
            }
          })
          .catch((error) => {
            console.log('Invite request error', error)
            toastNotify.danger(this.$notifications, `<span>邀请 <b>` +  this.email + `</b> 失败</span>`)
          });
    }
  }
}
</script>

<style>

</style>