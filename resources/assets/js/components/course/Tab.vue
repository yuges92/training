<template>
    <div>
        <ul v-bind:key="course.course_id" v-for="course in courses">

        <h1>{{course.course_id}}</h1>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'Tab',
    props:[
        'courses'
        ]
}
</script>