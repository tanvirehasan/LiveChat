<?php
	session_start();
	if(!isset($_SESSION['logged_in'])){		
		header('location:login.php');}

	include 'inc/conn.php';
	include 'inc/class.php';   
?>

<!DOCTYPE html>
<html>
 <head>
 <title>Payra Messenger</title>
  <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="John Doe">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/main.css">  
</head> 
<body>

	<div class="header">
		<div class="nav">
			<div class="logo">
				<img src="img/logo/logo.png">
				<?php 
				if (isset($_SESSION['username'])) {
					$id = $_SESSION['username'];
					$chatuser = new payra;
					$data = $chatuser->userdata($id);?>
					<h3><?php echo $data ['fname']." ".$data ['lname'].$data ['userid']; ?>
						
					</h3>


				
			</div>
		</div>
	</div>

	<div class="userlist">
		<form action="" method="post">
			<input type="search" name="searchglist">
		</form>

	<?php 
		$alluser = new payra;
		$userdata = $alluser->alluser();
		foreach ($userdata as $alluser ) {?>
		<a href="index.php?user=<?php echo $alluser ['userid']; ?>">
			<div class="profile">						
				<img src="img/profilepic/<?php echo $alluser ['profilepic']; ?>">
				<div class="nametext"><h2><?php echo $alluser ['fname']." ".$alluser ['lname']; ?></h2></div>	
			
			</div>
		</a>
		<?php }  ?>	
				
	</div>

	<div class="messbox">


		<?php if (isset($_GET['user'])) {
			$recevedid = $_GET['user'];
			$sender = $data['userid'];
			$smsll = new payra;
            $smsall = $smsll->smsll($sender,$recevedid);
            foreach ($smsall as $smsll ) { ?>

			<div class="chat">
				<div class="porilepicchat">
					<img src="img/profilepic/<?php echo $smsll ['profilepic'];?>">
				</div>
					<div class="chattext">
						<p><?php echo $smsll ['mass'];?></p>
					</div>
			</div>	

			


		<?php } } ?>

		<div class="chattypebox">
			<form action="" method="post" autocomplete="off">
				<input type="text" name="messege" placeholder="messege">
				<input type="submit" name="smsend" value="send">
			</form>			
		</div>
		







<?php } ?>

	</div>
</body>
</html>