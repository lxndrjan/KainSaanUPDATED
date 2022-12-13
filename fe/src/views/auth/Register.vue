<template>
  <loader v-if="isLoading" />
  <div
    v-else
    class="w-screen min-h-screen h-full grid place-content-center bg-white box-border p-5"
  >
    <div class="min-h-[80vh] max-h-[80vh] relative">
      <div class="min-h-[80vh] max-h-[90vh] max-w-sm p-6">
        <img
          src="../../assets/svg/login-img.svg"
          alt=""
          class="animate__animated animate__fadeIn animate__slower"
        />
        <p
          class="font-poppins font-semibold text-center mt-2 animate__animated animate__fadeIn animate__slower"
        >
          Register
        </p>
        <p
          class="font-poppins text-sm text-center animate__animated animate__fadeIn animate__slower"
        >
          Register to access KainSaan
        </p>
        <form
          class="animate__animated animate__fadeIn animate__slower"
          @submit.prevent="register"
        >
          <div class="relative my-6">
            <input
              v-model="data.full_name"
              type="text"
              class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
              placeholder=" "
              required
              autofocus
            />
            <label
              class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
              >Full Name</label
            >
          </div>
          <div class="relative my-6">
            <input
              v-model="data.email"
              type="email"
              id="floating_email"
              class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
              placeholder=" "
              required
              autofocus
            />
            <label
              for="floating_email"
              class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
              >Email Address</label
            >
          </div>
          <div class="relative mb-6">
            <input
              v-model="data.password"
              type="password"
              id="floating_password"
              class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
              placeholder=" "
              required
            />
            <label
              for="floating_password"
              class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
              >Password</label
            >
          </div>
          <button
            type="submit"
            class="w-full px-6 py-2.5 bg-yellow-300 text-white font-medium text-xs leading-tight uppercase rounded shadow-md outline-none ring-0 active:bg-yellow-400 active:shadow-lg transition duration-150 ease-in-out"
          >
            Create Account
          </button>
          <p class="text-yellow-300 font-semibold text-sm mt-6 text-center">
            Already a member?
            <router-link
              to="/"
              class="text-yellow-300 transition duration-200 ease-in-out"
              >Sign in here</router-link
            >
          </p>
        </form>
      </div>
    </div>
  </div>
</template>
<script setup>
import loader from "./components/Loader.vue";
import { ref } from "vue";
import { useToast } from "vue-toastification";
import { useStore } from "vuex";
import { useRouter } from "vue-router";
const toast = useToast();
const store = useStore();
const router = useRouter();
const data = ref({
  email: "",
  password: "",
  full_name: "",
});
const isLoading = ref(false);

async function login(credentials) {
  let href = "http://127.0.0.1:5173/user/home";
  const res = await store.dispatch("auth/login", credentials);
  res.status == 200
    ? router.push("/user/home")
    : toast.error("Your account is unauthorized");
}

async function register() {
  isLoading.value = true;
  setTimeout(async () => {
    const res = await store.dispatch("auth/register", data.value);
    res.status == 200
      ? (await login(data.value), (isLoading.value = false))
      : (toast.error("Sorry, we cannot register your account."),
        (isLoading.value = false));
  }, 2000);
}
</script>
