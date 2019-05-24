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
      <div class="col-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li>
              <a href="#detail" data-toggle="tab" class="active" aria-expanded="true">Class Detail</a>
            </li>
            <li>
              <a href="#additionalDetail" data-toggle="tab" class aria-expanded="false">Trainers</a>
            </li>
            <li>
              <a href="#bookings" data-toggle="tab" class aria-expanded="false">Bookings</a>
            </li>
            <li>
              <a href="#gdpr" data-toggle="tab" class aria-expanded="false">Learners</a>
            </li>
            <li>
              <a href="#courses" data-toggle="tab" class aria-expanded="false">Course</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="detail" aria-expanded="false">
                <ClassDetail :courseClass="courseClass" ></ClassDetail>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ClassDetail from "./ClassDetail";

export default {
  props: ["class_id"],

  data() {
    return {
      isLoaded: false,
      courseClass: '',
    };
  },
  components:{
      ClassDetail
  },

  mounted() {
    console.log("Logged");
    // console.log(this.getClass());
  },
  created() {
      this.getClass()
  },
  methods: {
    getClass() {
      this.isLoaded = false;
      axios.get("/api/classEvents/" + this.class_id).then(response => {
        this.courseClass = response.data;
        this.isLoaded = true;
      });
    },
    
  }
};
</script>