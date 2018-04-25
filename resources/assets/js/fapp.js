window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
  window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
  console.error(
    "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
  );
}

window.Vue = require("vue");

Vue.component("email-signup", require("./components/EmailSignup"));

window.eventHub = new Vue();

const app = new Vue({
  el: "#app"
});

window.initMaps = ev => eventHub.$emit("maps-loaded");

document.body.addEventListener(
  "keyup",
  ev => {
    switch (ev.keyCode) {
      case 27:
        eventHub.$emit("KEY_ESC");
        break;
      default:
        break;
    }
  },
  false
);
