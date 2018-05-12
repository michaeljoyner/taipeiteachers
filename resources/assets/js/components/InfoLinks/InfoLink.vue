<template>
    <div>
        <div class="flex justify-between items-center mt-4 mb-12">
            <h1 class="text-4xl font-sans text-grey-darkest normal">{{ title }}</h1>
            <div class="flex justify-end items-center">
                <delete-modal :delete-url="`/admin/info-links/${infoLinkAttributes.id}`"
                              :resource-name="title"
                              @item-deleted="infoLinkDeleted"
                              button-classes="btn btn-danger mr-4"
                              delete-button-classes="btn btn-danger"
                              cancel-button-classes="btn btn-secondary mr-4"
                ></delete-modal>
                <info-link-form :url="`/admin/info-links/${infoLinkAttributes.id}`"
                                :form-model="form_model"
                                button-text="Edit"
                                @info-link-persisted="updateInfoLink"
                ></info-link-form>
            </div>
        </div>
        <div class="my-8">
            <p class="mb-2 uppercase tracking-wide font-bold">The Scoop:</p>
            <p class="mb-8 font-light text-xl">{{ content }}</p>
            <p class="mb-4"><span class="uppercase tracking-wide font-bold">Filed under: </span>{{ topic }}</p>
            <p><span class="uppercase tracking-wide font-bold">Link to site: </span><a class="text-grey-dark font-bold" :href="link">{{ link_text }}</a></p>
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