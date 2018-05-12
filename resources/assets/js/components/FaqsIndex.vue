<template>
    <div>
        <div class="flex justify-between items-center mt-4 mb-12">
            <h1 class="text-4xl font-sans text-grey-darkest normal">Just a bunch a Faqs</h1>
            <div class="flex justify-end items-center">
                <faq-form url="/admin/faqs" :form-model="blank_form" button-text="Add Faq" @faq-persisted="resetForm"></faq-form>
            </div>
        </div>
        <div class="flex flex-wrap justify-around">
            <div v-for="faq in faqs_list"
                 :key="faq.id"
                 class="my-8 shadow w-2/5 max-w-md mx-auto rounded"
                 >
                <div :class="{'bg-site-other': faq.published, 'bg-grey-dark': !faq.published}" class="p-4 h-32 flex items-center rounded-t">
                    <a :href="`/admin/faqs/${faq.id}`" class="no-underline text-white hover:text-site-secondary">
                        <h3 class="mb-3">{{ faq.question }}</h3>
                    </a>
                </div>

                <p class="p-4 mb-4 text-sm leading-normal">{{ faq.short_answer }}</p>
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