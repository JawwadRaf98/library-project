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
    $errors= array();
    $msg= array();
    $book_message = "";

    if(isset($_POST['add-book-form']) && !empty($_POST) ){
        // var_dump($_POST, $_FILES);

        $book_id =$_POST['book-category'];
        $query = "select category_name from category where category_id = {$book_id}";
        $result = mysqli_query($connection,$query) or die("Query Failed");;
        $data = mysqli_fetch_all($result);


        $book_name =$_POST['book-name'];
        $book_author =$_POST['book-author'];
        $book_file = $_FILES['book-file']['name'];
        $bookImage = $_FILES['book-image']['name'];
        // var_dump($book_file);
        $book_category =$data[0][0];
        $book_description =$_POST['book-description'];
        $book_DOU = date('d-m-y');

        if($_FILES['book-file']['size'] > 0){
            $file_name = $_FILES['book-file']['name'];
            $file_size =$_FILES['book-file']['size'];
            $file_tmp =$_FILES['book-file']['tmp_name'];
            $file_type=$_FILES['book-file']['type'];
            $file_ext=explode('.',$_FILES['book-file']['name']);
            // var_dump($file_ext);
            $extensions= array("pdf","doc");

            if(in_array(strtolower($file_ext[1]),$extensions)=== false){
                $err="extension not allowed, please choose a file in pdf or doc file.";
                array_push($errors, $err);
             }
            
             if(empty($errors)==true){
                move_uploaded_file($file_tmp,"uploads/books/".$file_name);
             }
        }

        if($_FILES['book-image']['size'] > 0){
            $file_name = $_FILES['book-image']['name'];
            $file_size =$_FILES['book-image']['size'];
            $file_tmp =$_FILES['book-image']['tmp_name'];
            $file_type=$_FILES['book-image']['type'];
            $file_ext=explode('.',$_FILES['book-image']['name']);
            // var_dump($file_ext);
            $extensions= array("jpeg","jpg", "png");

            if(in_array(strtolower($file_ext[1]),$extensions)=== false){
                $err="extension not allowed, please choose a file in pdf or doc file.";
                array_push($errors, $err);

             }
            
             if(empty($errors)==true){
                move_uploaded_file($file_tmp,"uploads/images/".$file_name);
             }
        }

        if(count($errors) == 0){
            $query = "INSERT INTO books(bookName,bookAuthor, bookCategory, bookDOU,bookDescription,bookFile, bookImage)
            VALUES ('$book_name','$book_author','$book_category','$book_DOU','$book_description','$book_file', '$bookImage')";
        // echo $query;
            $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        // echo $book_DOU." ".$book_author." ".$book_name." cat=> ".$book_category." ".$book_image." ".$book_file." ".$book_description;
            if($result){
                $err= "Book added successfully";
                array_push($errors, $err);

            }
            else{
                $err = "Book added failed";
                array_push($errors, $err);

            }
        }else{
            $err = "Book added failed";
            array_push($errors, $err);

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
                <?php if(count($errors) > 0){

                    foreach($errors as $error){
                    echo "<div class='alert alert-success' role='alert'>"
                   .$error.
                  "</div>";
                }
            }
                ?>
                <h3>Add Book</h3>
                <form enctype="multipart/form-data" method="POST" id="add-book">
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
                    <div class="mb-3">
                        <label for="book-description" class="form-label">Book Description</label>
                        <textarea name="book-description" rows="5" class="form-control" id="book-description" required ></textarea>
                        <small  class="form-text"></small>
                    </div>
                    <table>
                        <tr class=" mb-3">
                    <div class="mb-3">
                     <td class="col-4 "><label class="book-category" class="form-label">Book Category</label></td>
                        <td><select id="book-category" class="form-control"  name="book-category" form="add-book" required>
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
                    
                    <tr class=" mb-3">
                    <div class="mb-3">
                        <td class="col-4" ><label for="book-file" class="form-label">Book File</label></td>
                        <td>
                            <input type="file" class="file" name="book-file" class="form-control" id="book-file" required></td>
                            
                            

                        <small  class="form-text"></small>
                    </div>
                    </tr>

                    <tr class=" mb-3">
                    <div class="mb-3">
                        <td class="col-4 mb-3" ><label for="book-image" class="form-label">Book Image</label></td>
                        <td><input type="file" class="file" name="book-image" class="form-control" id="book-image" required></td>
                        <small  class="form-text"></small>
                    </div>
                    </tr>

                    </table>

                   
                
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