<template>
  <div>
    <Error :errors="errors" v-if="errors!=''"></Error>

    <loader v-if="!isLoaded"></loader>
    <div v-else>
      <div class="container-fluid" v-if="!showEditForm">
        <button class="btn btn-info mb-3" @click="showForm = !showForm" v-if="!showForm">
          <i class="fas fa-plus"></i> Add new
        </button>
        <NewReferralCodeForm class="my-3" v-else></NewReferralCodeForm>


        <div class="box">
          <div class="box-body">
            <table class="table table-hover table-responsive-sm dataTableClasses ">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="referralCode in referralCodes" v-bind:key="referralCode.id">
                  <th scope="row">{{referralCode.id}}</th>
                  <td>{{referralCode.name}}</td>
                  <td>{{referralCode.description}}</td>
                  <td class="d-flex justify-content-between">
                    <div class="col">
                      <button
                        class="btn btn-success"
                        @click="edit(referralCode)"
                      >
                        <i class="fas fa-eye"></i>
                      </button>
                    </div>
                    <div class="col">
                      <button
                        v-if="!activeButtons[referralCode.id]"
                        @click="remove(referralCode.id)"
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
        <EditReferralCodeForm class="my-3" v-if="showEditForm" :referralCode="selectedCode"></EditReferralCodeForm>
    </div>


  </div>
</template>

<script>
import NewReferralCodeForm from "./NewReferralCodeForm.vue";
import EditReferralCodeForm from "./EditReferralCodeForm.vue";
export default {
  props: ["class_id"],

  data() {
    return {
      isLoaded: false,
      errors: null,
      showError: false,
      activeButtons: [],
      showForm: false,
      showEditForm: false,
      selectedCode: '',
      referralCodes: []
    };
  },
  components: {
    Error,
    NewReferralCodeForm,
    EditReferralCodeForm
  },

  mounted() {
    // console.log(this.getClass());
  },
  created() {
    this.getReferralCodes();
  },
  methods: {
    getReferralCodes() {
      this.isLoaded = false;
      axios.get("/api/referralCode").then(response => {
        // console.log(response.data);
        this.referralCodes = response.data;
        this.isLoaded = true;
        this.showForm=false;
        this.showEditForm=false;
      });
    },
    remove(id) {
      let url = "/api/referralCode/"+id;
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
              this.alertSuccess("Deleted");
              this.getReferralCodes();
            })
            .catch(error => {
              console.log(error.response);
              this.alertFailed("Failed");
              Vue.set(this.activeButtons, id, 0);
            });
        }
      });
    },
    edit(referralCode){
        this.selectedCode=referralCode;
        this.showEditForm=true;
    },

    updateErrors(errors) {
      this.errors = errors;
    }
  }
};
</script>
