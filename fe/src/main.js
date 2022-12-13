import { createApp } from "vue";
import App from "./App.vue";
import Toast from "vue-toastification";
import router from "./router";
import store from "./store";
import { autoAnimatePlugin } from "@formkit/auto-animate/vue";
import vue3StarRatings from "vue3-star-ratings";
import { Skeletor } from "vue-skeletor";
import { UploadMedia, UpdateMedia } from "vue-media-upload";
import VueObserveVisibility from "vue3-observe-visibility";
import "vue-skeletor/dist/vue-skeletor.css";
import "flowbite";
import "./assets/css/app.css";
import "vue-toastification/dist/index.css";
import "tw-elements";
import "animate.css";
const app = createApp(App);
const options = {
  position: "top-center",
  timeout: 3000,
  closeOnClick: true,
  pauseOnFocusLoss: false,
  pauseOnHover: true,
  showCloseButtonOnHover: false,
  hideProgressBar: true,
  closeButton: false,
  icon: true,
  rtl: false,
  maxToasts: 1,
  transition: "Vue-Toastification__fade",
  newestOnTop: true,
};
app.component(Skeletor.name, Skeletor);
app.component("vue3-star-ratings", vue3StarRatings);
app.use(VueObserveVisibility);
app.use(autoAnimatePlugin);
app.use(store);
app.use(router);
app.use(Toast, options);
app.component("upload-media", UploadMedia);
app.component("update-media", UpdateMedia);
app.mount("#app");
