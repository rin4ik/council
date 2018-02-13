<script>
import Replies from "../components/Replies.vue";
import SubscribeButton from "../components/SubscribeButton.vue";
export default {
  props: ["thread"],
  components: { Replies, SubscribeButton },
  data() {
    return {
      repliesCount: this.thread.replies_count,
      locked: this.thread.locked,
      editing: false,
      pinned: this.thread.pinned,
      form: { title: this.thread.title, body: this.thread.body }
    };
  },
  methods: {
    toggleLock() {
      axios[this.locked ? "delete" : "post"](
        "/locked-threads/" + this.thread.slug
      );
      this.locked = !this.locked;
    },
    toggleEdit() {
      this.editing = !this.editing;
    },
    togglePin() {
      const uri = `/pinned-threads/${this.thread.slug}`;
      axios[this.pinned ? "delete" : "post"](uri);
      this.pinned = !this.pinned;
    },
    cancel() {
      this.form.title = this.thread.title;
      this.form.body = this.thread.body;
      this.form = {
        title: this.thread.title,
        body: this.thread.body
      };
      this.editing = false;
    },
    update() {
      let uri = `/threads/${this.thread.channel.slug}/${this.thread.slug}`;
      axios
        .patch(uri, this.form)
        .catch(error => {
          flash(error.response.data, "danger");
        })
        .then(({ data }) => {
          this.editing = false;
          flash("Updated!!");
        });
    }
  }
};
</script>