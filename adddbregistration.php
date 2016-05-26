<?php
					

		include "dbc/db_connection.php";
					
		$dat = json_decode(file_get_contents("php://input")); 
		
		$name = $dat->name; 
		$orgname =$dat->orgname;
		$uname=$dat->uname;
		$pass =$dat->pass;
		$del="1";
		$cts = date("Y-m-d");
		
		$qry = $dbConnection->prepare("INSERT INTO registration(name,orgname,user_name,pass,del_flag,cts) VALUES (?,?,?,?,?,?)");	
		$qry->execute(array($name,$orgname,$uname,$pass,$del,$cts));
		
		$qry1 = $dbConnection->prepare("INSERT INTO login_master(name,user_name,woPwdord,del_flag,cts) VALUES (?,?,?,?,?)");	
		$qry1->execute(array($name,$uname,$pass,$del,$cts));
		
		
		
?>