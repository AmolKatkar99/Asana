<?php
					

		include "dbc/db_connection.php";			
		$dat = json_decode(file_get_contents("php://input")); 
		$delflag="1";

		
		$qry1 = $dbConnection->prepare("SELECT * FROM tasck WHERE del_flag=? order by assignee ASC");
		$qry1 ->execute(array($delflag));
		
		while($row1 = $qry1->fetch())
		{
			$tid = $row1['tid'];
			$task = $row1['task'];
			$assi = $row1['assignee'];

			$data[] = array("tid"=>$tid,"task"=>$task,"assi"=>$assi);	
			
		}
		
		echo (json_encode($data)); 
		
?>	