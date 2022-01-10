<script setup>
import {ref, computed, onMounted} from "vue";
import {useStore} from 'vuex';
import axios from "axios";



const store = useStore();
let songs = computed(() => store.state.Songs.songs);
const songNames = computed(() => store.getters.songNames);

onMounted(() => {
  store.dispatch('get');
})
</script>
<template>
  <div class="grid grid-cols-1 gap-1 px-3 py-2 mt-3">
    <div v-for="song in songs"  class="w-full h-[35px] px-2 bg-teal-500" :key="song.id">{{ song.id}}. {{ song.name }}</div>

  </div>
</template>


<style scoped>

</style>