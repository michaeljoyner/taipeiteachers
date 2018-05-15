<template>
    <span>
        <button class="btn btn-primary" @click="showForm = true">{{ buttonText }}</button>
        <modal :show="showForm">
            <div slot="header"></div>
            <div slot="body">
                <vue-form button-classes="btn btn-primary"
                          @submission-okay="articlePersisted"
                          :form-attributes="formModel"
                          :url="url"
                          class="max-w-sm mx-auto p-4"
                >
                    <div slot="form-body"
                         slot-scope="{formData, formErrors}"
                    >
                        <h3 class="text-xl text-site-secondary pb-3 mb-4 border-b-2 border-site-other">Articles</h3>
                        <div class="form-group my-3" :class="{'has-error': formErrors.title}">
                            <label class="text-sm text-site-secondary font-bold" for="title">Title</label>
                            <span class="text-xs text-red" v-show="formErrors.title">{{ formErrors.title }}</span>
                            <input type="text" name="title" v-model="formData.title" class="w-full h-8 pl-2 mt-1 border" id="title" placeholder="...and you'll never believe what happened next">
                        </div>
                        <div class="form-group my-3" :class="{'has-error': formErrors.description}">
                            <label class="text-sm text-site-secondary font-bold" for="description">Description</label>
                            <span class="text-xs text-red" v-show="formErrors.description">{{ formErrors.description }}</span>
                            <textarea name="description" v-model="formData.description" class="w-full h-32 p-2 mt-1 border" id="description" placeholder="Short and to the point, for the SEO"></textarea>
                        </div>
                        <div class="form-group my-3" :class="{'has-error': formErrors.intro}">
                            <label class="text-sm text-site-secondary font-bold" for="intro">Intro</label>
                            <span class="text-xs text-red" v-show="formErrors.intro">{{ formErrors.intro }}</span>
                            <textarea name="intro" v-model="formData.intro" class="w-full h-32 p-2 mt-1 border" id="intro" placeholder="To pique the interest of your beloved readers"></textarea>
                        </div>
                    </div>
                    <div slot="form-button-row">
                        <button type="button" @click="showForm = false" class="btn btn-secondary mr-4">Cancel</button>
                    </div>
                </vue-form>
            </div>
            <div slot="footer"></div>
        </modal>
    </span>
</template>

<script type="text/babel">
    export default {
        props: ['button-text', 'form-model', 'url'],

        data() {
            return {
                showForm: false
            };
        },

        methods: {
            articlePersisted(persisted_data) {
                this.showForm = false;
                this.$emit('article-saved', persisted_data);
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>