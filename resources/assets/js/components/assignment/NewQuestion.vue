<template>
  <div>
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="card-title">New Question</h3>
      </div>
      <div class="box-body wizard-content">
        <form
          @submit.prevent="saveQuestion()"
          enctype="multipart/form-data"
          method="POST"
          class="tab-wizard wizard-circle wizard clearfix"
        >
          <div class="clearfix"></div>
          <div class="content clearfix">
            <h6 tabindex="-1" class="title">Question Detail</h6>
            <section class="body">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="number">
                      Number
                      <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control" id="number" v-bind="number">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="description">
                      Question
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="description" v-bind="description">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="type">
                      Question Type
                      <span class="text-danger">*</span>
                    </label>
                    <select class="form-control" id="type" name="type" v-model="type">
                      <option value>Select a question type</option>
                      <option value="dropdown">Dropdown Box</option>
                      <option value="multiple">Multiple Choice</option>
                      <option value="comment">Comment Box</option>
                      <option value="file">File Upload</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="with-border" v-if="type=='dropdown' || type=='multiple'">
                <h4>Answers:</h4>
                <div class="row mb-2" v-for="answer in answers" :key="answer.id">
                  <div class="col-md-8 my-auto">
                    <input
                      name
                      type="text"
                      class="form-control"
                      id="firstName5"
                      v-model="answer.value"
                    >
                  </div>
                </div>

                <div class="my-3">
                  <button class="btn btn-default" type="button" @click="addAnswer()">
                    <i class="fas fa-plus"></i> Add Answer
                  </button>
                  <button class="btn btn-default" type="button" @click="removeAnswer()">
                    <i class="fas fa-minus"></i> Remove Answer
                  </button>
                </div>
              </div>

              <div class="form-group">
                <label for="image" class="col-form-label">
                  Image
                  <small>(optional)</small>
                </label>
                <div class>
                  <div class="col-md-8 my-2 p-0">
                    <div class="custom-file mb-3">
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

                  <div class>
                    <img class="image rounded" :src="image" alt style="max-width:15rem;">
                  </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="video">
                      Embed Video
                      <small>(optional)</small>
                    </label>
                    <input type="text" class="form-control" id="video" v-model="video">
                  </div>
                </div>
              </div>

              <div v-html="video"></div>

              <div class="my-3">
                <h4>Assessment Criterias:</h4>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="checkbox">
                        <input type="checkbox" id="Checkbox_1">
                        <label for="Checkbox_1">Checkbox 1</label>
                      </div>

                      <div class="checkbox">
                        <input type="checkbox" id="Checkbox_2">
                        <label for="Checkbox_2">Checkbox 2</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="jobTitle1">Job Title :</label>
                    <input type="text" class="form-control" id="jobTitle1">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="videoUrl1">Company Name :</label>
                    <input type="text" class="form-control" id="videoUrl1">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="shortDescription1">Job Description :</label>
                    <textarea
                      name="shortDescription"
                      id="shortDescription1"
                      rows="6"
                      class="form-control"
                    ></textarea>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div class="actions clearfix">
            <button type="submit" class="btn btn-info rounded">Save</button>
          </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</template>

<script>
export default {
  props: ["assignment_id"],
  data() {
    return {
      answers: [],
      question: {},
      filename: "",
      imageFile: "",
      image: "",
      number: "",
      description: "",
      type: "",
      video: ""
    };
  },
  methods: {
    addAnswer: function() {
      this.answers.push({ value: "" });
    },
    removeAnswer: function() {
      this.answers.pop();
    },
    saveQuestion() {
      console.log(this.answers);
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

      this.filename = file.name;

      this.imageFile = file;

      // console.log(this.imageFile);

      const reader = new FileReader();
      const _this = this;
      reader.onload = function(e) {
        _this.image = e.target.result;
        //  this.imageFile = e.target.files[0];
      };
      reader.readAsDataURL(file);
    }
  }
};
</script>