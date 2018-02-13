<template>
<div class="reply shadow">
<div>
    <div v-if="!signedIn">
   <p class="text-center">   Please
                <a href="/login">sign in</a> to participate in this discussion
      </p> 
               
                
    </div>

           <div class="text-center" v-else-if="!confirmed">
            To participate in this thread, please check your email and confirm your account.
        </div>
             <div  v-else>
 <div class="form-group">
                   <wysiwyg name="body" v-model="body" placeholder="Have something to say?" :shouldClear="completed"></wysiwyg>
                   
               </div>
               <button type="submit" @click="addReply" class="btn shadow btn-default ">POST</button>
             </div>
         
</div>
</div>
</template>


<script>
import Reply from "./Reply.vue";

export default {
  data() {
    return {
      body: "",
      completed: false
    };
  },
  computed: {
    confirmed() {
      return window.App.user.confirmed;
    }
  },
  mounted() {
    $("#body").atwho({
      at: "@",
      delay: 2000,
      callbacks: {
        remoteFilter: function(query, callback) {
          $.getJSON("/api/users", { name: query }, function(usernames) {
            callback(usernames);
          });
        }
      }
    });
  },
  methods: {
    addReply() {
      axios
        .post(location.pathname + "/replies", { body: this.body })
        .catch(error => {
          flash(error.response.data, "danger");
        })
        .then(({ data }) => {
          this.body = "";
          this.completed = true;
          flash("Your reply has been posted.");
          this.$emit("created", data);
        });
    }
  }
};
</script>
<style scoped>
.reply {
  background-color: white;
  padding: 15px;
  border: 1px solid #e3e0e0;
  border-radius: 5px;
}
</style>
