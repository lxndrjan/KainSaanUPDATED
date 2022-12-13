<template>
  <div
    v-if="tab != 'Favorites' && tab != 'Visited'"
    class="pb-16 min-h-screen h-full min-w-screen w-full bg-white animate__animated animate__fadeIn"
  >
    <div class="w-full overflow-hidden text-center py-5 bg-yellow-300 relative">
      <svg
        v-if="tab != ''"
        @click="tab = ''"
        xmlns="http://www.w3.org/2000/svg"
        width="16"
        height="16"
        fill="#349f6e"
        class="bi bi-arrow-left absolute left-5 mt-1 animate__animated animate__fadeInLeft"
        viewBox="0 0 16 16"
      >
        <path
          fill-rule="evenodd"
          d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"
        />
      </svg>
      <p class="font-poppins text-lg font-semibold text-green-500">KainSaan</p>
    </div>
    <div v-if="tab == ''">
      <div class="flex flex-col justify-center items-center mt-5 gap-y-3">
        <img src="../../assets/images/USER-LOGO.png" width="200" alt="" />
        <p class="font-poppins text-md">{{ myInfo.full_name }}</p>
      </div>
      <div class="mt-10">
        <button
          @click="tab = 'Favorites'"
          class="border-b-2 border-t-2 w-full text-left px-5 py-4 text-sm text-gray-500 flex flex-row gap-x-3"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-star"
            viewBox="0 0 16 16"
          >
            <path
              d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"
            />
          </svg>
          Favorites
        </button>
        <button
          @click="tab = 'Visited'"
          class="border-b-2 w-full text-left px-5 py-4 text-sm text-gray-500 flex flex-row gap-x-3"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-clock-history"
            viewBox="0 0 16 16"
          >
            <path
              d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"
            />
            <path
              d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"
            />
            <path
              d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"
            />
          </svg>
          Previously Visited
        </button>
        <button
          @click="tab = 'AddEstablishment'"
          class="border-b-2 w-full text-left px-5 py-4 text-sm text-gray-500 flex flex-row gap-x-3"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-folder-plus"
            viewBox="0 0 16 16"
          >
            <path
              d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"
            />
            <path
              d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"
            />
          </svg>
          <span v-if="!myInfo.food_establishment">Add food establishment</span>
          <span v-else>My food establishment</span>
        </button>
        <button
          class="border-b-2 w-full text-left px-5 py-4 text-sm text-gray-500 flex flex-row gap-x-3"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-info-circle"
            viewBox="0 0 16 16"
          >
            <path
              d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
            />
            <path
              d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"
            />
          </svg>
          About KainSaan
        </button>
        <button
          @click="logout"
          class="border-b-2 w-full text-left px-5 py-4 text-sm text-gray-500 flex flex-row gap-x-3"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-box-arrow-left"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"
            />
            <path
              fill-rule="evenodd"
              d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"
            />
          </svg>
          Logout
        </button>
      </div>
    </div>
    <div
      class="p-8 animate__animated animate__fadeIn"
      v-if="tab == 'AddEstablishment'"
    >
      <form
        enctype="multipart/form-data"
        id="container"
        v-show="step == 1 && !myInfo.food_establishment"
        @submit.prevent="nextStep"
      >
        <p class="text-center">Add your food establishment</p>
        <div class="relative my-6">
          <label
            for="floating_7"
            class="text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Image</label
          >
          <input
            type="file"
            accept="image/*"
            @change="previewImage"
            id="floating_7"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-2 w-full text-sm text-gray-900 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          />
        </div>
        <div v-if="preview">
          <img :src="preview" />
        </div>
        <div class="relative my-6">
          <input
            v-model="data.store_name"
            type="text"
            id="floating_1"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          />
          <label
            for="floating_1"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Name of Establishment</label
          >
        </div>
        <div class="relative my-6">
          <label
            class="text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Drag the marker to your address</label
          >
          <GoogleMap
            api-key="AIzaSyDfswZHnEaoicWBTWzyk-gIalmI9iOaTr8"
            style="width: 100%; height: 400px"
            :center="center"
            :zoom="zoom"
          >
            <Marker
              @click.native="getCurrentPosition"
              @dragend="getMarkerPosition($event)"
              :options="{
                position: center,
                draggable: true,
                label: {
                  text: 'Drag Me',
                  color: 'black',
                  fontSize: '14px',
                  fontWeight: 'bold',
                  className: 'marker-position',
                },
              }"
            />
          </GoogleMap>
        </div>
        <div class="relative my-6">
          <select
            v-model="data.category"
            id="floating_2"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          >
            <option value="Eatery">Eatery</option>
            <option value="Food Park">Food Park</option>
            <option value="Cafe">Cafe</option>
            <option value="Fast Food Chain">Fast Food Chain</option>
            <option value="Restaurant">Restaurant</option>
          </select>
          <label
            for="floating_2"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Category</label
          >
        </div>
        <div class="relative my-6">
          <select
            v-model="data.cuisine_type"
            id="floating_3"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          >
            <option value="Filipino">Filipino</option>
            <option value="Chinese">Chinese</option>
            <option value="Italian">Italian</option>
            <option value="Indian">Indian</option>
            <option value="Western">Western</option>
            <option value="Greek">Greek</option>
            <option value="Japanese">Japanese</option>
          </select>
          <label
            for="floating_3"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Type of Cuisine</label
          >
        </div>
        <div class="relative my-6">
          <select
            v-model="data.parking_info"
            id="floating_5"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          >
            <option value="With vehicle parking">With vehicle parking</option>
            <option value="Without vehicle parking">Without vehicle parking</option>
          </select>
          <label
            for="floating_5"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Parking Information</label
          >
        </div>
        <div class="relative my-6">
          <input
            v-model="data.average_cost"
            type="number"
            step="0.01"
            id="floating_6"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          />
          <label
            for="floating_6"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Average Cost per/Head (Whole Number)</label
          >
        </div>
        <div class="relative my-6">
          <textarea
            v-model="data.store_description"
            id="floating_7"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            rows="5"
            required
          ></textarea>
          <label
            for="floating_7"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Establishment Description</label
          >
        </div>
        <div class="my-10">
          <p class="text-sm mb-1 text-gray-500 font-semibold text-center">
            FOOD MENU
          </p>
          <hr class="mb-2" />
          <p class="text-red-500 mt-3" v-if="foodMenu.length <= 0">
            No food added yet
          </p>
          <p class="text-gray-500" v-for="(food, i) in foodMenu" :key="i">
            {{ food.food_name }} (PHP {{ food.food_price }}.00)
          </p>
        </div>
        <button
          type="button"
          @click="step++"
          class="text-white bg-green-500 px-3 py-1 w-full active:bg-green-600"
        >
          ADD FOOD TO MENU
        </button>
        <button
          @click="addFoodEstablishment"
          type="button"
          class="text-white bg-yellow-300 px-3 py-1 w-full mt-2 active:bg-yellow-400"
        >
          SAVE DETAILS
        </button>
      </form>
      <form
        ref="foodRef"
        enctype="multipart/form-data"
        v-if="step == 2"
        @submit.prevent="confirmAddFoodToMenu"
      >
        <p class="text-center">Add food to Menu</p>
        <div class="relative my-6">
          <label
            class="text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Food Image</label
          >
          <input
            type="file"
            accept="image/*"
            @change="addFoodImage"
            required
            class="block rounded-t-lg px-2.5 pb-2.5 pt-2 w-full text-sm text-gray-900 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
          />
        </div>
        <div class="relative my-6">
          <input
            v-model="foodData.food_name"
            type="text"
            id="floating_1"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          />
          <label
            for="floating_1"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Food Name</label
          >
        </div>
        <div class="relative my-6">
          <input
            v-model="foodData.food_price"
            type="number"
            step="0.01"
            id="floating_1"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          />
          <label
            for="floating_1"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Food Price</label
          >
        </div>
        <div class="relative my-6">
          <select
            v-model="foodData.food_category"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          >
            <option value="Appetizer">Appetizer</option>
            <option value="Main Dish">Main Dish</option>
            <option value="Side Dish">Side Dish</option>
            <option value="Drink">Drink</option>
            <option value="Dessert">Dessert</option>
          </select>
          <label
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Food Category</label
          >
        </div>
        <button
          type="submit"
          class="text-white bg-yellow-300 px-3 py-1 w-full active:bg-yellow-400"
        >
          ADD FOOD TO MENU
        </button>
        <button
          type="button"
          @click="step--"
          class="text-white bg-blue-500 px-3 py-1 mt-3 w-full active:bg-blue-600"
        >
          CANCEL
        </button>
      </form>
      <form
        v-if="myInfo.food_establishment && !showFoodInfo"
        @submit.prevent="updateFoodEstablishment"
        enctype="multipart/form-data"
      >
        <p class="text-center text-4xl font-bold mt-3">
          {{ myInfo.food_establishment.store_name }}
        </p>
        <p class="text-center text-sm mt-1">Food Establishment Name</p>
        <div class="relative my-6">
          <label
            for="floating_7"
            class="text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Update Image</label
          >
          <input
            type="file"
            accept="image/*"
            @change="previewImage2"
            id="floating_7"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-2 w-full text-sm text-gray-900 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
          />
        </div>
        <div>
          <img v-if="preview" :src="preview" />
        </div>
        <div class="relative my-6">
          <input
            v-model="myInfo.food_establishment.store_name"
            type="text"
            id="floating_1"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          />
          <label
            for="floating_1"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Name of Establishment</label
          >
        </div>
        <div class="relative my-6">
          <label
            class="text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Drag the marker to update your address</label
          >
          <GoogleMap
            api-key="AIzaSyDfswZHnEaoicWBTWzyk-gIalmI9iOaTr8"
            style="width: 100%; height: 400px"
            :center="myInfo.food_establishment.coords"
            :zoom="zoom"
          >
            <Marker
              @click.native="getCurrentPosition"
              @dragend="getMarkerPosition($event)"
              :options="{
                position: myInfo.food_establishment.coords,
                draggable: true,
                label: {
                  text: 'Drag Me',
                  color: 'black',
                  fontSize: '14px',
                  fontWeight: 'bold',
                  className: 'marker-position',
                },
              }"
            />
          </GoogleMap>
        </div>
        <div class="relative my-6">
          <select
            v-model="myInfo.food_establishment.category"
            id="floating_2"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          >
            <option value="Eatery">Eatery</option>
            <option value="Food Park">Food Park</option>
            <option value="Cafe">Cafe</option>
            <option value="Fast Food Chain">Fast Food Chain</option>
            <option value="Restaurant">Restaurant</option>
          </select>
          <label
            for="floating_2"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Category</label
          >
        </div>
        <div class="relative my-6">
          <select
            v-model="myInfo.food_establishment.cuisine_type"
            id="floating_3"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          >
            <option value="Filipino">Filipino</option>
            <option value="Chinese">Chinese</option>
            <option value="Italian">Italian</option>
            <option value="Indian">Indian</option>
            <option value="Western">Western</option>
            <option value="Greek">Greek</option>
            <option value="Japanese">Japanese</option>
          </select>
          <label
            for="floating_3"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Type of Cuisine</label
          >
        </div>
        <div class="relative my-6">
          <select
            v-model="myInfo.food_establishment.parking_info"
            id="floating_5"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          >
            <option value="With vehicle parking">With vehicle parking</option>
            <option value="Without vehicle parking">Without vehicle parking</option>
          </select>
          <label
            for="floating_5"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Parking Information</label
          >
        </div>
        <div class="relative my-6">
          <input
            v-model="myInfo.food_establishment.average_cost"
            type="number"
            id="floating_6"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            required
          />
          <label
            for="floating_6"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Average Cost per/Head (Whole Number)</label
          >
        </div>
        <div class="relative my-6">
          <textarea
            v-model="myInfo.food_establishment.store_description"
            id="floating_7"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
            placeholder=" "
            rows="5"
            required
          ></textarea>
          <label
            for="floating_7"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
            >Establishment Description</label
          >
        </div>
        <button
          @click="showFoodInfo = true"
          type="button"
          class="text-white bg-yellow-300 px-3 mb-3 py-1 w-full active:bg-yellow-400"
        >
          View Food Menu
        </button>
        <button
          type="submit"
          class="text-white bg-yellow-300 px-3 py-1 w-full active:bg-yellow-400"
        >
          Update Info
        </button>
      </form>

      <div
        v-if="showFoodInfo && !foodInfoUpdate && !foodInfoNew"
        class="break-all"
      >
        <p class="font-bold">
          {{ myInfo.food_establishment.store_name }} - Food Menu
        </p>
        <p class="mt-5" v-if="foods.find((el) => el.category === 'Main Dish')">
          Main Dish
          <span><hr class="mb-3" /></span>
        </p>
        <div v-for="food in foods">
          <p
            @click="checkFood(food)"
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
            @click="checkFood(food)"
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
            @click="checkFood(food)"
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
            @click="checkFood(food)"
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
            @click="checkFood(food)"
            v-if="food.category == 'Drink'"
            class="font-poppins font-bold inline-flex items-center gap-x-3 mt-3"
          >
            <span><img :src="food.image" class="max-w-[70px]" alt="" /></span
            >{{ food.food_name }} <br />
            PHP {{ food.price }}
          </p>
        </div>
        <button
          @click="foodInfoNew = true"
          class="bg-yellow-300 w-full text-white py-1 rounded-md active:bg-yellow-400 mt-10"
        >
          Add New Food
        </button>
        <button
          @click="showFoodInfo = false"
          class="bg-yellow-300 w-full text-white py-1 rounded-md active:bg-yellow-400 mt-3"
        >
          Go back
        </button>
      </div>
      <div v-if="foodInfoUpdate">
        <form
          ref="foodInfoRef"
          enctype="multipart/form-data"
          @submit.prevent="updateFoodInfo"
        >
          <p class="text-center">Update Food Details</p>
          <div class="relative my-6">
            <label
              class="text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
              >Food Image</label
            >
            <input
              @change="previewImage3"
              type="file"
              accept="image/*"
              class="block rounded-t-lg px-2.5 pb-2.5 pt-2 w-full text-sm text-gray-900 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
              placeholder=" "
            />
          </div>
          <div class="relative my-6">
            <input
              v-model="foodInfo.food_name"
              type="text"
              id="floating_1"
              class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
              placeholder=" "
              required
            />
            <label
              for="floating_1"
              class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
              >Food Name</label
            >
          </div>
          <div class="relative my-6">
            <input
              v-model="foodInfo.price"
              type="number"
              step="0.01"
              id="floating_1"
              class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
              placeholder=" "
              required
            />
            <label
              for="floating_1"
              class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
              >Food Price</label
            >
          </div>
          <div class="relative my-6">
            <select
              v-model="foodInfo.category"
              class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
              placeholder=" "
              required
            >
              <option value="Appetizer">Appetizer</option>
              <option value="Main Dish">Main Dish</option>
              <option value="Side Dish">Side Dish</option>
              <option value="Drink">Drink</option>
              <option value="Dessert">Dessert</option>
            </select>
            <label
              class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
              >Food Category</label
            >
          </div>
          <button
            type="submit"
            class="text-white bg-yellow-300 px-3 py-1 w-full active:bg-yellow-400"
          >
            UPDATE INFO
          </button>
          <button
            type="button"
            @click="deleteFood(foodInfo.id)"
            class="text-white bg-red-600 px-3 py-1 w-full mt-3 active:bg-red-600"
          >
            DELETE FOOD
          </button>
          <button
            type="button"
            @click="foodInfoUpdate = false"
            class="text-white bg-blue-500 px-3 py-1 mt-3 w-full active:bg-blue-600"
          >
            CANCEL
          </button>
        </form>
      </div>
      <div v-if="foodInfoNew">
        <form
          ref="foodNewRef"
          enctype="multipart/form-data"
          @submit.prevent="addNewFood"
        >
          <p class="text-center">Add food to Menu</p>
          <div class="relative my-6">
            <label
              class="text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
              >Food Image</label
            >
            <input
              type="file"
              accept="image/*"
              @change="addNewFoodImage"
              required
              class="block rounded-t-lg px-2.5 pb-2.5 pt-2 w-full text-sm text-gray-900 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
              placeholder=" "
            />
          </div>
          <div class="relative my-6">
            <input
              v-model="foodData.food_name"
              type="text"
              id="floating_1"
              class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
              placeholder=" "
              required
            />
            <label
              for="floating_1"
              class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
              >Food Name</label
            >
          </div>
          <div class="relative my-6">
            <input
              v-model="foodData.food_price"
              type="number"
              step="0.01"
              id="floating_1"
              class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
              placeholder=" "
              required
            />
            <label
              for="floating_1"
              class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
              >Food Price</label
            >
          </div>
          <div class="relative my-6">
            <select
              v-model="foodData.food_category"
              class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-yellow-300 peer"
              placeholder=" "
              required
            >
              <option value="Appetizer">Appetizer</option>
              <option value="Main Dish">Main Dish</option>
              <option value="Side Dish">Side Dish</option>
              <option value="Drink">Drink</option>
              <option value="Dessert">Dessert</option>
            </select>
            <label
              class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-yellow-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4"
              >Food Category</label
            >
          </div>
          <button
            type="submit"
            class="text-white bg-yellow-300 px-3 py-1 w-full active:bg-yellow-400"
          >
            ADD FOOD TO MENU
          </button>
          <button
            type="button"
            @click="foodInfoNew = false"
            class="text-white bg-blue-500 px-3 py-1 mt-3 w-full active:bg-blue-600"
          >
            CANCEL
          </button>
        </form>
      </div>
    </div>
  </div>
  <button
    v-if="tab == 'Favorites' || tab == 'Visited'"
    @click="tab = ''"
    class="text-white fixed top-5 left-3 z-[100]"
  >
    Back
  </button>
  <Favorites v-if="tab == 'Favorites'" />
  <Visited v-if="tab == 'Visited'" />
  <Loader v-if="isLoading" />
