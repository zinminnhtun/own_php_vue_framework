<script setup>
  // import Post from "../views/Post.vue";
</script>

<template>
  <div class="my-3 grid grid-cols-[minmax(min-content,1fr)] px-3 row-auto gap-y-6">
      <div class="grid grid-cols-[minmax(min-content,1fr)_minmax(min-content,1fr)]  gap-x-2 ">
        <div class="bg-amber-400 hover:bg-amber-600 text-center ring-2 py-2 ring-amber-600 rounded-lg shadow-lg shadow-amber-500">Users</div>
        <div class="bg-amber-400 hover:bg-amber-600 text-center ring-2 py-2 ring-amber-600 rounded-lg shadow-lg shadow-amber-500">Viewers</div>
      </div>
      <div class="grid grid-cols-[minmax(min-content,1fr)_minmax(min-content,1fr)] gap-4 gap-y-6 ring-2 p-2 py-5">
        <router-link to="/dashboard/post">
          <div class="px-2 py-1 bg-fuchsia-400 hover:bg-fuchsia-600 rounded-lg ring-2 ring-fuchsia-600 shadow-lg shadow-fuchsia-400">Post Songs</div>
        </router-link>
        <div class="px-2 py-1 bg-fuchsia-400 hover:bg-fuchsia-600 rounded-lg ring-2 ring-fuchsia-600 shadow-lg shadow-fuchsia-400">Graphs</div>
        <div class="px-2 py-1 bg-fuchsia-400 hover:bg-fuchsia-600 rounded-lg ring-2 ring-fuchsia-600 shadow-lg shadow-fuchsia-400">Edit Songs</div>
        <div class="px-2 py-1 bg-fuchsia-400 hover:bg-fuchsia-600 rounded-lg ring-2 ring-fuchsia-600 shadow-lg shadow-fuchsia-400">Delete Songs</div>
      </div>
  </div>
</template>


<style scoped>

</style>