<?php
session_start();
require "db_con.php";
require_once "functions.php";
$user = new admin_class();
if($user->get_admin_session()){
	header('Location: admin-profile.php'); //user gets directed to admin page
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
</head>
<body>
	<?php

		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$username	  = $_POST['username'];
			$password = $_POST['password'];

			if(empty($username) or empty($password)){
				echo "Username and Password Fields must not be empty.</p>";
			}else{
				$login = $user->admin_userlogin($username, $password);
					if($login){
							header('Location: admin-profile.php');
						}else{
							echo "Incorrect username or password</p>";
							}
						}
					}
				?>
			<form action="" method="post">
				<fieldset>
					<legend>Admin Login</legend>

				<p>
				<label for="username" >Username: &emsp; &nbsp;</label>
				<input type="text" name="username" placeholder="Enter your Username"><br><hr>
				</p>

			<p>
				<label for="password">Password: &emsp; &nbsp;</label>
				<input type="Password" name="password" placeholder="Enter Your Password"><br><hr>
			</p>

		
			<input type="Submit" name="login"value="Login"><br><hr>
			<p>
				<a href="index.php">Back to Home Page</a>
			</form>
</body>
</html>
			
		
			