<?php



	include "dbc/db_connection.php";

	$data = json_decode(file_get_contents("php://input"));
	
	$dtid = $data->projid;
	$delflag = 0;
	
	
	
	$qry = $dbConnection->prepare("UPDATE project SET delflag=? WHERE pid=?");
	$qry->execute(array($delflag,$dtid));
	
	
	
	
	
	
	
?>