<template>
    <li class="dropdown" v-if="notifications.length" >
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-bell" style="color:white"><span class=" dropdown message-count" ></span></i>
        </a>

        <ul class="dropdown-menu">
            <li v-for="notification in notifications" :key="notification.id">
                <a :href="notification.data.link"
                   v-text="notification.data.message"
                   @click.prevent="markAsRead(notification)"
                ></a>
            </li>
        </ul>
    </li>
     <li class="dropdown" v-else>
 <a href="#" class="dropdown-complete" data-toggle="dropdown" style="color: white;" >
        <i class="glyphicon glyphicon-bell" aria-hidden="true"></i> 
        
    </a>
        
 </li>
</template>

<script>
export default {
  data() {
    return { notifications: false };
  },
  created() {
    this.fetchNotifications();
  },
  methods: {
    fetchNotifications() {
      axios
        .get("/profiles/" + window.App.user.name + "/notifications")
        .then(response => (this.notifications = response.data));
    },
    markAsRead(notification) {
      axios
        .delete(
          "/profiles/" +
            window.App.user.name +
            "/notifications/" +
            notification.id
        )
        .then(response => {
          this.fetchNotifications();
          document.location.replace(response.data.link);
        });
    }
  }
};
</script>