<template>
    <div class="h-50">
        <img :src="src" v-if="src.length">
      <p v-else>No image...</p>
    </div>
</template>

<script>
export default {
    name:'FilePreview',
    props:['src'],
    methods: {
        
    },
}
</script>