<template>
  <div>

<div class="w-full p-8 font-bold  text-white navbar">

<nuxt-link class="nuxt-link" to="/">Home</nuxt-link>
<nuxt-link class="nuxt-link" to="/gamedetail/_id.vue">Game Detail</nuxt-link>

 </div>
  </div>
</template>

<style>
.navbar{
background: rgb(15, 39, 48);
  background: linear-gradient(
    90deg,
    rgba(22, 154, 179, 1) 0%,

    rgba(22, 154, 179, 1) 100%
  );
  /* box-shadow:1px 1px 1px 1px rgb(6, 56, 66), 2px 2px 2px 2px rgb(16, 87, 102)  ;
   */

  }

  .nuxt-link {
    margin-left:25px;
    font-size:25px;
 
  }


</style>