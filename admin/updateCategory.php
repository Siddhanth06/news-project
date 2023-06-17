<?php
include_once('header.php');
?>
<div class="container" style="text-align: center;">
    <h1>Update Category</h1>
    <?php 
    include_once('config.php');
    $category_id = $_GET['id'];
    $sql1 = "select * from category where category_id = '{$category_id}'";
    $result1 = mysqli_query($conn,$sql1);
    if(mysqli_num_rows($result1)){
        while($row = mysqli_fetch_assoc($result1)){
    ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" class="mt-5" method="post">
        <label for="">Enter Category</label><br>
        <input type="text" name="category" id="" class="" value="<?php echo $row['category_name'] ?>"><br>
        <button class="add_category_btn" type="submit" name="add_category">Update</button>
    </form>
    <?php }} ?>
</div>

<?php 
if(isset($_POST['add_category'])){
    $category = $_POST['category'];
    $sql = "update category set category_name = '{$category}' where category_id = '{$category_id}'";
    $result = mysqli_query($conn,$sql) or die("Query Failed");
    header("Location: {$PATH}category.php");
    mysqli_close($conn);
}
?>

<?php
include_once('footer.php');
?>