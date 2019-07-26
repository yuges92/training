<template>
  <div>
    <div class="alert alert-danger alert-dismissible fade show" v-if="errors!=''">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <div class v-for="error in errors" v-bind:key="error.id">
        <span>{{error}}</span>
      </div>
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
                />
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
  props: ["criteria"],
  data() {
    return {
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
      //   console.log(this.course);

      axios
        .put(
          "/api/courses/" +
            this.criteria.course_id +
            "/assessmentCriterias/" +
            this.criteria.id,
          {
            number: this.criteria.number,
            description: this.criteria.description
          }
        )
        .then(res => {
          this.alertSuccess("Question Updated");
          this.$parent.showEditCriteria = false;
          this.$emit("refresh");
          //   console.log(res);
        })
        .catch(err => {
          this.alertFailed("Failed to update");
          this.errors = err.response.data.errors;

          console.error(err);
          console.error(err.response.data.errors);
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
