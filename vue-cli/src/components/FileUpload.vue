<template>
  <div class="mx-auto mt-12 flex justify-center items-center">
    <form @submit.prevent="onUpload" class="h-screen mx-auto">
      <input @change="onChange" type="file" name="file" accept="*/*" class="file-input" multiple/>
      <button type="submit" class="btn-blue ml-3">Upload</button>
    </form>
  </div>
</template>

<script setup>
  import {ref} from "vue";
  import axios from "axios";
  const files = ref(null);
  function onChange(event){
    files.value = event.target.files;
    console.log(files.value);
  }
  function onUpload(){
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

<style scoped>

</style>