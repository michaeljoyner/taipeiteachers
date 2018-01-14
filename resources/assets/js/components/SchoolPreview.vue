<template>
    <span>
        <modal :show="openModal">
            <div slot="header">
                <p class="text-3xl text-grey">Is it worthy?</p>
            </div>
            <div slot="body">
                <div class="flex justify-between">
                    <div class="w-1/2">
                        <div class="flex justify-center items-center">
                            <img :src="current_photo"
                                 alt=""
                                 class="max-w-full" v-if="has_images">
                            <img src="/images/defaults/school.png"
                                 alt="" v-if="!has_images">
                        </div>
                        <div class="flex justify-around my-4" v-show="has_images && school_data.photos.length > 1">
                            <span class="text-xl text-green font-bold" @click="prevPhoto">&larr;</span>
                            <span class="text-xl text-green font-bold" @click="nextPhoto">&rarr;</span>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <p class="my-2"><span class="font-bold">Name:</span> {{ school_data.name }}</p>
                        <p class="my-2"><span class="font-bold">Address:</span> {{ school_data.address }}</p>
                        <p class="my-2"><span class="font-bold">City:</span> {{ school_data.city }}</p>
                        <p class="my-2"><span class="font-bold">Phone:</span> {{ school_data.telephone }}</p>
                        <p class="my-2"><span class="font-bold">Website:</span> {{ school_data.website }}</p>
                        <p class="my-2"><span class="font-bold">Email:</span> {{ school_data.email }}</p>
                    </div>
                </div>
            </div>
            <div slot="footer">
                <div class="flex justify-end items-center h-12">
                    <button class="p-3 uppercase text-sm font-bold mx-3 bg-grey-light"
                            @click="openModal = false">Cancel</button>
                    <button class="p-3 uppercase text-sm font-bold mx-3 bg-green-light"
                            @click="postSchool"
                            :disabled="waiting"
                    >Add School</button>
                </div>
            </div>
        </modal>
    </span>
</template>

<script type="text/babel">
    export default {

        data() {
            return {
                openModal: false,
                school_data: {},
                waiting: false,
                photo_index: 0
            }
        },

        computed: {
            current_photo() {
                if (!this.has_images) {
                    return;
                }

                return this.school_data.photos[this.photo_index];
            },

            has_images() {
                return this.school_data.photos && this.school_data.photos.length;
            }
        },

        mounted() {
            eventHub.$on('preview-school', this.setPreview);
        },

        methods: {
            setPreview(school_data) {
                this.school_data = school_data;
                this.photo_index = 0;
                this.openModal = true;
            },

            postSchool() {
                this.waiting = true;
                axios.post('/admin/schools', this.schoolPostData())
                     .then(() => this.$emit('school-saved', this.school_data.id))
                     .catch(err => console.log(err))
                     .then(() => {
                         this.openModal = false;
                         this.waiting = false
                     });
            },

            schoolPostData() {
                const data = {...this.school_data};
                data.photo_url = this.school_data.photos[this.photo_index];

                return data;
            },

            nextPhoto() {
                if(this.photo_index < this.school_data.photos.length - 1) {
                    return this.photo_index++;
                }

                this.photo_index = 0;
            },

            prevPhoto() {
                if(this.photo_index > 0) {
                    return this.photo_index--;
                }

                this.photo_index = this.school_data.photos.length - 1;
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

    button[disabled] {
        opacity: .5;
    }
</style>