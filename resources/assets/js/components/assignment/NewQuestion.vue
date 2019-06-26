<template>
  <div>
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="card-title">New Question</h3>
      </div>
      <div class="box-body wizard-content">
        <form action="#" class="tab-wizard wizard-circle wizard clearfix">
          <div class="clearfix"></div>
          <div class="content clearfix">
            <h6 tabindex="-1" class="title">Question Detail</h6>
            <section class="body">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="firstName5">Question Number :</label>
                    <input type="text" class="form-control" id="firstName5">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="lastName1">Question :</label>
                    <input type="text" class="form-control" id="lastName1">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="location3">Question Type :</label>
                    <select class="custom-select form-control" id="location3" name="location">
                      <option value>Select a question type</option>
                      <option value>Dropdown Box</option>
                      <option value>Multiple Choice</option>
                      <option value>Comment Box</option>
                      <option value>File Upload</option>
                      <option value>Radio Buttons</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="with-border">
                <h4>Answers:</h4>
                <div class="row">
                  <div class="col-md-8 my-auto">
                    <input type="text" class="form-control" id="firstName5">
                  </div>
                  <div class="my-auto">
                    <button class="btn btn-default" type="button">
                      <i class="fas fa-plus"></i>
                    </button>
                    <button class="btn btn-default" type="button">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="my-3">
                <h4>Assessment Criterias:</h4>
                <div class="row">
                <div class="col-md-3">
                  <div class="form-group ">
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

              <div class="row"></div>
            </section>
            <!-- Step 2 -->
            <h6 id="steps-uid-0-h-1" tabindex="-1" class="title">Job Status</h6>
            <section
              id="steps-uid-0-p-1"
              role="tabpanel"
              aria-labelledby="steps-uid-0-h-1"
              class="body"
              aria-hidden="true"
              style="display: none;"
            >
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="jobTitle1">Job Title :</label>
                    <input type="text" class="form-control" id="jobTitle1">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="videoUrl1">Company Name :</label>
                    <input type="text" class="form-control" id="videoUrl1">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="shortDescription1">Job Description :</label>
                    <textarea
                      name="shortDescription"
                      id="shortDescription1"
                      rows="6"
                      class="form-control"
                    ></textarea>
                  </div>
                </div>
              </div>
            </section>
            <!-- Step 3 -->

            <!-- Step 4 -->
          </div>
          <div class="actions clearfix">
            <button type="submit" class="btn btn-info rounded">Save</button>
          </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</template>

<script>
export default {
  props: ["assignment_id"]
};
</script>