</template>
<script setup>
import Favorites from "./Favorites.vue";
import Visited from "./Visited.vue";
import { Geolocation } from "@capacitor/geolocation";
import { GoogleMap, Marker } from "vue3-google-map";
import { ref, onMounted } from "vue";
import { useStore } from "vuex";
import { useRouter } from "vue-router";
import { useToast } from "vue-toastification";
import Loader from "./components/Loader.vue";
const store = useStore();
const toast = useToast();
const router = useRouter();
const tab = ref("");
const step = ref(1);
const data = ref({
  coords: null,
  address: "No Address Indicated",
  store_name: "",
  category: "Fast Food Chain",
  cuisine_type: "Filipino",
  parking_info: "With vehicle parking",
  store_description: "",
  average_cost: "",
  file: null,
});
const foodInfo = ref({});
const foodMenu = ref([]);
const foodInfoNew = ref(false);
const showFoodInfo = ref(false);
const foodInfoUpdate = ref(false);
const foods = ref([]);
const foodData = ref({
  food_name: "",
  food_price: 0,
  food_category: "Appetizer",
  food_image: null,
});
const preview = ref(null);
const foodRef = ref(null);
const image = ref(null);
const imageFiles = ref([]);
const imageFood = ref(null);
const center = ref({ lat: 0, lng: 0 });
const zoom = ref(15);
const myInfo = ref({});
const isLoading = ref(false);
function getMarkerPosition(e) {
  var geocoder = new google.maps.Geocoder();
  data.value.coords = {
    lat: e.latLng.lat(),
    lng: e.latLng.lng(),
  };
  if (myInfo.value.food_establishment) {
    myInfo.value.food_establishment.coords = {
      lat: e.latLng.lat(),
      lng: e.latLng.lng(),
    };
  }
  var latlng = data.value.coords;
  geocoder.geocode({ location: latlng }, function (results, status) {
    if (status === "OK") {
      if (results[1]) {
        data.value.address = results[1].formatted_address;
      } else {
        toast.error("No address found");
      }
    }
  });
}

