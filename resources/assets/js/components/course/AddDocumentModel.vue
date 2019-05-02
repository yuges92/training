<template>
  <div>
    <div
      class="modal fade"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      style="display: none;"
      aria-hidden="true"
      id="model_add_document"
    >
      <div class="modal-dialog modal-lg">
        <form @submit.prevent="submitForm()" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myLargeModalLabel">Add New Document</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="title" class="col col-form-label">Description:</label>
                <div class="col-sm-12">
                  <input
                    name="title"
                    type="text"
                    class="form-control"
                    id="description"
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
                >Document:</label>
                <div class="col-sm-12">
                  <!-- <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone> -->
                  <!-- <input type="file"> -->
                  <div class="custom-file">
                    <input
                      type="file"
                      class="custom-file-input"
                      id="customFile"
                      @change="fileChange"
                    >
                    <label class="custom-file-label" for="customFile">{{filename}}</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="form-group d-flex justify-content-end mt-3">
                <SubmitButton :showBtn="showBtn"></SubmitButton>
 
              </div>
            </div>


          </div>
          <!-- /.modal-content -->
        </form>
      </div>
      <!-- /.modal-dialog -->
    </div>
  </div>
</template>

<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
import SubmitButton from "../SubmitButton";

export default {
  name: "AddDocumentModel",
  props: [],
  data() {
    return {
      dropzoneOptions: {
        url: "/",
        thumbnailWidth: 300,
        maxFilesize: 2,
        maxFiles: 1,
        header: "",
        addRemoveLinks: true
      },
      filename: "Choose a file",
      showBtn: true,

    };
  },
  components: {
    vueDropzone: vue2Dropzone,
SubmitButton
  },
  methods: {
    submitForm() {
      this.showBtn=false;
    },
    fileChange(event) {
      var fileData = event.target.files[0];
      this.filename = fileData.name;
    }
  }
};
</script>