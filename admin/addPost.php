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
            include_once('config.php');
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
</div>
<?php
include_once('footer.php');
?>