<?php 
	include 'inc/conn.php';
	session_start();

	if(isset($_SESSION['logged_in'])){		
		header('location:index.php');
	}

		if (isset($_POST['user_email'],$_POST['user_pass'])){
			$username = $_POST['user_email'];
			$password = md5($_POST['user_pass']);
			if (empty($username) or empty($password)) {
				$error = 'All fileds are required !';
			}else{
				$query = $conn->prepare("SELECT * FROM user WHERE email=? AND pass=? ");
				$query->bindValue(1,$username);
				$query->bindValue(2,$password);
				$query->execute();
				$num = $query->rowcount();
				if($num==1){
					$_SESSION['logged_in'] = true;
					$_SESSION['username'] = $_POST['user_email'];
					header ('location:index.php');
					exit;

				}else{
					$error= 'worng pass';
				}
			}
		}
 ?>

<!DOCTYPE html>
<html>
 <head>
 <title>Login</title>
  <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="John Doe">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/main.css">  
</head> 
<body>
	<div class="logincontnet">
		<h2>Login</h2>
		<form action="" method="post">
			<input type="text" name="user_email" placeholder="Email or username" >
			<input type="password" name="user_pass" placeholder="..................">
			<input type="submit" name="logged_in">			
		</form>
		<?php if (isset($error)) {
			echo $error;
		} ?>
	</div>
</body>
</html>

