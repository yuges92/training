<template>
  <div>
    <div class="col-md-4 my-3">
      <NewClassDate :class_id="courseClass.id"></NewClassDate>
    </div>

    <div class="row mx-md-5">
      <div class="col-sm-4 my-3" v-for="classDate in courseClass.classDates" :key="classDate.id">
        <ShowClassDate :classDate="classDate"></ShowClassDate>
      </div>
    </div>
  </div>
</template>

<script>
import NewClassDate from "./NewClassDate";
import ShowClassDate from "./ShowClassDate";

export default {
  props: ["courseClass"],

  data() {
    return {};
  },
  mounted() {
    // console.log("Mounted");
  },
  components: {
    NewClassDate,
    ShowClassDate
  },
  methods:{
          getClassDates() {
      // let url = "/api/classEvents/" + this.class_id + "/classDates";

      axios
        .get("/api/classEvents/" + this.courseClass.id + "/classDates")
        .then(response => {
          this.courseClass.classDates = response.data;
        //   this.isLoaded = true;
          console.log(this.courseClass.classDates);

        });
    },
  }
};
</script>
