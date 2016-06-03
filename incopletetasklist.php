<?php
					

		include "dbc/db_connection.php";
					
		$dat = json_decode(file_get_contents("php://input")); 
		
		$comid="1";
	
		$qry1 = $dbConnection->prepare("SELECT * FROM tasck WHERE comid=?");
		$qry1 ->execute(array($comid));
		while($row1 = $qry1->fetch())
		{
			$tid = $row1['tid'];
			$task = $row1['task'];
			$popular = $row1['popular'];

			$data[] = array("tid"=>$tid,"task"=>$task,"popular"=>$popular);	
			
		}
		
		echo (json_encode($data));
	
?>	