<?php
include_once('./header.php');
if ($_SESSION['role'] == '0') {
    header("Location: http://localhost/news-site/admin/post.php");
}
?>
<div class="users_header">
    <p>All Users</p>
    <button><a href="addUser.php" style="text-decoration: none;color:white">Add Users</a></button>
</div>
<?php
$limit = 3;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit;
$conn = mysqli_connect('localhost', 'root', '', 'news-site');
$sql = "Select * from user limit {$offset},{$limit}";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?>
    <table class="table container mt-3">
        <thead class="thead-light">
            <tr class="table-dark">
                <th scope="col">S.No</th>
                <th scope="col">FULL NAME</th>
                <th scope="col">USER NAME</th>
                <th scope="col">ROLE</th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <th scope="row"><?php echo $row['user_id'] ?></th>
                    <td><?php echo $row['first_name'] . " " . $row['last_name'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['role'] ?></td>
                    <td><ion-icon name="create-outline"></ion-icon></td>
                    <td><a href="deleteUser.php?id=<?php echo $row['user_id'] ?>" style="text-decoration:none;color:grey"><ion-icon name="trash-outline"></ion-icon></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>
<div class="pagination_btns">
    <?php
    $sql1 = "select * from user";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        $total_record = mysqli_num_rows($result1);
        $total_page = ceil($total_record / $limit);
        for ($i = 1; $i <= $total_page; $i++) {
            echo '<button style="font-size:1rem"><a href="users.php?page=' . $i . '" style="color:white;text-decoration:none">' . $i . '</a></button>';
        }
    }
    ?>
    <!-- <button>2</button>
    <button>3</button> -->
</div>


<?php include_once('./footer.php'); ?>