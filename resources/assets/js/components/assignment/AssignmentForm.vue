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
              <label for="number" class="col-sm-2 col-form-label">Assignment Type:</label>
              <div class="col-sm-10">
                <select
                  class="form-control"
                  name="status"
                  id="status"
                  v-model="assignment.type"
                  required
                >
                  <option value="pre">Pre Course</option>
                  <option value="onSite">On Site</option>
                  <option value="post">Post Course</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="title" class="col-sm-2 col-form-label">Title:</label>
              <div class="col-sm-10">
                <input
                  name="title"
                  type="text"
                  class="form-control"
                  id="title"
                  placeholder="Assignment Title"
                  v-model="assignment.title"
                  required
                />
              </div>
            </div>

            <div class="form-group row">
              <label for="description" class="col-sm-2 col-form-label">Short Description:</label>
              <div class="col-sm-10">
                <textarea
                  id="description"
                  class="form-control"
                  name="description"
                  rows="4"
                  cols="80"
                  maxlength="600"
                  v-model="assignment.description"
                ></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="description" class="col-sm-2 col-form-label">Introduction:</label>
              <div class="col-sm-10">
                <textarea
                  id="description"
                  class="form-control"
                  name="description"
                  rows="4"
                  cols="100"
                  v-model="assignment.introduction"
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
  props: ["course_id"],
  data() {
    return {
      assignment: {
        type: "",
        title: "",
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

      if (!this.assignment.type) {
        this.errors.push("Type required.");
      }
      if (!this.assignment.title) {
        this.errors.push("Title required.");
      }

      if (!this.assignment.description) {
        this.errors.push("Description required.");
      }
      //   console.log(this.course);

      axios
        .post("/api/courses/" + this.course_id + "/assignments", {
          type: this.assignment.type,
          title: this.assignment.title,
          description: this.assignment.description,
          introduction: this.assignment.introduction
        })
        .then(res => {
              this.alertSuccess("Saved");

          this.$emit("refresh");
          //   console.log(res);
        })
        .catch(err => {
              this.alertFailed("Failed");

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
