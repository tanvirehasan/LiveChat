<?php 
	
	include 'inc/conn.php';

if (isset($_POST['loginsql'])) {

      $fname = $_POST['fname'];  
      $lname = $_POST['lname'];  
      $email = $_POST['username'];   
      $pass = md5($_POST['userpass']);  
      $userimg = $_FILES['file']['name'];
      $userimgtapname = $_FILES['file']['tmp_name'];

      $sql = "INSERT INTO user (fname, lname, email,pass,profilepic)
              VALUES ('$fname', '$lname', '$email','$pass','$userimg')";
        if ($conn->exec($sql)) {
            move_uploaded_file($userimgtapname,'img/profilepic/'.$userimg);
              echo "<div class='alert success'><span class='closebtn'>&times;</span>  
                    <strong>Uploaded!</strong> image Upoaded successfully.</div>" ;            
        }else{ echo "erro"; }     
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
		<form action="" method="post" enctype="multipart/form-data">
			<input type="text" name="fname" placeholder="Frist name">
			<input type="text" name="lname" placeholder="Last name">
			<input type="email" name="username" placeholder="Email" >
			<input type="password" name="userpass" placeholder="password">
			<input type="file" name="file">
			<input type="submit" name="loginsql">			
		</form>
	</div>
</body>
</html>




