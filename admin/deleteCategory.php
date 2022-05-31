<?php
     include('includes/config.php');
    $id = $_GET['del-id'];

    $query = "SELECT * FROM books WHERE bookCategory = '{$id}'";
    $result = mysqli_query($connection,$query) or die("Query failed");
    $no_of_rows = mysqli_num_rows($result);
    var_dump($no_of_rows);

    if($no_of_rows == 0){
        $query = "delete from category where category_id = '{$id}'";
        $result = mysqli_query($connection,$query) or die("Query failed");
        header('location: category.php');
    }
    else{    
?>
    <script>
        alert('You cannot delete this category until you delete all books of this category!')
        var loc = window.location.pathname;
        var origin = window.location.origin
        var dir = loc.substring(0, loc.lastIndexOf('/'));
        window.location.href = origin+dir+'/category.php';

    </script>

<?php }?>