<?php include_once('./header.php'); ?>
<div class="users_header">
<p>All Posts</p>
<button><a href="addPost.php" style="color:white;text-decoration: none;">Add Post</a></button>
</div>
<?php 
$limit = 3;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$offset = ($page - 1) * $limit;
$conn = mysqli_connect('localhost','root','','news-site');
if($_SESSION['role'] == '0'){
$sql = "Select * from post 
inner join category 
on post.category = category.category_id 
where post.author = '{$_SESSION['user_id']}'
limit {$offset},{$limit}";
}elseif($_SESSION['role'] == '1'){
    $sql = "Select * from post 
    inner join category 
    on category = category_id 
    limit {$offset},{$limit}";
}
// $sql = "Select * from post inner join category where category = category_id limit {$offset},{$limit}";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
?>
<table class="table container mt-3">
    <thead class="thead-light">
        <tr class="table-dark">
            <th scope="col">S.No</th>
            <th scope="col">TITLE</th>
            <th scope="col">CATEGORY NAME</th>
            <th scope="col">DATE</th>
            <th scope="col">AUTHOR</th>
            <th scope="col">EDIT</th>
            <th scope="col">DELETE</th>

        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <th scope="row"><?php echo $row['post_id'] ?></th>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['category_name'] ?></td>
            <td><?php echo $row['post_date'] ?></td>
            <td><?php echo $row['author'] == '0' ? 'Normal' : 'Admin' ?></td>
            <td><ion-icon name="create-outline"></ion-icon></td>
            <td><a href="deleteUser.php?id=<?php echo $row['post_id'] ?>" style="text-decoration:none;color:grey"><ion-icon name="trash-outline"></ion-icon></a></td>
        </tr>
            <?php } ?>
    </tbody>
</table>
<?php } ?>
<div class="pagination_btns">
        <?php
        $sql1 = "select * from post";
        $result1 = mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result1) > 0){
           $total_record = mysqli_num_rows($result1);
           $total_page = ceil($total_record/$limit);
           for($i = 1;$i <= $total_page; $i++){
            echo '<button><a href="post.php?page='.$i.'" style="color:white;text-decoration:none">'.$i.'</a></button>';
           } 
        } 
        ?>
    <!-- <button>2</button>
    <button>3</button> -->
</div>


<?php include_once('./footer.php'); ?>