function checkFood(item) {
  console.log(item);
  foodInfo.value = item;
  foodInfoUpdate.value = true;
}

function addFoodImage(event) {
  imageFood.value = event.target.files[0];
}
function addNewFoodImage(event) {
  imageFood.value = event.target.files[0];
}

function confirmAddFoodToMenu() {
  foodMenu.value.push({
    food_name: foodData.value.food_name,
    food_price: foodData.value.food_price,
    food_category: foodData.value.food_category,
    food_image: imageFood.value,
  });
  foodData.value.food_name = "";
  foodData.value.food_price = 0;
  foodData.value.food_category = "Appetizer";
  foodData.value.food_image = null;
  step.value--;
}

async function getUserInfo() {
  const res = await store.dispatch("auth/me");
  myInfo.value = res.data;
  if (res.data.food_establishment) {
    foods.value = myInfo.value.food_establishment.foods;
  }
  console.log(foods.value);
  isLoading.value = false;
}

onMounted(async () => {
  isLoading.value = true;
  await getCurrentPosition();
  await getUserInfo();
});

function previewImage(event) {
  var input = event.target;
  if (input.files) {
    var reader = new FileReader();
    reader.onload = (e) => {
      preview.value = e.target.result;
    };
    image.value = input.files[0];
    reader.readAsDataURL(input.files[0]);
  }
  data.value.file = input.files[0];
}

