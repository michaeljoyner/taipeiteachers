<template>
    <div class="h-64 px-2 md:px-12 py-8 max-w-md w-full mx-auto rounded bg-white flex flex-col justify-center items-center">
        <form action=""
        class="w-full"
        @submit.prevent="signup"
        v-show="!complete"
        >
            <p class="text-center text-xl mb-12">Sign up to be informed when we launch</p>
            <div class="rounded-full flex items-center" :class="{'shakey border border-red': error}">
                <input type="email"
                        class="pl-2 flex-1 h-12 rounded-bl-full rounded-tl-full border-t border-b border-l border-site-primary"
                        v-model="email_address"
                >
                <button type="submit"
                        :class="{'opacity-50': waiting}"
                        class="h-12 w-24 md:w-32 bg-site-primary border-t border-b border-r rounded-tr-full rounded-br-full border-site-primary text-white px-4">
                    <span v-show="!waiting">Signup</span>
                    <span v-show="waiting" class="bouncy flex justify-center">
                        <div class="w-2 h-2 mx-1 bg-white rounded-full"></div>
                        <div class="w-2 h-2 mx-1 bg-white rounded-full"></div>
                        <div class="w-2 h-2 mx-1 bg-white rounded-full"></div>
                    </span>
                </button>
            </div>
            <p v-show="!error" class="mt-4 text-sm text-grey-dark text-center">No spam, we promise!</p>
            <p v-show="error" class="mt-4 text-lg text-red text-center">Signup failed. Check your address, or try again later.</p>
        </form>
        <transition name="fadeDownIn">
            <p v-show="complete" class="text-grey-darkest text-xl font-cursive text-center">Thanks so much! You're signed up and will be hearing from us soon!</p>
        </transition>
        <transition name="fadeInFromLeft">
                <svg v-show="complete" fill="#38c172" class="mt-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" height="50px"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM6.7 9.29L9 11.6l4.3-4.3 1.4 1.42L9 14.4l-3.7-3.7 1.4-1.42z"/></svg>
        </transition>
    </div>
</template>


<script>
export default {
  props: ["url"],

  data() {
    return {
      waiting: false,
      complete: false,
      email_address: "",
      error: false
    };
  },

  methods: {
    signup() {
      this.waiting = true;
      this.error = false;
      axios
        .post(this.url, { email: this.email_address })
        .then(() => {
          this.complete = true;
        })
        .catch(() => (this.error = true))
        .then(() => (this.waiting = false));
    }
  }
};
</script>

<style scoped lang="scss" type="text/css">
input {
  outline: none;
}
</style>


