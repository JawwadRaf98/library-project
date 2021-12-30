<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Library Login</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="./style/login.css">
</head>
<body>

<!-- partial:index.partial.html -->
<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1> E-Library</h1> 
		<p>A library is a collection of sources of information 
			and similar resources, made accessible to a defined community for reference or borrowing.
			Libraries are the places where you can expect smart and clear answers to even most difficult questions.
		</p>
		
		</div>
	</div>
	
	
	<div class="right">
		<h5>Login</h5>
		<p>Don't have an account? <a href="registration.php">Creat Your Account</a> it takes less than a minute</p>
		<form action="./backend/userAuth.php" method="POST">
        <div class="inputs">
			<input type="email" placeholder="Email" name='email' required >
			<br>
			<input type="password" placeholder="Password" name='password' require>
		</div>
			
			<br><br>
			
		<div class="remember-me--forget-password">
	<label>
		<input type="checkbox" name="item" checked/>
		<span class="text-checkbox">Remember me</span>
	</label>
			<p>forget password?</p>
		</div>
			
			<br>
		<button type="submit"  name="login-user">Login</button>
	</div>
</form>
	
</div>
  
</body>
</html>
