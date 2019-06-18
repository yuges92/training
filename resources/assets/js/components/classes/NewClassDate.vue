<template>
  <div>
    <form @submit.prevent="createClassDate()" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <h2>New Date:</h2>
        </div>
        <div class="card-body">

          <div class="col">
            <label :for="day+'StartDate'" class="col col-form-label">Day</label>
            <div class="col">
              <input
                name="day"
                type="number"
                class="form-control"
                :id="day+'StartDate'"
                placeholder="Day"
                v-model="classDate.day"
              >
            </div>
          </div>

          <div class="col">
            <label :for="day+'StartDate'" class="col col-form-label">Date</label>
            <div class="col">
              <input
                name="date"
                type="date"
                class="form-control"
                :id="day+'StartDate'"
                placeholder="Date"
                v-model="classDate.date"
              >
            </div>
          </div>

          <div class="col">
            <label :for="day+'StartTime'" class="col col-form-label">Start Time</label>
            <div class="col">
              <input
                name="course_code"
                type="time"
                class="form-control"
                :id="day+'StartTime'"
                placeholder="Course Code"
                v-model="classDate.startTime"
              >
            </div>
          </div>

          <div class="col">
            <label :for="day+'EndTime'" class="col col-form-label">End Time</label>
            <div class="col text-">
              <input
                name="course_code"
                type="time"
                class="form-control"
                :id="day+'EndTime'"
                placeholder="Course Code"
                v-model="classDate.endTime"
              >
            </div>
          </div>
          <div class="mr-md-5">
            <SubmitButton :showBtn="showBtn"></SubmitButton>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: ["day", "class_id"],

  data() {
    return {
      classDate: {
        day: "",
        date: "",
        startTime: "",
        endTime: ""
      },
      showBtn: true
    };
  },
  methods: {
    createClassDate() {
      this.showBtn = false;
      let url = "/api/classEvents/" + this.class_id + "/classDates";

      axios
        .post(url, {
          class_id: this.class_id,
          day: this.classDate.day,
          date: this.classDate.date,
          startTime: this.classDate.startTime,
          endTime: this.classDate.endTime
        })
        .then(data => {
          Vue.toasted.show('<i class="fas fa-check-circle fa-3x"></i> Saved!', {
            type: "success",
            duration: 4000,
            className: "py-3"
          });
          this.$parent.getClassDates();
          // this.$parent.showNewClass=false;
        })
        .catch(error => {
          this.$parent.$emit("update-errors", error.response.data.errors);
          // console.log(error.response.data.errors);

          Vue.toasted.show('<i class="fas fa-exclamation-circle"></i> Failed', {
            type: "error",
            duration: 4000,
            className: "py-3"
          });
        })
        .then(response => {
          this.showBtn = true;
        });
    }
  }
};
</script>