<template>
    <div>
        <div class="flex justify-between items-center mt-4 mb-12">
            <h1 class="text-4xl font-sans text-grey-darkest normal">Just a bunch a Faqs</h1>
            <div class="flex justify-end items-center">
                <faq-form url="/admin/faqs" :form-model="blank_form" button-text="Add Faq" @faq-persisted="resetForm"></faq-form>
            </div>
        </div>
        <div>
            <div v-for="faq in faqs_list"
                 :key="faq.id"
                 class="p-4 my-8 shadow border-t-4 max-w-md mx-auto"
                 :class="{'border-green-light': faq.published, 'border-grey-dark': !faq.published}">
                <a :href="`/admin/faqs/${faq.id}`" class="no-underline text-grey-darkest">
                    <h3 class="mb-3">{{ faq.question }}</h3>
                </a>
                <p class="mb-4">{{ faq.short_answer }}</p>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import { Form } from "@dymantic/vue-forms";
    export default {
        props: ['faqs'],

        data() {
            return {
                blank_form: new Form({question: '', short_answer: ''}),
                faqs_list: []
            };
        },

        mounted() {
          this.faqs_list = this.faqs;
        },

        methods: {
            resetForm(data) {
                this.faqs_list.push(data);
                this.blank_form.resetFields();
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>