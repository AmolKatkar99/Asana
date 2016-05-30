<?php



	include "dbc/db_connection.php";
	$dat  = json_decode(file_get_contents("php://input"));
	
	$delflag=1;
	
		$qry = $dbConnection->prepare("SELECT * FROM personaltask WHERE delflag=? order by ptid desc");
		$qry ->execute(array($delflag));
		
		while($row = $qry->fetch())
		{
				$ptid = $row['ptid'];
				$task = $row['task'];
		
				
				$data[] = array("ptid"=>$ptid,"task"=>$task);	
				
		}
	
		echo (json_encode($data));	
	
?>	