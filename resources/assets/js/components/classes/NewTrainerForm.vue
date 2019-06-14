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
            >
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
          <div class="mr-md-5">
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
      imageSrc: "https://via.placeholder.com/300.png"
    };
  },
  methods: {
    fullName({ id,fullName }) {
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
          Vue.toasted.show(
            '<i class="fas fa-check-circle fa-3x"></i> Class details updated',
            {
              type: "success",
              duration: 4000,
              className: "py-3"
            }
          );
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
          }
        })
        .catch(err => {
          console.error(err);
        });
    },
        onChange (value) {
      // console.log(value);
      
            this.imageSrc = value.image;

    },
  },
  mounted() {
    this.getTrainer();
  }
};
</script>