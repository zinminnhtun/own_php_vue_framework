<script setup>
import { ref, computed } from "vue";
const dark = ref(false);
const darkLight = () => (dark.value = !dark.value);
</script>
<template>
  <div :class="{ dark: dark }">
    <div
      class="bg-gradient-to-br from-sky-200 to-emerald-300 dark:bg-gradient-to-br dark:from-gray-700 dark:to-gray-500"
    >
      <div class="container mx-auto min-h-screen">
        <div class="grid grid-cols-1 gap-3">
          <div class="mt-2 flex items-center justify-between px-3">
            <router-link class="font-bold dark:text-gray-100" to="/"
              >Music Lab</router-link
            >
            <div class="flex items-center justify-between gap-12">
              <div
                class="rounded-full bg-sky-900 px-2 text-[12px] text-white ring-1 transition-all duration-100 hover:-translate-x-[.1rem] hover:transform"
              >
                <router-link to="/dashboard"
                  ><span class="hover:text-amber-500">DB</span></router-link
                >
              </div>
              <div
                class="btn-sm-blue font-bold dark:text-gray-100"
                @click="darkLight"
              >
                <span v-if="!dark">dark</span>
                <span v-else>light</span>
              </div>
            </div>
          </div>

          <div
            class="my-0 h-[0.08rem] w-full rounded bg-gray-600 shadow-lg shadow-sky-700 dark:bg-sky-500"
          ></div>

          <div class="flex items-center justify-around">
            <router-link class="font-bold dark:text-gray-100" to="/recent"
              >Recent</router-link
            >
            <router-link class="font-bold dark:text-gray-100" to="/favourites"
              >Favourites</router-link
            >
            <router-link class="font-bold dark:text-gray-100" to="/playlists"
              >PlayLists</router-link
            >
          </div>
        </div>
        <router-view />
      </div>
    </div>
  </div>
</template>

<style>
#app {
}
</style>
