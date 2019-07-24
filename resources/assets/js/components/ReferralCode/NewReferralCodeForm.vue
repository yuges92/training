<template>
  <div>
    <form @submit.prevent="saveForm()" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <h2>New Referrer Form</h2>
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
            <button type="button" class="btn btn-default mr-1" @click="cancel()">Cancel</button>
            <SubmitButton :showBtn="showBtn"></SubmitButton>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: [""],
  data() {
    return {
      showBtn: true,
      referralCode: {
        name: "",
        description: ""
      }
    };
  },
  methods: {
    saveForm() {
      // console.log(this.trainer);
      this.showBtn = false;
      axios
        .post("/api/referralCode", {
          name: this.referralCode.name,
          description: this.referralCode.description
        })
        .then(res => {
          // console.log(res);

          this.alertSuccess("Saved");
          this.isTrainerAdded = true;
          this.$parent.getReferralCodes();
        })
        .catch(err => {
          console.error(err);
          this.alertFailed("Failed");
        })
        .then(res => {
          this.showBtn = true;
        });
    },
    cancel() {
      this.$parent.showForm = false;
    }
  },
  mounted() {
    // this.getTrainer();
  }
};
</script>
