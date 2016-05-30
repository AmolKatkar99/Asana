<?php



	include "dbc/db_connection.php";
	$dat  = json_decode(file_get_contents("php://input"));
	
	$pstid = $dat->pstid;
	$psubtask = $dat->psubtask;
	
	
	$qry = $dbConnection->prepare("INSERT INTO personalsubtask(ptid,psubtask) VALUES (?,?)");	
	$qry->execute(array($pstid,$psubtask));
	
	
	
?>