<script setup>
import { ref, computed, onMounted } from "vue";
import { useStore } from "vuex";
import axios from "axios";

const store = useStore();
let songs = computed(() => store.state.Songs.songs);
const songNames = computed(() => store.getters.songNames);

onMounted(() => {
  store.dispatch("get");
});
</script>
<template>
  <div class="mt-3 grid grid-cols-1 gap-1 px-3 py-2">
    <div
      v-for="song in songs"
      class="h-[35px] w-full bg-teal-500 px-2"
      :key="song.id"
    >
      {{ song.id }}. {{ song.name }}
    </div>
  </div>
</template>

<style scoped></style>
