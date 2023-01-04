<?php

   

    if(empty($_SESSION['username'])){

        $_SESSION['msg'] = "You Must login to view this page";
        header('location:../login.php');
    }
    

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location:../login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>
        <div>
            <h1>This is Home Page</h1>
             
          
            
            <?php if(isset($_SESSION['success'])) : ?>
                <div>
                    <h3>
                        <?php
                            echo($_SESSION['success']);
                            unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

            <?php if(isset($_SESSION['username'])) : ?>
                <h3>Welcome <b><?php echo($_SESSION['username']); ?></b></h3>

                <button><a href="index.php?logout=1">Logout</a></button>
            <?php endif ?>

        </div>

</body>
</html>