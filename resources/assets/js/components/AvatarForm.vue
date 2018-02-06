<template>
<div>
  <div class="level">
				<img :src="avatar" width="100" height="100" style="margin-right:10px; border-radius:50px"> 
    <h1>
{{uppercase(user.name)}}
<!-- <span  style="font-size:19px">{{user.reputation }}</span> -->
<small  style="color:#ef6733; font-size:20px; font-weight:600" v-text="reputation"> EXPERIENCE</small>
    </h1> 
  </div>                   
                <form v-if="canUpdate" method="post" enctype="multipart/form-data">
<image-upload name="avatar" class='mr-1' @loaded="onLoad">

</image-upload>

				</form>
				
            
</div>
</template>
<script>
import ImageUpload from "./ImageUpload.vue";
export default {
  props: ["user"],
  components: { ImageUpload },
  data() {
    return {
      avatar: this.user.avatar_path
    };
  },
  computed: {
    canUpdate() {
      return this.authorize(user => this.user.id === user.id);
    },
    reputation() {
      return "(" + this.user.reputation + " XP)";
    }
  },
  created() {},
  methods: {
    uppercase: function(v) {
      return v.toUpperCase();
    },
    onLoad(avatar) {
      this.avatar = avatar.src;
      this.persist(avatar.file);
    },
    persist(avatar) {
      let data = new FormData();
      data.append("avatar", avatar);

      axios
        .post("/api/users/${this.user.name}/avatar", data)
        .then(() => flash("Avatar uploaded!"));
    }
  }
};
</script>
