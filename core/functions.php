<?php
    //common start

    function alert($data,$color="danger"){
        return "<p class='alert text-danger animate__animated animate__bounceIn font-weight-bold alert-$color'>$data</p>";
    }

    function runquery($sql){
        $con = con();
        if (mysqli_query($con,$sql)) {
            return true;
        } else {
            die("Querry Fail:". mysqli_error($con));
        }
    }

    function fetch($sql){
        $query = mysqli_query(con(),$sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }

    function fetchAll($sql){
        $query = mysqli_query(con(),$sql);
        $rows =[];
        while ($row = mysqli_fetch_assoc($query)){
            array_push($rows,$row);
        }
        return $rows;
    }

    function redirect($l){
        header("location:$l");
    }

    function linkTo($l){
        echo "<script>location.href='$l'</script>";
    }

    function showTime($timeStamp,$format= "j M Y (g:i a)"){
       return date($format,strtotime($timeStamp));
    }

function countTotal($table,$condition = 1){
    $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
    $total = fetch($sql);
    return $total["COUNT(id)"];
}

    function short($str,$length=150){
        if(strlen($str) > $length){
            return substr($str,0,$length)."...";
        }else{
            return substr($str,0,strlen($str));
        }

    }

    function textFilter($text){
        $text = trim($text);
        $text = htmlentities($text,ENT_QUOTES);
        $text = stripcslashes($text);
        return $text;
    }

    function isScript($tags){
        //&lt;script&gt;HHH&gt;&lt;/script&gt;
        $isScript1 = strpos($tags,"&lt;script&gt;");
        $isScript2 = strpos($tags,"&lt;/script&gt;");
        if ($isScript1 != false ){
            die("You are not allowed");
        }elseif($isScript2 != false ){
            die("You are not allowed");
        }else{
           return $tags;
        }
    }
    //common end

    //auth start

function old($inputName){
    if (isset($_POST[$inputName])){
        return $_POST[$inputName];
    }else{
        return "";
    }
}

function setError($inputName,$message){
    $_SESSION['error'][$inputName] = $message;

}

function getError($inputName){
    if (isset($_SESSION['error'][$inputName])){
        return $_SESSION['error'][$inputName];
    }else{
        return "";
    }

}

function clearError(){
    $_SESSION['error'] = [];
}

function register(){
    $errorStatus = 0;
    $name = "";
    $email ="";
    $password="";
    $cpassword="";

//name filter
    if (empty($_POST['name'])){
        setError("name","Name is required");
        $errorStatus = 1;
    }else{
        if (strlen($_POST['name']) < 5){
            setError("name","Name is too short");
            $errorStatus = 1;
        }elseif(strlen($_POST['name']) > 40){
            setError("name","Name is too long");
            $errorStatus = 1;
        }elseif(!preg_match("/^[a-zA-Zက-အ' ]*$/",$_POST['name'])){
            setError("name","Only letters and white space are allowed");
            $errorStatus = 1;
        }else{
            $name = textFilter($_POST['name']);
        }
    }

//        email filter
    if (empty($_POST['email'])){
        setError("email","Email is required");
        $errorStatus = 1;
    }else{
        if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setError("email","Email format incorrect");
            $errorStatus = 1;
        }else{
            $email = textFilter($_POST['email']);
        }
    }

//        password filter
    if (empty($_POST['password'])){
        setError("password","password is required");
        $errorStatus = 1;
    }else{
        if (strlen($_POST['password']) < 5){
            setError("password","password is too short");
            $errorStatus = 1;
        }elseif(strlen($_POST['password']) > 10){
            setError("password","password is too long");
            $errorStatus = 1;
        }elseif(!preg_match("/^[a-zA-Z0-9]*$/",$_POST['password'])){
            setError("password","Only letters and numbers are allowed");
            $errorStatus = 1;
        }else{
            $password = textFilter($_POST['password']);
        }
    }

    //        comfirm password filter
    if (empty($_POST['cpassword'])){
        setError("cpassword","Comfirm password is required");
        $errorStatus = 1;
    }else{
        $cpassword = textFilter($_POST['cpassword']);
    }



//        if (!$errorStatus){
//            echo print_r($_POST);
//        }

    if (!$errorStatus){
        //        $name = $_POST['name'];
//            $email = $_POST['email'];
//            $password = $_POST['password'];
        $cpassword = textFilter($_POST['cpassword']);

        if ($password == $cpassword){
            $sPass = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$sPass')";
            if (runquery($sql)){
                return redirect("login.php");
            }
        }else{
            return alert("Passwords do not match");
        }
    }

}

