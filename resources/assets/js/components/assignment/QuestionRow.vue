<template>
    <div>
        <div class="box">
              <div class="box-header with-border d-md-flex justify-content-start">
                <div class="col-md-10">
                  <h4>1. Question</h4>
                </div>
                <div class="col">
                  <div class="btn-group float-right">
                    <button type="button" class="btn btn-info">Action</button>
                    <button
                      type="button"
                      class="btn btn-info dropdown-toggle"
                      data-toggle="dropdown"
                    >
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Edit</a>
                      <a class="dropdown-item" href="#">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-body">
                <div class="col-md-8">
                  <div class="form-group d-md-flex justify-content-between">
                    <div class="checkbox">
                      <input type="checkbox" id="Checkbox_1">
                      <label for="Checkbox_1">Checkbox 1</label>
                    </div>

                    <div class="checkbox">
                      <input type="checkbox" id="Checkbox_2">
                      <label for="Checkbox_2">Checkbox 2</label>
                    </div>

                  </div>
                </div>
              </div>
            </div>
    </div>
</template>

<script>
export default {
    props:[],

    data() {
        return {
            
        }
    },
}
</script>