<?php
					

		include "dbc/db_connection.php";
					
		$dat = json_decode(file_get_contents("php://input")); 
		
		$projid = $dat->projid; 
		
		$qry1 = $dbConnection->prepare("SELECT * FROM  project WHERE pid=?");
		$qry1 ->execute(array($projid));

		while($row1 = $qry1->fetch())
		{
			$pid = $row1['pid'];
			$pname = $row1['pname'];
			$description = $row1['pdesciption'];
			
			
			$data[] = array("pid"=>$pid,"projectname"=>$pname,"description"=>$description);	
			
		}	
			
			echo (json_encode($data));			
?>