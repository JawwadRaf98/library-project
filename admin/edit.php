<?php 
    session_start();
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');
    include('includes/auth.php');

    $cat_edit_status = false;
    $cat_edit_message = "";
    $id = $_GET['id'];
    
    $query = "select * from category where category_id = {$id} LIMIT 1";
    $result = mysqli_query($connection, $query) or die("Query failed");
    $data =  mysqli_fetch_all($result);

    $cat_name = $data[0][1];
    // print_r($data);
    // echo $cat_name; ucwords($category_name)


    if(isset($_POST['edit-cat-form'])){
        $new_category_name = $_POST['update-category'];
        $new_category_name = ucwords($new_category_name);
        $query = "update category set category_name = '{$new_category_name}' where category_id = '{$id}'";
        $result = mysqli_query($connection, $query) or die("Query failed");
        $cat_edit_status = true;
        $cat_edit_message = "Category updated successfully";
    }
?>

 <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
        <div id="content">
            <?php include('includes/navbar.php') ?>

        <!-- container fluid start -->
        <div class="container-fluid">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="category">
                        
                        <a href="category.php" class="back">back</a>
                        <div class="form-body">
                        <?php if($cat_edit_status) {
                         echo '<div class="alert alert-success" role="alert">';
                         echo $cat_edit_message;
                         echo '</div>';
                        }    
                        ?>

                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="update-category" class="form-label">Category Name: <b> <?php echo $cat_name ?> </b> </label>
                                    <input type="text" name="update-category" placeholder="Enter new name" class="form-control" id="update-category" required>
                                    <!-- <small id="cat-error" class="form-text"><?php echo $err_message ?></small> -->
                                </div>
                                
                                <button type="submit" name="edit-cat-form" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        


        </div>
        <!-- container fluid end -->

<?php 
    include('includes/scripts.php');
    include('includes/footer.php');
?>