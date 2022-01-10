<template>
  <div class="flex justify-center mt-2">
    <form action="" class="text-center">
      <h3 class="text-center dark:text-gray-100 font-bold text-lg text-blue-600">Upload Song</h3>
      <div class="w-[90%] mx-auto grid grid-cols-1">
        <div>
          <input type="text" class="rounded-lg mt-3" placeholder="Song name">
        </div>
        <div class="grid grid-cols-2 gap-2 px-1">
          <input type="text" class="rounded-lg mt-3" placeholder="Singer">
          <input type="text" class="rounded-lg mt-3" placeholder="Composer">
          <select name="" id="song-type" class="rounded-lg mt-3">
            <option value="" selected>Pop</option>
            <option value="" selected>Classic</option>
          </select>
          <select name="" id="song-language" class="rounded-lg mt-3">
            <option value="" selected>Myanmar</option>
            <option value="" >English</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn-blue my-4 rounded w-1/3">Upload</button>
    </form>
  </div>
</template>

<script setup>

</script>

<style scoped>

</style>