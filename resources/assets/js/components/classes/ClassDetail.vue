<template>
  <div>
    <div class>
      <form @submit.prevent="updateClass()" enctype="multipart/form-data">
        <div class="col-12 row mx-auto">
          <div class="col-md-8">
            <div class="box">
              <div class="box-body">
                <div class="form-group row">
                  <label for="course_type_id" class="col-sm-2 col-form-label">Course:</label>
                  <div class="col-sm-10">
                    <select
                      class="form-control"
                      name="course_type_id"
                      id="course_type_id"
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
                  <label for="course_type_id" class="col-sm-2 col-form-label">Address:</label>
                  <div class="col-sm-10">
                    <select
                      class="form-control"
                      name="course_type_id"
                      id="course_type_id"
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
                  <label for="course_code" class="col-sm-2 col-form-label">Course Code:</label>
                  <div class="col-sm-10">
                    <input
                      name="course_code"
                      type="text"
                      class="form-control"
                      id="course_code"
                      v-model="courseClass.course_id"
                      placeholder="Course Code"
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
                      rows="4"
                      cols="80"
                      maxlength="300"
                      v-model="courseClass.description"
                    ></textarea>
                  </div>
                </div>

                <div class="form-group row" v-for="index in duration" :key="index">
                  <label for="course_code" class="col-sm-2 col-form-label">Day {{index}}: </label>
                  <div class="col-sm-10">
                    <input
                      name="course_code"
                      type="text"
                      class="form-control"
                      id="course_code"
                      v-model="courseClass.course_id"
                      placeholder="Course Code"
                    >
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
                    <label for="image" class="col-sm-2 col-form-label">Image:</label>
                    <div class>
                      <div class="d-flex justify-content-center flex-wrap">
                        <div class="mx-auto">
                          <img :src="courseClass.image" alt style="max-width:15rem;">
                        </div>
                        <div class="col-12 my-2">
                          <div class="custom-file mt-3 mb-3">
                            <input
                              type="file"
                              class="custom-file-input"
                              ref="file"
                              id="customFile"
                              @change="previewFiles()"
                            >
                            <label class="custom-file-label" for="customFile">{{filename}}</label>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>-->

                <div class="form-group">
                  <label for="title" class="col col-form-label">No of Days:</label>
                  <div class="col">
                    <input
                    @change="changeDuration()"
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
                </div>
              </div>
              <SubmitButton :showBtn="showBtn"></SubmitButton>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import SubmitButton from "../SubmitButton";

export default {
  props: ["courseClass"],
  data() {
    return {
      showBtn: true,
      addresses: [],
      courses: [],
      duration:this.courseClass.duration,
    };
  },
  created() {
      this.changeDuration();
  },
  methods: {
    updateClass() {},
    getCourses() {},
    getClassAddress() {},
    changeDuration(){
        this.duration=Number(this.courseClass.duration);
    }
  },
  components: {
    SubmitButton
  }
};
</script>