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
              <th>Position</th>
              <th>Document</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td>Description</td>
              <td>Top</td>
              <td>
                <a href target="_blank" rel="noopener noreferrer">Download</a>
              </td>
              <td>
                <div>
                  <button class="btn btn-danger">Remove</button>
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
      showAddDocument: false
    };
  },
  components: {
    AddDocumentForm
  },
  methods: {
    showAddDocumentForm() {
      this.showAddDocument = true;
    },
    saveDocument() {
      console.log(this.course);
    }
  },
  mounted() {
    console.log(this.course);
  }
};
</script>