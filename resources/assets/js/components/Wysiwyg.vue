<template>
  <div >
  <input id="trix" type="hidden" :name="name" :value="value">
  <trix-editor id="body" ref="trix" input="trix" :placeholder="placeholder"></trix-editor>
  </div>
</template>
<script>
import Trix from "trix";
import "at.js";
import "jquery.caret";

export default {
  props: ["name", "value", "placeholder", "shouldClear"],

  mounted() {
    this.$refs.trix.addEventListener("trix-change", e => {
      this.$emit("input", e.target.innerHTML);
    });

    this.$watch("shouldClear", () => {
      this.$refs.trix.value = "";
    });
  }
};
</script>
<style scoped>
trix-editor {
  min-height: 100px;
}
</style>
