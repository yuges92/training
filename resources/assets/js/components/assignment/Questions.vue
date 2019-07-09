<template>
  <div>
    <div v-if="errors.length" class="text-danger">
      <b>Please correct the following error(s):</b>
      <ul>
        <li v-for="error in errors" :key="error">{{ error }}</li>
      </ul>
    </div>

    <div>
      <div class="col-12">
        <div class="box-header with-border">
          <button class="btn btn-info mb-3" @click="showAddForm = !showAddForm">
            <i class="fas fa-plus"></i> Add new question
          </button>
        </div>
        <div class="box-body">
          <div v-if="showAddForm" class="mb-3">
            <NewQuestion :assignment="assignment" :criterias="criterias"></NewQuestion>
          </div>

          <div v-for="question in questions" :key="question.id">
            <QuestionRow :assignment="assignment" :question="question" :criterias="criterias"></QuestionRow>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SubmitButton from "../SubmitButton";
import QuestionRow from "./QuestionRow";
import NewQuestion from "./NewQuestion";

export default {
  props: ["assignment", "criterias"],
  data() {
    return {
      showBtn: true,
      errors: [],
      showEditForm: true,
      question: {},
      questions: [],
      showAddForm: false
    };
  },
  methods: {
    goBack() {
      this.$parent.isEditFormActive = false;
    },
    toggleEditForm(toggle) {
      this.showEditForm = toggle;
    },
    getQuestions() {
      axios
        .get("/api/assignments/"+this.assignment.id+"/questions")
        .then(res => {
          this.questions = res.data;
          // console.log('questions: ');
          // console.log(res.data);
        })
        .catch(err => {
          console.error(err);
        });
    },
      refresh() {
        this.getQuestions();
        this.showAddForm=false;
      },
  },
  components: {
    SubmitButton,
    QuestionRow,
    NewQuestion
  },
  mounted() {
this.refresh();
  }
};
</script>