<?php
include_once('header.php');
?>

<div style="display: flex;align-items: center;justify-content: center;height:100vh">
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'news-site');
    $post_id = $_GET['id'];
    $sql1 = "select * from post where post_id = '{$post_id}'";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
    ?>
            <form class="container" style="width:30%" method="post" action="<?php echo "updatePostData.php" ?>" enctype="multipart/form-data">
                <h1>Update Post</h1>

                <div class="form-group">
                    <label for="exampleInputUsername">Title</label>
                    <input type="hidden" name="post-id" id="" value="<?php echo $post_id ?>">
                    <input value="<?php echo $row1['title'] ?>" type="text" name="title" class="form-control" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>

                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">
            <?php echo $row1['description'] ?>
            </textarea>
                </div>
                <div>
                    <label for="">Category</label><br>
                    <?php
                    $sql = "select * from category";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)) {
                    ?>
                        <select name="category" id="select">
                            <?php while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['category_id'] == $row1['category']) {
                                    $select = 'selected';
                                } else {
                                    $select = '';
                                }
                                echo '<option ' . $select . ' value="' . "{$row['category_id']}" . '">' . "{$row['category_name']}" . '</option>';
                            } ?>
                        </select>
                    <?php } ?>
                </div>
                <div>
                    <label for="">Post Image</label><br>
                    <input type="file" name="post-img"><br>
                    <input type="hidden" name="old-img" value="<?php echo $row1['post_img'] ?>">
                    <img src="upload/<?php echo $row1['post_img'] ?>" alt="" width="150">
                </div>
                <button type="submit" class="btn btn-primary mt-4" name="submit">Submit</button>
            </form>
    <?php }
    } ?>
</div>
<?php
include_once('footer.php');
?>