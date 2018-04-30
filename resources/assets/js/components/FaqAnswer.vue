<template>
    <div class="px-4 lg:px-0 mb-20 py-4 border-t-4 border-site-primary">
        <h3 class="font-cursive">{{ question }}</h3>
        <p class=" py-4">{{ shortAnswer }}</p>
        <div class="flex justify-center">
            <a :href="link" @click.prevent="show = true" class="no-underline text-xs uppercase tracking-loose text-white bg-site-primary py-1 px-2 rounded">See more</a>
            <transition name="expand">
                <div v-if="show" class="fixed pin z-50 bg-white border-t-4 border-site-primary px-4">
                    <div class="overflow-y-scroll h-screen">
                        <div class="flex justify-end py-2">
                            <button @click="show = false" class="text-site-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" height="30px"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm1.41-1.41A8 8 0 1 0 15.66 4.34 8 8 0 0 0 4.34 15.66zm9.9-8.49L11.41 10l2.83 2.83-1.41 1.41L10 11.41l-2.83 2.83-1.41-1.41L8.59 10 5.76 7.17l1.41-1.41L10 8.59l2.83-2.83 1.41 1.41z"/></svg>
                            </button>
                        </div>

                        <h3 class="mb-20 opacity-0 riseup an-del-25 max-w-large mx-auto text-center text-3xl font-cursive">{{ question }}</h3>
                        <p class="opacity-0 riseup an-del-50 max-w-md mx-auto">{{ fullAnswer }}</p>
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