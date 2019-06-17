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
      <div class="row mx-md-5" v-if="showNewClass">
        <div class="col-md-4 my-3">
          <NewClassDate :class_id="courseClass.id"></NewClassDate>
        </div>
      </div>
      <form @submit.prevent="updateClass()" enctype="multipart/form-data">
        <div class="col-12 row mx-auto">
          <div class="col-md-8">
            <div class="box">
              <div class="box-body">
                <div class="form-group row">
                  <label for="course_id" class="col-sm-2 col-form-label">Course:</label>
                  <div class="col-sm-10">
                    <select
                      class="form-control"
                      name="course_id"
                      id="course_id"
                      v-model="courseClass.course_id"
                    >
                      <option value>Please select a course type</option>
                      <option
                        v-for="course in courses"
                        v-bind:key="course.id"
                        :value="course.id"
                      >{{course.title}}</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="address" class="col-sm-2 col-form-label">Address:</label>
                  <div class="col-sm-10">
                    <select
                      class="form-control"
                      name="address"
                      id="address"
                      v-model="courseClass.address_id"
                    >
                      <option value>Please select a course type</option>
                      <option
                        v-for="address in addresses"
                        v-bind:key="address.id"
                        :value="address.id"
                      >{{address.fullAddress}}</option>
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
                      v-model="courseClass.title"
                      placeholder="Title"
                    >
                  </div>
                </div>

                <div class="form-group row">
                  <label
                    for="description"
                    class="col-sm-2 col-form-label"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Add course type description eg: "
                  >Short Description:</label>
                  <div class="col-sm-10">
                    <textarea
                      id="description"
                      class="form-control"
                      name="description"
                      rows="14"
                      cols="80"
                      maxlength="300"
                      v-model="courseClass.description"
                    ></textarea>
                        <p>You have {{charactersRemaining}} characters remaining.</p>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 fixed">
            <div class="box">
              <div class="box-header">
                <h2>Settings</h2>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="status" class="col col-form-label">Publish:</label>
                  <div class="col">
                    <select
                      class="form-control"
                      name="status"
                      id="status"
                      v-model="courseClass.type"
                    >
                      <option value="public">Public</option>
                      <option value="draft">Draft</option>
                      <option value="private">private</option>
                    </select>
                  </div>
                </div>

                <!-- <div class="form-group">
                  <label for="title" class="col col-form-label">No of Days:</label>
                  <div class="col">
                    <input
                      name="title"
                      type="number"
                      class="form-control"
                      id="title"
                      min="1"
                      max="5"
                      v-model="courseClass.duration"
                      placeholder="Title"
                    >
                  </div>
                </div>-->

                <div class="form-group">
                  <label for="price" class="col col-form-label">Price:</label>
                  <div class="col">
                    <input
                      name="price"
                      type="number"
                      class="form-control"
                      id="price"
                      v-model="courseClass.price"
                      placeholder="Price"
                    >
                  </div>
                </div>

                <div class="form-group">
                  <label for="space" class="col col-form-label">Allocated Space:</label>
                  <div class="col">
                    <input
                      name="space"
                      type="number"
                      class="form-control"
                      id="space"
                      v-model="courseClass.space"
                      placeholder="Allocated Space"
                    >
                  </div>
                </div>

                <div class="form-group">
                  <label for="availableSpace" class="col col-form-label">Remaining Space:</label>
                  <div class="col">
                    <input
                      name="availableSpace"
                      type="number"
                      class="form-control"
                      id="availableSpace"
                      v-model="courseClass.availableSpace"
                      placeholder="Remaining Space"
                    >
                  </div>
                </div>
              </div>
              <SubmitButton :showBtn="showBtn"></SubmitButton>
            </div>
          </div>
        </div>
      </form>

      <!-- <div class="row mx-md-5">
        <div class="col-md-4 my-3" v-for="index in duration" :key="index">
          <NewClassDate :day="index" :class_id="courseClass.id"></NewClassDate>
        </div>
      </div>-->
    </div>
  </div>
</template>

<script>
export default {
  props: ["courseClass"],
  data() {
    return {
      showBtn: true,
      addresses: [],
      courses: [],
      duration: this.courseClass.duration,
      isLoaded: false,
      activeButtons: [],
      showNewClass: false,
      newClassDates: [],
      maxCharacters:300,
    };
  },
  created() {
    // this.changeDuration();
    this.getCourses();
    this.getClassAddress();
    // console.log(this.courseClass.class_dates);
  },
  mounted() {},
  methods: {
    updateClass() {
      this.$emit("update-errors", null);

      this.showBtn = false;
      let url = "/api/classEvents/" + this.courseClass.id;

      axios
        .patch(url, {
          course_id: this.courseClass.course_id,
          address_id: this.courseClass.address_id,
          type: this.courseClass.type,
          title: this.courseClass.title,
          description: this.courseClass.description,
          // duration: this.courseClass.duration,
          price: this.courseClass.price,
          space: this.courseClass.space,
          availableSpace: this.courseClass.availableSpace
        })
        .then(data => {
          Vue.toasted.show(
            '<i class="fas fa-check-circle fa-3x"></i> Class details updated',
            {
              type: "success",
              duration: 4000,
              className: "py-3"
            }
          );
        })
        .catch(error => {
          this.$emit("update-errors", error.response.data.errors);
          // console.log(error.response.data.errors);

          Vue.toasted.show(
            '<i class="fas fa-exclamation-circle"></i> Update Failed',
            {
              type: "error",
              duration: 4000,
              className: "py-3"
            }
          );
        })
        .then(response => {
          this.showBtn = true;
        });
    },
    getCourses() {
      axios.get("/api/courses/").then(response => {
        this.courses = response.data;
        this.isLoaded = true;
      });
    },
    getClassDates() {
      // let url = "/api/classEvents/" + this.class_id + "/classDates";

      axios
        .get("/api/classEvents/" + this.class_id + "/classDates")
        .then(response => {
          this.courseClass.class_dates = response.data;
          this.isLoaded = true;
          // console.log(response.data);
        });
    },

    getClassAddress() {
      axios.get("/api/classAddresses").then(response => {
        this.addresses = response.data;
        // console.log(response.data);
      });
    },
    showNewClassForm() {
      this.showNewClass = true;
    },
    hideNewClassForm() {
      this.showNewClass = false;
    }
  },
  components: {
    // SubmitButton,
    // ShowClassDate
  },
  computed: {
    charactersRemaining: function() {
      return this.maxCharacters - this.courseClass.description.length;
    }
  }
};
</script>