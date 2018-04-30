<template>
    <div>
        <div class="flex justify-between items-center mt-4 mb-12">
            <h1 class="text-4xl font-sans text-grey-darkest normal">{{ question }}</h1>
            <div class="flex justify-end items-center">
                <delete-modal :delete-url="`/admin/faqs/${faqAttributes.id}`"
                              :resource-name="question"
                              @item-deleted="pageDestroyed"
                ></delete-modal>
                <faq-form :url="`/admin/faqs/${faqAttributes.id}`"
                          button-text="Edit"
                          :form-model="form"
                          @faq-persisted="updateFaq"
                ></faq-form>
            </div>
        </div>
        <div class="p-4 my-8 shadow flex justify-between">
            <p>Publish Status:</p>
            <toggle-switch label="Publish"
                           :switch-state="published"
                           on-url="/admin/published-faqs"
                           :off-url="`/admin/published-faqs/${faqAttributes.id}`"
                           :post-body="{faq_id: faqAttributes.id}"
                           @toggle-switched-on="published = true"
                           @toggle-switched-off="published = false"
            ></toggle-switch>
        </div>
        <div class="p-4 my-8 shadow">
            <p class="uppercase text-xs text-green font-bold tracking-loose mb-4">Short Answer</p>
            <p class="text-xl">{{ short_answer }}</p>
        </div>
        <div class="p-4 my-8 shadow">
            <div class="flex justify-between">
                <p class="uppercase text-xs text-green font-bold tracking-loose mb-4">Full Answer</p>
                <a :href="`/admin/faqs/${faqAttributes.id}/full-answer/edit`">Edit</a>
            </div>
            <div class="leading-normal" v-html="faqAttributes.full_answer"></div>
        </div>
    </div>
</template>

<script type="text/babel">
    import { Form } from "@dymantic/vue-forms";
    export default {
        props: ['faq-attributes'],

        data() {
            return {
                form: new Form({question: this.faqAttributes.question, short_answer: this.faqAttributes.short_answer}),
                question: '',
                short_answer: '',
                published: false
            };
        },

        mounted() {
            this.question = this.faqAttributes.question;
            this.short_answer = this.faqAttributes.short_answer;
            this.published = this.faqAttributes.published;
        },

        methods: {
            updateFaq({question, short_answer}) {
                this.form.resetFields({question, short_answer});
                this.question = question;
                this.short_answer = short_answer;
            },

            pageDestroyed() {
                window.location = '/admin/faqs';
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>