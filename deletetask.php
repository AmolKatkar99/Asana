<?php


		include "dbc/db_connection.php";			
		$dat = json_decode(file_get_contents("php://input")); 
		
		$dtid = $dat->dtid; 
	
		
		$qry = $dbConnection->prepare("DELETE FROM tasck WHERE tid=?");
		$qry ->execute(array($dtid));
		
		$qry1 = $dbConnection->prepare("DELETE FROM subtasck WHERE tid=?");
		$qry1 ->execute(array($dtid));
		
		$qry2 = $dbConnection->prepare("DELETE FROM comment WHERE tid=?");
		$qry2 ->execute(array($dtid));
		
		
		
?>		