function previewImage2(event) {
  var input = event.target;
  if (input.files) {
    var reader = new FileReader();
    reader.onload = (e) => {
      preview.value = e.target.result;
    };
    image.value = input.files[0];
    reader.readAsDataURL(input.files[0]);
  }
  data.value.file = input.files[0];
}

function previewImage3(event) {
  var input = event.target;
  data.value.file = input.files[0];
}

async function deleteFood(id) {
  if (foods.value.length == 1)
    return toast.error("You cannot delete your last food in your menu");
  const res = await store.dispatch("auth/deleteFood", id);
  res.status == 200
    ? (await getUserInfo(),
      (foodInfoUpdate.value = false),
      toast.error("Food deleted"))
    : (foodInfoUpdate.value = false);
}

async function addFood() {
  const formData = new FormData();

  for (let i = 0; i < foodMenu.value.length; i++) {
    for (let key of Object.keys(foodMenu.value[i])) {
      formData.append(`foods[${i}][${key}]`, foodMenu.value[i][key]);
    }
  }
  const res = await store.dispatch("auth/addFood", formData);
  res.status == 200
    ? (toast.success("Food established successfully added!"),
      await getUserInfo(),
      (preview.value = null),
      (image.value = null),
      (tab.value = ""),
      (isLoading.value = false))
    : (toast.error("Sorry, we cannot process your request."),
      (isLoading.value = false));
}

