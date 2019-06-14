<template>
  <div class="container-fluid">
    <a  :href="'/admin/classes/create?course_id='+course.id" class="btn btn-info mb-3">
      <i class="fas fa-plus"></i> Add new class
    </a>
    <div class>
      <div class>
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
                  <th scope="row">{{classEvent.id}}</th>
                  <td>{{classEvent.title}}</td>
                  <td>{{classEvent.startDate}}</td>
                  <td class="row">
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-default rounded"
                        data-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <i class="fas fa-ellipsis-v"></i>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div
                        class="dropdown-menu"
                        x-placement="bottom-start"
                        style="position: absolute; transform: translate3d(57px, 29px, 0px); top: 0px; left: 0px; will-change: transform;"
                      >
                        <a class="dropdown-item" :href="'/admin/class/'+classEvent.id">
                          <i class="far fa-eye"></i> View
                        </a>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-trash-alt"></i> Remove
                        </a>
                      </div>
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
export default {
  name: "Classes",
  props: ["course"],

  created() {},
  mounted() {
    var explode = function() {
      $(".dataTableClasses").DataTable();
    };
    setTimeout(explode, 2000);
  }
};

$(document).ready(function() {});
</script>