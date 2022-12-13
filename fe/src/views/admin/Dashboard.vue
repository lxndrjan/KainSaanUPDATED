<template>
  <div class="w-full h-screen p-10">
    
    <!--Dashboard-->
    <div id="txtDashboard" class="animate__animated animate__fadeIn">
      <p class="text-xl text-black font-bold">Hi, Charles! Welcome to your Dashboard.</p>
    </div>

    <div class="row1">
      
      <!--Total Number of Food Establishments-->
      <div id="column1" v-if="!showInfo">
        <div class="insideRow">
          <div class="insideColumn">
            <p id="txtNoOfFe" class="text-white text-sm font-poppins">Food Establishments</p>
          </div>
          <div class="insideColumn"> 
            <p id="txtIntFe" class="text-white text-xl font-poppins">15</p>
          </div>
        </div>   
      </div>

      <!--Total Number of Users-->
      <div id="column2" v-if="!showInfo">
        <div class="insideRow">
          <div class="insideColumn">
            <p id="txtNoOfUsers" class="text-white text-sm font-poppins">Number of Users</p>
          </div>
          <div class="insideColumn"> 
            <p id="txtIntUsers" class="text-white text-xl font-poppins">19</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row2">
      <!--Total Number of Clicks-->
      <div id="column3" v-if="!showInfo">
        <div class="insideRow">
          <div class="insideColumn"> 
            <p id="txtNoOfClicks" class="text-white text-sm font-poppins">Number of Clicks</p>
          </div> 
          <div class="insideColumn"> 
            <p id="txtIntClicks" class="text-white text-xl font-poppins">92</p>
          </div>
        </div>
      </div>

      <!--Total Number of Reviews-->
      <div id="column4" class="insideRow" v-if="!showInfo">
        <div class="insideRow">
          <div class="insideColumn">
            <p id="txtNoOfReviews" class="text-white text-sm font-poppins">Number of Reviews</p>
          </div>
          <div class="insideColumn"> 
            <p id="txtIntReviews" class="text-white text-xl font-poppins">10</p>
          </div>
        </div> 
      </div>
    </div>  
  </div>
</template>

<script setup>
import _ from "lodash";
import { onMounted, ref } from "vue";
import { useStore } from "vuex";
</script>