async function addNewFood() {
  foodMenu.value.push({
    food_name: foodData.value.food_name,
    food_price: foodData.value.food_price,
    food_category: foodData.value.food_category,
    food_image: imageFood.value,
  });
  const formData = new FormData();

  for (let i = 0; i < foodMenu.value.length; i++) {
    for (let key of Object.keys(foodMenu.value[i])) {
      formData.append(`foods[${i}][${key}]`, foodMenu.value[i][key]);
    }
  }
  const res = await store.dispatch("auth/addNewFood", formData);
  res.status == 200
    ? (toast.success("Food established successfully added!"),
      await getUserInfo(),
      (foodInfoNew.value = false),
      (preview.value = null),
      (image.value = null),
      (foodData.value.food_name = ""),
      (foodData.value.food_price = 0),
      (foodData.value.food_category = "Appetizer"),
      (foodData.value.food_image = null),
      (isLoading.value = false))
    : (toast.error("Sorry, we cannot process your request."),
      (isLoading.value = false));
}

async function addFoodEstablishment() {
  if (preview.value == null) {
    return toast.error("Please add an image");
  }
  if (data.value.coords == null && data.value.address == "No Address Indicated")
    return toast.error("Please drag the marker to your exact address");
  if (foodMenu.value.length <= 0)
    return toast.error("Please add atleast one food to your menu");
  isLoading.value = true;
  const res = await store.dispatch("auth/addFoodEstablishment", data.value);
  res.status == 200
    ? await addFoodEstablishmentImage(res.data.id)
    : (toast.error("Sorry, we cannot process your request."),
      (isLoading.value = false));
}

