<?php


		include "dbc/db_connection.php";			
		$dat = json_decode(file_get_contents("php://input")); 
		
		$dcid = $dat->dcid; 
	
		
		$qry = $dbConnection->prepare("DELETE FROM comment WHERE cid=?");
		$qry ->execute(array($dcid));
		
	
		
?>		