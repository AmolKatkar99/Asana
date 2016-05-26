<?php
					

		include "dbc/db_connection.php";
					
		$qry = $dbConnection->prepare("SELECT * FROM  login_master");
		$qry ->execute(array());
		$row =$qry->fetch();
		$username = $row['user_name'];
		
		$qry1 = $dbConnection->prepare("SELECT * FROM  project WHERE user_name=?");
		$qry1 ->execute(array($username));

		while($row1 = $qry1->fetch())
		{
			$pid = $row1['pid'];
			$pname = $row1['pname'];
			
			$data[] = array("pid"=>$pid,"projectname"=>$pname);	
			
		}	
			
			echo (json_encode($data));			
?>