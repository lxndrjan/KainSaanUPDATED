<template>
  <div class="min-h-screen w-screen overflow-hidden">
    <div>
      <GoogleMap
        api-key="AIzaSyDfswZHnEaoicWBTWzyk-gIalmI9iOaTr8"
        style="width: 100%; height: calc(100vh - 4rem)"
        :center="center"
        :zoom="zoom"
      >
        <Marker
          @click.native="getCurrentPosition"
          :options="{
            position: center,
            label: {
              text: 'You',
              color: 'black',
              fontSize: '14px',
              fontWeight: 'bold',
              className: 'marker-position',
            },
          }"
        />
        <Marker
          v-for="(location, i) in foodEstablishments"
          :options="{
            position: location.coords,
            label: {
              text: location.store_name,
              color: 'black',
              fontSize: '14px',
              fontWeight: 'bold',
              className: 'marker-position',
            },
          }"
          :key="i"
        >
          <InfoWindow>
            <div id="content">
              <p class="font-bold mb-1">
                {{ location.store_name }}
              </p>
              <p class="mb-3">
                {{ location.address }}
              </p>
              <div id="bodyContent">
                <p class="text-blue-500">
                  <a
                    target="_blank"
                    :href="`https://www.google.com/maps/dir/${center.lat},${center.lng}/${location.coords.lat},${location.coords.lng}/@${location.coords.lat},${location.coords.lng}?hl=en-US`"
                  >
                    Get Directions</a
                  >
                </p>
              </div>
            </div>
          </InfoWindow>
        </Marker>
      </GoogleMap>
    </div>
  </div>
</template>
<script setup>
import { Geolocation } from "@capacitor/geolocation";
import { ref, onMounted } from "vue";
import { GoogleMap, Marker, InfoWindow } from "vue3-google-map";
import { useStore } from "vuex";
import { useRouter } from "vue-router";
const store = useStore();
const router = useRouter();
const center = ref({ lat: 0, lng: 0 });
const isLoading = ref(false);
const zoom = ref(13);
const foodEstablishments = ref([]);
async function getCurrentPosition() {
  const coordinates = await Geolocation.getCurrentPosition();
  center.value = {
    lat: coordinates.coords.latitude,
    lng: coordinates.coords.longitude,
  };
  zoom.value = 13;
  isLoading.value = false;
}

async function getAllFoodEstablishmentsOnMap() {
  const res = await store.dispatch("auth/allFoodEstablishmentsMap");
  foodEstablishments.value = res.data;
  isLoading.value = false;
}

function getDirection() {
  var directionsService = new google.maps.DirectionsService();
  var directionsDisplay = new google.maps.DirectionsRenderer();
  directionsDisplay.setMap(this.$refs.map.$mapObject);

  function calculateAndDisplayRoute(
    directionsService,
    directionsDisplay,
    start,
    destination
  ) {
    directionsService.route(
      {
        origin: start,
        destination: destination,
        travelMode: "DRIVING",
      },
      function (response, status) {
        if (status === "OK") {
          directionsDisplay.setDirections(response);
        } else {
          window.alert("Directions request failed due to " + status);
        }
      }
    );
  }
  calculateAndDisplayRoute(
    directionsService,
    directionsDisplay,
    this.coords,
    this.destination
  );
}

onMounted(async () => {
  isLoading.value = true;
  await getAllFoodEstablishmentsOnMap();
  await getCurrentPosition();
});
</script>
