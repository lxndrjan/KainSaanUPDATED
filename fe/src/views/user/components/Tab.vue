<template>
  <div
    :class="hideTab ? 'hidden' : ''"
    class="w-full h-16 max-h-16 bg-slate-200 fixed bottom-0 z-10 flex justify-center items-center"
  >
    <ul
      v-auto-animate
      class="w-full px-8 flex flex-row justify-between text-sm font-medium text-center"
    >
      <li>
        <router-link
          to="/user/home"
          class="flex flex-col justify-between items-center text-sm"
          :class="getRoute == 'UserHome' ? 'text-blue-500' : 'text-slate-700'"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-house-fill"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"
            />
            <path
              fill-rule="evenodd"
              d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"
            />
          </svg>
          Home
        </router-link>
      </li>
      <li>
        <router-link
          to="/user/food-establishments"
          class="flex flex-col justify-between items-center text-sm"
          :class="
            getRoute == 'UserFoodEstablishments'
              ? 'text-blue-500'
              : 'text-slate-700'
          "
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-geo-alt-fill"
            viewBox="0 0 16 16"
          >
            <path
              d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"
            />
          </svg>
          Food Spots
        </router-link>
      </li>
      <li>
        <router-link
          to="/user/map"
          class="flex flex-col justify-between items-center text-sm"
          :class="getRoute == 'UserMap' ? 'text-blue-500' : 'text-slate-700'"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-map"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"
            />
          </svg>
          Nearby
        </router-link>
      </li>
      <li>
        <router-link
          to="/user/settings"
          class="flex flex-col justify-between items-center text-sm"
          :class="
            getRoute == 'UserSettings' ? 'text-blue-500' : 'text-slate-700'
          "
          ><svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-sliders"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"
            />
          </svg>
          Settings
        </router-link>
      </li>
    </ul>
  </div>
</template>
<script setup>
import { computed, ref, onMounted } from "vue";
import { useStore } from "vuex";
import { useRoute } from "vue-router";
const store = useStore();
const myInfo = ref({});
const props = defineProps({
  hideTab: { type: Boolean, default: false },
});

async function getUserInfo() {
  const res = await store.dispatch("auth/me");
  myInfo.value = res.data;
}

onMounted(async () => {
  await getUserInfo();
});

const route = useRoute();
const getRoute = computed(() => route.name);
</script>
