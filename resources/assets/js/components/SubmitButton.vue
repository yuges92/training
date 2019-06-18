<template>
  <div>
    <div class="form-group row float-right mt-3 p-3">
      <button class="btn btn-success rounded px-5" type="submit" v-if="showBtn">
        <i class="far fa-save"></i> Save
      </button>

      <button class="btn btn-primary rounded px-5" type="button" disabled v-else>
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Saving...
      </button>
    </div>
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