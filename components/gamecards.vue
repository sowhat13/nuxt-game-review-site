<template>
    <div>



  <div class="gamecard  mx-4  flex bg-gray-100  border-gray-500 border rounded cursor-pointer" id="gamecard">
  <div class="flex flex-col w-1/2 "> 
  <img src="https://images.igdb.com/igdb/image/upload/t_1080p/co1tq3.jpg" class="rounded rounded-b-none gameimg">
  <span class="incele text-xs text-center pt-1 w-full gameimg  bg-gray-900  rounded rounded-t-none text-white">Detaylı İncele <i class="fa fa-angle-right" aria-hidden="true"></i></span>
  </div>


  <div class=" w-1/2  flex flex-col text-center "> b<span class="text-lg m-2 text-gray-900 font-bold hover:text-gray-700"> {{name}}</span>
  <span class="m-1 gamedesc text-gray-600"> {{description}}</span>
  
<div class="m-auto text-center ">
<span class="border border-gray-600 p-1 tag cursor-pointer hover:bg-gray-500 rounded m-1 text-gray-600">Aksiyon </span>
<span class="border border-gray-600 p-1 tag cursor-pointer hover:bg-gray-500 rounded m-1 text-gray-600">Aksiyon </span>
<span class="border border-gray-600 p-1 tag  cursor-pointer hover:bg-gray-500 rounded m-1 text-gray-600">Aksiyon </span>
<span class="border border-gray-600 p-1 tag cursor-pointer hover:bg-gray-500 rounded m-1 text-gray-600">Aksiyon </span>

</div>
 <div class="text-gray-600 published mb-2"> 23 Mart 2020'de yayınlandı </div>



   </div>
  
  </div>




    </div>
</template>

<script>
export default {
props:["name" , "description"]
}
</script>

<style>

</style>