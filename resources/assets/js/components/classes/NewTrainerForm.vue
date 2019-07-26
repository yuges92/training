<template>
  <div>
    <form @submit.prevent="createClassTrainer()" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <h2>{{trainerType}} Trainer:</h2>
        </div>
        <div class="card-body">
          <div>
            <img
              class="user-image rounded"
              style="width:100px; height:100px;"
              v-bind:src="imageSrc"
              alt="User profile picture"
            />
          </div>
          <div class="col">
            <label for="type" class="col-form-label">Trainer</label>
            <multiselect
              v-model="trainer"
              track-by="id"
              placeholder="Select a trainer"
              :options="trainers"
              :allow-empty="false"
              :custom-label="fullName"
              @input="onChange"
            >
              <template slot="singleLabel" slot-scope="{ option }">
                <strong>(#{{ option.id }}) {{ option.fullName }}</strong>
              </template>
            </multiselect>
          </div>
          <div class="col-12 row">
            <div class="col-4" v-if="isTrainerAdded">
              <div class="form-group row float-left mt-3 p-3">
                <button
                  class="btn btn-danger rounded"
                  type="button"
                  @click="removeTrainer"
                >{{deleting}}</button>
              </div>
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
      classTrainers: [],
      trainer: {},
      noImageLink: "https://via.placeholder.com/300.png",
      imageSrc: "https://via.placeholder.com/300.png",
      isTrainerAdded: false,
      deleting: "Remove"
    };
  },
  methods: {
    fullName({ id, fullName }) {
      return `(#${id}) ${fullName}`;
    },
    createClassTrainer() {
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
              this.alertSuccess("Saved");

          this.isTrainerAdded = true;
        })
        .catch(err => {
            console.error(err);
              this.alertFailed("Failed");

        })
        .then(res => {
          this.showBtn = true;
        });
    },
    getTrainer() {
      axios
        .post("/api/classEvents/" + this.class_id + "/classTrainer", {
          class_id: this.class_id,
          type: this.trainerType
        })
        .then(res => {
          this.trainer = res.data;
          if (this.trainer != 404) {
            this.imageSrc = this.trainer.image;
            this.isTrainerAdded = true;
          }
        })
        .catch(err => {
          console.error(err);
        });
    },

    onChange(value) {
      // console.log(value);

      this.imageSrc = value.image;
    },
    removeTrainer() {
      this.deleting = "Removing...";

      axios
        .post("/api/classEvents/" + this.class_id + "/classTrainer", {
          class_id: this.class_id,
          type: this.trainerType,
          _method: "DELETE"
        })
        .then(res => {
          this.trainer = null;
          if (this.trainer != 404) {
            this.imageSrc = this.noImageLink;
            this.isTrainerAdded = false;
          }

              this.alertSuccess("Saved");

        })
        .catch(err => {
              this.alertFailed("Failed");
          console.error(err);
        })
        .then(res => {
          this.deleting = "Remove";
        });
    }
  },
  mounted() {
    this.getTrainer();
  }
};
</script>
