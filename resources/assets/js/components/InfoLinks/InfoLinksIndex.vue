<template>
    <div>
        <div class="flex justify-between items-center mt-4 mb-12">
            <h1 class="text-4xl font-sans text-grey-darkest normal">InfoBytes</h1>
            <div class="flex justify-end items-center">
                <info-link-form url="/admin/info-links"
                                button-text="Add new Link"
                                :form-model="new_form"
                                @info-link-persisted="addNewInfoLink"
                ></info-link-form>
            </div>
        </div>
        <div>
            <div v-for="link in links" class="my-8 shadow p-8 relative"
                 :key="link.id">
                <p class="mt-4 font-bold"><a class="no-underline text-site-secondary hover:text-site-other text-xl" :href="`/admin/info-links/${link.id}`">{{ link.title }}</a></p>
                <span class="absolute pin-t pin-r mr-6 text-white bg-site-other rounded my-4 shadow px-2 py-1 font-bold uppercase tracking-wide text-xs">{{ link.topic }}</span>
                <p class="my-4">{{ link.content }}</p>
                <a class="text-grey-dark font-bold text-sm my-4" :href="link.link">{{ link.link_text }}</a>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import {Form} from "@dymantic/vue-forms";

    export default {

        props: ['info-links'],

        data() {
            return {
                links: [],
                new_form: new Form({
                    title: '',
                    content: '',
                    link: '',
                    link_text: '',
                    topic: ''
                })
            };
        },

        mounted() {
            this.links = this.infoLinks;
        },

        methods: {
            addNewInfoLink(link) {
                this.new_form.resetFields();
                this.links.push(link);
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>