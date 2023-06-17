<?php 
$conn = mysqli_connect('localhost','root','','news-site');
$id = $_GET['id'];
$sql = "delete from user where user_id = '{$id}'";
if(mysqli_query($conn,$sql)){
header("Location:http://localhost/news-site/admin/users.php");
}
?>