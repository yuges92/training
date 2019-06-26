<template>
  <div>
    <div v-if="errors.length" class="text-danger">
      <b>Please correct the following error(s):</b>
      <ul>
        <li v-for="error in errors" :key="error">{{ error }}</li>
      </ul>
    </div>

    <div>
      <div class="col-12 ">
        <div class="box-header with-border">
          <button class="btn btn-info mb-3" @click="showAddForm = !showAddForm">
            <i class="fas fa-plus"></i> Add new question
          </button>
        </div>
          <div class="box-body">
            <div v-if="showAddForm" class="mb-3">
              <NewQuestion :assignment="assignment"></NewQuestion>
            </div>

            <div v-for="item in 10" :key="item.id">
              <QuestionRow :question="question"></QuestionRow>
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
  props: ["assignment"],
  data() {
    return {
      showBtn: true,
      errors: [],
      showEditForm: true,
      question: {},
      showAddForm:false,
    };
  },
  methods: {
    goBack() {
      this.$parent.isEditFormActive = false;
    },
    toggleEditForm(toggle) {
      this.showEditForm = toggle;
    }
  },
  components: {
    SubmitButton,
    QuestionRow,
    NewQuestion
  },
  mounted() {}
};
</script>