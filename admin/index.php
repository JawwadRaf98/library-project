<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="./stlye/login.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    
    <title>Admin | Login</title>

</head>
<body >
    <div class="center-div">
        <div class="header-div">
            <p>admin login</p>
        </div>

        <div class="form">
            <form action="">
                <div class="box">
                <i class="fa fa-envelope"></i>
                    <input type="text" id="username" name='username' placeholder="username" autocomplete="off"/ require>
                </div>
                <div class="box">
                <i class="fa fa-key"></i>
                    <input type="password" id="password" name='password' placeholder="password" require autocomplete="off"/>
                   <span class="eye" onclick="passwordToggle()">
                   <i id = "show" class="far fa-eye" ></i>
                   <i id = "hide" class="far fa-eye-slash" ></i>
                   </span>
                </div>
                <div class="forgot-password">
                    <a href="">Forgot password ??</a>
                </div>
                <div class="submit">
                    <input type="submit" id="submit" />
                </div>
            </form>
        </div>
    </div>

    <script>
       function passwordToggle(){
        var password =  document.getElementById('password');
        var show =  document.getElementById('show');
        var hide =  document.getElementById('hide');
        console.log(show.style)

       if(password.type === 'password'){
            password.type = 'text';
            hide.style.display = 'block';
            show.style.display = 'none';
       }
       else{
            password.type = 'password';
            hide.style.display = 'none';
            show.style.display = 'block';
       }
       }

    </script>
</body>
</html>