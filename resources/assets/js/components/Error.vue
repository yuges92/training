<template>
    <div>
        
  <div class="alert alert-danger alert-dismissible fade show" v-if="errors ">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
      <div class="" v-for="error in errors" v-bind:key="error.id">
        <span>
          {{error}}
        </span>
      </div>
  </div>


    </div>
</template>

<script>
export default {
    name:'Error',
    props:['errors'],
    data() {
        return {
            
        }
    },
    
}
</script>