<?php



	include "dbc/db_connection.php";
	$data = json_decode(file_get_contents("php://input"));
	
	$task = $data->task;
	$uname = $data->uname;
	$ddate = $data->ddate;
	$desc = $data->desc;
	
	$due = str_replace('/', '-', $ddate);
	$duedate = date('Y-m-d',strtotime($due));
	$cts=date('Y-m-d');
	
	
	$qry = $dbConnection->prepare("INSERT INTO personaltask(username,task,descrition,duedate,cts) VALUES (?,?,?,?,?)");	
	$qry->execute(array($uname,$task,$desc,$duedate,$cts));
	
	
?>	
	