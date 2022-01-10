<script setup>
// import {ref, computed, onMounted} from "vue";
// import {useStore} from 'vuex';
// import axios from "axios";
//
// const name = ref(null);
//
// const store = useStore();
// const datas = computed(() => store.state.User.data);
// const gett = computed(() => store.getters.name);
//
// async function fetching() {
//   await axios
//       .get("http://localhost:8000/api/all")
//       .then(res => store.dispatch("get", res.data)
//       .catch(err => console.log(err)))
// }
//
// onMounted(() => {
//   // fetching();
//   store.dispatch('get');
//   // const result = fetch('/api.json')
//   // store.dispatch("getData", result);
// })

</script>
<template>
  <div class="container bg-rose-500
   p-16 mx-auto my-2
   grid grid-cols-1 sm:grid-cols-2 gap-4">
    <form class="p-2 bg-fuchsia-400 flex-col ">
      <label for="file" class="block">File Upload</label>
      <div class="flex justify-center">
        <input id="file" type="file" class="w-[75%] focus:ring-amber-400 mr-2 px-3 py-2 outline-none ring">
        <button type="submit" class="bg-teal-300 p-2 text-pink-400 hover:bg-teal-400">Upload</button>
      </div>
    </form>
    <div class="p-2 bg-fuchsia-400">
      <p></p>
      <label></label>
      <div class="flex justify-center">
        <input v-model="name" type="text" class="w-[75%] focus:ring-amber-400 mr-2 px-3 py-2 outline-none ring">
        <button type="submit" class="bg-teal-300 p-2 text-pink-400 hover:bg-teal-400">Upload</button>
      </div>
    </div>
    <div class="p-2 bg-fuchsia-400"></div>
    <div class="p-2 bg-fuchsia-400"></div>
    <div class="p-2 bg-fuchsia-400"></div>
    <div class="p-2 bg-fuchsia-400"></div>
  </div>
</template>


<style scoped>

</style>