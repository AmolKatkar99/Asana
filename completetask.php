<?php
					

		include "dbc/db_connection.php";
					
		$dat = json_decode(file_get_contents("php://input")); 
		
		$taskid = $dat->taskid; 
		$cmpid =0;
		
		
		$qry = $dbConnection->prepare("UPDATE tasck SET comid=? WHERE tid=?");
		$qry->execute(array($cmpid,$taskid));

?>		