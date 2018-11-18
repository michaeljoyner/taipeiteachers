<template>
    <div class="px-4 lg:px-0 mb-20 py-4 border-t-2 border-grey">
        <h3 class="font-cursive">{{ question }}</h3>
        <p class=" py-4">{{ shortAnswer }}</p>
        <div class="flex justify-center">
            <a :href="link" @click.prevent="show = true" class="no-underline text-xs uppercase tracking-loose text-white bg-site-primary py-1 px-2 rounded">See more</a>
            <transition name="expand">
                <div v-if="show" class="fixed pin z-50 bg-white border-t-4 border-site-primary px-4">
                    <div class="overflow-y-scroll h-screen">
                        <div class="flex justify-end py-2">
                            <button @click="show = false" class="text-site-primary border-2 border-site-primary py-1 px-2 m-3 font-cursive">
                                &larr; Back
                            </button>
                        </div>
                        <h3 class="mb-20 opacity-0 riseup an-del-25 max-w-md mx-auto text-3xl font-cursive">{{ question }}</h3>
                        <div class="opacity-0 riseup an-del-50 max-w-md mx-auto pb-12" v-html="fullAnswer"></div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {
        props: ['question', 'short-answer', 'full-answer', 'link'],

        data() {
            return {
                show: false
            };
        }
    }
</script>

<style scoped lang="scss" type="text/scss">

</style>