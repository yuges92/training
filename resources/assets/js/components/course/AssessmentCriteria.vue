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
      <div v-if="showEditCriteria">
        <button class="btn btn-warning mb-3" @click="showEditCriteria =!showEditCriteria">
          <i class="fas fa-plus"></i> Close
        </button>
        <EditCriteria :criteria="currentCriteria" @refresh="refresh"></EditCriteria>
      </div>
      <div v-else>
        <button class="btn btn-info mb-3" @click="showForm =!showForm" v-show="!showForm">
          <i class="fas fa-plus"></i> Add new criteria
        </button>

        <button class="btn btn-warning mb-3" @click="showForm =!showForm" v-show="showForm">
          <i class="fas fa-plus"></i> Close
        </button>

        <CriteriaForm v-if="showForm" @refresh="refresh" :course="course"></CriteriaForm>

        <div class="box">
          <div class="box-body">
            <table class="table table-hover table-sm-responsive">
              <thead>
                <tr>
                  <th>Criteria Number</th>
                  <th>Description</th>
                  <th>Linked Assignment</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="criteria in criterias" v-bind:key="criteria.id">
                  <th scope="row">{{criteria.number}}</th>
                  <td class="w-50">{{criteria.description}}</td>
                  <td>
                    <div
                      v-for="question in criteria.questions"
                      :key="question.id"
                    >[{{question.assignment_id}}:{{question.id}}]</div>
                  </td>
                  <td class="d-flex justify-content-between">
                    <div class="col">
                      <button class="btn btn-success" @click="showCurrentAssignment(criteria)">
                        <i class="fas fa-eye"></i>
                      </button>
                    </div>
                    <div class="col">
                      <button
                        v-if="!activeButtons[criteria.id]"
                        @click="deleteCriteria(criteria.id)"
                        class="btn btn-danger"
                      >
                        <i class="fas fa-trash-alt"></i>
                      </button>
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
import CriteriaForm from "./CriteriaForm";
import EditCriteria from "./EditCriteria";

export default {
  props: ["course"],
  data() {
    return {
      criterias: [],
      activeButtons: [],
      showForm: false,
      isLoaded: false,
      currentCriteria: {},
      showEditCriteria: false
    };
  },
  components: {
    CriteriaForm,
    EditCriteria
  },
  methods: {
    refresh() {
      //   console.log("refreshed");
      this.getCriterias();
      this.showForm = false;
    },
    getCriterias() {
      axios
        .get("/api/courses/" + this.course.id + "/assessmentCriterias")
        .then(res => {
          this.criterias = res.data;
          //   console.log(this.criterias);
        })
        .catch(err => {
          console.error(err);
        });
    },
    deleteCriteria(id) {
      let url = "/api/courses/" + this.course.id + "/assessmentCriterias/" + id;
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
              this.getCriterias();
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
    showCurrentAssignment(criteria) {
      this.currentCriteria = criteria;
      this.showEditCriteria = true;
    }
  },
  mounted() {
    // this.isLoaded=true;
  },
  watch: {
    course: function(course) {
      if (this.course.id) {
        this.getCriterias();
        // console.log("loaded");
        this.isLoaded = true;
      }
    }
  }
};
</script>