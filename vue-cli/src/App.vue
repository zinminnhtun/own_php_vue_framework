<script setup>
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://v3.vuejs.org/api/sfc-script-setup.html#sfc-script-setup
// import HelloWorld from './components/HelloWorld.vue'
</script>
<template>
    <div class="bg-gradient-to-br from-sky-200 to-emerald-300">
      <div class="container mx-auto min-h-screen">
        <div class="text-center">
          <router-link to="/">Home</router-link> |
          <router-link to="/post">Post</router-link> |
          <router-link to="/add-user">Add User</router-link> |
          <router-link to="/file-upload">File Upload</router-link> |
          <router-link to="/about">About</router-link>
        </div>
        <router-view/>
      </div>
    </div>
</template>

<style>
#app{

}
</style>
