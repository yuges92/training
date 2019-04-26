<template>
  <div>
    <div class v-if="course">
      <div class>
        <form @submit.prevent="updateCourse()" enctype="multipart/form-data">
          <div class="col-12 row mx-auto">
            <div class="col-md-8">
              <div class="box">
                <div class="box-body">
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title:</label>
                    <div class="col-sm-10">
                      <input
                        name="title"
                        type="text"
                        class="form-control"
                        id="title"
                        v-model="course.title"
                        placeholder="Title"
                      >
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="course_code" class="col-sm-2 col-form-label">Course Code:</label>
                    <div class="col-sm-10">
                      <input
                        name="course_code"
                        type="text"
                        class="form-control"
                        id="course_code"
                        v-model="course.course_code"
                        placeholder="Course Code"
                      >
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="course_type_id" class="col-sm-2 col-form-label">Course Type:</label>
                    <div class="col-sm-10">
                      <select
                        class="form-control"
                        name="course_type_id"
                        id="course_type_id"
                        v-model="course.course_type_id"
                      >
                        <option value>Please select a course type</option>
                        <option
                          v-for="courseType in courseTypes"
                          v-bind:key="courseType.id"
                          :value="courseType.id"
                        >{{courseType.title}}</option>
                      </select>
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
                        rows="4"
                        cols="80"
                        maxlength="300"
                        v-model="course.description"
                      ></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="textareaEditor" class="col-sm-2 col-form-label">Body:</label>
                    <div class="col-sm-10">
                      <textarea
                        id="ckEditor"
                        class="form-control summernote"
                        name="body"
                        rows="8"
                        cols="80"
                        v-model="course.body"
                      ></textarea>
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
                        v-model="course.status"
                      >
                        <option value="publish">Publish</option>
                        <option value="draft">Draft</option>
                        <option value="private">private</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col">
                      <input
                        name="enable_megamenu"
                        type="checkbox"
                        id="enable_megamenu"
                        class="filled-in chk-col-blue"
                        value="1"
                        v-model="course.enable_megamenu"
                      >
                      <label for="enable_megamenu">Display on MegaMenu</label>
                    </div>
                  </div>

                  <div class="form-group" id="passwordDiv">
                    <label for="position" class="col-sm-2 col-form-label">Position:</label>
                    <div class="col">
                      <div class>
                        <input
                          name="position"
                          type="number"
                          class="form-control"
                          id="position"
                          value
                          placeholder="Position"
                          v-model="course.position"
                        >
                      </div>
                    </div>
                  </div>

                  <div class="form-group" id="passwordDiv" style="display:none">
                    <label for="password" class="col-sm-2 col-form-label">Password:</label>
                    <div class="col">
                      <div class>
                        <input
                          name="password"
                          type="text"
                          class="form-control"
                          id="password"
                          value
                          placeholder="Password"
                          v-model="course.password"
                        >
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Image:</label>
                    <div class="col">
                      <div class>
                        <input
                          type="file"
                          name="image"
                          class="dropify"
                          data-min-height="200"
                          data-min-width="300"
                          :data-default-file="course.image"
                          data-allowed-file-extensions="png JPEG jpg"
                          data-max-file-size="1MB"
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <SubmitButton :showBtn="showBtn"></SubmitButton>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div v-else>
      <div class="d-flex justify-content-center">
        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SubmitButton from "../SubmitButton";

export default {
  name: "CourseDetail",
  props: ["course", "courseTypes"],
  components: {
    SubmitButton
    // VueDropzone: vue2Dropzone
  },
  data() {
    return {
      loader: true,
      showBtn: true
    };
  },
  methods: {
    updateCourse() {
      console.log("updated");
      this.showBtn = false;
Vue.$toast.success('message string')

    }
  },
  mounted() {
    var explode = function() {
      $(".dropify").dropify();
    };
    setTimeout(explode, 2000);
  }
};
</script>