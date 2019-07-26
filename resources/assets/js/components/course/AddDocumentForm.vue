<template>
  <div>
    <button @click="cancel" class="btn btn-warning mb-3">
      <i class="fas fa-chevron-circle-left"></i> Go Back
    </button>
    <div class="box">
      <Error :errors="errors" v-if="showError"></Error>
      <form @submit.prevent="submitForm()" enctype="multipart/form-data" method="POST">
        <div class>
          <div class>
            <h4 class id="myLargeModalLabel">Add New Document</h4>
          </div>
          <div class>
            <div class="form-group">
              <label for="title" class="col col-form-label">Title:</label>
              <div class="col-sm-12">
                <input
                  type="text"
                  class="form-control"
                  id="description"
                  placeholder="Title"
                  v-model="title"
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
              >Document:</label>
              <div class="col-sm-12">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" @change="fileChange">
                  <label class="custom-file-label" for="customFile">{{filename}}</label>
                </div>
              </div>
            </div>
          </div>
          <div class>
            <div class="form-group d-flex justify-content-end mt-3">
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
import Error from "../Error";

export default {
  name: "AddDocumentModel",
  props: ["course"],
  data() {
    return {
      filename: "Choose a file",
      file: {},
      showBtn: true,
      errors: [],
      showError: false,
        title:'',
    };
  },
  components: {
    Error,
    SubmitButton
  },
  methods: {
    submitForm() {
      let url = "/api/courses/" + this.course.id + "/courseDocuments";
      // let url = "/api/courses/" + this.course.id + "/courseBodies";
      let _this = this;

      this.showBtn = false;
      let formData = new FormData();
      formData.append("filename", this.file);
      formData.append("title", this.title);
      console.log(this.title);
      axios({
        method: "post",
        url,
        data:formData,
        headers: {
          "Content-Type": "multipart/form-data"
        }
      })
        .then(function(response) {
              _this.alertSuccess("Saved");

          _this.$parent.$parent.refresh();
          _this.cancel();
        })
        .catch(function(error) {
              _this.alertFailed("Failed");
          console.log(error);
          console.log(error.response.data);
          console.log("FAILURE!!");
        })
        .then(function() {
          _this.showBtn = true;
        });
    },

    fileChange(event) {
      var fileData = event.target.files[0];
      this.file = fileData;
      this.filename = fileData.name;
    },
    cancel() {
      this.file={};
      this.filename='';
      this.title='';
      this.$parent.showAddDocument = false;
    }
  }
};
</script>
