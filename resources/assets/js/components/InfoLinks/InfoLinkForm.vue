<template>
    <span>
        <button class="btn" @click="showForm = true">{{ buttonText }}</button>
        <modal :show="showForm">
            <div slot="header"></div>
            <div slot="body" class="p-4">
                <vue-form class="max-w-sm mx-auto" :url="url" :form-attributes="formModel" @submission-okay="infoLinkPersisted">
                    <div slot="form-body" slot-scope="{formErrors, formData}">
                        <h3 class="text-green">Remember, Just the Tip...</h3>
                        <div class="form-group my-3" :class="{'has-error': formErrors.title}">
                            <label class="text-sm uppercase text-green font-bold" for="title">Title</label>
                            <span class="text-xs text-red" v-show="formErrors.title">{{ formErrors.title }}</span>
                            <input type="text" name="title" v-model="formData.title" class="w-full h-8 pl-2 mt-1 border" id="title">
                        </div>
                        <div class="form-group my-3" :class="{'has-error': formErrors.content}">
                            <label class="text-sm uppercase text-green font-bold" for="content">Content</label>
                            <span class="text-xs text-red" v-show="formErrors.content">{{ formErrors.content }}</span>
                            <textarea name="content" v-model="formData.content" class="h-20 p-2 mt-1 w-full border"></textarea>
                        </div>
                        <div class="form-group my-3" :class="{'has-error': formErrors.link}">
                            <label class="text-sm uppercase text-green font-bold" for="link">Link</label>
                            <span class="text-xs text-red" v-show="formErrors.link">{{ formErrors.link }}</span>
                            <input type="text" name="link" v-model="formData.link" class="w-full h-8 pl-2 mt-1 border" id="link">
                        </div>
                        <div class="form-group my-3" :class="{'has-error': formErrors.link_text}">
                            <label class="text-sm uppercase text-green font-bold" for="link_text">Link_text</label>
                            <span class="text-xs text-red" v-show="formErrors.link_text">{{ formErrors.link_text }}</span>
                            <input type="text" name="link_text" v-model="formData.link_text" class="w-full h-8 pl-2 mt-1 border" id="link_text">
                        </div>
                        <div class="form-group my-3" :class="{'has-error': formErrors.topic}">
                            <label class="text-sm uppercase text-green font-bold" for="topic">Topic</label>
                            <span class="text-xs text-red" v-show="formErrors.topic">{{ formErrors.topic }}</span>
                            <select v-model="formData.topic" name="topic" id="topic" class="w-full mt-1 h-8 border">
                                <option v-for="topic in topics" :value="topic">{{ topic }}</option>
                            </select>
                        </div>
                    </div>
                    <div slot="form-button-row">
                        <button type="button" @click="showForm = false">Cancel</button>
                    </div>
                </vue-form>
            </div>
            <div slot="footer"></div>
        </modal>
    </span>
</template>

<script type="text/babel">
    export default {
        props: ['button-text', 'url', 'form-model'],

        data() {
            return {
                showForm: false,
                topics: ['teaching', 'recreation', 'living']
            }
        },

        methods: {
            infoLinkPersisted(link_data) {
                this.showForm = false;

                this.$emit('info-link-persisted', link_data);
            }
        }
    }
</script>

<style scoped lang="scss" type="text/scss">

</style>