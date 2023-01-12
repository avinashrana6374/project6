<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <!-- <form class="search-post" action="search.php" method ="GET"> -->
        <form class="search-post" action="<?php
        $server_uri = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        echo $server_uri . "/public_html/search.php" ?>" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php
        include "config.php";

        /* Calculate Offset Code */
        $limit = 3;

        $sql = "SELECT post.post_id, post.title, post.post_date,
        category.category_name,post.category,post.post_img,post.post_url FROM post
        LEFT JOIN category ON post.category = category.category_id
        ORDER BY post.post_id DESC LIMIT {$limit}";

        $result = mysqli_query($conn, $sql) or die("Query Failed. : Recent Post");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="recent-post">
                    <a class="post-img"
                        href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] ?>/public_html/single.php/<?php echo $row['post_url']; ?>">
                        <img src="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] ?>/public_html/admin/upload/<?php echo $row['post_img']; ?>"
                            alt="<?php echo $row['post_img']; ?>">
                    </a>
                    <div class="post-content">
                        <h5><a
                                href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] ?>/public_html/single.php/<?php echo $row['post_url']; ?>">
                                <?php echo $row['title']; ?>
                            </a></h5>
                        <span>
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <a href='category.php?cid=<?php echo $row['category']; ?>'>
                                <?php echo $row['category_name']; ?>
                            </a>
                        </span>
                        <span>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <?php echo $row['post_date']; ?>
                        </span>
                        <a class="read-more"
                            href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] ?>/public_html/single.php/<?php echo $row['post_url']; ?>">read
                            more</a>
                    </div>
                </div>
            <?php
            }
        }
        ?>
    </div>
    <!-- /recent posts box -->
</div>