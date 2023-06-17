<?php 
include_once('config.php');
$id = $_GET['id'];
$sql = "delete from user where user_id = '{$id}'";
if(mysqli_query($conn,$sql)){
header("Location:{$PATH}users.php");
}
?>