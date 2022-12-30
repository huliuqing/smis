<template>
  <div class="notifications">
    <transition-group :name="transitionName"
                      :mode="transitionMode">
      <notification
          v-for="notification in notifications"
          v-bind="notification"
          :clickHandler="notification.onClick"
          :key="notification.timestamp.getTime()"
          @close="removeNotification">
      </notification>
    </transition-group>
  </div>
</template>

<script>
import Notification from './Notification.vue';

export default {
  name: 'notifications',
  components: {
    Notification
  },
  props: {
    transitionName: {
      type: String,
      default: 'list'
    },
    transitionMode: {
      type: String,
      default: 'in-out'
    },
    overlap: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      // notifications: this.$notifications.state
      notifications: this.$notifications.state
    };
  },
  methods: {
    removeNotification(timestamp) {
      this.$notifications.removeNotification(timestamp);
    }
  },
  created() {
    this.$notifications.settings.overlap = this.overlap;
  },
  watch: {
    overlap: function (newVal) {
      this.$notifications.settings.overlap = newVal;
    }
  }
};
</script>

<style>
  .notifications .list-move {
    transition: transform 0.3s, opacity 0.4s;
  }

  .notifications .list-item {
    display: inline-block;
    margin-right: 10px;
  }

  .notifications .list-enter-active {
    transition: transform 0.2s ease-in, opacity 0.4s ease-in;
  }

  .notifications .list-leave-active {
    transition: transform 1s ease-out, opacity 0.4s ease-out;
  }

  .notifications .list-enter {
    opacity: 0;
    transform: scale(1.1);
  }

  .notifications .list-leave-to {
    opacity: 0;
    transform: scale(1.2, 0.7);
  }

</style>
