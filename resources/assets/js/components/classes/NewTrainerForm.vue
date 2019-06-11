<template>
  <div>
    <form @submit.prevent="createClassTrainer()" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <h2>{{trainerType}} Trainer:</h2>
        </div>
        <div class="card-body">
          <div class="col">
            <label for="type" class="col-form-label">Trainer</label>
            <multiselect
              v-model="trainer"
              track-by="id"
              label="firstName"
              placeholder="Select a trainer"
              :options="trainers"
              :allow-empty="false"
              :custom-label="fullName"
            >
              <template slot="singleLabel" slot-scope="{ option }">
                <strong>(#{{ option.id }}) {{ option.firstName }} {{ option.lastName }}</strong>
              </template>
            </multiselect>
          </div>
<img :src="trainer.image" alt="">
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
  props: ["trainerType", 'trainers'],
  data() {
    return {
      showBtn: true,
      classTrainers: [],
      trainer: {
          id:'',
          image:''
      },
      primaryImage:'',
    };
  },
  methods: {
    fullName({ id, firstName, lastName }) {
      return `(${id}) ${firstName} ${lastName}`;
    },
    createClassTrainer() {},


  },
  mounted() {
  }
};
</script>