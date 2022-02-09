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
  <div
      class="container mx-auto my-2 grid grid-cols-1 gap-4 bg-rose-500 p-16 sm:grid-cols-2"
  >
    <form class="flex-col bg-fuchsia-400 p-2">
      <label for="file" class="block">File Upload</label>
      <div class="flex justify-center">
        <input
            id="file"
            type="file"
            class="mr-2 w-[75%] px-3 py-2 outline-none ring focus:ring-amber-400"
        />
        <button
            type="submit"
            class="bg-teal-300 p-2 text-pink-400 hover:bg-teal-400"
        >
          Upload
        </button>
      </div>
    </form>
    <div class="container m-2 bg-fuchsia-400 p-2">
      <p></p>
      <label></label>
      <div class="flex justify-center">
        <input
            v-model="name"
            type="text"
            class="mr-2 w-[75%] px-3 py-2 outline-none ring focus:ring-amber-400"
        />
        <button
            type="submit"
            class="mx-0 bg-teal-300 p-2 text-pink-400 hover:bg-teal-400"
        >
          Upload
        </button>
      </div>
    </div>
    <div class="bg-fuchsia-400 p-2"></div>
    <div class="bg-fuchsia-400 p-2"></div>
    <div class="bg-fuchsia-400 p-2"></div>
    <div class="bg-fuchsia-400 p-2"></div>
  </div>
</template>

<style scoped></style>
