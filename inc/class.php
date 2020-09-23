<?php

	class payra{

		public function userdata($username){
			global $conn;
			$query = $conn->prepare("SELECT * FROM user WHERE  email=? ");
			$query->bindValue(1, $username);
			$query->execute();
			return $query->fetch();
		}


		public function alluser(){
			global $conn ;
			$query = $conn->prepare("SELECT * FROM 	user ");
			$query-> execute();
			return $query->fetchAll ();
		}	



	public function smsll($sender,$recevedid){
		global $conn;
		$query = $conn->prepare("SELECT * FROM user INNER JOIN chating ON chating.sendid=chating.resciveid WHERE sendid=?");
		$query->bindValue(1, $sender);
		$query->execute();
		return $query->fetchAll();
	}














	}

?>