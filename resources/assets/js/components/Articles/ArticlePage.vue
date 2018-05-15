<template>
    <div>
        <div class="flex justify-between items-center mt-4 mb-12">
            <h1 class="text-4xl font-sans text-grey-darkest normal">{{ title }}</h1>
            <div class="flex justify-end items-center">
                <a :href="`/admin/articles/${articleAttributes.id}/body`"
                   class="btn btn-secondary mr-4">Edit Content</a>
                <article-form :form-model="articleFormData"
                              :url="`/admin/articles/${articleAttributes.id}`"
                              button-text="Edit"
                              @article-saved="updateArticle"
                ></article-form>
            </div>
        </div>
        <div class="my-8 p-4 bg-white shadow">
            <p class="w-full mb-8 uppercase text-site-secondary font-bold">Description (For SEO)</p>
            <p>{{ description }}</p>
        </div>
        <div class="my-8 p-4 bg-white shadow">
            <p class="w-full mb-8 uppercase text-site-secondary font-bold">Intro</p>
            <p>{{ intro }}</p>
        </div>
        <div class="flex justify-around">
            <article-publisher class="w-1/2 max-w-sm p-4 bg-white shadow"
                               publish-url="/admin/published-articles"
                               :article-id="articleAttributes.id"
                               :retract-url="`/admin/published-articles/${articleAttributes.id}`"
                               :status="published_status"
                               :published-date="published_on"
                               :is-published="is_published"
                               @published-state-updated="updatePublishedState"
            ></article-publisher>
            <div class="max-w-sm w-1/2 mx-auto p-4 bg-white shadow">
                <p class="w-full mb-8 uppercase text-site-secondary font-bold">Title Image</p>
                <image-upload :upload-url="`/admin/articles/${articleAttributes.id}/title-images`"
                              :delete-url="`/admin/articles/${articleAttributes.id}/title-images`"
                              :initial-src="articleAttributes.title_image"
                              :aspect-x="3"
                              :aspect-y="2"
                              class=""
                ></image-upload>
            </div>

        </div>
    </div>
</template>

<script type="text/babel">
    import {Form} from "@dymantic/vue-forms";

    export default {

        props: ['article-attributes'],

        data() {
            return {
                articleFormData: new Form({
                    title: this.articleAttributes.title,
                    intro: this.articleAttributes.intro,
                    description: this.articleAttributes.description
                }),
                title: '',
                intro: '',
                description: '',
                published_on: null,
                published_status: '',
                is_published: false,
            };
        },

        created() {
            this.title = this.articleAttributes.title;
            this.intro = this.articleAttributes.intro;
            this.description = this.articleAttributes.description;
            this.published_on = this.articleAttributes.published_on;
            this.published_status = this.articleAttributes.published_status;
            this.is_published = !this.articleAttributes.is_draft;
        },

        methods: {
            updateArticle({title, intro, description}) {
                this.title = title;
                this.intro = intro;
                this.description = description;

                this.articleFormData.resetFields({title, intro, description});
            },

            updatePublishedState({is_draft, published_on, published_status}) {
                this.is_published = ! is_draft;
                this.published_status = published_status;
                this.published_on = published_on;
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>