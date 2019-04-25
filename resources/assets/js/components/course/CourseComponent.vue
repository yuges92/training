<template>
  <div>
    <div class="col-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li>
            <a
              v-on:click="(showtab())"
              href="#detail"
              data-toggle="tab"
              class="active"
              aria-expanded="true"
            >Course Detail</a>
          </li>
          <li>
            <a href="#content" data-toggle="tab" class aria-expanded="false">Course Content</a>
          </li>
          <li>
            <a href="#assignments" data-toggle="tab" class aria-expanded="false">Assignments</a>
          </li>
          <li>
            <a href="#classes" data-toggle="tab" class aria-expanded="false">Classes</a>
          </li>
                    <li>
            <a href="#classes" data-toggle="tab" class aria-expanded="false">Documents</a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="detail" aria-expanded="false">
            <CourseDetail :course="course" :courseTypes="courseTypes"></CourseDetail>
          </div>

          <div class="tab-pane" id="content" aria-expanded="false">
            <CourseBodies :course="course" :courseTypes="courseTypes"></CourseBodies>

          </div>

          <div class="tab-pane" id="assignments" aria-expanded="false">

          </div>

          <div class="tab-pane" id="classes" aria-expanded="false">
            <Classes :course="course" :courseTypes="courseTypes"></Classes>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import CourseDetail from "./CourseDetail";
import CourseBodies from "./CourseBodies";
import Classes from "./Classes";

export default {
  name: "course",
  components: {
    CourseDetail,
    CourseBodies,
    Classes
  },
  data() {
    return {
      courseTypes: [],
      courses: [],
      course: ""
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  created() {
    this.getCourse();
    this.getCourses();
    this.getCourseTypes();
  },
  methods: {
    getCourse() {
      fetch("/api/courses/1")
        .then(res => res.json())
        .then(res => {
          this.course = res;
        });
    },
    getCourses() {
      fetch("/api/courses")
        .then(res => res.json())
        .then(res => {
          console.log(res);

          this.courses = res;
        });
    },
    getCourseTypes() {
      fetch("/api/courseTypes")
        .then(res => res.json())
        .then(res => {
          console.log(res);

          this.courseTypes = res;
        });
    },
    refresh() {
      this.getCourse();
      this.getCourses();
      this.getCourseTypes();
    },
    showtab() {
      this.refresh();
    }
  }
};
</script>