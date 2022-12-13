<template>
  <div
    class="min-h-screen max-h-screen w-full grid place-content-center loader-div"
  >
    <span class="loader-spinner mx-auto"></span>
    <p class="text-sm mt-2 text-gray-300">Processing</p>
  </div>
</template>
<style scoped>
.loader-div {
  z-index: 999999999999999999999 !important;
  position: fixed;
  top: 0%;
  left: 0%;
  right: 0%;
  bottom: 0%;
}
.loader-spinner {
  width: 48px;
  height: 48px;
  border: 3px solid #cdcdcd;
  border-radius: 50%;
  display: inline-block;
  position: relative;
  box-sizing: border-box;
  animation: rotation 1s linear infinite;
}
.loader-spinner::after {
  content: "";
  box-sizing: border-box;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 56px;
  height: 56px;
  border-radius: 50%;
  border: 3px solid transparent;
  border-bottom-color: #faca16;
}

@keyframes rotation {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
