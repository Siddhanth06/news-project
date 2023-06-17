<?php include_once('./header.php');

if ($_SESSION['role'] == '0') {
    header("Location: {$PATH}post.php");
}
?>
<div class="users_header">
    <p>All Categories</p>
    <button><a href="addCategory.php" class="add_category_link">Add Category</a></button>
</div>
<?php
$limit = 3;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit;
include_once('config.php');
$sql = "Select * from category limit {$offset},{$limit}";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?>
    <table class="table container mt-3">
        <thead class="thead-light">
            <tr class="table-dark">
                <th scope="col">S.No</th>
                <th scope="col">CATEGORY NAME</th>
                <th scope="col">NO. OF POSTS</th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <th scope="row"><?php echo $row['category_id'] ?></th>
                    <td><?php echo $row['category_name'] ?></td>
                    <td><?php echo $row['post'] ?></td>
                    <td><a href="updateCategory.php?id=<?php echo $row['category_id'] ?>" style="text-decoration:none;color:grey"><ion-icon name="create-outline"></ion-icon></a></td>
                    <td><a href="deletecategory.php?id=<?php echo $row['category_id'] ?>" style="text-decoration:none;color:grey"><ion-icon name="trash-outline"></ion-icon></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>
<div class="pagination_btns">
    <?php
    $sql1 = "select * from category";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        $total_record = mysqli_num_rows($result1);
        $total_page = ceil($total_record / $limit);
        for ($i = 1; $i <= $total_page; $i++) {
            echo '<button><a href="category.php?page=' . $i . '" style="color:white;text-decoration:none">' . $i . '</a></button>';
        }
    }
    ?>
</div>


<?php include_once('./footer.php'); ?>