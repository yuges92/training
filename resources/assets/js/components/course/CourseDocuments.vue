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
<AddDocumentModel></AddDocumentModel>

    <div class="box">
      <div class="box-body ">
        <table class="table table-hover table-sm-responsive">
          <thead>
            <tr>
              <th>#</th>
              <th>Document</th>
              <th>Title</th>
              <th>Description</th>
              <th>Position</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td><a href="" target="_blank" rel="noopener noreferrer">Download</a></td>
              <td>Title</td>
              <td>Description</td>
              <td>Top</td>
              <td>
                <div>
                  <button class="btn btn-info">Edit</button>
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
import AddDocumentModel from './AddDocumentModel'

export default {
  name: "CourseDocuments",
  props: [],
    components:{
    AddDocumentModel
  },
};
</script>