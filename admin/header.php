<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/news-site/admin/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div>News Website</div>
        <div><a href="logout.php" class="logout_btn"><?php echo 'Hello ' . $_SESSION['username'] . ', ' ?>Logout</a></div>
    </header>
    <div class="tables_nav">
        <ul>
            <li><a href="post.php">Posts</a></li>
            <?php if ($_SESSION['role'] == '1') { ?>
                <li><a href="category.php">Category</a></li>
                <li><a href="users.php">Users</a></li>
            <?php } ?>
        </ul>
    </div>