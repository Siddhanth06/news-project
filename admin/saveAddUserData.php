<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$role = $_POST['select'];

// echo $firstname."<br>";
// echo $lastname."<br>";
// echo $username."<br>";
// echo md5($password)."<br>";
// echo $role."<br>";

// 1. Connect to the database
$conn = mysqli_connect('localhost','root','','news-site');
// 2. Query to insert data
$sql = "insert into user (first_name,last_name,username,password,role) values ('{$firstname}','{$lastname}','{$username}','{$password}','{$role}')";
// 3. Execute Query
$result = mysqli_query($conn,$sql);

header("Location:http://localhost/news-site/admin/users.php");

mysqli_close($conn);


