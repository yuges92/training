<template>
  <div class="container-fluid">
    <div
      class="modal fade"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      style="display: none;"
      aria-hidden="true"
      v-if="showModel"
      id="IDModal"
    >
      <div class="modal-dialog modal-lg">
        <form @submit.prevent="saveCourseBody()" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myLargeModalLabel">Add Course Document</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <Error :errors="errors" v-if="showError"></Error>
              <div class="form-group">
                <label for="title" class="col col-form-label">Title:</label>
                <div class="col-sm-12">
                  <input
                    name="title"
                    type="text"
                    class="form-control"
                    id="title"
                    v-model="courseBody.title"
                    placeholder="Title"
                  >
                </div>
              </div>

              <div class="form-group">
                <label
                  for="description"
                  class="col col-form-label"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Add course type description eg: "
                >Content:</label>
                <div class="col-sm-12">
                  <ckeditor
                    class="form-control"
                    name="body"
                    rows="8"
                    cols="80"
                    :editor="editor"
                    :config="editorConfig"
                    v-model="courseBody.content"
                  ></ckeditor>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="form-group d-flex justify-content-end mt-3 p-3">
                <SubmitButton :showBtn="showBtn"></SubmitButton>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </form>
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class v-if="!showEditModel">
      <button
        @click="openModel"
        alt="default"
        data-toggle="modal"
        data-target="#IDModal"
        class="btn btn-info mb-3"
      >
        <i class="fas fa-plus"></i> Add new course content
      </button>
      <div class>
        <div class="box">
          <div class="box-body">
            <table class="table table-hover table-responsive-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="body in course.courseBodies" v-bind:key="body.id">
                  <th scope="row">{{body.id}}</th>
                  <td>{{body.title}}</td>
                  <td class="row">
                    <button @click="showContent(body)" class="btn btn-info mr-1">
                      <i class="far fa-eye"></i>
                    </button>
                    <button @click="deleteContent(body.id)" class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div v-else>
      <form @submit.prevent="updateCourseBody()" enctype="multipart/form-data">
        <button @click="cancel" class="btn btn-warning mb-3">
          <i class="fas fa-chevron-circle-left"></i> Go Back
        </button>
        <div class="box">
          <div class="box-body">
            <Error :errors="errors" v-if="showError"></Error>

            <div class="form-group">
              <label for="title" class="col col-form-label">ID:</label>
              <div class="col-sm-12">
                <input
                  type="text"
                  class="form-control"
                  id="title"
                  v-model="currentBody.id"
                  placeholder="Title"
                  readonly
                >
              </div>
            </div>
            <div class="form-group">
              <label for="title" class="col col-form-label">Title:</label>
              <div class="col-sm-12">
                <input
                  name="title"
                  type="text"
                  class="form-control"
                  id="title"
                  v-model="currentBody.title"
                  placeholder="Title"
                >
              </div>
            </div>

                        <div class="form-group">
              <label for="title" class="col col-form-label">Order:</label>
              <div class="col-sm-12">
                <input
                  name="order"
                  type="number"
                  class="form-control"
                  id="title"
                  v-model="currentBody.order"
                >
              </div>
            </div>

            <div class="form-group">
              <label
                for="description"
                class="col col-form-label"
                data-toggle="tooltip"
                data-placement="top"
                title="Add course type description eg: "
              >Content:</label>
              <div class="col-sm-12">
                <ckeditor
                  class="form-control"
                  name="body"
                  rows="8"
                  cols="80"
                  :editor="editor"
                  :config="editorConfig"
                  v-model="currentBody.content"
                ></ckeditor>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <div class="form-group d-flex justify-content-end mt-3 p-3">
              <SubmitButton :showBtn="showUpdateBtn"></SubmitButton>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import SubmitButton from "../SubmitButton";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import Error from "../Error";

export default {
  name: "CourseBodies",
  props: ["course"],
  data() {
    return {
      showBtn: true,
      showUpdateBtn:true,
      courseBody: {
        title: "",
        content: ""
      },
      showModel: false,
      editor: ClassicEditor,
      editorConfig: {
        // The configuration of the editor.
      },
      errors: {},
      showError: false,
      showEditModel: false,
      currentBody: {},
      
    };
  },
  methods: {
    saveCourseBody() {
      this.showBtn = false;
      let url = "/api/courses/" + this.course.id + "/courseBodies";
      let _this = this;
      axios
        .post(url, {
          title: this.courseBody.title,
          content: this.courseBody.content,
          order: this.courseBody.order
        })
        .then(function(response) {
          Vue.toasted.show(
            '<i class="fas fa-check-circle fa-3x"></i> Course body added',
            {
              type: "success",
              duration: 4000,
              className: "py-3"
            }
          );
          _this.showModel = false;
          _this.courseBody = {};
          _this.$emit("refresh");
          $("#IDModal").modal("hide");
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
        })
        .catch(function(error) {
          console.log(error.response.data);
          if (error.response.status == 422) {
            _this.errors = error.response.data.errors;
            _this.showError = true;
          }
          // console.log(error);
        })
        .then(function() {
          _this.showBtn = true;
        });
    },

     updateCourseBody() {
      this.showUpdateBtn = false;
      let url = "/api/courseBodies/" + this.currentBody.id;
      let _this = this;
      axios
        .patch(url, {
          title: this.currentBody.title,
          content: this.currentBody.content,
          order: this.currentBody.order

        })
        .then(function(response) {
          Vue.toasted.show(
            '<i class="fas fa-check-circle fa-3x"></i> Course body updated',
            {
              type: "success",
              duration: 4000,
              className: "py-3"
            }
          );

          _this.$emit("refresh");

        })
        .catch(function(error) {
          console.log(error.response.data);
          if (error.response.status == 422) {
            _this.errors = error.response.data.errors;
            _this.showError = true;
          }
          // console.log(error);
        })
        .then(function() {
          _this.showUpdateBtn = true;
        });
    },

    showContent(body) {
      this.showEditModel = true;
      this.currentBody = body;
      console.log(body);
    },

    cancel(body) {
      this.showEditModel = false;
      console.log(body);
    },
    deleteContent(id) {
      let url = "/api/courseBodies/" + id;
      let _this = this;
      this.$swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.value) {
          axios
            .delete(url, {
              title: this.courseBody.title,
              content: this.courseBody.content
            })
            .then(function(response) {
              Vue.toasted.show(
                '<i class="fas fa-check-circle fa-3x"></i> Course body deleted',
                {
                  type: "success",
                  duration: 4000,
                  className: "py-3"
                }
              );
              _this.$emit("refresh");
            })
            .catch(function(error) {
              console.log(error.response.data);
              Vue.toasted.show(
                '<i class="fas fa-times"></i> Failed to delete',
                {
                  type: "error",
                  duration: 4000,
                  className: "py-3"
                }
              );
              // console.log(error);
            })
            .then(function() {
              _this.showBtn = true;
            });
          console.log(id);
        }
      });
    },
    openModel() {
      this.showModel = true;
    }
  },
  components: {
    SubmitButton,
    ClassicEditor,
    Error
  }
};
</script>