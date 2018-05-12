<template>
    <div>
        <div class="flex justify-between items-center mt-4 mb-12">
            <h1 class="text-4xl font-sans text-grey-darkest normal">{{ title }}</h1>
            <div class="flex justify-end items-center">
                <info-link-form :url="`/admin/info-links/${infoLinkAttributes.id}`"
                                :form-model="form_model"
                                button-text="Edit"
                                @info-link-persisted="updateInfoLink"
                ></info-link-form>
                <delete-modal :delete-url="`/admin/info-links/${infoLinkAttributes.id}`"
                              :resource-name="title"
                              @item-deleted="infoLinkDeleted"
                ></delete-modal>
            </div>
        </div>
        <div class="p-8 shadow my-8">
            <span class="bg-grey text-white text-sm rounded shadow uppercase tracking-wide px-2 py-1 font-bold">{{ topic }}</span>
            <p class="my-8 font-light text-2xl">{{ content }}</p>
            <p class="my-4 font-bold"><a class="text-grey-dark" :href="link">{{ link_text }}</a></p>
        </div>
    </div>
</template>

<script type="text/babel">
    import {Form} from "@dymantic/vue-forms";

    export default {
        props: ['info-link-attributes'],

        data() {
            return {
                title: '',
                content: '',
                link: '',
                link_text: '',
                topic: '',
                form_model: new Form({
                    title: this.infoLinkAttributes.title,
                    content: this.infoLinkAttributes.content,
                    link: this.infoLinkAttributes.link,
                    link_text: this.infoLinkAttributes.link_text,
                    topic: this.infoLinkAttributes.topic
                })
            };
        },

        created() {
            this.title = this.infoLinkAttributes.title;
            this.content = this.infoLinkAttributes.content;
            this.link = this.infoLinkAttributes.link;
            this.link_text = this.infoLinkAttributes.link_text;
            this.topic = this.infoLinkAttributes.topic;
        },

        methods: {
            updateInfoLink(link_data) {
                this.form_model.resetFields(link_data);
                this.title = link_data.title;
                this.content = link_data.content;
                this.link = link_data.link;
                this.link_text = link_data.link_text;
                this.topic = link_data.topic;
            },

            infoLinkDeleted() {
                window.location = '/admin/info-links';
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>