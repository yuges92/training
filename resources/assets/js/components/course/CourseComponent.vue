<template>
  <div>
    <div v-if="loader">
      <div class="d-flex justify-content-center">
        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
    <div class="col-12" v-else>
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li>
            <a
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
            <a href="#documents" data-toggle="tab" class aria-expanded="false">Documents</a>
          </li>
          <li>
            <a href="#classes" data-toggle="tab" class aria-expanded="false">Classes</a>
          </li>
          <li>
            <a href="#assignments" data-toggle="tab" class aria-expanded="false">Assignments</a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="detail" aria-expanded="false">
            <CourseDetail @updatedata="updatedataArray" :course="course" :courseTypes="courseTypes"></CourseDetail>
          </div>

          <div class="tab-pane" id="content" aria-expanded="false">
            <CourseBodies :course="course" @refresh="refresh"></CourseBodies>
          </div>


          <div class="tab-pane" id="classes" aria-expanded="false">
            <Classes :course="course"></Classes>
          </div>

          <div class="tab-pane" id="documents" aria-expanded="false">
            <CourseDocuments :course="course"></CourseDocuments>
          </div>

          <div class="tab-pane" id="assignments" aria-expanded="false">

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
import CourseDocuments from "./CourseDocuments";

export default {
  name: "course",
  components: {
    CourseDetail,
    CourseBodies,
    Classes,
    CourseDocuments
  },
  props:['course_id'],
  data() {
    return {
      courseTypes: [],
      courses: [],
      course: "",
      loader: true
    };
  },
  mounted() {
    // console.log("Component mounted.");
  },
  created() {
    this.getCourse();
    this.getCourses();
    this.getCourseTypes();
  },
  methods: {
    getCourse() {
      axios.get("/api/courses/"+this.course_id).then(response => {
        this.course=response.data;
        // console.log(response.data);
      });
    },
    getCourses() {
      axios.get("/api/courses").then(response => {
        this.courses=response.data;
      });

    },
    getCourseTypes() {
            axios.get("/api/courseTypes").then(response => {
        this.courseTypes=response.data;
        // console.log(response.data);
      });

    },
    refresh() {
      this.getCourse();
      this.getCourses();
      this.getCourseTypes();
    },
    showtab() {
      this.refresh();
    },
    updatedataArray(val) {
      this.course.description = "sssssss sdfsdf sdf sdf d";
    }
  },
  mounted() {
    this.loader = false;
  }
};
</script>