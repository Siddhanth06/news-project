<?php 
session_start();
if(isset($_SESSION['username'])){
    header('Location:http://localhost/news-site/admin/post.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div style="display: flex;align-items: center;justify-content: center;height:100vh">
        <form class="container" style="width:30%" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <h1>Admin</h1>

            <div class="form-group">
                <label for="exampleInputUsername">User name</label>
                <input type="text" name="username" class="form-control" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-primary mt-4" name="submit">Submit</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $conn = mysqli_connect('localhost','root','','news-site');
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, md5($_POST['password']));

            $sql = "select user_id,username,role from user where username='{$username}' and password='{$password}'";
            $result = mysqli_query($conn,$sql) or die('Query failed');
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    session_start();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['user_id'] = $row['user_id'];

                    header('Location:http://localhost/news-site/admin/post.php');
                }
            }else{
                echo '<p>No matching password and username</p>';
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>