<template>
  <div>
    <div v-if="errors.length" class="text-danger">
      <b>Please correct the following error(s):</b>
      <ul>
        <li v-for="error in errors" :key="error">{{ error }}</li>
      </ul>
    </div>
    <form @submit.prevent="save" enctype="multipart/form-data">
      <div class="col-12 row mx-auto">
        <div class="box">
          <div class="box-body">
            <div class="form-group row">
              <label for="number" class="col-sm-2 col-form-label">Criteria Number:</label>
              <div class="col-sm-10">
                <input
                  name="number"
                  type="text"
                  class="form-control"
                  id="number"
                  placeholder="Criteria Number"
                  v-model="criteria.number"
                >
              </div>
            </div>

            <div class="form-group row">
              <label for="description" class="col-sm-2 col-form-label">Description:</label>
              <div class="col-sm-10">
                <textarea
                  id="description"
                  class="form-control"
                  name="description"
                  rows="4"
                  cols="80"
                  maxlength="600"
                  v-model="criteria.description"
                ></textarea>
              </div>
            </div>
            <div class="form-group d-flex justify-content-end mt-3">
              <SubmitButton :showBtn="showBtn"></SubmitButton>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import SubmitButton from "../SubmitButton";

export default {
  props: ["course"],
  data() {
    return {
      criteria: {
        number: "",
        description: ""
      },
      showBtn: true,
      errors: []
    };
  },
  methods: {
    save() {
      this.errors = [];
      this.showBtn = false;

      if (!this.criteria.number) {
        this.errors.push("Number required.");
      }
      if (!this.criteria.description) {
        this.errors.push("Description required.");
      }
      console.log(this.course);

      axios
        .post("/api/courses/" + this.course.id + "/assessmentCriterias", {
          number: this.criteria.number,
          description: this.criteria.description
        })
        .then(res => {
          Vue.toasted.show(
            '<i class="fas fa-check-circle fa-3x"></i> Course details updated',
            {
              type: "success",
              duration: 4000,
              className: "py-3"
            }
          );
          this.$emit('refresh');
          console.log(res);
        })
        .catch(err => {
          Vue.toasted.show(
            '<i class="fas fa-exclamation-circle"></i> Save Failed',
            {
              type: "error",
              duration: 4000,
              className: "py-3"
            }
          );
          console.error(err);
        })
        .then(res => {
          this.showBtn = true;
        });
    }
  },
  components: {
    SubmitButton
  }
};
</script>