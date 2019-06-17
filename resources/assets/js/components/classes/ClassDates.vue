<template>
  <div>
    <div class="col-md-4 my-3">
      <NewClassDate :class_id="courseClass.id"></NewClassDate>
    </div>

    <div class="row mx-md-5">
      <div class="col-sm-4 my-3" v-for="classDate in courseClass.class_dates" :key="classDate.id">
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
        .get("/api/classEvents/" + this.class_id + "/classDates")
        .then(response => {
          this.courseClass.class_dates = response.data;
        //   this.isLoaded = true;
          // console.log(response.data);
        });
    },
  }
};
</script>