function login(){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);

    if(!$row){
        return alert("Email or Password does not match");
    }else{
        if (!password_verify($password,$row['password'])){
            return alert("Email or Password does not matchrerdg");
        }else{
            session_start();
            $_SESSION["user"] = $row;
            redirect("dashboard.php");
        }
    }
}





//auth end

    //user start

    function user($id){
        $sql = "SELECT * FROM users WHERE id='$id'";
        return fetch($sql);
    }

    function users(){
        $sql = "SELECT * FROM users";
        return fetchAll($sql);
    }

    //user end

    //catogory start
        function categoryAdd(){
            $title = textFilter($_POST["title"]);
            $user_id = $_SESSION["user"]['id'];
            $sql = "INSERT INTO categories (title,user_id) VALUES ('$title','$user_id')";
            if (runquery($sql)){
                linkTo('category_add.php');
            };
        }

        function category($id){
            $sql = "SELECT * FROM categories WHERE id='$id'";
            return fetch($sql);
        }

        function categories(){
            $sql = "SELECT * FROM categories ORDER BY ordering DESC";
            return fetchAll($sql);
        }

        function categoryDelete($id){
            $sql = "DELETE FROM categories WHERE id='$id'";
            return runquery($sql);
        }

        function categoryUpdate(){
            $title = textFilter($_POST['title']);
            $id = $_POST['id'];
            $sql = "UPDATE categories SET title='$title' WHERE id='$id'";
            return runquery($sql);
        }

        function categoryPinToTop($id){
            $sql = "UPDATE categories SET ordering = '0'";
            mysqli_query(con(),$sql);
            $sql = "UPDATE categories SET ordering = '1' WHERE id='$id'";
            return runquery($sql);
        }

        function categoryRemovePin(){
            $sql = "UPDATE categories SET ordering = '0'";
            return runquery($sql);
        }

        function isCategory($id){
            if (category($id)){
                return $id;
            }else{
                die("Category is invalid");
            }
        }
    //category end

    //post start

        function postAdd(){

            $title = textFilter($_POST['title']);
            $description = isScript(textFilter($_POST['description']));
            $category_id = isCategory($_POST['category_id']);
            $user_id = $_SESSION["user"]['id'];

            $file1 = $_FILES['image_upload'];
            $file2 = $_FILES['music_upload'];
            $fileNameArr1 = textFilter($file1["name"][0]);
            $fileNameArr2 = textFilter($file2["name"][0]);
            $fileTmpArr1 = $file1["tmp_name"][0];
            $fileTmpArr2 = $file2["tmp_name"][0];
            $saveFolder1 = "media/store/image/";
            $saveFolder2 = "media/store/music/";
            $newName1 = $saveFolder1.$fileNameArr1;
            $newName2 = $saveFolder2.$fileNameArr2;

            if ($_FILES['image_upload']['name'][0] == "" && $_FILES['music_upload']['name'][0] != ""){

                $saveFolder1 = "assets/img/";
                $newName1 = $saveFolder1."default.png";

                $sql = "INSERT INTO posts (title,description,category_id,user_id,image_link,music_link) VALUES ('$title','$description','$category_id','$user_id','$newName1','$newName2')";
                if(runquery($sql) && move_uploaded_file($fileTmpArr2,$newName2)){
                    linkTo('post_add.php');
                }

            }elseif($_FILES['image_upload']['name'][0] != "" && $_FILES['music_upload']['name'][0] != ""){
                $sql = "INSERT INTO posts (title,description,category_id,user_id,image_link,music_link) VALUES ('$title','$description','$category_id','$user_id','$newName1','$newName2')";
                if(runquery($sql) && move_uploaded_file($fileTmpArr1,$newName1) && move_uploaded_file($fileTmpArr2,$newName2)){
                    linkTo('post_add.php');
                }
            }elseif($_FILES['image_upload']['name'][0] != "" && $_FILES['music_upload']['name'][0] == ""){
                $sql = "INSERT INTO posts (title,description,category_id,user_id,image_link,music_link) VALUES ('$title','$description','$category_id','$user_id','$newName1','$newName2')";
                if(runquery($sql) && move_uploaded_file($fileTmpArr1,$newName1)){
                    linkTo('post_add.php');
                }
            }elseif($_FILES['image_upload']['name'][0] == "" && $_FILES['music_upload']['name'][0] == ""){
                $saveFolder1 = "assets/img/";
                $newName1 = $saveFolder1."default.png";
                $sql = "INSERT INTO posts (title,description,category_id,user_id,image_link,music_link) VALUES ('$title','$description','$category_id','$user_id','$newName1','$newName2')";
                if(runquery($sql)){
                    linkTo('post_add.php');
                }
            }
        }



        function post($id){
            $sql = "SELECT * FROM posts WHERE id='$id'";
            return fetch($sql);
        }

        function posts($limit=99999999999){
            if ($_SESSION['user']['role'] == 2){
                $current_user_id = $_SESSION['user']['id'];
                $sql = "SELECT * FROM posts WHERE user_id = '$current_user_id' LIMIT $limit";
            }else{
                $sql = "SELECT * FROM posts LIMIT $limit";
            }
            return fetchAll($sql);
        }

    function postDelete($id){
        $image_link = post($id)['image_link'];
        $music_link = post($id)['music_link'];
        $sql = "DELETE FROM posts WHERE id='$id'";
        if ($image_link != "assets/img/default.png" && $music_link != "media/store/music/"){
            if (unlink($image_link) && unlink($music_link)){
                return runquery($sql);
            }
        }elseif($image_link == "assets/img/default.png" && $music_link != "media/store/music/"){
            if (unlink($music_link)){
                return runquery($sql);
            }
        }elseif($image_link == "assets/img/default.png" && $music_link == "media/store/music/"){
            return runquery($sql);
        }elseif($image_link != "assets/img/default.png" && $music_link == "media/store/music/"){
            if (unlink($image_link)){
                return runquery($sql);
            }
        }



    }

    function postUpdate(){
        $id = $_POST['id'];
        $title = textFilter($_POST['title']);
        $description = isScript(textFilter($_POST['description']));
        $category_id = isCategory($_POST['category_id']);
        if ($_FILES['music_upload']['name'][0] == "" && $_FILES['image_upload']['name'][0] == ""){

            $sql = "UPDATE posts SET title='$title', description='$description', category_id='$category_id' WHERE id='$id'";
            return runquery($sql);
        }elseif ($_FILES['music_upload']['name'][0] != "" && $_FILES['image_upload']['name'][0] != ""){
            $image_link = html_entity_decode(post($id)['image_link']);
            $music_link = html_entity_decode(post($id)['music_link']);
            $file1 = $_FILES['image_upload'];
            $file2 = $_FILES['music_upload'];
//            $file3 = $_FILES['video_upload'];
            $fileNameArr1 = textFilter($file1["name"][0]);
            $fileNameArr2 = textFilter($file2["name"][0]);
//            $fileNameArr3 = textFilter($file3["name"][0]);
            $fileTmpArr1 = $file1["tmp_name"][0];
            $fileTmpArr2 = $file2["tmp_name"][0];
//            $fileTmpArr3 = $file3["tmp_name"][0];
            $saveFolder1 = "media/store/image/";
            $saveFolder2 = "media/store/music/";
            $saveFolder3 = "media/store/video/";
            $newName1 = $saveFolder1.$fileNameArr1;
            $newName2 = $saveFolder2.$fileNameArr2;
//            $newName3 = $saveFolder3.$fileNameArr3;

            $sql = "UPDATE posts SET title='$title', description='$description', category_id='$category_id', image_link='$newName1', music_link='$newName2' WHERE id='$id'";

           if (unlink($image_link) && unlink($music_link) &&  move_uploaded_file($fileTmpArr1,$newName1) && move_uploaded_file($fileTmpArr2,$newName2)){
                return runquery($sql);
            }

        }elseif ($_FILES['music_upload']['name'][0] != "" && $_FILES['image_upload']['name'][0] == ""){
            $music_link = html_entity_decode(post($id)['music_link']);
            $file2 = $_FILES['music_upload'];
            $fileNameArr2 = textFilter($file2["name"][0]);
            $fileTmpArr2 = $file2["tmp_name"][0];
            $saveFolder2 = "media/store/music/";
            $newName2 = $saveFolder2.$fileNameArr2;

            $sql = "UPDATE posts SET title='$title', description='$description', category_id='$category_id', music_link='$newName2' WHERE id='$id'";
            if (unlink($music_link) && move_uploaded_file($fileTmpArr2,$newName2)){
                return runquery($sql);
            }

        }elseif ($_FILES['music_upload']['name'][0] == "" && $_FILES['image_upload']['name'][0] != ""){
            $image_link = html_entity_decode(post($id)['image_link']);

            $file1 = $_FILES['image_upload'];
            $fileNameArr1 = textFilter($file1["name"][0]);
            $fileTmpArr1 = $file1["tmp_name"][0];
            $saveFolder1 = "media/store/image/";
            $newName1 = $saveFolder1.$fileNameArr1;

            $sql = "UPDATE posts SET title='$title', description='$description', category_id='$category_id', image_link='$newName1' WHERE id='$id'";
            if ($image_link != "assets/img/default.png"){
                if (unlink($image_link) && move_uploaded_file($fileTmpArr1,$newName1)){
                    return runquery($sql);
                }
            }else{
                if (move_uploaded_file($fileTmpArr1,$newName1)){
                    return runquery($sql);
                }
            }
        }


    }