async function addFoodEstablishmentImage(id) {
  let formData = new FormData();
  formData.append("image", data.value.file);

  const res = await store.dispatch("auth/addFoodEstablishmentImage", {
    data: formData,
    id: id,
  });
  res.status == 200
    ? await addFood()
    : (toast.error("Sorry, we cannot process your request."),
      (isLoading.value = false));
}

async function updateFoodEstablishment() {
  isLoading.value = true;
  const res = await store.dispatch("auth/updateFoodEstablishment", {
    data: myInfo.value.food_establishment,
    id: myInfo.value.food_establishment.id,
  });
  res.status == 200
    ? await updateFoodEstablishmentImage(myInfo.value.food_establishment.id)
    : (toast.error("Sorry, we cannot process your request."),
      (isLoading.value = false));
}

async function updateFoodInfo() {
  isLoading.value = true;
  const res = await store.dispatch("auth/updateFoodInfo", {
    data: foodInfo.value,
    id: foodInfo.value.id,
  });
  res.status == 200
    ? await updateFoodImage(foodInfo.value.id)
    : (toast.error("Sorry, we cannot process your request."),
      (isLoading.value = false));
}

async function updateFoodEstablishmentImage(id) {
  let formData = new FormData();
  formData.append("image", data.value.file);

  const res = await store.dispatch("auth/updateFoodEstablishmentImage", {
    data: formData,
    id: id,
  });
  res.status == 200
    ? (toast.success("Food establishment updated successfully"),
      await getUserInfo(),
      (preview.value = null),
      (image.value = null),
      (tab.value = ""),
      (isLoading.value = false))
    : (toast.error("Sorry, we cannot process your request."),
      (isLoading.value = false));
}
async function updateFoodImage(id) {
  let formData = new FormData();
  formData.append("image", data.value.file);

  const res = await store.dispatch("auth/updateFoodImage", {
    data: formData,
    id: id,
  });
  res.status == 200
    ? (toast.success("Food info updated successfully"),
      (foodInfoUpdate.value = false),
      await getUserInfo(),
      (isLoading.value = false))
    : (toast.error("Sorry, we cannot process your request."),
      (isLoading.value = false));
}

async function getCurrentPosition() {
  const coordinates = await Geolocation.getCurrentPosition();
  center.value = {
    lat: coordinates.coords.latitude,
    lng: coordinates.coords.longitude,
  };
}

async function logout() {
  isLoading.value = true;
  const res = await store.dispatch("auth/logout");
  res.status == 200
    ? setTimeout(() => {
        router.push("/");
      }, 800)
    : router.push("/");
}
</script>
