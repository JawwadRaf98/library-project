<?php 
    session_start();
    include('includes/auth.php');
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');
    


    $query = "SELECT * FROM books";
    $result = mysqli_query($connection, $query) or die("Query failed");
    $books = mysqli_fetch_all($result);
    
?>

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
                    <a href="addBooks.php" class="btn btn-primary">Add Books</a>
                </div>
                <hr>
                <div class="available-books">
                <div class="container">

                    <?php if($data) : ?>
                        <div class="row">

                        
                            
                            <?php 
                            // print_r($books);
                                foreach($books as $singleBook){
                                    // print_r($singleBook);

                            ?>
                                   <div class="col-lg-4 col-md-4 col-sm-6 sol-xs-12">

                                   <div class="card mb-4" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Name: <?php echo ucfirst($singleBook['1'])?></h5>
                                        <p class="card-text">Description: <?php echo ucfirst($singleBook['5'])?></p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Authot: <?php echo ucfirst($singleBook['2'])?></li>
                                        <li class="list-group-item">DOP: <?php echo ucfirst($singleBook['4'])?></li>
                                        <li class="list-group-item">Category: <?php echo ucfirst($singleBook['3'])?></li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="editBook.php?id=<?php echo $singleBook[0]?>" type="button" class="btn btn-primary">Edit</a>
                                        <a href="deleteBook.php?id=<?php echo $singleBook[0]?>" type="button" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                                   </div>
                                                             
                            <?php } ?>
                            
                                <!-- <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src=alt="Card image cap">
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
                                </div> -->

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