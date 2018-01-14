<template>
    <div>
        <div class="flex justify-between items-center mt-4 mb-12">
            <h1 class="text-4xl font-sans text-grey-darkest normal">{{ school.name }}</h1>
            <div class="flex justify-end items-center">
                <school-form :url="`/admin/schools/${school.id}`"
                             button-text="Edit"
                             form-type="update"
                             :form-attributes="school"
                             @update-submitted="updateSchool"
                ></school-form>
            </div>
        </div>
        <section class="flex justify-between">
            <div class="w-1/2">
                <p class="mb-2"><strong class="block text-green-light">Name: </strong>{{ school.name }}</p>
                <p class="mb-2"><strong class="block text-green-light">Address: </strong>{{ school.address }}</p>
                <p class="mb-2"><strong class="block text-green-light">Telephone: </strong>{{ school.telephone }}</p>
                <p class="mb-2"><strong class="block text-green-light">Email: </strong>{{ school.email }}</p>
                <p class="mb-2"><strong class="block text-green-light">Website: </strong>{{ school.website }}</p>
                <p class="mb-2"><strong class="block text-green-light">City: </strong>{{ school.city }}</p>
            </div>
            <div class="w-1/2 flex justify-center items-center p-4">
                <img :src="school_photo"
                     alt="" class="max-w-full">
            </div>

        </section>
    </div>
</template>

<script type="text/babel">
    export default {
        props: ['school-data'],

        data() {
            return {
                school: this.schoolData
            };
        },

        computed: {
            school_photo() {
                if(this.school.photo_url) {
                    return this.school.photo_url;
                }

                return '/images/defaults/school.png'
            }
        },

        methods: {
            updateSchool(updated_data) {
                Object.keys(updated_data).forEach(field => {
                    if(this.school.hasOwnProperty(field)) {
                        this.school[field] = updated_data[field];
                    }
                });
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>