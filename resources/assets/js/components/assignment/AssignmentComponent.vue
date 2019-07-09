<template>
  <div>
    <Error :errors="errors" v-if="errors"></Error>

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
              <a href="#detail" data-toggle="tab" class="active" aria-expanded="true">Detail</a>
            </li>
            <li>
              <a href="#questions" data-toggle="tab" class aria-expanded="false">Questions</a>
            </li>
            <li>
              <a href="#trainers" data-toggle="tab" class aria-expanded="false">Settings</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="detail" aria-expanded="false">
              <!-- <ClassDetail :courseClass="courseClass" @update-errors="updateErrors"></ClassDetail> -->
              <AssignmentEdit :assignment="assignment"></AssignmentEdit>
            </div>

            <div class="tab-pane" id="questions" aria-expanded="false">
              <Questions :assignment="assignment" :criterias="criterias"></Questions>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Error from "../Error";
import AssignmentEdit from "./AssignmentEdit";
import Questions from "./Questions";

import SubmitButton from "../SubmitButton";
Vue.component("SubmitButton", SubmitButton);

export default {
  props: ["assignment_id", "course_id"],

  data() {
    return {
      isLoaded: 0,
      assignment: {},
      criterias: [],
      errors: null,
      showError: false
    };
  },
  components: {
    AssignmentEdit,
    Questions
  },

  mounted() {
    // console.log(this.getClass());
  },
  created() {
    this.getAssignments();
    this.getCriterias();
  },
  methods: {
    getAssignments() {
      axios
        .get(
          "/api/courses/" +
            this.course_id +
            "/assignments/" +
            this.assignment_id
        )
        .then(res => {
          this.assignment = res.data;
          //   console.log(this.assignment);
          this.isLoaded = 1;
        })
        .catch(err => {
          console.error(err);
        });
    },
    getCriterias() {
      axios
        .get("/api/courses/" + this.course_id + "/assessmentCriterias")
        .then(res => {
          this.criterias = res.data;
          // console.log(this.criterias);
        })
        .catch(err => {
          console.error(err);
        });
    },
    updateErrors(errors) {
      this.errors = errors;
    }
  }
};
</script>