//    post end

//music and video start

    function audio($id){
        $sql = "SELECT * FROM audios WHERE id='$id'";
        return fetch($sql);
    }
    function video($id){
        $sql = "SELECT * FROM videos WHERE id='$id'";
        return fetch($sql);
    }

    function audioadd(){
        $title = textFilter($_POST['title']);
        $category_id = isCategory($_POST['category_id']);
        $user_id = $_SESSION["user"]['id'];
        $sql = "INSERT INTO audios (title,category_id,user_id) VALUES ('$title','$category_id','$user_id')";
        return fetch($sql);
    }

    function videoadd(){
        $title = textFilter($_POST['title']);
        $category_id = isCategory($_POST['category_id']);
        $user_id = $_SESSION["user"]['id'];
        $sql = "INSERT INTO videos (title,category_id,user_id) VALUES ('$title','$category_id','$user_id')";
        return fetch($sql);
    }

//music and video end



//front panel start
    function fPosts($orderCol="id",$orderType="DESC"){
        $sql = "SELECT * FROM posts ORDER BY $orderCol $orderType";
        return fetchAll($sql);
    }

    function fCategories(){
        $sql = "SELECT * FROM categories ORDER BY ordering DESC";
        return fetchAll($sql);
    }

    function fPostsBYCat($category_id,$limit = 99999999,$post_id = 0){
        $sql = "SELECT * FROM posts WHERE category_id = '$category_id' AND id != '$post_id' ORDER BY id DESC LIMIT $limit";
        return fetchAll($sql);
    }

    function fSearch($search_key){
        $sql = "SELECT * FROM posts WHERE title LIKE '%$search_key%' OR description LIKE '%$search_key%' ORDER BY id DESC ";
        return fetchAll($sql);
    }

    function fSearchByDate($start,$end){
        $sql = "SELECT * FROM posts WHERE created_at BETWEEN '$start' AND '$end' ORDER BY id DESC";
        return fetchAll($sql);
    }
//front panel end

//viewer count start
function viewerRecord($user_id,$post_id,$device){
    $sql = "INSERT INTO viewers (user_id,post_id,device) VALUES ('$user_id','$post_id','$device')";
    return runquery($sql);
}

function viewerCountByPost($postId){
    $sql = "SELECT * FROM viewers WHERE post_id = '$postId'";
    return fetchAll($sql);
}

function viewerCountByUser($userId){
    $sql = "SELECT * FROM viewers WHERE user_id = '$userId'";
    return fetchAll($sql);
}
//viewer count end

//dashboard

function dashboardPosts($limit=99999999999){
    if ($_SESSION['user']['role'] == 2){
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id = '$current_user_id' ORDER BY id DESC LIMIT $limit";
    }else{
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit";
    }
    return fetchAll($sql);
}

//dashboard

