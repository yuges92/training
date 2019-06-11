<template>
  <div>
    <div v-if="!isLoaded">
      <div class="d-flex justify-content-center">
        <div class="spinner-border text-info" style="width: 3rem; height: 3rem;" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>

    <div v-else>
      <div class="row mx-md-5">
        <div class="col-md-4 my-3">
          <NewTrainerForm :class_id="courseClass.id" :trainerType="'Primary'" :trainers="trainers"></NewTrainerForm>
        </div>
        <div class="col-md-4 my-3">
          <NewTrainerForm
            :class_id="courseClass.id"
            :trainerType="'Secondary'"
            :trainers="trainers"
          ></NewTrainerForm>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NewTrainerForm from "./NewTrainerForm";

export default {
  props: ["courseClass"],

  data() {
    return {
      isLoaded: false,
      showNewTrainer: false,
      newClassTrainer: [],
      trainers: []
    };
  },
  mounted() {
    this.getAllTrainers();
    this.isLoaded = true;
  },
  methods: {
    showNewTrainerForm() {
      this.showNewTrainer = true;
    },
    getAllTrainers() {
      axios
        .get("/api/trainers")
        .then(res => {
          this.trainers = res.data;
          this.isLoaded = true;
          console.log(this.trainers);
        })
        .catch(err => {
          console.error(err);
        });
    }
  },
  components: {
    NewTrainerForm
  }
};
</script>