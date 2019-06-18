<template>
  <div>
    <form @submit.prevent="updateClassDate()" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <h2>Day:{{classDate.day}}</h2>
            <div class="btn-group">
              <button
                type="button"
                class="btn dropdown-toggle btn-flat"
                data-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fas fa-ellipsis-v"></i>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div
                class="dropdown-menu"
                x-placement="bottom-start"
                style="position: absolute; transform: translate3d(57px, 29px, 0px); top: 0px; left: 0px; will-change: transform;"
              >
                <button @click="deleteClassDate()" type="button" class="dropdown-item">Delete</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="col">
            <label for="StartDate" class="col col-form-label">Day</label>
            <div class="col">
              <input
                name="day"
                type="number"
                class="form-control"
                id="StartDate"
                placeholder="Day"
                v-model="classDate.day"
              >
            </div>
          </div>

          <div class="col">
            <label for="StartDate" class="col col-form-label">Date</label>
            <div class="col">
              <input
                name="date"
                type="date"
                class="form-control"
                id="StartDate"
                placeholder="Date"
                v-model="classDate.date"
              >
            </div>
          </div>

          <div class="col">
            <label for="StartTime" class="col col-form-label">Start Time</label>
            <div class="col">
              <input
                name="course_code"
                type="time"
                class="form-control"
                id="StartTime"
                placeholder="Course Code"
                v-model="classDate.startTime"
              >
            </div>
          </div>

          <div class="col">
            <label for="EndTime" class="col col-form-label">End Time</label>
            <div class="col text-">
              <input
                name="course_code"
                type="time"
                class="form-control"
                id="EndTime"
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
  props: ["classDate"],

  data() {
    return {
      showBtn: true
    };
  },
  methods: {
    updateClassDate() {
      this.showBtn = false;
      let url =
        "/api/classEvents/" +
        this.classDate.class_id +
        "/classDates/" +
        this.classDate.id;

      axios
        .put(url, {
          class_id: this.classDate.class_id,
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
    },

    deleteClassDate() {
      this.$swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.value) {
          axios
            .delete(
              "/api/classEvents/" +
                this.classDate.class_id +
                "/classDates/" +
                this.classDate.id
            )
            .then(res => {
          this.$parent.getClassDates();

              Vue.toasted.show(
                '<i class="fas fa-check-circle fa-3x"></i> Deleted!',
                {
                  type: "success",
                  duration: 4000,
                  className: "py-3"
                }
              );
            })
            .catch(err => {
              Vue.toasted.show(
                '<i class="fas fa-exclamation-circle"></i> Failed',
                {
                  type: "error",
                  duration: 4000,
                  className: "py-3"
                }
              );
              console.log(err);
              
            });
        }
      });
    }
  }
};
</script>