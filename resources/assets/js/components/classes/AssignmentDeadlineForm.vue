<template>
  <div>
    <form @submit.prevent="updateDeadline()" enctype="multipart/form-data">
      <div class="col-12 row mx-auto">
        <div class="box">
          <div class="box-body">
            <div class="form-group row">
              <label for="title" class="col-sm-2 col-form-label">Assignment ID:</label>
              <div class="col-sm-10">
                <input
                  name="title"
                  type="text"
                  class="form-control"
                  id="title"
                  v-model="assignment.id"
                  placeholder="Title"
                  readonly
                />
              </div>
            </div>

            <div class="form-group row">
              <label for="title" class="col-sm-2 col-form-label">Assignment:</label>
              <div class="col-sm-10">
                <input
                  name="title"
                  type="text"
                  class="form-control"
                  id="title"
                  v-model="assignment.title"
                  placeholder="Title"
                  readonly
                />
              </div>
            </div>

            <div class="form-group row">
              <label for="title" class="col-sm-2 col-form-label">Assignment Type:</label>
              <div class="col-sm-10">
                <input
                  name="title"
                  type="text"
                  class="form-control"
                  id="title"
                  v-model="assignment.type"
                  placeholder="Title"
                  readonly
                />
              </div>
            </div>

            <div class="form-group row">
              <label for="deadlineDate" class="col-sm-2 col-form-label">Deadline Date:</label>
              <div class="col-sm-10">
                <input
                  name="deadlineDate"
                  type="date"
                  class="form-control"
                  id="deadlineDate"
                  v-model="assignment.deadline.date"
                  placeholder="Deadline Date"
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="deadlineDate" class="col-sm-2 col-form-label">Extended Deadline Date:</label>
              <div class="col-sm-10">
                <input
                  name="deadlineDate"
                  type="date"
                  class="form-control"
                  id="deadlineDate"
                  v-model="assignment.deadline.date"
                  placeholder="Deadline Date"
                />
              </div>
            </div>

            <div class="d-flex justify-content-end">
              <SubmitButton :showBtn="showBtn"></SubmitButton>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: ["courseClass", "assignment"],

  data() {
    return {
      course: {},
      showBtn: true
    };
  },
  mounted() {
    this.getDeadline();
    this.isLoaded = true;
  },
  methods: {
    getDeadline() {
      axios
        .get(
          `/api/classEvents/${this.courseClass.id}/assignments/${this.assignment.id}/deadline`
        )
        .then(response => {
          this.assignment.deadline = response.data;
          console.log(response.data.date);
        })
        .catch(err => {
          console.error(err);
          alert("Loaded Failed. Please reload the page");
        });
    },
    updateDeadline() {
      this.showBtn = false;
      axios
        .post(
          `/api/classEvents/${this.courseClass.id}/assignments/${this.assignment.id}/deadline`,
          {
            date: this.assignment.deadline.date
          }
        )
        .then(res => {
          this.alertSuccess("Question Added");

          //   console.log(res);
        })
        .catch(err => {
          this.alertFailed("Failed to add");

          console.error(err);
        })
        .then(() => {
          this.showBtn = true;
        });
    }
  },
  components: {}
};
</script>
