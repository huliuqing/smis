<template>
</template>

<script>

import api from "../../../assets/js/const/api";
import notify from "../../../assets/js/utils/notify";
import auth from "../../../assets/js/auth";

export default {
  data() {
    return {}
  },
  created() {
    auth.line.callback(this)
  },

  methods: {
    callback: function () {
      let code = this.$route.query.code
      let url = api.getRequestUrl('lineCallback')
      console.log('[LineCallback::bindOrLogin] line logic bind line or login:', url + '?code=' + code);
      axios.get(url + '?code=' + code)
          .then((response) => {
            if (response.status === 200) {
              this.$router.push('/smis/user')
              notify.success(this.$notifications, '用户绑定成功')
            } else {
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, error);
          });

      return []
    },
  }
}
</script>
<style>
</style>
