<template>
  <div class="container-fluid">
    <button
      alt="default"
      data-toggle="modal"
      data-target="#model_add_document"
      class="btn btn-info mb-3"
    >
      <i class="fas fa-plus"></i> Add Document
    </button>
    <AddDocumentModel :course="course"></AddDocumentModel>

    <div class="box">
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
import AddDocumentModel from "./AddDocumentModel";

export default {
  name: "CourseDocuments",
  props: ['course'],
  components: {
    AddDocumentModel
  },
  methods: {
    saveDocument(){
      console.log(this.course);
      
    }
  },
  mounted() {
      console.log(this.course);
    
  },
};
</script>