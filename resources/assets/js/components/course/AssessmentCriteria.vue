<template>
  <div class="container-fluid">
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
              <td>{{criteria.description}}</td>
              <td></td>
              <td>
                <div>
                  <button v-if="!activeButtons[criteria.id]" class="btn btn-danger">Remove</button>
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
</template>

<script>
import CriteriaForm from "./CriteriaForm";

export default {
  props: ["course"],
  data() {
    return {
      criterias: [],
      activeButtons: [],
      showForm: false
    };
  },
  components: {
    CriteriaForm
  },
  methods: {
    refresh() {
      console.log("refreshed");
      this. getCriterias();
          this.showForm=false;

    },
    getCriterias(){
        axios.get("/api/courses/" + this.course.id + "/assessmentCriterias")
        .then(res => {
            this.criterias=res.data;
            console.log(this.criterias)
        })
        .catch(err => {
            console.error(err); 
        })
    }
  },
  mounted() {
      this.getCriterias();
  },
};
</script>