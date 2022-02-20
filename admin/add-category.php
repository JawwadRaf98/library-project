<?php 
    session_start();
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');
    include('includes/auth.php');
    $err_message = '';
    $cat_success_message = '';
    $cat_success_status = false;
    if(isset($_POST['add-cat-form'])){
        
        $category_name = $_POST['category'];
        

        $query = "select * from category where category_name = '{$category_name}' LIMIT 1";
        $result = mysqli_query($connection, $query) or die("Query failed");
        $data = mysqli_num_rows($result);
        
        if($data > 0){
            $err_message = "This category already exist";
        }
        else{
            $category_name = ucwords($category_name);
            
            $query = "insert into category(category_name) values('{$category_name}')";
            $result = mysqli_query($connection, $query) or die("Query failed");
            $cat_success_status = true;
            $cat_success_message = "Category added successfully";
            
        }


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
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="category">
                        
                            
                        <div class="form-body">
                        <?php if($cat_success_status) {
                         echo '<div class="alert alert-success" role="alert">';
                         echo $cat_success_message;
                         echo '</div>';
                        }    
                        ?>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category Name:</label>
                                    <input type="text" name="category" class="form-control" id="category" required>
                                    <small id="cat-error" class="form-text"><?php echo $err_message ?></small>
                                </div>
                                
                                <button type="submit" name="add-cat-form" class="btn btn-primary">Add</button>
                            </form>
                        </div>
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