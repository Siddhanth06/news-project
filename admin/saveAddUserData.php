<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$role = $_POST['select'];

// 1. Connect to the database
include_once('config.php');
// 2. Query to insert data
$sql = "insert into user (first_name,last_name,username,password,role) values ('{$firstname}','{$lastname}','{$username}','{$password}','{$role}')";
// 3. Execute Query
$result = mysqli_query($conn,$sql);

header("Location:{$PATH}users.php");

mysqli_close($conn);


