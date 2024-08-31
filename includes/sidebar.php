<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">



<?php
if(isset($_POST['submit'])){
    $search = $_POST['search'];

    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search'";

    $search_query = mysqli_query($connection, $query);

    if(!$search){
        die("QUERY FAILED" . mysqli_error($connection));
    }

    $count = mysqli_num_rows($search_query);

    if($count == 0 ){
        echo "<h1>no result<h1>";

    } else{
        echo "Some Result";
    }
}


?>
<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
        <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>






<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php
                    $query = "SELECT * FROM categories LIMIT 3";

                    $category_query_sidebar = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($category_query_sidebar)){
                        $sidebar_cat = $row['cat_title'];

                        echo "<li><a href='#'>" . $sidebar_cat . "</li></a>";

                    }

                ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include 'widget.php' ?>

</div>