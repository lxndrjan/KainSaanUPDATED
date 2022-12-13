<template>
  <div
    v-if="!loadPage"
    class="w-full min-h-screen max-h-screen bg-white relative scrollbar-hidden"
  >
    <router-view name="UserHome" />
    <router-view
      name="UserFoodEstablishments"
      @hideTab="(val) => (hideTab = val)"
    />
    <router-view name="UserMap" />
    <router-view name="UserSettings" />
  </div>
  <Tab :hide-tab="hideTab" />
</template>
<script setup>
import Tab from "./components/Tab.vue";

import { ref, onMounted } from "vue";
import { useStore } from "vuex";
const hideTab = ref(false);
const store = useStore();
const loadPage = ref(true);
async function myInfo() {
  await store.dispatch("auth/me");
  loadPage.value = false;
}
onMounted(async () => {
  await myInfo();
});
</script>
