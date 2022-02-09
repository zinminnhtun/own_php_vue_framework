<script setup>
// import Post from "../views/Post.vue";
</script>

<template>
  <div
    class="row-auto my-3 grid grid-cols-[minmax(min-content,1fr)] gap-y-6 px-3"
  >
    <div
      class="grid grid-cols-[minmax(min-content,1fr)_minmax(min-content,1fr)] gap-x-2"
    >
      <div
        class="rounded-lg bg-amber-400 py-2 text-center shadow-lg shadow-amber-500 ring-2 ring-amber-600 hover:bg-amber-600"
      >
        Users
      </div>
      <div
        class="rounded-lg bg-amber-400 py-2 text-center shadow-lg shadow-amber-500 ring-2 ring-amber-600 hover:bg-amber-600"
      >
        Viewers
      </div>
    </div>
    <div
      class="grid grid-cols-[minmax(min-content,1fr)_minmax(min-content,1fr)] gap-4 gap-y-6 p-2 py-5 ring-2"
    >
      <router-link to="/dashboard/post">
        <div
          class="rounded-lg bg-fuchsia-400 px-2 py-1 shadow-lg shadow-fuchsia-400 ring-2 ring-fuchsia-600 hover:bg-fuchsia-600"
        >
          Post Songs
        </div>
      </router-link>
      <div
        class="rounded-lg bg-fuchsia-400 px-2 py-1 shadow-lg shadow-fuchsia-400 ring-2 ring-fuchsia-600 hover:bg-fuchsia-600"
      >
        Graphs
      </div>
      <div
        class="rounded-lg bg-fuchsia-400 px-2 py-1 shadow-lg shadow-fuchsia-400 ring-2 ring-fuchsia-600 hover:bg-fuchsia-600"
      >
        Edit Songs
      </div>
      <div
        class="rounded-lg bg-fuchsia-400 px-2 py-1 shadow-lg shadow-fuchsia-400 ring-2 ring-fuchsia-600 hover:bg-fuchsia-600"
      >
        Delete Songs
      </div>
    </div>
  </div>
</template>

<style scoped></style>
