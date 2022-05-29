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

    // var_dump($_FILES , $_POST);
    if(isset($_POST['update-book-form'])){

        $category_name = "";
        if(!empty($_POST['book-category'])){
            $id = $_POST['book-category'] ;
            $query = "select category_name from category where category_id  = '$id'";
            $result = mysqli_query($connection,$query) or die(mysqli_error($connection));
            $date = mysqli_fetch_assoc($result);
            $category_name = $data['category_name'];
        }
      
        $book_name = empty($_POST['book-name']) ? "" : $_POST['book-name'];
        $book_author = empty($_POST['book-author']) ? "" : $_POST['book-author'] ;
        $book_category = empty($_POST['book-author']) ? "" : $_POST['book-author'];
        
        $book_file =$_FILES['book-file']['size']  > 0 ? $_FILES['book-file']['name'] :  $_POST['old_file'];
        $book_image =$_FILES['book-image']['size']  > 0 ? $_FILES['book-image']['name'] :  $_POST['old_image'];

        $book_description =$_POST['book-description'];
        $book_DOU = date('d-m-y');
       
        $query = "update books set bookName = '$book_name' ,bookAuthor = '$book_author' , bookCategory = '$book_category' , bookDOU = '$book_DOU', bookDescription ='$book_description', bookFile ='$book_file' ,bookImage ='$book_image'  where bookId = $id"  ;
        
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
                <div class="update-book-form">
                <?php if($book_status)
                    echo "<div class='alert alert-success' role='alert'>"
                   .$book_message.
                  "</div>";
                ?>
                <h3>Edit Book</h3>
                <form enctype="multipart/form-data" method="POST" id="add-book">
                    <input type="hidden" name="book-id" id="book-id">
                    <div class="mb-3">
                        <label for="bookName" class="form-label">Book Name</label>
                        <input type="text" name="book-name" value="<?php echo $editBookData['bookName'] ?>" class="form-control" id="bookName" >
                        <small  class="form-text"></small>
                    </div>

                    <div class="mb-3">
                        <label for="bookAuthor" class="form-label">Book Author</label>
                        <input type="text" name="book-author" value="<?php echo $editBookData['bookAuthor'] ?>" class="form-control" id="bookAuthor" >
                        <small  class="form-text"></small>
                    </div>
                    <div class="mb-3">
                        <label for="book-description" class="form-label">Book Description</label>
                        <textarea name="book-description" rows="5" class="form-control" id="book-description"  >
                        <?php echo $editBookData['bookName'] ?>

                        </textarea>
                        <small  class="form-text"></small>
                    </div>
                    <table>
                        <tr class=" mb-3">
                    <div class="mb-3">
                     <td class="col-4 "><label class="book-category" class="form-label">Book Category</label></td>
                        <td><select id="book-category" class="form-control"  name="book-category" form="add-book" >
                            <option value="">Select</option>
                            <?php 
                                foreach($categories as $category){

                                    $select = $category[1] == $editBookData['bookCategory'] ? 'selected' : '' ;
                                    echo "<option value='$category[0]' ". $select ."  >$category[1]</option>";
                                }
                            ?>
                        </select>
                        </td>
                        
                    </div>
                    </tr>
                    
                    <!-- Book File -->
                    <?php if(!empty($editBookData['bookFile'])) { ?>
                        <tr class=" mt-3">
                            <td class="col-4" ><label for="old_file" class="form-label">Old File</label></td>
                            <td>
                                <input type="hidden" name="old_file" value="<?php echo $editBookData['bookFile']?>" class="form-control" id="old_file" >
                                <iframe id="iframepdf" width="500px" height="300px" src="<?php echo 'uploads/books/'.$editBookData['bookFile'] ?>"></iframe>
                                <!-- <img src="<?php echo 'uploads/images/'.$editBookData['bookImage'] ?>" width="150px" alt=""> -->
                            </td>
                        </tr>
                    <?php } ?>
                    
                    <tr class=" mb-3">
                        <div class="mb-3">
                            <td class="col-4" ><label for="book-file" class="form-label">Book File</label></td>
                            <td>
                                <input type="file" class="file" name="book-file" class="form-control" id="book-file" >
                            </td>
                    </div>
                    </tr>
                    

                    <!-- Book Image -->
                    <?php if(!empty($editBookData['bookImage'])) { ?>
                        <tr class=" mt-3">
                            <td class="col-4" ><label for="old_image" class="form-label">Old Image</label></td>
                            <td>
                                <input type="hidden" name="old_image" value="<?php echo $editBookData['bookImage']?>" class="form-control" id="old_image" >
                                <img src="<?php echo 'uploads/images/'.$editBookData['bookImage'] ?>" width="150px" alt="">
                            </td>
                        </tr>
                    <?php } ?>

                    <tr class=" mb-3">
                    <div class="mb-3">
                        <td class="col-4 mb-3" ><label for="book-image" class="form-label">Book Image</label></td>
                        <td><input type="file" class="file" name="book-image" class="form-control" id="book-image" ></td>
                        <small  class="form-text"></small>
                    </div>
                    </tr>

                    </table>

                   
                
                <button type="submit" class="btn btn-primary" name="update-book-form">Submit</button>
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