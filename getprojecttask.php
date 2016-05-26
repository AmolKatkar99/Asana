<?php
					

		include "dbc/db_connection.php";
					
		$dat = json_decode(file_get_contents("php://input")); 
		
		$projid = $dat->projid; 
		
		$qry1 = $dbConnection->prepare("SELECT * FROM  tasck WHERE pid=?");
		$qry1 ->execute(array($projid));

		while($row1 = $qry1->fetch())
		{
			$tid = $row1['tid'];
			$task = $row1['task'];
			$assignee = $row1['assignee'];
			
			
			$data[] = array("tid"=>$tid,"value"=>$task,"assignee"=>$assignee);	
			
		}	
			
			echo (json_encode($data));			
?>