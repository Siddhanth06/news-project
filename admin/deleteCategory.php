<?php 
include_once('config.php');
$id = $_GET['id'];
$sql = "delete from category where category_id ='{$id}'";
$result = mysqli_query($conn,$sql);
header("Location:{$PATH}category.php");
?>