<template>
  <div>
    <Error :errors="errors" v-if="errors!=''"></Error>

    <loader v-if="!isLoaded"></loader>
    <div v-else>
      <div class="container-fluid">
        <button class="btn btn-info mb-3" @click="showForm = !showForm" v-if="!showForm">
          <i class="fas fa-plus"></i> Add new class
        </button>
        <NewReferralCodeForm class="my-3" v-else></NewReferralCodeForm>
        <div class="box">
          <div class="box-body">
            <table class="table table-hover table-responsive-sm dataTableClasses">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Start Date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="classEvent in 10" v-bind:key="classEvent.id">
                  <th scope="row">{{classEvent.id}}</th>
                  <td>{{classEvent.title}}</td>
                  <td>{{classEvent.startDate}}</td>
                  <td class="d-flex justify-content-between">
                    <div class="col">
                      <button class="btn btn-success" @click="showCurrentAssignment(1)">
                        <i class="fas fa-eye"></i>
                      </button>
                    </div>
                    <div class="col">
                      <button
                        v-if="!activeButtons[1]"
                        @click="deleteCriteria(1)"
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
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NewReferralCodeForm from "./NewReferralCodeForm.vue";
export default {
  props: ["class_id"],

  data() {
    return {
      isLoaded: true,
      errors: null,
      showError: false,
      activeButtons: [],
      showForm:false,
    };
  },
  components: {
    Error,
    NewReferralCodeForm
  },

  mounted() {
    // console.log(this.getClass());
  },
  created() {
    // this.getClass();
  },
  methods: {
    getClass() {
      this.isLoaded = false;
      axios.get("/api/classEvents/" + this.class_id).then(response => {
        this.courseClass = response.data;
        this.isLoaded = true;
        // console.log(this.courseClass);
      });
    },

    updateErrors(errors) {
      this.errors = errors;
    }
  }
};
</script>
