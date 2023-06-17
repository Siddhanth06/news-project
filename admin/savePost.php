<?php 
session_start();
include_once('config.php');
$title = mysqli_real_escape_string($conn,$_POST['title']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$category = mysqli_real_escape_string($conn,$_POST['category']);
$author = $_SESSION['user_id'];
$date = date('d M, Y');



if(isset($_FILES['post-img'])){
    $errors = array();
    $file_name = $_FILES['post-img']['name'];
    $file_size = $_FILES['post-img']['size'];
    $file_tmp = $_FILES['post-img']['tmp_name'];
    $file_type = $_FILES['post-img']['type'];

    move_uploaded_file($file_tmp,'upload/'.$file_name);
}

$sql = "insert into post(title,description,category,author,post_date,post_img) values('{$title}','{$description}','{$category}','{$author}','{$date}','{$file_name}')";
$sql."update category set post = post + 1 where category_id = '{$category}'";
if(mysqli_multi_query($conn,$sql)){
    header("Location:{$PATH}post.php");
}else{
    echo 'Error';
}

?>