<template>
  <div>
    <Error :errors="errors" v-if="errors!=''"></Error>

    <div v-if="!isLoaded">
      <div class="d-flex justify-content-center">
        <div class="spinner-border text-info" style="width: 3rem; height: 3rem;" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
    <div v-else>
      <div class="col-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li>
              <a href="#detail" data-toggle="tab" class="active" aria-expanded="true">Class Detail</a>
            </li>
            <li>
              <a href="#classDates" data-toggle="tab" class aria-expanded="false">Class Dates</a>
            </li>
            <li>
              <a href="#trainers" data-toggle="tab" class aria-expanded="false">Trainers</a>
            </li>


            <li>
              <a href="#deadline" data-toggle="tab" class aria-expanded="false">Assignment Deadline</a>
            </li>
            <li>
              <a href="#learners" data-toggle="tab" class aria-expanded="false">Learners</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="detail" aria-expanded="false">
              <ClassDetail :courseClass="courseClass" @update-errors="updateErrors"></ClassDetail>
            </div>

            <div class="tab-pane" id="classDates" aria-expanded="false">
              <ClassDates :courseClass="courseClass" @update-errors="updateErrors"></ClassDates>
            </div>

            <div class="tab-pane" id="trainers" aria-expanded="false">
              <ClassTrainers :courseClass="courseClass" @update-errors="updateErrors"></ClassTrainers>
            </div>

            <div class="tab-pane" id="deadline" aria-expanded="false">
              <AssignmentDeadline :courseClass="courseClass" @update-errors="updateErrors"></AssignmentDeadline>

            </div>

            <div class="tab-pane" id="learners" aria-expanded="false">Learners</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AssignmentDeadline from "./AssignmentDeadline";
import ClassDetail from "./ClassDetail";
import ClassTrainers from "./ClassTrainers";
import ClassDates from "./ClassDates";
import Error from "../Error";
import SubmitButton from "../SubmitButton";
Vue.component("SubmitButton", SubmitButton);

export default {
  props: ["class_id"],

  data() {
    return {
      isLoaded: false,
      courseClass: "",
      errors: null,
      showError: false
    };
  },
  components: {
    ClassDetail,
    Error,
    ClassTrainers,
    ClassDates,
    AssignmentDeadline
  },

  mounted() {
    // console.log(this.getClass());
  },
  created() {
    this.getClass();
  },
  methods: {
    getClass() {
      this.isLoaded = false;
      axios.get("/api/classEvents/" + this.class_id).then(response => {
        this.courseClass = response.data;
        this.isLoaded = true;
        // console.log(this.courseClass);
      });
    },

    updateErrors(errors) {
      this.errors = errors;
    }
  }
};
</script>
