
<?php
    include('includes/config.php');
    $id = $_GET['id'];


    $query = "select * from books where bookId  = '{$id}'";
    $result = mysqli_query($connection,$query) or die(mysqli_error($connection));
    $editBookData = mysqli_fetch_assoc($result);

    print_r($editBookData);

?>