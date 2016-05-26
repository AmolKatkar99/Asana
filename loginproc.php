<?php
//Created by: ManyaSK---Date: 01-September-2015
error_reporting(0);
session_start();
if($_SESSION['cpid']=="")
{
	include "dbc/db_connection.php";
	if($_SERVER["REQUEST_METHOD"]==="POST")
	{
		if(isset($_GET["ULogin"]))
		{
			//AJAX form submission
			$user = json_decode($_GET["ULogin"]);
			$result = array("receivedusername" => $user->username,"receivedpassword" => $user->password);
			
			$username = $result['receivedusername'];
			$password = $result['receivedpassword'];
			
			$status = "1";	
			$sql = $dbConnection->prepare("SELECT * FROM login_master WHERE user_name=? AND del_flag=?");
			$sql->execute(array($username,$status));
			$row = $sql->fetch();
				  
			$uid = $row['wnid'];
			$user_name = $row['user_name']; 
			$name = $row['name']; 
			$pass = $row['woPwdord'];	
			$salt = $row['sringclave']; 

			$hash = hash('sha256', $password);
			$salted_hash = hash('sha256', $salt . $hash);
			
			if($user_name==$username)
			{
				if($pass == $password)
				{
					$_SESSION['cpid'] = $uid;
					$_SESSION['user_name'] = $user_name;
					$_SESSION['name'] = $name;
					$result= json_encode(array("Success"));
					echo $result;
				}
				else
				{
					$result = "Invalid Password.";
					echo $result;
				}
			}
			else
			{
				$result = "Invalid Username.";
				echo $result;
			}
		}
		else
		{
			$result = "Invalid Request Data.";
			echo $result;
		}
	}
	else
	{
		$result= "Method is not Post.";
		echo $result;
	}
}
else
{
	echo "<script language=\"javascript\">window.location=\"index.php?status=2\";</script>";
}
?>
