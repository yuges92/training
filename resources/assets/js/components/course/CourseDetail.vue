<template>
  <div>
    <Error :errors="errors" v-if="showError"></Error>
    <div v-if="!course">
      <div class="d-flex justify-content-center">
        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
    <div class v-else>
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
                      />
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
                      />
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
                        <option value="password_protected">Password Protected</option>
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
                      />
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
                        />
                      </div>
                    </div>
                  </div>

                  <div
                    class="form-group"
                    id="passwordDiv"
                    v-if="course.status=='password_protected'"
                  >
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
                        />
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="image" class="col-sm-2 col-form-label">Image:</label>
                    <div class>
                      <div class="d-flex justify-content-center flex-wrap">
                        <div class="mx-auto">
                          <img :src="course.image" alt style="max-width:15rem;" />
                        </div>
                        <div class="col-12 my-2">
                          <div class="custom-file mt-3 mb-3">
                            <input
                              type="file"
                              class="custom-file-input"
                              ref="file"
                              id="customFile"
                              @change="previewFiles()"
                            />
                            <label class="custom-file-label" for="customFile">{{filename}}</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-end my-3">
                  <SubmitButton :showBtn="showBtn"></SubmitButton>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import SubmitButton from "../SubmitButton";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import Error from "../Error";

export default {
  name: "CourseDetail",
  props: ["course", "courseTypes"],
  components: {
    SubmitButton,
    Error

    // VueDropzone: vue2Dropzone
  },
  data() {
    return {
      loader: true,
      showBtn: true,
      editor: ClassicEditor,
      filename: "Choose File",
      imageFile: {},
      isPasswordProtected: false,
      errors: {},
      showError: false,
      editorData: "<p>Content of the editor.</p>",
      editorConfig: {
        // The configuration of the editor.
      }
    };
  },
  methods: {
    updateCourse() {
      let url = "/api/courses/" + this.course.id;
      this.showBtn = false;
      this.showError = false;
      var _this = this;
      let formData = new FormData();

      formData.append("image", this.imageFile);
      formData.append("responseType", "json");
      formData.append("title", this.course.title);
      formData.append("course_code", this.course.course_code);
      formData.append("description", this.course.description);
      formData.append("course_type_id", this.course.course_type_id);
      formData.append("enable_megamenu", this.course.enable_megamenu);
      formData.append("password", this.course.password);
      formData.append("status", this.course.status);
      formData.append("position", this.course.position);
      formData.append("_method", "PUT");

      const config = {
        headers: { "content-type": "multipart/form-data" }
      };

      axios
        .post(url, formData, config)
        .then(function(response) {
              _this.alertSuccess("Saved");


          // console.log(response);
          _this.showBtn = true;
        })
        .catch(function(error) {
            console.log(error.response.data);
          if (error.response.status == 422) {
              _this.errors = error.response.data.errors;
            _this.showError = true;
          }
              _this.alertFailed("Failed");

          // console.log(error);
        })
        .then(function() {
          _this.showBtn = true;
        });
    },
    someHandler() {
      console.log("added");
      this.course.title = this.course.status;
    },
    previewFiles(event) {
      const file = this.$refs.file.files[0];
      if (!file) {
        this.filename = "Choose a file";
        return;
      }
      if (!file.type.match("image.*")) {
        this.filename = "not a picture";
        return;
      }
      console.log(file.name);

      this.filename = file.name;

      this.imageFile = file;

      // console.log(this.imageFile);

      const reader = new FileReader();
      const _this = this;
      reader.onload = function(e) {
        _this.course.image = e.target.result;
        //  this.imageFile = e.target.files[0];
      };
      reader.readAsDataURL(file);
    }
  },
  mounted() {
    // var explode = function() {
    //   $(".dropify").dropify();
    // };
    // setTimeout(explode, 2000);
  },
  computed: {
    onStatusChange() {
      if (this.course.status == "password_protected") {
        this.isPasswordProtected = true;
      } else {
        this.isPasswordProtected = false;
      }
    }
  }
};
</script>
