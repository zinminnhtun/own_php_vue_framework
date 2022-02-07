<script setup>
  import {ref,computed} from "vue"
  const dark = ref(false);
  const darkLight = ()=> dark.value = !dark.value;
</script>
<template>
  <div :class="{'dark':dark}">
    <div class="bg-gradient-to-br from-sky-200 to-emerald-300 dark:bg-gradient-to-br dark:from-gray-700 dark:to-gray-500">
      <div class="container mx-auto min-h-screen">
        <div class="grid grid-cols-1 gap-3">
          <div class="mt-2 flex justify-between items-center px-3">
            <router-link class="font-bold dark:text-gray-100" to="/">Music Lab</router-link>
            <div class="flex gap-12 justify-between items-center">
              <div class="text-white ring-1 bg-sky-900 rounded-full px-2 text-[12px]">
                <router-link to="/dashboard">DB</router-link>
              </div>
              <div class="dark:text-gray-100 font-bold btn-sm-blue" @click="darkLight">
                <span v-if="!dark">dark</span>
                <span v-else>light</span>
              </div>
            </div>
          </div>

          <div class="w-full h-[0.08rem] my-0 dark:bg-sky-500 bg-gray-600 rounded shadow-lg shadow-sky-700"></div>

          <div class="flex justify-around items-center">
            <router-link class="font-bold dark:text-gray-100" to="/recent">Recent</router-link>
            <router-link class="font-bold dark:text-gray-100" to="/favourites">Favourites</router-link>
            <router-link class="font-bold dark:text-gray-100" to="/playlists">PlayLists</router-link>
          </div>
        </div>
        <router-view/>
      </div>
    </div>

  </div>
</template>

<style>
#app{

}
</style>
