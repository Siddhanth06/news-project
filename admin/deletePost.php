<?php 
include_once('config.php');
$id = $_GET['id'];
$sql = "delete from post where post_id = '{$id}'";
$sql1 = "select * from post where post_id = {$id}";
$result1 = mysqli_query($conn,$sql1);
$row = mysqli_fetch_assoc($result1);
unlink('upload/'.$row['post_img']);
if(mysqli_query($conn,$sql)){
header("Location:{$PATH}post.php");
}
?>
