<?php



	include "dbc/db_connection.php";
	$data = json_decode(file_get_contents("php://input"));
	

	$projid = $data->projid;
	$member = $data->member;
	
	$date =date('Y-m-d');
		
	$qry = $dbConnection->prepare("INSERT INTO member(pid,mname,cts) VALUES (?,?,?)");	
	$qry->execute(array($projid,$member,$date));
	

?>