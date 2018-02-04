<template>
    <span>
        <button class="btn uppercase text-sm text-green border-2 px-2 py-1 border-green"
                @click="modalOpen = true">{{ buttonText }}</button>
        <modal :show="modalOpen">
            <div slot="header"></div>
            <div slot="body" class="p-4">
                <form action=""
                      @submit.prevent="submit">
                    <div class="form-group my-3"
                         :class="{'has-error': form.errors.name}">
                        <label class="text-sm uppercase text-green font-bold"
                               for="name">Name</label>
                        <span class="text-xs text-red"
                              v-show="form.errors.name">{{ form.errors.name }}</span>
                        <input type="text"
                               name="name"
                               v-model="form.data.name"
                               class="w-full h-8 pl-2 mt-1 border">
                    </div>
                    <div class="form-group my-3"
                         :class="{'has-error': form.errors.address}">
                        <label class="text-sm uppercase text-green font-bold"
                               for="address">Address</label>
                        <span class="text-xs text-red"
                              v-show="form.errors.address">{{ form.errors.address }}</span>
                        <input type="text"
                               name="address"
                               v-model="form.data.address"
                               class="w-full h-8 pl-2 mt-1 border">
                    </div>
                    <div class="flex justify-between">
                        <div class="w-1/2 form-group my-3 pr-3"
                             :class="{'has-error': form.errors.email}">
                            <label class="text-sm uppercase text-green font-bold"
                                   for="email">Email</label>
                            <span class="text-xs text-red"
                                  v-show="form.errors.email">{{ form.errors.email }}</span>
                            <input type="text"
                                   name="email"
                                   v-model="form.data.email"
                                   class="w-full h-8 pl-2 mt-1 border">
                        </div>
                        <div class="w-1/2 form-group my-3 pl-3"
                             :class="{'has-error': form.errors.telephone}">
                            <label class="text-sm uppercase text-green font-bold"
                                   for="telephone">Telephone</label>
                            <span class="text-xs text-red"
                                  v-show="form.errors.telephone">{{ form.errors.telephone }}</span>
                            <input type="text"
                                   name="telephone"
                                   v-model="form.data.telephone"
                                   class="w-full h-8 pl-2 mt-1 border">
                        </div>
                    </div>
                    <div class="form-group my-3"
                         :class="{'has-error': form.errors.city}">
                        <label class="text-sm uppercase text-green font-bold"
                               for="city">City</label>
                        <span class="text-xs text-red"
                              v-show="form.errors.city">{{ form.errors.city }}</span>
                        <input type="text"
                               name="city"
                               v-model="form.data.city"
                               class="w-full h-8 pl-2 mt-1 border">
                    </div>
                    <div class="form-group my-3"
                         :class="{'has-error': form.errors.contact_person}">
                        <label class="text-sm uppercase text-green font-bold"
                               for="contact_person">Contact_person</label>
                        <span class="text-xs text-red"
                              v-show="form.errors.contact_person">{{ form.errors.contact_person }}</span>
                        <input type="text"
                               name="contact_person"
                               v-model="form.data.contact_person"
                               class="w-full h-8 pl-2 mt-1 border">
                    </div>
                    <div class="flex justify-between">
                        <div class="w-1/2 form-group my-3 pr-3"
                             :class="{'has-error': form.errors.latitude}">
                            <label class="text-sm uppercase text-green font-bold"
                                   for="latitude">Latitude</label>
                            <span class="text-xs text-red"
                                  v-show="form.errors.latitude">{{ form.errors.latitude }}</span>
                            <input type="text"
                                   name="latitude"
                                   v-model="form.data.latitude"
                                   class="w-full h-8 pl-2 mt-1 border">
                        </div>
                        <div class="w-1/2 form-group my-3 pl-3"
                             :class="{'has-error': form.errors.longitude}">
                            <label class="text-sm uppercase text-green font-bold"
                                   for="longitude">Longitude</label>
                            <span class="text-xs text-red"
                                  v-show="form.errors.longitude">{{ form.errors.longitude }}</span>
                            <input type="text"
                                   name="longitude"
                                   v-model="form.data.longitude"
                                   class="w-full h-8 pl-2 mt-1 border">
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button class="ml-3 px-2 py-1 text-grey text-sm font-bold border-2 border-grey" type="button"
                                @click.prevent="modalOpen = false">Cancel</button>
                        <button class="ml-3 px-2 py-1 text-green text-sm font-bold border-2 border-green" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div slot="footer"></div>
        </modal>

    </span>
</template>

<script type="text/babel">
    import {formMixin, Form} from "@dymantic/vue-forms";

    export default {
        mixins: [formMixin],

        data() {
            return {
                form: new Form({
                    name: this.formAttributes.name || '',
                    address: this.formAttributes.address || '',
                    telephone: this.formAttributes.telephone || '',
                    email: this.formAttributes.email || '',
                    contact_person: this.formAttributes.contact_person || '',
                    latitude: this.formAttributes.latitude || '',
                    longitude: this.formAttributes.longitude || '',
                    city: this.formAttributes.city || '',
                })
            };
        },

        methods: {
            canSubmit() {
                return true;
            },

            parseResponseData(data) {
                return data;
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>