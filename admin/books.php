<?php 
    session_start();
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/auth.php');

    
     



    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'library';

    $connection = mysqli_connect($host,$user,$password,$database);

    $query = "SELECT * FROM books";
    $run_query = mysqli_query($connection, $query);
    $data = mysqli_fetch_all($run_query);
    
?>
<link rel="stylesheet" href="css/style.css" type="text/css">
 <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
        <div id="content">
            <?php include('includes/navbar.php') ?>

        <!-- container fluid start -->
        <div class="container-fluid">

            <div class="books-content">
                <h1>Books</h1>
            <hr class="blue-divider" />

                <div class="add-button">
                    <button type="button" class="btn btn-primary">Add Books</button>
                </div>
                <hr>
                <div class="available-books">
                <div class="container">

                    <?php if($data) : ?>
                        <div class="row">
    
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4   ">

                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Name</h5>
                                        <p class="card-text">Description:</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Authot:</li>
                                        <li class="list-group-item">DOP:</li>
                                        <li class="list-group-item">Category</li>
                                    </ul>
                                    <div class="card-body">
                                        <button  type="button" class="btn btn-primary">Edit</button>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>

                            </div>

                            

                            </div>
                        </div>
                    <?php else : ?>

                        <div class="not-found">
                            <h1>data not found</h1>
                        </div>
                    <?php endif ?>
                </div>

            </div>


        </div>
        <!-- container fluid end -->

<?php 
    include('includes/scripts.php');
    include('includes/footer.php');
?>