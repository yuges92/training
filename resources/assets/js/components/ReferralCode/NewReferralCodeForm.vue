<template>
  <div>
    <form @submit.prevent="saveForm()" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <h2>New Referrer</h2>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
              <input
                name="name"
                type="text"
                class="form-control"
                id="name"
                placeholder="Referer Name"
                v-model="referralCode.name"
                required
              />
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Short Description:</label>
            <div class="col-sm-10">
              <textarea
                id="description"
                class="form-control"
                name="description"
                rows="4"
                cols="80"
                maxlength="600"
                v-model="referralCode.description"
              ></textarea>
            </div>
          </div>

          <div class="my-3 d-flex justify-content-end">
            <SubmitButton :showBtn="showBtn"></SubmitButton>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: ["trainerType", "trainers", "class_id"],
  data() {
    return {
      showBtn: true,
      referralCode: {
        title: "",
        description: ""
      }
    };
  },
  methods: {
    saveForm() {
      // console.log(this.trainer);
      this.showBtn = false;
      axios
        .post("/api/classEvents/" + this.class_id + "/trainers", {
          class_id: this.class_id,
          user_id: this.trainer.id,
          type: this.trainerType
        })
        .then(res => {
          // console.log(res);
          Vue.toasted.show(
            '<i class="fas fa-check-circle fa-3x"></i> Trainer Updated',
            {
              type: "success",
              duration: 4000,
              className: "py-3"
            }
          );
          this.isTrainerAdded = true;
        })
        .catch(err => {
          console.error(err);
          Vue.toasted.show(
            '<i class="fas fa-exclamation-circle"></i> Update Failed',
            {
              type: "error",
              duration: 4000,
              className: "py-3"
            }
          );
        })
        .then(res => {
          this.showBtn = true;
        });
    }
  },
  mounted() {
    // this.getTrainer();
  }
};
</script>
