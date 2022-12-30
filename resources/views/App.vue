<template>
  <div :class="{'nav-open': $sidebar.showSidebar}">
    <notifications></notifications>
    <router-view></router-view>
  </div>
</template>

<script>
  export default {}
</script>

<style>
  .vue-notifyjs.notifications .list-move {
    transition: transform 0.3s, opacity 0.4s;
  }

  .vue-notifyjs.notifications .list-item {
    display: inline-block;
    margin-right: 10px;
  }

  .vue-notifyjs.notifications .list-enter-active {
    transition: transform 0.2s ease-in, opacity 0.4s ease-in;
  }

  .vue-notifyjs.notifications .list-leave-active {
    transition: transform 1s ease-out, opacity 0.4s ease-out;
  }

  .vue-notifyjs.notifications .list-enter {
    opacity: 0;
    transform: scale(1.1);
  }

  .vue-notifyjs.notifications .list-leave-to {
    opacity: 0;
    transform: scale(1.2, 0.7);
  }

</style>
