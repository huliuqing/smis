<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <user-school></user-school>
        </div>

        <div class="col-md-4">
          <user-card></user-card>
        </div>

      </div>
    </div>
  </div>
</template>
<script>
  import UserCard from './UserProfile/UserCard.vue'
  import UserSchool from './UserProfile/BrowserSchool.vue'

  export default {
    components: {
      UserSchool,
      UserCard
    }
  }

</script>
<style>

</style>