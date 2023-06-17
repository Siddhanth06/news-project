<?php 
$conn = mysqli_connect('localhost','root','','news-site');
$id = $_GET['id'];
$sql = "delete from category where category_id ='{$id}'";
$result = mysqli_query($conn,$sql);
header("Location:http://localhost/news-site/admin/category.php");
?>