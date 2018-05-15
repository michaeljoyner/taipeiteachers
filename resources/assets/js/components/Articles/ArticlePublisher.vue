<template>
    <div class="flex flex-col items-center">
        <p class="w-full mb-8 uppercase text-site-secondary font-bold">Publishing</p>
        <p class="text-xs font-bold uppercase tracking-wide text-grey">Status:</p>
        <p class="my-3 text-lg text-site-secondary">{{ status }}</p>
        <button @click="handlePublish"
                class="btn btn-secondary my-8"
                :disabled="waiting">{{ button_text }}
        </button>
        <div v-if="!isPublished" class="flex flex-col items-center my-6">
            <p class="text-xs font-bold uppercase tracking-wide text-grey">On This date:</p>
            <date-picker v-model="toPublishOnDate" class="border mt-2"></date-picker>
        </div>

    </div>
</template>

<script type="text/babel">
    import DatePicker from "vuejs-datepicker";

    export default {

        props: ['publish-url', 'article-id', 'retract-url', 'published_date', 'is-published', 'status'],

        data() {
            return {
                toPublishOnDate: '',
                waiting: false
            };
        },

        computed: {
            button_text() {
                if (this.waiting) {
                    return 'hold on...';
                }

                return this.isPublished ? 'retract' : 'publish';
            }
        },

        created() {
            this.toPublishOnDate = this.publishedDate;
        },

        components: {
            DatePicker
        },

        methods: {
            handlePublish() {
                if(this.isPublished) {
                    return this.retract();
                }

                this.publish();
            },

            retract() {
                axios.delete(this.retractUrl)
                     .then(() => {
                         this.$emit('published-state-updated', {
                             published_on: this.publishedDate,
                             is_draft: true,
                             published_status: 'Draft'
                         })
                     })
                     .catch(() => {});
            },

            publish() {
                axios.post(this.publishUrl, {
                    article_id: this.articleId,
                    publish_date: this.toPublishOnDate
                })
                    .then(({data}) => this.$emit('published-state-updated', data))
                    .catch(err => console.log(err));
            }
        }

    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>