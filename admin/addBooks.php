<?php 
    session_start();
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');
    include('includes/auth.php');

    $query = "select * from category";
    $result = mysqli_query($connection, $query) or die("Query Failed");
    $categories =  mysqli_fetch_all($result);


    if(isset($_POST['add-book-form'])){

        $book_name =$_POST['book-name'];
        $book_author =$_POST['book-author'];
        $book_category =$_POST['book-category'];
        $book_image =$_POST['book-image'];
        $book_file =$_POST['book-file'];
        $book_description =$_POST['book-description'];




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

            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="add-book-form">
                <form action="" method="POST" id="add-book">
                    <input type="hidden" name="book-id" id="book-id">
                    <div class="mb-3">
                        <label for="bookName" class="form-label">Book Name</label>
                        <input type="text" name="book-name" class="form-control" id="bookName" required>
                        <small  class="form-text"></small>
                    </div>

                    <div class="mb-3">
                        <label for="bookAuthor" class="form-label">Book Author</label>
                        <input type="text" name="book-author" class="form-control" id="bookAuthor" required>
                        <small  class="form-text"></small>
                    </div>
                    <table>
                        <tr>
                    <div class="mb-3">
                     <td><label class="book-category" class="form-label">Book Category</label></td>
                        <td><select id="book-category" name="book-category" form="add-book">
                            <option value="">Select</option>
                            <?php 
                                foreach($categories as $category){
                                    echo "<option value='$category[0]'>$category[1]</option>";
                                }
                            ?>
                        </select>
                        </td>
                    </div>
                    </tr>
                    <tr>
                    <div class="mb-3">
                         <td><label for="book-image" class="form-label">Book Image</label></td>    
                        <td><input type="file" class="file" name="book-image" class="form-control" id="book-image" required> </td>
                    </div>
                    </tr>
                    
                    
                    <tr>
                    <div class="mb-3">
                        <td><label for="book-file" class="form-label">Book File</label></td>
                        <td><input type="file" class="file" name="book-file" class="form-control" id="book-file" required></td>
                        <small  class="form-text"></small>
                    </div>
                    </tr>
                    </table>

                    <div class="mb-3">
                        <label for="book-description" class="form-label">Book Description</label>
                        <textarea name="book-description" rows="5" class="form-control" id="book-description" required ></textarea>
                        <small  class="form-text"></small>
                    </div>
                
                <button type="submit" class="btn btn-primary" name="add-book-form">Submit</button>
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