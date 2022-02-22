<?php 
    session_start();
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');
    include('includes/auth.php');

    $query = "select * from category";
    $result = mysqli_query($connection, $query) or die("Query Failed");
    $categories =  mysqli_fetch_all($result);


    $book_status = false;
    $book_message = "";

    $id = $_GET['id'];


    $query = "select * from books where bookId  = '{$id}'";
    $result = mysqli_query($connection,$query) or die(mysqli_error($connection));
    $editBookData = mysqli_fetch_assoc($result);

    if(isset($_POST['update-book-form'])){
        $book_id =$_POST['book-category'];
        $query = "select category_name from category where category_id = {$book_id}";
        $result = mysqli_query($connection,$query) or die("Query Failed");;
        $data = mysqli_fetch_all($result);
        // print_r($data[0][0]);

        $book_name =$_POST['book-name'];
        $book_author =$_POST['book-author'];
        $book_category =$data[0][0];
       // $book_image =$_POST['book-image'];
        $book_file =$_POST['book-file'];
        $book_description =$_POST['book-description'];
        $book_DOU = date('d-m-y');
        // echo gettype($book_name);
        // $query = "insert into lib-book(`bookCategory`) values(`{$book_category}`)";
     //$query = "insert into books(bookName) values('{$book_category}')";
        //  echo $book_DOU." ".$book_author." ".$book_name." cat=> ".$book_category." ".$book_image." ".$book_file." ".$book_description;

       
        $query = "update books set bookName = '$book_name' ,bookAuthor = '$book_author' , bookCategory = '$book_category' , bookDOU = '$book_DOU',bookDescription ='$book_description',bookFile ='$book_file'  where bookId = $id"  ;
        
         //$query = "Update books set(bookName = '$book_name' ,bookAuthor = '$book_author' , bookCategory = '$book_category' , bookDOU = '$book_DOU',bookDescription ='$book_description',bookFile ='$book_file') where bookId = $id";
        //  VALUES ('$book_name','$book_author','$book_category','$book_DOU','$book_description','$book_file')";
        // echo $query;
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        // echo $book_DOU." ".$book_author." ".$book_name." cat=> ".$book_category." ".$book_image." ".$book_file." ".$book_description;
        if($result){
            $book_status = true;
            $book_message = "Book added successfully";
        }
        else{
            echo " not updaterd";

            $book_status = false;
            $book_message = "Book not added";
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
           <div class="row justify-content-center">

            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="add-book-form">
                <?php if($book_status)
                    echo "<div class='alert alert-success' role='alert'>"
                   .$book_message.
                  "</div>";
                ?>
                <form action="" method="POST" id="add-book">
                    <input type="hidden" name="book-id" id="book-id">
                    <div class="mb-3">
                        <label for="bookName" class="form-label">Book Name</label>
                        <input type="text" value=<?php echo $editBookData['bookName']?> name="book-name" class="form-control" id="bookName" required>
                        <small  class="form-text"></small>
                    </div>

                    <div class="mb-3">
                        <label for="bookAuthor" class="form-label">Book Author</label>
                        <input type="text" value=<?php echo $editBookData['bookAuthor']?> name="book-author" class="form-control" id="bookAuthor" required>
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
                    <!-- <tr>
                    <div class="mb-3">
                         <td><label for="book-image" class="form-label">Book Image</label></td>    
                        <td><input type="file" class="file" name="book-image" class="form-control" id="book-image" required> </td>
                    </div>
                    </tr> -->
                    
                    
                    <tr>
                    <div class="mb-3">
                        <td><label for="book-file"  class="form-label">Book File</label></td>
                        <td><input type="file"  value=<?php echo $editBookData['bookFile']?>  class="file" name="book-file" class="form-control" id="book-file" required></td>
                        <small  class="form-text"></small>
                    </div>
                    </tr>
                    </table>

                    <div class="mb-3">
                        <label for="book-description" class="form-label">Book Description</label>
                        <textarea  name="book-description" rows="5" class="form-control" id="book-description" required ><?php echo $editBookData['bookDescription']?></textarea>
                        <small  class="form-text"></small>
                    </div>
                
                <button type="submit" class="btn btn-primary" name="update-book-form">Update</button>
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