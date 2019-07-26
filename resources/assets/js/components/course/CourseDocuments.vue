<template>
  <div class="container-fluid">
    <button
      alt="default"
      data-toggle="modal"
      class="btn btn-info mb-3"
      @click="showAddDocumentForm()"
      v-if="!showAddDocument"
    >
      <i class="fas fa-plus"></i> Add Document
    </button>
    <AddDocumentForm v-if="showAddDocument" :course="course"></AddDocumentForm>

    <div class="box" v-if="!showAddDocument">
      <div class="box-body">
        <table class="table table-hover table-sm-responsive">
          <thead>
            <tr>
              <th>#</th>
              <th>Description</th>
              <th>Document</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="document in course.documents" v-bind:key="document.id">
              <th scope="row">{{document.id}}</th>
              <td>{{document.title}}</td>
              <td>
                <a class="btn btn-info rounded" :href="document.filename" target="_blank" rel="noopener noreferrer">Download</a>

              </td>
              <td>
                <div>
                  <button
                    v-if="!activeButtons[document.id]"
                    @click="deleteDocument(document.id)"
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
</template>

<script>
import AddDocumentForm from "./AddDocumentForm";

export default {
  name: "CourseDocuments",
  props: ["course"],
  data() {
    return {
      showAddDocument: false,

      activeButtons: []
    };
  },
  components: {
    AddDocumentForm
  },
  methods: {
    showAddDocumentForm() {
      this.showAddDocument = true;
    },
    deleteDocument(id) {
      let url = "/api/courses/" + this.course.id + "/courseDocuments/" + id;
      let _this = this;
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
            .then(function(response) {
              _this.alertSuccess("Deleted");

              _this.$parent.refresh();
            })
            .catch(function(error) {
                console.log(error.response.data);
              _this.alertFailed("Failed");

              Vue.set(_this.activeButtons, id, 0);
            })
            .then(function() {
            });
          // console.log(id);
        }
      });
    }
  },
  mounted() {

  }
};
</script>
