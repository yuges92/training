<template>
  <div>
      <button class="btn btn-default  px-5 fa-2x" type="submit" v-if="showBtn">
        <i class="far fa-save "></i> Save
      </button>

      <button class="btn btn-success  px-5" type="button" disabled v-else>
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Saving...
      </button>
  </div>
</template>

<script>
export default {
  name: "SubmitButton",
  props: ['showBtn'],
  data() {
    return {};
  }
};
</script>