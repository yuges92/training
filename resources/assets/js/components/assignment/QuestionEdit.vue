<template>
  <div>
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="card-title">Edit Question</h3>
      </div>
      <div class="box-body wizard-content">
        <form
          @submit.prevent="updateQuestion()"
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

                            <div class="col-md-4" v-if="question.type=='comment'">
                <div class="form-group">
                  <label for="textLimit">
                    Text Limit
                    <span class="text-danger">*</span>
                  </label>
                  <input
                    type="number"
                    class="form-control"
                    name="number"
                    id="textLimit"
                    v-model="question.textLimit"
                    min="1"
                  />
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
                <div class="row mb-2 mr-auto" v-for="(answer, key) in question.answers" :key="key">
                  <div class="col my-auto">
                    <input
                      name
                      type="text"
                      class="form-control"
                      id="firstName5"
                      v-model="answer.answer"
                    />
                  </div>
                  <button class="btn btn-default" type="button" @click="deleteAnswer(key)">
                    <i class="fas fa-minus"></i>
                  </button>
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
            </section>

            <aside class="col-md-4 my-3">
              <div class="mb-3" v-if="question.image">
                <img
                  class="image rounded mx-auto d-flex justify-content-center"
                  :src="question.image"
                  alt
                  style="max-width:18rem;"
                />

                <div class="d-flex justify-content-center my-3">
                  <button class="btn btn-danger" type="button" @click="removeImage()">
                    <i class="fas fa-close"></i> Remove Image
                  </button>
                </div>
              </div>

              <div class="mx-auto d-flex justify-content-center col-md-10" v-html="question.video"></div>
            </aside>
          </div>
          <div class="my-3 d-flex justify-content-end">
            <SubmitButton :showBtn="showBtn"></SubmitButton>
            <div>
              <button type="button" class="btn btn-default ml-1" @click="cancel()">Cancel</button>
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
      // answers: [],
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
      this.question.answers.push({ value: "" });
    },
    removeAnswer: function() {
      this.question.answers.pop();
    },
    updateQuestion() {
      this.showBtn = false;
      let formData = new FormData();
      formData.append("description", this.question.description);
      formData.append("number", this.question.number);
      formData.append("textLimit", this.question.textLimit);
      formData.append("type", this.question.type);
      for (let i = 0; i < this.question.criterias.length; i++) {
        formData.append("criterias[]", this.question.criterias[i]);
      }
      console.log(this.question.answers);
      for (let i = 0; i < this.question.answers.length; i++) {
        console.log(this.question.answers[i].value);

        formData.append("answers[]", this.question.answers[i].answer);
      }
      console.log(formData.get("answers[]"));
      let image = this.imageFile ? this.imageFile : this.question.image;
      formData.append("image", image);
      formData.append("video", this.question.video);
      formData.append("_method", "PUT");
      // formData.append("answers", this.answers);
      const config = {
        headers: { "content-type": "multipart/form-data" }
      };

      axios
        .post(
          "/api/assignments/" +
            this.question.assignment_id +
            "/questions/" +
            this.question.id,
          formData,
          config
        )
        .then(res => {
          this.alertSuccess("Question Updated");
          console.log(res);
        })
        .catch(err => {
          console.log(err.response.data.errors);
          this.alertFailed("Failed to update");
          console.error(err);
        })
        .then(res => {
          this.showBtn = true;
        });
    },
    deleteAnswer(key) {
      this.$delete(this.question.answers, key);
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
        _this.question.image = e.target.result;
        //  this.imageFile = e.target.files[0];
      };
      reader.readAsDataURL(file);
    },
    cancel() {
      this.$parent.showEditForm = false;
    },
    removeImage() {
      this.imageFile = "";
      this.question.image = "";
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

    // this.question.criterias;
  }
};
</script>