<?php 
    session_start();
    include('includes/auth.php');
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');

    $query = "select * from category";
    $result = mysqli_query($connection, $query) or die("Query Failed");
    $category = mysqli_fetch_all($result);
?>

 <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
        <div id="content">
            <?php include('includes/navbar.php') ?>

        <!-- container fluid start -->
        <div class="container-fluid">
            <div class="cat-head-area">
                <div class="books-content">
                <h1>Category</h1>
                <!-- <hr class="blue-divider" /> -->

                <div class="add-button">
                    <a href="?tab=add-category" class="btn btn-primary">Add Category</a>
                </div>
                <hr>
            </div>

        <div class="row">

            <?php
                if(count($category) > 0){
                    foreach($category as $value){
            ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 ">
                        <div class="cat-box">
                            <div class="cat-content-box">
                                <p class="cat-text">
                                <?php echo $value[1] ?>    
                                </p>
                                <div class="action">
                                    <button class="delete" ><a  href="?delete=<?php echo $value[0] ?>">Delete</a> </button> 
                                    <button class="edit"><a href="?edit=<?php echo $value[0] ?> ">Edit</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
           <?php } }?>


            
            
        </div>


        <!-- page content here -->


        </div>
        <!-- container fluid end -->

<?php 
    include('includes/scripts.php');
    include('includes/footer.php');
?>