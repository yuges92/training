<template>
  <div>
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="card-title">Edit Question</h3>
      </div>
      <div class="box-body wizard-content">
        <form
          @submit.prevent="saveQuestion()"
          enctype="multipart/form-data"
          method="POST"
          class="tab-wizard wizard-circle wizard clearfix"
        >
          <div class="content clearfix row mx-auto">
            <section class="body col">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">
                    Question Type
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" id="type" name="type" v-model="question.type">
                    <option value>Select a question type</option>
                    <option value="dropdown">Dropdown Box</option>
                    <option value="multiple">Multiple Choice</option>
                    <option value="comment">Comment Box</option>
                    <option value="file">File Upload</option>
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="number">
                    Question Number
                    <span class="text-danger">*</span>
                  </label>
                  <input
                    type="number"
                    class="form-control"
                    id="number"
                    v-model="question.number"
                    min="1"
                    step=".01"
                  />
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="description">
                    Question Description
                    <span class="text-danger">*</span>
                  </label>
                  <!-- <input type="text" class="form-control" id="description" v-bind="description"> -->
                  <textarea
                    name="description"
                    id="description"
                    rows="2"
                    class="form-control"
                    v-model="question.description"
                  ></textarea>
                </div>
              </div>

              <div
                class="col border my-3"
                v-if="question.type=='dropdown' || question.type=='multiple'"
              >
                <h4>
                  Answers
                  <span class="text-danger">*</span>
                </h4>
                <div class="row mb-2" v-for="answer in answers" :key="answer.id">
                  <div class="col my-auto">
                    <input
                      name
                      type="text"
                      class="form-control"
                      id="firstName5"
                      v-model="answer.value"
                    />
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

              <div class="col border">
                <div class="form-group">
                  <label for="image">
                    Image
                    <small>(optional)</small>
                  </label>
                  <div class>
                    <div class="col my-2 row">
                      <div class="custom-file mb-3">
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

              <div class="my-3 border">
                <div class="col">
                  <div class="form-group">
                    <label for="video">
                      Embed Video
                      <small>(optional)</small>
                    </label>
                    <input type="text" class="form-control" id="video" v-model="question.video" />
                  </div>
                </div>
              </div>

              <div class="my-3 col border">
                <h4>Assessment Criterias:</h4>
                <div class>
                  <div class="col-md-8">
                    <div class="form-group d-flex justify-content-between flex-wrap">
                      <div v-for="criteria in criterias" :key="criteria.id" class="col-md-3">
                        <div class="checkbox">
                          <input
                            type="checkbox"
                            :value="criteria.id"
                            :id="'checkBox'+criteria.id"
                            v-model="question.criterias"
                          />
                          <label
                            :for="'checkBox'+criteria.id"
                            data-toggle="tooltip"
                            data-placement="top"
                            :title="criteria.description"
                          >{{criteria.number}}</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="row my-3">
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
              </div>-->
            </section>

            <aside class="col-md-4">
              <div class="my-3">
                <img
                  class="image rounded mx-auto d-flex justify-content-center"
                  :src="question.image"
                  alt
                  style="max-width:18rem;"
                />
              </div>

              <div class="mx-auto d-flex justify-content-center col-md-10" v-html="question.video"></div>
            </aside>
          </div>
          <div class="my-3 d-flex justify-content-end">
            <SubmitButton :showBtn="showBtn"></SubmitButton>
            <div>
              <button type="button" class="btn btn-default" @click="cancel()">Cancel</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</template>

<script>
export default {
  props: ["assignment", "criterias", "question"],
  data() {
    return {
      answers: [],
      filename: "",
      imageFile: "",
      image: "",
      number: "",
      description: "",
      type: "",
      video: "",
      showBtn: true,
      selectedCriterias: []
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
    },
    cancel() {
      this.$parent.showEditForm = false;
    }
  },
  computed: {
    // selectedCriterias: function (criterias) {
    //   return this.question.criterias.filter(function (criteria) {
    //     this.selectedCriterias.push(criteria.id);
    //   });
    // }
  },
  mounted() {
    console.log("This");

    this.question.criterias;
  }
};
</script>