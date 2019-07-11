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
          <div class="content clearfix row mx-auto">
            <section class="body col">
              <div class="col-md-6">
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

              <div class="col-md-4" v-if="type=='comment'">
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
                    v-model="textLimit"
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
                    :class="{'border-danger': numberExists} "
                    name="number"
                    id="number"
                    v-model="number"
                    min="1"
                    autocomplete="off"
                    @change="checkIfQuestionExist()"
                  />
                  <small class="text-danger" v-if="numberExists">Question number already exists</small>
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
                    v-model="description"
                  ></textarea>
                </div>
              </div>

              <div class="col border my-3" v-if="type=='dropdown' || type=='multiple'">
                <h4>
                  Answers
                  <span class="text-danger">*</span>
                </h4>
                <div class="row mb-2" v-for="answer in answers" :key="answer.id">
                  <div class="col my-auto">
                    <input
                      name="answers[]"
                      type="text"
                      class="form-control"
                      :id="answer"
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
                    <input type="text" class="form-control" id="video" v-model="video" />
                  </div>
                </div>
              </div>

              <div class="my-3 col border">
                <h4>Assessment Criterias <small>(optional)</small>: </h4>
                <div class>
                  <div class="col-md-8">
                    <div class="form-group d-flex justify-content-start flex-wrap">
                      <div v-for="criteria in criterias" :key="criteria.id" class="col-md-3">
                        <div class="checkbox">
                          <input
                            :value="criteria.id"
                            type="checkbox"
                            :id="'checkBox'+criteria.id"
                            v-model="selectedCriterias"
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

            <aside class="col-md-4">
              <div class="my-3">
                <img
                  class="image rounded mx-auto d-flex justify-content-center"
                  :src="image"
                  alt
                  style="max-width:18rem;"
                />
              </div>

              <div class="mx-auto d-flex justify-content-center col-md-10" v-html="video"></div>
            </aside>
          </div>
          <div class="actions clearfix">
            <SubmitButton :showBtn="showBtn"></SubmitButton>
          </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</template>

<script>
export default {
  props: ["assignment", "criterias"],
  data() {
    return {
      answers: [],
      question: {},
      filename: "",
      imageFile: "",
      image: "",
      number: "",
      textLimit:150,
      description: "",
      type: "",
      video: "",
      showBtn: true,
      selectedCriterias: [],
      numberExists:'',

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
      this.showBtn = false;
      let formData = new FormData();
      formData.append("description", this.description);
      formData.append("number", this.number);
      formData.append("type", this.type);
      formData.append("textLimit", this.textLimit);
      for (let i = 0; i < this.selectedCriterias.length; i++) {
        formData.append("criterias[]", this.selectedCriterias[i]);
      }
      console.log(this.answers);
      for (let i = 0; i < this.answers.length; i++) {
        console.log(this.answers[i].value);

        formData.append("answers[]", this.answers[i].value);
      }
      console.log(formData.get("answers[]"));

      formData.append("image", this.imageFile);
      formData.append("video", this.video);
      // formData.append("answers", this.answers);
      const config = {
        headers: { "content-type": "multipart/form-data" }
      };
      axios
        .post(
          "/api/assignments/" + this.assignment.id + "/questions",
          formData,
          config
        )
        .then(res => {
          this.alertSuccess("Question Added");
          this.$parent.refresh();
        })
        .catch(err => {
          console.log(err.response.data.errors);

          this.alertFailed("Failed to add");
          console.error(err);
        })
        .then(res => {
          this.showBtn = true;
        });
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
    checkIfQuestionExist(){
      console.log(this.$parent.questions);
      this.$parent.questions.filter(question=>{
        if(question.number==this.number){
          this.numberExists=true;
          
        }else{
          this.numberExists=false;

        }
      });
    }
  }
};
</script>