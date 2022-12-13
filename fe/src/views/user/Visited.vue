<template>
  <div
    class="pb-16 min-h-screen h-full w-full bg-white animate__animated animate__fadeIn"
  >
    <div class="w-full overflow-hidden text-center py-5 bg-yellow-300 relative">
      <p class="font-poppins text-lg font-semibold text-green-500">KainSaan</p>
    </div>
    <p
      class="text-black p-5 text-sm font-poppins"
      v-if="foodEstablishments.length <= 0"
    >
      Nothing's here...
    </p>
    <div
      v-if="isLoading"
      class="px-5 pb-5 pt-2 border-b-2"
      v-for="i in 10"
      :key="i"
    >
      <div class="flex flex-row items-center gap-x-3 mt-3">
        <div>
          <Skeletor :width="100" />
          <Skeletor :width="100" />
          <Skeletor :width="100" />
        </div>
        <div class="w-full">
          <p class="font-poppins text-sm font-semibold">
            <Skeletor />
          </p>
          <div class="flex justify-between w-full">
            <div>
              <Skeletor :width="100" />
            </div>
            <div>
              <Skeletor :width="100" />
            </div>
          </div>
          <div>
            <p class="text-sm font-medium text-gray-400">
              <Skeletor :width="200" />
            </p>
            <p class="text-sm font-medium text-blue-400">
              <Skeletor :width="100" />
            </p>
          </div>
        </div>
      </div>
    </div>
    <div
      v-if="!isLoading && !showInfo"
      class="px-5 pb-5 pt-2 border-b-2 active:bg-gray-100"
      v-for="(food, i) in foodEstablishments"
      @click="addViews(food.food_establishment_id)"
      :key="i"
    >
      <div class="flex flex-row items-center gap-x-3 mt-3">
        <img
          :src="food.food_establishment.images[0].file_path"
          width="80"
          class="rounded-xl h-20 max-h-20"
        />
        <div class="w-full">
          <p class="font-poppins text-sm font-semibold">
            {{ food.food_establishment.store_name }}
          </p>
          <div class="flex justify-between w-full">
            <div>
              <vue3-star-ratings
                :starSize="'15'"
                :disableClick="true"
                :showControl="false"
                v-model="food.food_establishment.rating"
              />
            </div>
            <div>
              <p class="text-sm font-medium text-gray-400">
                {{ food.food_establishment.reviews.length }} Reviews
              </p>
            </div>
          </div>
          <div>
            <p class="text-sm font-medium text-gray-400">
              {{ food.food_establishment.address }}
            </p>
            <p class="text-sm font-medium text-blue-400">
              {{ food.food_establishment.category }}
            </p>
          </div>
        </div>
      </div>
    </div>
    <div v-if="!isLoading && showInfo && !showFoodInfo" class="px-7 pb-10 pt-6">
      <div class="flex justify-between">
        <p class="font-poppins font-bold">
          {{ foodEstablishmentInfo.store_name }}
        </p>
        <span>
          <svg
            v-if="myFavorite.food_establishment_id == foodEstablishmentInfo.id"
            @click="removeToFavorites(myFavorite.id)"
            class="w-6 h-6"
            :fill="
              myFavorite.food_establishment_id == foodEstablishmentInfo.id
                ? 'orange'
                : 'none'
            "
            stroke="orange"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
            ></path>
          </svg>
          <svg
            v-else
            @click="addToFavorites(foodEstablishmentInfo.id)"
            class="w-6 h-6"
            fill="none"
            stroke="orange"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
            ></path>
          </svg>
        </span>
      </div>
      <vue3-star-ratings
        :starSize="'15'"
        :disableClick="true"
        :showControl="false"
        v-model="foodEstablishmentInfo.rating"
      />

      <div class="mt-3">
        <p class="text-sm text-gray-400">Food Establishment Description</p>
        <p class="text-sm text-justify">
          {{ foodEstablishmentInfo.store_description }}
        </p>
      </div>
      <div class="flex justify-between mt-3">
        <div>
          <p class="text-sm text-gray-400">Address</p>
          <p class="text-sm">{{ foodEstablishmentInfo.address }}</p>
        </div>
        <div class="text-right">
          <p class="text-sm text-gray-400">Category</p>
          <p class="text-sm">{{ foodEstablishmentInfo.category }}</p>
        </div>
      </div>
      <div class="flex justify-between mt-3">
        <div>
          <p class="text-sm text-gray-400">Average Price /person</p>
          <p class="text-sm">PHP {{ foodEstablishmentInfo.average_cost }}</p>
        </div>
        <div class="text-right">
          <p class="text-sm text-gray-400">Cuisine</p>
          <p class="text-sm">{{ foodEstablishmentInfo.cuisine_type }}</p>
        </div>
      </div>
      <div class="flex justify-between mt-3">
        <div>
          <p class="text-sm text-gray-400">Parking Information</p>
          <p class="text-sm">Parking info</p>
        </div>
        <div class="text-right">
          <p class="text-sm text-gray-400">Total Views</p>
          <p class="text-sm text-blue-500">{{ foodEstablishmentInfo.views }}</p>
        </div>
      </div>
      <hr class="mt-3" />
      <div class="flex justify-between mt-3">
        <button
          @click="showFoodInfo = true"
          class="bg-yellow-300 px-7 text-white py-1 rounded-md active:bg-yellow-400"
        >
          View menu
        </button>
        <a
          class="bg-yellow-300 px-7 text-white py-1 rounded-md active:bg-yellow-400"
          target="_blank"
          :href="`https://www.google.com/maps/dir/${center.lat},${center.lng}/${foodEstablishmentInfo.coords.lat},${foodEstablishmentInfo.coords.lng}/@${foodEstablishmentInfo.coords.lat},${foodEstablishmentInfo.coords.lng}?hl=en-US`"
        >
          Get Directions</a
        >
      </div>
      <hr class="mt-3" />
      <div class="flex justify-between items-center mt-3">
        <p class="text-sm font-bold">Reviews</p>
      </div>
      <hr class="mt-3" />
      <p
        class="text-sm mt-3 text-red-500"
        v-if="foodEstablishmentInfo.reviews.length <= 0"
      >
        No Reviews
      </p>
      <div class="mt-3" v-for="(rev, r) in foodEstablishmentInfo.reviews">
        <p class="text-sm font-bold flex flex-row items-center gap-x-2">
          {{ rev.user_name }}
          <vue3-star-ratings
            :starSize="'10'"
            :disableClick="true"
            :showControl="false"
            v-model="rev.rating"
          />
        </p>
        <blockquote class="text-xl italic text-gray-900">
          <p class="mt-2 text-sm">"{{ rev.review }}"</p>
        </blockquote>
      </div>
      <div class="flex flex-col gap-y-2 mt-10">
        <hr />
        <label class="text-sm">Rate and review</label>
        <textarea
          v-model="review.review"
          class="border-yellow-300 focus:border-yellow-300 focus:ring-0"
        ></textarea>
        <vue3-star-ratings
          :starSize="'15'"
          v-model="review.rating"
          :showControl="false"
        />
        <button
          @click="addReview(foodEstablishmentInfo.id)"
          class="bg-yellow-300 px-7 text-white py-1 rounded-md active:bg-yellow-400 mt-2"
        >
          Submit
        </button>
      </div>
    </div>
    <div v-if="showFoodInfo" class="p-5 break-all">
      <p class="font-bold">
        {{ foodEstablishmentInfo.store_name }} - Food Menu
      </p>
      <p class="mt-5" v-if="foods.find((el) => el.category === 'Main Dish')">
        Main Dish
        <span><hr class="mb-3" /></span>
      </p>
      <div v-for="food in foods">
        <p
          v-if="food.category == 'Main Dish'"
          class="font-poppins font-bold inline-flex items-center gap-x-3 mt-3"
        >
          <span><img :src="food.image" class="max-w-[70px]" alt="" /></span
          >{{ food.food_name }} <br />
          PHP {{ food.price }}
        </p>
      </div>
      <p class="mt-5" v-if="foods.find((el) => el.category === 'Side Dish')">
        Side Dish
        <span><hr class="mb-3" /></span>
      </p>
      <div v-for="food in foods">
        <p
          v-if="food.category == 'Side Dish'"
          class="font-poppins font-bold inline-flex items-center gap-x-3 mt-3"
        >
          <span><img :src="food.image" class="max-w-[70px]" alt="" /></span
          >{{ food.food_name }} <br />
          PHP {{ food.price }}
        </p>
      </div>
      <p class="mt-5" v-if="foods.find((el) => el.category === 'Appetizer')">
        Appetizer
        <span><hr class="mb-3" /></span>
      </p>
      <div v-for="food in foods">
        <p
          v-if="food.category == 'Appetizer'"
          class="font-poppins font-bold inline-flex items-center gap-x-3 mt-3"
        >
          <span><img :src="food.image" class="max-w-[70px]" alt="" /></span
          >{{ food.food_name }} <br />
          PHP {{ food.price }}
        </p>
      </div>
      <p class="mt-5" v-if="foods.find((el) => el.category === 'Dessert')">
        Dessert
        <span><hr class="mb-3" /></span>
      </p>
      <div v-for="food in foods">
        <p
          v-if="food.category == 'Dessert'"
          class="font-poppins font-bold inline-flex items-center gap-x-3 mt-3"
        >
          <span><img :src="food.image" class="max-w-[70px]" alt="" /></span
          >{{ food.food_name }} <br />
          PHP {{ food.price }}
        </p>
      </div>
      <p class="mt-5" v-if="foods.find((el) => el.category === 'Drink')">
        Drink
        <span><hr class="mb-3" /></span>
      </p>
      <div v-for="food in foods">
        <p
          v-if="food.category == 'Drink'"
          class="font-poppins font-bold inline-flex items-center gap-x-3 mt-3"
        >
          <span><img :src="food.image" class="max-w-[70px]" alt="" /></span
          >{{ food.food_name }} <br />
          PHP {{ food.price }}
        </p>
      </div>
      <button
        @click="showFoodInfo = false"
        class="bg-yellow-300 w-full text-white py-1 rounded-md active:bg-yellow-400 mt-10"
      >
        Go back
      </button>
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import { useStore } from "vuex";
import { Geolocation } from "@capacitor/geolocation";
import { useRouter } from "vue-router";
import { useToast } from "vue-toastification";
const store = useStore();
const toast = useToast();
const router = useRouter();
const isLoading = ref(false);
const showInfo = ref(false);
const rating = ref(3);
const foodEstablishments = ref([]);
const foodEstablishmentInfo = ref({});
const myFavorite = ref(null);
const showInfo1 = ref(false);
const foods = ref([]);
const showFoodInfo = ref(false);
const myInfo = ref({});
const review = ref({
  review: "",
  rating: 0,
});
const center = ref({ lat: 0, lng: 0 });
const emit = defineEmits(["hideTab"]);

