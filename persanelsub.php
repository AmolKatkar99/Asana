<?php


		include "dbc/db_connection.php";			
		$dat = json_decode(file_get_contents("php://input")); 
		
		$pstid = $dat->pstid; 
		

	
		
		$qry1 = $dbConnection->prepare("SELECT * FROM personalsubtask WHERE ptid=? order by pstid desc");
		$qry1 ->execute(array($pstid));
		
		
		
		
			while($row1 = $qry1->fetch())
			{
				$pstid = $row1['pstid'];
				$psubtask = $row1['psubtask'];

			
		
				$data[] = array("pstid"=>$pstid,"psubtask"=>$psubtask);	
			
			}
	
		
		
		echo (json_encode($data));
		
		
		
		
		
		
?>	