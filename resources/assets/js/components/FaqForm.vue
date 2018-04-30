<template>
    <span>
        <button @click="showForm = true">{{ buttonText}}</button>
        <modal :show="showForm">
            <div slot="body" class="p-4">
                <h3>Frequently Asked Question</h3>
                <vue-form :url="url"
                          action=""
                          :form-attributes="formModel"
                          @submission-okay="faqPersisted"
                >
                    <div slot="form-body"
                         slot-scope="{formData, formErrors}"
                    >
                        <div class="form-group my-3"
                             :class="{'has-error': formErrors.question}">
                            <label class="text-sm uppercase text-green font-bold"
                                   for="question">Question</label>
                            <span class="text-xs text-red"
                                  v-show="formErrors.question">{{ formErrors.question }}</span>
                            <input type="text"
                                   name="question"
                                   v-model="formData.question"
                                   class="w-full h-8 pl-2 mt-1 border"
                                   id="question">
                        </div>
                        <div class="form-group my-3"
                             :class="{'has-error': formErrors.short_answer}">
                            <label class="text-sm uppercase text-green font-bold"
                                   for="short_answer">Short answer</label>
                            <span class="text-xs text-red"
                                  v-show="formErrors.short_answer">{{ formErrors.short_answer }}</span>
                            <textarea type="text"
                                      name="short_answer"
                                      v-model="formData.short_answer"
                                      class="w-full h-32 p-2 mt-1 border"
                                      id="short_answer"></textarea>
                        </div>
                    </div>
                    <div slot="form-button-row">
                        <button type="button"
                                @click="showForm = false">Cancel</button>
                    </div>
                </vue-form>
            </div>
        </modal>
    </span>
</template>

<script type="text/babel">
    import Form from "@dymantic/vue-forms";

    export default {
        props: ['form-model', 'button-text', 'url'],

        data() {
            return {
                showForm: false
            };
        },

        methods: {
            faqPersisted(data) {
                this.$emit('faq-persisted', data);
                this.showForm = false;
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>