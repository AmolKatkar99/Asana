<?php
					

		include "dbc/db_connection.php";
					
		$dat = json_decode(file_get_contents("php://input")); 
		$tid = $dat->tid; 
		
		$qry = $dbConnection->prepare("SELECT * FROM comment WHERE tid=?");
		$qry ->execute(array($tid));
		$count=0;
		
		if($qry->rowCount() > 0)
		{
			$count=1;
			while($row = $qry->fetch())
			{
				$cid = $row['cid'];
				$comment = $row['comment'];
				
				$data[] = array("comment"=>$comment,"cid"=>$cid);	
				
			}
		}	
		else
		{
			$data[] = array("count"=>$count);	
		}
		echo (json_encode($data));	
		
?>		
		