<template>
  <div>
    <div v-if="!isLoaded">
      <div class="d-flex justify-content-center">
        <div class="spinner-border text-info" style="width: 3rem; height: 3rem;" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>

    <div v-else>
      <div v-for="assignment in course.assignments" :key="assignment.id">
       <AssignmentDeadlineForm :courseClass="courseClass" :assignment="assignment"></AssignmentDeadlineForm>

      </div>
    </div>
  </div>
</template>

<script>
import AssignmentDeadlineForm from './AssignmentDeadlineForm';
export default {
  props: ["courseClass"],

  data() {
    return {
      isLoaded: false,
      course: {}
    };
  },
  mounted() {
    this.getCourse();
    this.isLoaded = true;
  },
  methods: {
    getCourse() {
      axios
        .get("/api/courses/" + this.courseClass.course_id)
        .then(response => {
          this.course = response.data;
          // console.log(response.data);
        })
        .catch(err => {
          console.error(err);
          alert("Loaded Failed. Please reload the page");
        });
    }
  },
  components: {
      AssignmentDeadlineForm
  }
};
</script>
