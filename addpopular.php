<?php
					

		include "dbc/db_connection.php";
					
		$dat = json_decode(file_get_contents("php://input")); 
		
		$tid = $dat->tid; 
		$popid = $dat->popid; 
	 
		$qry = $dbConnection->prepare("UPDATE tasck SET popular=? WHERE tid=?");
		$qry->execute(array($popid,$tid));

?>		