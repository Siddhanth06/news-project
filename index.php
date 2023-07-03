<!DOCTYPE html>
<html lang="en">
<?php include_once('config.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="logo">
            Logo
        </div>
        <nav class="nav">
            <?php 
            $category_sql = "Select * from category;";
            $category_result = mysqli_query($conn,$category_sql);
            if(mysqli_num_rows($category_result) > 0){
            ?>
            <ul class="main-nav">
                <?php while($category_row = mysqli_fetch_assoc($category_result)){ ?>
                <li class="nav-item"><?php echo strtoupper($category_row['category_name']); ?> </li>
                <?php } ?>
            </ul>
            <?php } ?>
        </nav>
    </header>
    <main>
    <?php
    session_start();
$limit = 3;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit;
include_once('config.php');
if ($_SESSION['role'] == '0') {
    $sql = "Select * from post 
inner join category 
on post.category = category.category_id 
where post.author = '{$_SESSION['user_id']}'
inner join user on post.author = user.user_id
limit {$offset},{$limit}";
} elseif ($_SESSION['role'] == '1') {
    $sql = "Select * from post 
    inner join category 
    on category = category_id 
    inner join user on post.author = user.user_id
    limit {$offset},{$limit}";
}
// $sql = "Select * from post inner join category where category = category_id limit {$offset},{$limit}";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?>
        <div class="news-left">
            <?php while($row = mysqli_fetch_assoc($result)){?>

            <div class="news_div">
                <div class="news-img">
                    <img src="https://images.unsplash.com/photo-1563986768817-257bf91c5753?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=910&q=80" alt="">
                </div>
                <div class="news_content">
                    <h1 class="title"><?php echo $row['title']; ?></h1>
                    <ul class="tags_list">
                        <li><ion-icon name="pricetags-outline"></ion-icon><?php echo $row['category_name']; ?></li>
                        <li><ion-icon name="person-outline"></ion-icon><?php echo $row['username']; ?></li>
                        <li><ion-icon name="calendar-outline"></ion-icon><?php echo $row['post_date']; ?></li>
                    </ul>
                    <p class="description"><?php echo substr($row['description'],0,160)."....."; ?></p>
                    <div class="btn_div">
                        <button class="read_more">read more</button>

                    </div>
                </div>
            </div>
            <hr>
            <?php } ?>
            <div class="pagination_btns">
    <?php
    $sql1 = "select * from post";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        $total_record = mysqli_num_rows($result1);
        $total_page = ceil($total_record / $limit);
        for ($i = 1; $i <= $total_page; $i++) {
            echo '<button><a href="index.php?page=' . $i . '" style="color:white;text-decoration:none">' . $i . '</a></button>';
        }
    }
    ?>
</div>
        </div>
        <?php } ?>
        
        <div class="news-right">
            <div class="search_tab">
                <h1 class="search_text">SEARCH</h1>
                <div class="custom-search">
                    <input type="text" class="custom-search-input" placeholder="search...">
                    <button class="custom-search-botton" type="submit">Search</button>
                </div>
            </div>
            <div class="recent_posts">
                <div>
                    <h1 class="recent_post">RECENT POSTS</h1>
                    <div class="news_div">
                        <div class="news-img">
                            <img src="https://images.unsplash.com/photo-1563986768817-257bf91c5753?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=910&q=80" alt="">
                        </div>
                        <div class="news_content_sidebar">
                            <h1 class="title_sidebar">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum in impedit</h1>
                            <ul class="tags_list_sidebar">
                                <li><ion-icon name="pricetags-outline"></ion-icon>PHP</li>
                                <li>9 November</li>
                            </ul>
                            <!-- <p class="description_sidebar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum rem dolorem quidem quasi similique Lorem, ipsum dolor....</p> -->
                            <div class="btn_div_sidebar">
                                <button class="read_more_sidebar">read more</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div>

                    <div class="news_div">
                        <div class="news-img">
                            <img src="https://images.unsplash.com/photo-1563986768817-257bf91c5753?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=910&q=80" alt="">
                        </div>
                        <div class="news_content_sidebar">
                            <h1 class="title_sidebar">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum in impedit</h1>
                            <ul class="tags_list_sidebar">
                                <li>PHP</li>
                                <li>9 November</li>
                            </ul>
                            <!-- <p class="description_sidebar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum rem dolorem quidem quasi similique Lorem, ipsum dolor....</p> -->
                            <div class="btn_div_sidebar">
                                <button class="read_more_sidebar">read more</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <div class="news_div">
                        <div class="news-img">
                            <img src="https://images.unsplash.com/photo-1563986768817-257bf91c5753?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=910&q=80" alt="">
                        </div>
                        <div class="news_content_sidebar">
                            <h1 class="title_sidebar">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum in impedit</h1>
                            <ul class="tags_list_sidebar">
                                <li>PHP</li>
                                <li><ion-icon name="heart"></ion-icon>9 November</li>
                            </ul>
                            <!-- <p class="description_sidebar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum rem dolorem quidem quasi similique Lorem, ipsum dolor....</p> -->
                            <div class="btn_div_sidebar">
                                <button class="read_more_sidebar">read more</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>