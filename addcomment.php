<?php
					

		include "dbc/db_connection.php";
					
		$dat = json_decode(file_get_contents("php://input")); 
		
		$tid = $dat->tid; 
		$comment = $dat->comment; 
	
		$qry = $dbConnection->prepare("INSERT INTO comment (tid,comment) VALUES (?,?)");
		$qry ->execute(array($tid,$comment));		
		
		
?>