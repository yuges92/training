<template>
  <div class="container-fluid">
    <div v-if="!isLoaded">
      <div class="d-flex justify-content-center">
        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
    <div v-else>
      <AssignmentEdit v-if="isEditFormActive" @refresh="refresh" :assignment="currentAssignment"></AssignmentEdit>

      <div v-else>
        <button class="btn btn-info mb-3" @click="showForm =!showForm" v-show="!showForm">
          <i class="fas fa-plus"></i> Add new assignment
        </button>

        <button class="btn btn-warning mb-3" @click="showForm =!showForm" v-show="showForm">
          <i class="fas fa-plus"></i> Close
        </button>

        <AssignmentForm v-if="showForm" @refresh="refresh" :course_id="course_id"></AssignmentForm>
        <div class="box">
          <div class="box-body">
            <table class="table table-hover table-sm-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Type</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="assignment in assignments" v-bind:key="assignment.id">
                  <th scope="row">{{assignment.number}}</th>
                  <td>{{assignment.title}}</td>
                  <td>{{assignment.type}}</td>
                  <td class="d-flex justify-content-around">
                    <div>
                      <button class="btn btn-success" @click="showCurrentAssignment(assignment)">
                        <i class="fas fa-eye"></i> View
                      </button>
                    </div>

                    <div>
                      <button
                        v-if="!activeButtons[assignment.id]"
                        @click="deleteassignment(assignment.id)"
                        class="btn btn-danger"
                      >Remove</button>
                      <button v-else class="btn btn-danger" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Deleting...
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AssignmentForm from "./AssignmentForm";
import AssignmentEdit from "./AssignmentEdit";

export default {
  props: ["course_id"],
  data() {
    return {
      assignments: [],
      activeButtons: [],
      showForm: false,
      isLoaded: false,
      isEditFormActive: false,
      currentAssignment: {}
    };
  },
  components: {
    AssignmentForm,
    AssignmentEdit
  },
  methods: {
    refresh() {
      //   console.log("refreshed");
      this.getAssignments();
      this.showForm = false;
    },
    getAssignments() {
      axios
        .get("/api/courses/" + this.course_id + "/assignments")
        .then(res => {
          this.assignments = res.data;
          console.log(this.assignments);
        })
        .catch(err => {
          console.error(err);
        });
    },
    deleteassignment(id) {
      let url = "/api/courses/" + this.course_id + "/assignments/" + id;
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
          Vue.set(this.activeButtons, id, 1);
          axios
            .delete(url)
            .then(response => {
              Vue.toasted.show(
                '<i class="fas fa-check-circle fa-3x"></i> Course document deleted',
                {
                  type: "success",
                  duration: 4000,
                  className: "py-3"
                }
              );
              this.getAssignments();
            })
            .catch(error => {
              console.log(error.response.data);
              Vue.toasted.show(
                '<i class="fas fa-times"></i> Failed to delete',
                {
                  type: "error",
                  duration: 4000,
                  className: "py-3"
                }
              );
              Vue.set(this.activeButtons, id, 0);
            });
        }
      });
    },

    showCurrentAssignment(assignment) {
      this.currentAssignment = assignment;
      this.isEditFormActive = true;
    }
  },
  mounted() {
    // this.isLoaded=true;
  },
  watch: {
    course_id: function(course_id) {
      console.log(course_id);

      if (this.course_id) {
        this.getAssignments();
        // console.log("loaded");
        this.isLoaded = true;
      }
    }
  }
};
</script>