onMounted(async () => {
  emit("hideTab", showInfo.value);
  await getUserInfo();
});

async function getCurrentPosition() {
  const coordinates = await Geolocation.getCurrentPosition();
  center.value = {
    lat: coordinates.coords.latitude,
    lng: coordinates.coords.longitude,
  };
}

async function getUserInfo() {
  const res = await store.dispatch("auth/me");
  myInfo.value = res.data;
  isLoading.value = false;
}
async function getVisited() {
  const res = await store.dispatch("auth/getVisited");
  foodEstablishments.value = res.data;
  isLoading.value = false;
}

async function showFoodEstablishment(id) {
  isLoading.value = true;
  const res = await store.dispatch("auth/getFoodEstablishmentInfo", id);
  foodEstablishmentInfo.value = res.data;
  foods.value = foodEstablishmentInfo.value.foods;
  showInfo.value = true;
  await getMyFavorite(id);
  isLoading.value = false;
}

async function allFavorites() {
  const res = await store.dispatch("auth/allFavorites");
  foodEstablishments.value = res.data;
  isLoading.value = false;
}

async function submitReview(id) {
  const res = await store.dispatch("auth/addReview", {
    data: review.value,
    id: id,
  });
  review.value = {
    review: "",
    rating: 0,
  };
  await allFavorites();
  await showFoodEstablishment(id);
}

async function addReview(id) {
  review.value.review == ""
    ? toast.error("Please write a review to submit")
    : await submitReview(id);
}

async function addToFavorites(id) {
  const res = await store.dispatch("auth/addToFavorites", id);
  res.status == 200
    ? await showFoodEstablishment(id)
    : await showFoodEstablishment(id);
}

async function removeToFavorites(id) {
  const res = await store.dispatch("auth/removeToFavorites", id);
  res.status == 200
    ? ((showInfo.value = false), toast.error("Removed from favorites"))
    : (showInfo.value = false);
}

async function addViews(id) {
  const res = await store.dispatch("auth/addViews", id);
  res.status == 200
    ? await showFoodEstablishment(id)
    : await showFoodEstablishment(id);
}
async function getMyFavorite(id) {
  const res = await store.dispatch("auth/getMyFavorites", id);
  myFavorite.value = res.data;
  isLoading.value = false;
}

onMounted(async () => {
  isLoading.value = true;
  await getCurrentPosition();
  await getVisited();
});
</script>
