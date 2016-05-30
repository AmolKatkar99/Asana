<?php
					

		include "dbc/db_connection.php";
					
		$dat = json_decode(file_get_contents("php://input")); 
		$projid = $dat->projid; 
		$delflag="1";
		
		
		$qry = $dbConnection->prepare("SELECT * FROM project WHERE pid=? AND delflag=?");
		$qry ->execute(array($projid,$delflag));
		
		while($row1 = $qry->fetch())
		{
			$pid = $row1['pid'];
			$pname = $row1['pname'];
			$description = $row1['pdesciption'];
			
			
			$data[] = array("pid"=>$pid,"projectname"=>$pname,"description"=>$description);	
			
		}
		
		
		
		echo (json_encode($data));		
		
		
		
?>