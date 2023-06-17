<?php
include_once('header.php');
?>
<div class="container" style="text-align: center;">
    <h1>Add Category</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" class="mt-5" method="post">
        <label for="">Enter Category</label><br>
        <input type="text" name="category" id="" class=""><br>
        <button class="add_category_btn" type="submit" name="add_category">Submit</button>
    </form>
</div>

<?php 
if(isset($_POST['add_category'])){
    $category = $_POST['category'];
    $conn = mysqli_connect('localhost','root','','news-site');
    $sql = "insert into category(category_name) values('{$category}')";
    $result = mysqli_query($conn,$sql) or die("Query Failed");
    header("Location: http://localhost/news-site/admin/category.php");
    mysqli_close($conn);
}
?>

<?php
include_once('footer.php');
?>