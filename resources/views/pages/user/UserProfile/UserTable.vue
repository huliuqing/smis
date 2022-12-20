<template>
  <table class="table">
    <thead>
    <slot name="columns">
      <tr>
        <th v-for="column in columns" :key="column">{{ column }}</th>
      </tr>
    </slot>
    </thead>

    <tbody>
    <tr v-for="(item, index) in data" :key="index">
      <slot :row="item">
        <td v-for="column in columns" :key="column" v-if="hasValue(item, column)">{{ itemValue(item, column) }}</td>

<!--        <td>-->
<!--          <button type="button" class="btn btn-success btn-xs btn-fill float-right" v-tooltip.top-center="followTooltip"-->
<!--                  @click.prevent="follow(item)">-->
<!--            关注-->
<!--          </button>-->

<!--          <button type="button" class="btn disabled btn-xs btn-fill float-right" v-tooltip.top-center="unfollowTooltip"-->
<!--                  @click="unfollow">-->
<!--            取关-->
<!--          </button>-->
<!--        </td>-->
        <td>
          <button type="button"
                  class="btn-simple btn btn-xs btn-info has-tooltip"
                  v-tooltip.top-center="followTooltip"
                  @click.prevent="follow(item)">
            <i class="fa fa-plus"></i>
          </button>

          <button type="button"
                  class="btn-simple btn btn-xs btn-danger has-tooltip"
                  v-tooltip.top-center="unfollowTooltip"
                  @click="unfollow(item)">
            <i class="fa fa-minus"></i>
          </button>
        </td>
      </slot>
    </tr>
    </tbody>

  </table>
</template>

<script>
import notify from "../../../../assets/js/utils/notify";
import api from "../../../../assets/js/const/api";

export default {
  name: 'l-table',
  props: {

    columns: Array,
    data: Array
  },
  data() {
    return {
      followTooltip: '关注用户',
      unfollowTooltip: '取消关注',
    }
  },
  methods: {
    hasValue(item, column) {
      return item[column.toLowerCase()] !== 'undefined'
    },

    follow(item) {
      let user = {
        id: item.id,
      }

      let url = api.getRequestUrl('follow') + item.id
      console.log('request url', url, user);
      axios.post(url, user)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              notify.success(this.$notifications, '关注用户 <b>' + item.name + '</b> 成功')
            } else {
              alert(error);
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '关注用户 <b>' + item.name + '</b> 失败')
          });
    },

    unfollow(item) {
      let user = {
        id: item.id,
      }

      let url = api.getRequestUrl('unfollow') + item.id
      console.log('request url', url, user);
      axios.delete(url, user)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              notify.success(this.$notifications, '取关用户 <b>' + item.name + '</b> 成功')
            } else {
              alert(error);
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '取关用户 <b>' + item.name + '</b> 失败')
          });
    },
    itemValue(item, column) {
      return item[column.toLowerCase()]
    }
  }
}
</script>
<style>
</style>
