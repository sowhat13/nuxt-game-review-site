<template>
  <div>
    <navigation></navigation>
    <Nuxt />
  </div>
</template>
<script>
import axios from "axios";
import Navigation from "@/components/Navigation";


axios.defaults.headers.common['user-key'] = "8bda5e28df162fe3ce3d263d4b7bfe50"

export default {
  components: {
    Navigation
  }
}
</script>
<style>
html {
  font-family:
    'Source Sans Pro',
    -apple-system,
    BlinkMacSystemFont,
    'Segoe UI',
    Roboto,
    'Helvetica Neue',
    Arial,
    sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
   background: rgb(15, 39, 48);
  background: linear-gradient(
    90deg,
    rgba(15, 39, 48, 1) 0%,
    rgba(31, 88, 143, 1) 50%,
    rgba(22, 154, 179, 1) 100%
  );
}

*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
}

.button--green {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #3b8070;
  color: #3b8070;
  text-decoration: none;
  padding: 10px 30px;
}

.button--green:hover {
  color: #fff;
  background-color: #3b8070;
}

.button--grey {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #35495e;
  color: #35495e;
  text-decoration: none;
  padding: 10px 30px;
  margin-left: 15px;
}

.button--grey:hover {
  color: #fff;
  background-color: #35495e;
}
</style>
