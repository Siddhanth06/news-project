<?php
include_once('header.php');
?>

<div style="display: flex;align-items: center;justify-content: center;height:100vh">
    <form class="container" style="width:30%" method="post" action="<?php echo "savePost.php" ?>" enctype="multipart/form-data">
        <h1>Add Post</h1>

        <div class="form-group">
            <label for="exampleInputUsername">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Enter Username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div>
            <label for="">Category</label><br>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'news-site');
            $sql = "select * from category";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)) {
            ?>
                <select name="category" id="select">
                    <?php while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . "{$row['category_id']}" . '">' . "{$row['category_name']}" . '</option>';
                    } ?>
                </select>
            <?php } ?>
        </div>
        <div>
            <label for="">Post Image</label><br>
            <input type="file" name="post-img">
        </div>
        <button type="submit" class="btn btn-primary mt-4" name="submit">Submit</button>
    </form>
    <?php
    // if (isset($_POST['submit'])) {
    //     $conn = mysqli_connect('localhost', 'root', '', 'news-site');
    //     $username = mysqli_real_escape_string($conn, $_POST['username']);
    //     $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    //     $sql = "select user_id,username,role from user where username='{$username}' and password='{$password}'";
    //     $result = mysqli_query($conn, $sql) or die('Query failed');
    //     if (mysqli_num_rows($result) > 0) {
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             session_start();
    //             $_SESSION['username'] = $row['username'];
    //             $_SESSION['role'] = $row['role'];
    //             $_SESSION['user_id'] = $row['user_id'];

    //             header('Location:http://localhost/news-site/admin/post.php');
    //         }
    //     } else {
    //         echo '<p>No matching password and username</p>';
    //     }
    // }
    ?>
</div>
<?php
include_once('footer.php');
?>