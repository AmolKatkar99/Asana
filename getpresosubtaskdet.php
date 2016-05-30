<?php


		include "dbc/db_connection.php";			
		$dat = json_decode(file_get_contents("php://input")); 
		
		$ptid = $dat->ptid; 
		

		$count=0;
		
		$qry1 = $dbConnection->prepare("SELECT * FROM personalsubtask WHERE ptid=? order by pstid desc");
		$qry1 ->execute(array($ptid));
		
		
		if($qry1->rowCount() > 0)
		{
			$count=1;
			while($row1 = $qry1->fetch())
			{
				$pstid = $row1['pstid'];
				$psubtask = $row1['psubtask'];

			
		
				$data[] = array("pstid"=>$pstid,"psubtask"=>$psubtask);	
			
			}
		}
		else
		{
			$data[] = array("count"=>$count);	
		}
		
		echo (json_encode($data));
		
		
		
		
		
		
?>		