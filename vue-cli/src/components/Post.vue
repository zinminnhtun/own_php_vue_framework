<script setup>
import axios from 'axios';
import {ref} from 'vue';

const name = ref("");
const singer = ref("");
const composer = ref("");
const type = ref('Pop');
const language = ref('Myanmar');

const song = ref({
  name,
  singer,
  composer,
  type,
  language
});

async function postSong() {
  await axios.post("http://localhost:8000/api/post-song", song.value)
      .then(res => console.log(res.data))
      .catch(err => console.log(err));

  await fileUpload();
   name.value = singer.value = composer.value = "";
   type.value = "Pop";
   language.value = "Myanmar";
}

// FILE UPLOAD
const files = ref(null);
function onChange(event){
  files.value = event.target.files;
  console.log(files.value);
}
function fileUpload(){
  const formData = new FormData();

  for( let i = 0; i < files.value.length; i++ ){
    let file = files.value[i];
    formData.append('files[' + i + ']', file);
  }

  // formData.append('files',this.files);
 axios.post("http://localhost:8000/save",formData,{
    header : {
      'Content-Type':'multipart/form-data'
    }
  })
      .then(res=>console.log(res.data))
      .catch(err=>console.log(err));
}
</script>

<template>
  <div class="flex justify-center mt-2">
    <form @submit.prevent="postSong" class="text-center">
      <h3 class="text-center dark:text-gray-100 font-bold text-lg text-blue-600">Upload Song</h3>
      <div class="w-[90%] mx-auto grid grid-cols-1">
        <div>
          <input v-model="name" type="text" class="rounded-lg mt-3" placeholder="Song name">
        </div>
        <div class="grid grid-cols-2 gap-2 px-1">
          <input v-model="singer" type="text" class="rounded-lg mt-3" placeholder="Singer">
          <input v-model="composer" type="text" class="rounded-lg mt-3" placeholder="Composer">
          <select v-model="type" name="" id="song-type" class="rounded-lg mt-3">
            <option value="Pop" selected>Pop</option>
            <option value="Classic" selected>Classic</option>
          </select>
          <select v-model="language" name="" id="song-language" class="rounded-lg mt-3">
            <option value="Myanmar" selected>Myanmar</option>
            <option value="English">English</option>
          </select>
        </div>
        <div>
          <input @change="onChange" type="file" name="file" accept="*/*" class="file-input mt-3 w-full" multiple/>
        </div>
      </div>
      <button type="submit" class="btn-blue my-4 rounded w-1/3">Upload</button>
    </form>
  </div>
</template>

<style scoped>

</style>