<template>
  <div class="container-fluid">
    <button
      alt="default"
      data-toggle="modal"
      data-target="#classModel"
      class="btn btn-info"
    >
      <i class="fas fa-plus"></i> Add new class
    </button>
    <div class="box-body"></div>
    <div
      class="modal fade "
      tabindex="-1"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      style="display: none;"
      aria-hidden="true"
      id="classModel"
    >
      <div class="modal-dialog modal-lg">
        <form @submit.prevent enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
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
                    v-model="course.title"
                    placeholder="Title"
                  >
                </div>
              </div>

              <div class="form-group">
                <label
                  for="description"
                  class=" col-form-label"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Add course type description eg: "
                >Body:</label>
                <div class="col-sm-12">
                  <textarea
                    id="description"
                    class="form-control summernote"
                    name="description"
                    rows="4"
                    cols="80"
                    maxlength="300"
                    v-model="course.description"
                  ></textarea>
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
                  <i class="far fa-save"></i> Update
                </button>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </form>
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="">
      <div class="">
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

                <tr v-for="classEvent in course.classes" v-bind:key="classEvent.id">
                  <th scope="row" >{{classEvent.id}}</th>
                  <td >{{classEvent.title}}</td>
                  <td>{{classEvent.startDate}}</td>
                  <td class="row"><div class="btn-group">
                  <button type="button" class="btn btn-secondary  " data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
				  <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(57px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
					<a class="dropdown-item" href="#"><i class="far fa-eye"></i> View</a>
					<a class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i> Remove</a>
				  </div>
                </div></td>
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
export default {
  name: "Classes",
  props: ["course"],
  created(){
      var explode = function(){
    $('.dataTableClasses').DataTable();

};
setTimeout(explode, 2000);
      }
};


$(document).ready(function () {
    

});


</script>