<template>
  <div class="bg-white">
    <div
      class="text-center font-bold text-2xl m-auto text-white w-full py-4 cursor-pointer newgamestopic"
    >Popular</div>
   
      <div
        class="py-4 grid grid-cols-1 gap-8 grid-cols-1 smd:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gamedeck"
      >
      
        <nuxt-link :to="`/gamedetail/${game.slug}`"
          class="gamecard mx-4 flex bg-gray-100 border-gray-500 border rounded cursor-pointer"
          v-for="game in games"
          :key="game.id"
        >
          <div class="flex flex-col w-1/2">
            <img
              v-if="game.cover"
              :src="game.cover.url.replace('t_thumb','t_1080p')"
              alt="cover"
              class="rounded rounded-b-none gameimg h-48 w-36"
            />
            <span
              class="incele text-xs text-center pt-1 w-full gameimg bg-gray-900 rounded rounded-t-none text-white"
            >
              Read More
              <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>

            
          </div>

          <div class="w-1/2 flex flex-col text-center">
            <span class="text-lg m-2 text-gray-900 font-bold hover:text-gray-700">{{game.name}}</span>

            <div class="m-auto text-center">
              <span
                :key="genre.id"
                v-for="genre in game.genres"
                class="border border-gray-600 p-1 tag cursor-pointer hover:bg-gray-500 rounded m-1 text-gray-600"
              >{{genre.name}}</span>
            </div>

            
            <div class="text-gray-600 published mb-2"></div>
          </div>

          
        </nuxt-link>


      </div>
    

    <div class="text-white m-auto text-center py-1 newgamestopic cursor-pointer" @click="increase">
      Show More   
      <i class="fas fa-chevron-down"></i>
    </div>

 <loading
          :opacity="opacity"
          :active.sync="isLoading"
         
          color="white"
          :is-full-page="fullPage"
        ></loading>

  </div>
</template>

<script>
import axios from 'axios'
import Loading from 'vue-loading-overlay'
import 'vue-loading-overlay/dist/vue-loading.css'
export default {

components: {Loading },

  data() {
    return {
      games: '',
      count: 8,
        isLoading: true,
      fullPage: true,
      opacity: 0.1,
    }
  },
  mounted() {
    this.getgames()
  },
  watch: {
    count() {
      this.getgames()
    },
  },

  methods: {
    async getgames() {
      const res = await axios.get(
        `http://localhost:8000/api/games/${this.count}`
      )
      this.games = res.data.data
  this.isLoading = false
      console.log(res.data.data)
    },

    increase() {
      this.count += 4
    },
  },
}
</script>

<style>
.published {
  font-size: 10px;
}

.newgames {
  background-color: #ffffff;
  background-image: url("data:image/svg+xml,%3Csvg width='40' height='12' viewBox='0 0 40 12' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 6.172L6.172 0h5.656L0 11.828V6.172zm40 5.656L28.172 0h5.656L40 6.172v5.656zM6.172 12l12-12h3.656l12 12h-5.656L20 3.828 11.828 12H6.172zm12 0L20 10.172 21.828 12h-3.656z' fill='%23f2f2f2' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E");
}

.newgamestopic {
  background: rgb(15, 39, 48);
  background: linear-gradient(
    90deg,
    rgba(15, 39, 48, 1) 0%,
    rgba(31, 88, 143, 1) 50%,
    rgba(22, 154, 179, 1) 100%
  );
  z-index: 1;
}

.newgamestopic:hover {
  background: rgb(15, 39, 48);
  background: linear-gradient(
    90deg,
    rgba(22, 154, 179, 1) 0%,
    rgba(31, 88, 143, 1) 50%,
    rgba(15, 39, 48, 1) 100%
  );
}

.gamecard:hover {
  opacity: 75%;
  transition: 0.3s;
}

.gamedesc {
  font-size: 7px;
}

.gameimg {
  box-shadow: 1px 1px 1px 1px black, 2px 2px 2px 2px gray;
}

.tag {
  font-size: 9px;
  display: inline-block;
}

.gamedeck {
  border-width: 5px;
  border-style: solid;
  border-image: linear-gradient(
      to left,
      rgba(22, 154, 179, 1) 0%,
      rgba(31, 88, 143, 1) 50%,
      rgba(15, 39, 48, 1) 100%
    )
    1 100%;
}
</style>
