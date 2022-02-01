<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../resources/feather_icon/feather.css">
    <link rel="stylesheet" href="<?= asset("output.css"); ?>">
    <script src="../resources/js/axios/axios.min.js"></script>
    <script src="../resources/js/vue/vue.js"></script>
</head>
<body>
<div id="app">
    <div class="mx-auto mt-12">
        <form @submit.prevent="onUpload" action="/save" method="post" enctype="multipart/form-data">
            <input @change="onChange" type="file" name="file" accept="*/*" class="bg-blue-500" multiple>
            <button type="submit" class="px-3 py-4 bg-blue-500">Submit</button>
        </form>
    </div>
</div>
<script>
    new Vue({
        el: "#app",
        data: {
            files: null,
        },
        methods: {
            onChange(event) {
                this.files = event.target.files;
                console.log(this.files);
            },
            onUpload() {
                const formData = new FormData();

                for( let i = 0; i < this.files.length; i++ ){
                    let file = this.files[i];
                    // console.log(file);
                    formData.append('files[' + i + ']', file);
                }

                // formData.append('files',this.files);
                axios.post("/save",formData,{
                    header : {
                        'Content-Type':'multipart/form-data'
                    }
                })
                    .then(res=>console.log(res.data))
                    .catch(err=>console.log(err));

            },

        }
    });
</script>
</body>
</html>


