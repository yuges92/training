<template>
    <div>
        <div
      class="modal fade"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      style="display: none;"
      aria-hidden="true"
      id="model_add_document"
    >
      <div class="modal-dialog modal-lg">
        <form @submit.prevent enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myLargeModalLabel">Add New Document</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="title" class="col col-form-label">Title:</label>
                <div class="col-sm-12">
                  <input
                    name="title"
                    type="text"
                    class="form-control"
                    id="title"
                    placeholder="Title"
                  >
                </div>
              </div>

              <div class="form-group">
                <label
                  for="description"
                  class="col-form-label"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Add course type description eg: "
                >Body:</label>
                <div class="col-sm-12">

                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="form-group d-flex justify-content-between mt-3 p-3">
                <button
                  type="button"
                  class="btn btn-danger waves-effect text-left"
                  data-dismiss="modal"
                >Close</button>
                <button class="btn btn-success rounded px-5" type="submit">
                  <i class="far fa-save"></i> Save
                </button>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </form>
      </div>
      <!-- /.modal-dialog -->
    </div>
    </div>
</template>

<script>
export default {
    name:'AddDocumentModel',
    props:[],
    data() {
        return {
            
        }
    },

}
</script>