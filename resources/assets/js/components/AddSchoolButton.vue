<template>
    <school-form url="/admin/schools"
                 form-type="create"
                 button-text="add school"
                 @create-submitted="schoolAdded"
    ></school-form>
</template>

<script type="text/babel">
    export default {

        methods: {
            schoolAdded(school) {
                console.log(school);
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>