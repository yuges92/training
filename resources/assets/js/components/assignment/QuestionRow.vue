<template>
  <div>
    <div class="box" v-if="!showEditForm">
      <div class="box-header with-border d-md-flex justify-content-start">
        <div class="col-md-10">
          <h4>{{question.number}}. {{question.description}}</h4>
        </div>
        <div class="col">
          <div class="btn-group float-right">
            <button type="button" class="btn btn-default">Action</button>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              <span class="caret"></span>
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
              <button class="dropdown-item" @click="showForm()">Edit</button>
              <button class="dropdown-item" @click="deleteQuestion">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <QuestionEdit v-else :question="question" :criterias="criterias"></QuestionEdit>
  </div>
</template>

<script>
import QuestionEdit from "./QuestionEdit";

export default {
  props: ["assignment", "question", "criterias"],

  data() {
    return {
      showEditForm: false
    };
  },
  methods: {
    showForm() {
      this.showEditForm = true;
    },
    deleteQuestion() {
      // console.log(this.question.id);
      // return 1;
      let url =
        "/api/assignments/" +
        this.assignment.id +
        "/questions/" +
        this.question.id;
      // let _this = this;
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
            .delete(url)
            .then(res => {
              this.alertSuccess("Question Added");
              this.$parent.refresh();
              //  console.log(res)
            })
            .catch(err => {
              console.log(err.response.data.errors);

              this.alertFailed("Failed to delete");
              console.error(err);
            });
        }
      });
    }
  },
  components: {
    QuestionEdit
  }
};
</script>