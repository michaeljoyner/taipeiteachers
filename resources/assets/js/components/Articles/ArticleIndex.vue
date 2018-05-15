<template>
    <div>
        <div class="flex justify-between items-center mt-4 mb-12">
            <h1 class="text-4xl font-sans text-grey-darkest normal">Blog Posts</h1>
            <div class="flex justify-end items-center">
                <article-form button-text="New Post" :form-model="newArticleForm" url="/admin/articles" @article-saved="addArticle"></article-form>
            </div>
        </div>
        <div>
            <div v-for="article in articles" :key="article.id" class="bg-white p-4">
                <p class="font-bold text-xl"><a class="no-underline text-site-secondary hover:text-site-other" :href="`/admin/articles/${article.id}`">{{ article.title}}</a></p>
                <p>{{ article.description }}</p>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import { Form } from "@dymantic/vue-forms";

    export default {
        props: ['article-list'],

        data() {
            return {
                articles: [],
                newArticleForm: new Form({
                    title: '',
                    description: '',
                    intro: ''
                })
            };
        },

        created() {
            this.articles = this.articleList;
        },

        methods: {
            addArticle(article) {
                this.newArticleForm.resetFields();
                this.articles.push(article);
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>