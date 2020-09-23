<?php 
	try{
		$conn = new PDO('mysql:host=localhost;dbname=payra','root', '');
	}catch(PDOException $e){
		exit('database erro.');
	}
 ?>
 
