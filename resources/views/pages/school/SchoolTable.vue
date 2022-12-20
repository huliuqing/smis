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

        <td v-if="hasNotFollow(item)">
          <button type="button" class="btn btn-success btn-xs btn-fill float-right" v-tooltip.top-center="joinTooltip"
                  @click.prevent="joinSchool(item)">
            JOIN
          </button>
        </td>
        <td v-else>
          <button type="button" class="btn disabled btn-xs btn-fill float-right" v-tooltip.top-center="hasJoinTooltip">
            JOIN
          </button>
        </td>

      </slot>
    </tr>
    </tbody>

  </table>
</template>

<script>
import notify from "../../../assets/js/utils/notify";
import api from "../../../assets/js/const/api";

export default {
  name: 'l-table',
  props: {

    columns: Array,
    data: Array
  },
  data() {
    return {
      joinTooltip: '加入学校',
      hasJoinTooltip: '已加入',
    }
  },
  methods: {
    hasValue(item, column) {
      return item[column.toLowerCase()] !== 'undefined'
    },
    hasNotFollow(item) {
      return item['with_login_users'].length <= 0
    },

    joinSchool(item) {
      let joinSchool = {
        school_id: item.id,
      }

      let url = api.getRequestUrl('schoolJoin')
      console.log('request url', url, joinSchool);
      axios.post(url, joinSchool)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              notify.success(this.$notifications, '学校 <b>' + item.name + '</b> 加入成功')
            } else {
              alert(error);
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '学校 <b>' + item.name + '</b> 加入失败')
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
