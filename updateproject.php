<?php
					

		include "dbc/db_connection.php";
					
		$dat = json_decode(file_get_contents("php://input")); 
		
		$projid = $dat->projid; 
		$pname = $dat->pname; 
		$desc = $dat->desc; 
		
		
		$qry = $dbConnection->prepare("UPDATE project SET pname=?,pdesciption=? WHERE pid=?");
		$qry->execute(array($pname,$desc,$projid));

?>		