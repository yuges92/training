<template>
  <div>
    <button @click="deleteMethod" v-if="isDeleting" class="btn btn-danger">Remove</button>
    <button v-else class="btn btn-danger" disabled>
      <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
      Deleting...
    </button>
  </div>
</template>

<script>
export default {
  name: "SubmitButton",
  props: ["isDeleting"],
  data() {
    return {};
  },
  methods:{
      deleteMethod(){
          this.$emit('delete');
      }
  }
};
</script>