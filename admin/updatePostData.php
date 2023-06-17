<?php
session_start();
include_once('config.php');
$post_id = $_POST['post-id'];
if (empty($_FILES['post-img']['name'])) {
    $file_name = $_POST['old-img'];
} else {
    $errors = array();
    $file_name = $_FILES['post-img']['name'];
    $file_size = $_FILES['post-img']['size'];
    $file_tmp = $_FILES['post-img']['tmp_name'];
    $file_type = $_FILES['post-img']['type'];

    move_uploaded_file($file_tmp, 'upload/' . $file_name);
}

$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$author = $_SESSION['user_id'];
$date = date('d M, Y');

$sql = "update post set title='{$title}',description='{$description}',category='{$category}',post_img='{$file_name}' where post_id={$post_id}";
$result = mysqli_query($conn, $sql);
header("Location: {$PATH}post.php");
