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

                    <?php if( count($books) > 0 ) : ?>
              
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">DOP</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                                $i = 1 ;
                                foreach($books as $singleBook){

                            ?>
                                <tr>
                                <th scope="row"><?php echo $i ?></th>
                                <td>
                                    <div class="book_image">
                                        <img src="<?php echo 'uploads/images/'.$singleBook[7] ?>"  />
                                    </div>
                                </td>
                                <td><?php echo $singleBook[1]?></td>
                                <td><?php echo $singleBook[2]?></td>
                                <td><?php echo $singleBook[5]?></td>
                                <td><?php echo $singleBook[3]?></td>
                                <td><?php echo $singleBook[4]?></td>
                                <td>
                                    <a href="<?php echo 'editBook.php?id='.$singleBook[0] ?>">Edit</a>
                                    <a href="<?php echo 'deleteBook.php?id='.$singleBook[0] ?>">Delete</a>

                                </td>

                                </tr>
                            <?php 
                                $i++;
                                } 
                            ?>
                            
                            </tbody>
                            </table>
                                                                                    
                        
                     </div>
                </div>
                    <?php else : ?>

                        <div class="not-found">
                            <h1>Data not found</h1>
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