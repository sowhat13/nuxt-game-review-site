<template>
  <div>
    <div class="w-full h-64">
    
      <div
        v-if="!isloading"
        :style="`background:url(${backgroundImage()});background-size:cover` "
        class="flex flex-col items-center text-center m-auto w-full h-64"
      >
        <div class="layer w-full h-64"></div>
        <div class="m-auto items-center text-center flex flex-col">
          <img
            v-if="!isloading"
            :src="games.cover.url.replace('t_thumb','t_1080p')"
            alt="cover"
            class="rounded-full gameimgs object-cover w-32 h-32"
          />
          <span class="font-bold text-4xl text-white gamesname text-center items-center">
            <h1>{{games.name}}</h1>
          </span>
        </div>
        <div class="flex"></div>
      </div>  
    </div>

  

    <div id="app" class="lg:flex">
      <Tabs id="style-13" class="lg:w-4/12 about gamedecks">
        <Tab
          name="About"
          class="py-8 px-4 font-italic text-black about flex flex-col"
          selected="true"
        >
          <h2 class="m-1 font-bold text-red-400">Genres</h2>
          <hr class="m-1" />
          <div class="flex mx-auto my-4">
            <span
              :key="genre.id"
              v-for="genre in games.genres"
              class="border border-gray-700 p-2 cursor-pointer hover:bg-gray-500 rounded m-1 my-4 text-gray-700 text-center items-center"
            >{{genre.name}}</span>
          </div>

          <h2 class="m-1 font-bold text-red-400 my-4">Summary</h2>
          <hr class="m-1" />
          <h5 class="text-gray-700 my-4">{{games.summary}}</h5>
          <h2 class="m-1 my-4 font-bold text-red-400">Storyline</h2>
          <hr class="m-1" />
          <h5 class="text-gray-700 my-4">{{games.storyline}}</h5>
        </Tab>

        <Tab name="Platforms " class="text-red-400 flex flex-col mx-10 my-8 font-bold">
          <span
            :key="platform.id"
            v-for="platform in games.platforms"
            class="border border-gray-700 p-2 cursor-pointer hover:bg-gray-500 rounded m-1 my-4 text-gray-700 text-center items-center"
          >{{platform.name}}</span>
        </Tab>
        <Tab name="AA">
          <span
            :key="genre.id"
            v-for="genre in games.genres"
            class="border border-gray-300 p-1 tag cursor-pointer hover:bg-gray-500 rounded m-1 text-gray-100 text-center items-center"
          >{{genre.name}}</span>
          asdfasdgasgasdg
        </Tab>
      </Tabs>

      <Tabs class="lg:w-8/12 gamedecks">
        <Tab id="style-13" name="Screenshots" class="flex screnshoots" selected="true">
          <img
            class="screnshoot mx-6 my-3 h-40"
            :key="screenshot.id"
            v-for="screenshot in games.screenshots"
            :src="screenshot.url.replace('t_thumb','t_720p')"
            alt="screenshoots"
          />
        </Tab>

        <Tab id="style-13" name="Videos" class="flex screnshoots">
          <iframe
            class="screnshoot mx-6 my-3 h-40"
            :key="video.id"
            v-for="video in games.videos"
            :src="`https://www.youtube.com/embed/${video.video_id}`"
          ></iframe>
        </Tab>
        <Tab class="flex screnshoots" id="style-13" name="Artworks">
          <img
            class="screnshoot mx-6 my-3 h-40"
            :key="artwork.id"
            v-for="artwork in games.artworks"
            :src="artwork.url.replace('t_thumb','t_720p')"
            alt="artworks"
          />
        </Tab>
      </Tabs>
    </div>

 <loading
          :opacity="opacity"
          :active.sync="isLoading"
       
          color="#fc8c03"
          :is-full-page="fullPage"
        >
      </loading>

  </div>
</template>
<!-- <img
  :key="screenshot.url"
      v-for="screenshot in games.screenshots"
      class="border border-gray-600 p-1 tag cursor-pointer hover:bg-gray-500 rounded m-1 text-gray-600"
   :src="screenshot.url" > -->



<script>
import axios from 'axios'
import Tab from '@/components/Tab'
import Tabs from '@/components/Tabs'
import 'vue-loading-overlay/dist/vue-loading.css'
import Loading from 'vue-loading-overlay'

export default {
  name: 'App',
  components: {
    Tab,
    Tabs,
    Loading,
  },

  data() {
    return {
      games: '',
      isloading: true,
      
      fullPage: true,
      opacity: 0.1,
    }
  },

  

  methods: {
    async getgames() {
      const res = await axios.get(
        `http://localhost:8000/api/game/${this.$route.params.id}`
      )
      console.log(res)
      this.games = res.data[0][0]
      this.isloading = false
    },
    backgroundImage() {
      return this.games.screenshots[0].url.replace(
        't_thumb',
        't_720p'
      )
    },


    
  },

  mounted() {
    this.getgames()
  },
}
</script>

<style>
.gameimgs {
  z-index: 1;
  border: 3px solid white;
}

.about {
  overflow: auto;
  z-index: 1;
}

.gamesname {
  z-index: 1;
}
.layer {
  background: rgb(15, 39, 48);
  background: linear-gradient(
    90deg,
    rgba(15, 39, 48, 1) 0%,
    rgba(31, 88, 143, 1) 50%,
    rgba(22, 154, 179, 1) 100%
  );
  opacity: 65%;
  position: absolute;
  top: 15;
  left: 0;
}

.tag {
  font-size: 9px;
  display: inline-block;
}

.screnshoots {
  overflow: auto;
}

#style-13::-webkit-scrollbar-track {
  background: rgb(15, 39, 48);
  background: linear-gradient(
    90deg,
    rgba(15, 39, 48, 1) 0%,
    rgba(31, 88, 143, 1) 50%,
    rgba(22, 154, 179, 1) 100%
  );
}

#style-13::-webkit-scrollbar {
  width: 12px;
}

#style-13::-webkit-scrollbar-thumb {
  border-style: inset;
  border-color: #e5dbdb;
  background: rgb(15, 39, 48);
  background: linear-gradient(
    90deg,
    rgba(15, 39, 48, 1) 0%,
    rgba(31, 88, 143, 1) 50%,
    rgba(22, 154, 179, 1) 100%
  );
}

.gamedecks {
  border-right: solid 1px rgba(22, 154, 179, 1);
  border-left: solid 1px rgba(15, 39, 48, 1);
}
</style>