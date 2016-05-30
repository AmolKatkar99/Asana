<?php



	include "dbc/db_connection.php";
	$dat  = json_decode(file_get_contents("php://input"));
	
	$ptid = $dat->ptid;

		$qry = $dbConnection->prepare("SELECT * FROM personaltask WHERE ptid=?");
		$qry ->execute(array($ptid));
		while($row = $qry->fetch())
		{
				
				$username = $row['username'];
				$descrition = $row['descrition'];
				$duedate = $row['duedate'];
				$task = $row['task'];
				
				$data[] = array("username"=>$username,"descrition"=>$descrition,"duedate"=>$duedate,"task"=>$task);	
				
		}
	
	echo (json_encode($data));	
	
	
	
	
?>