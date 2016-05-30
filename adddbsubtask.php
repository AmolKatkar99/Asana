<?php


		include "dbc/db_connection.php";			
		$dat = json_decode(file_get_contents("php://input")); 
		
		$pid = $dat->pid; 
		$tid =$dat->tid;
		$subtask=$dat->subtask;
		$subsendto=$dat->subsendto;
		
		
		$tdate =date('Y-m-d');
		
		$qry = $dbConnection->prepare("INSERT INTO subtasck(pid,tid,subtask,assignee,cts) VALUES (?,?,?,?,?)");	
		$qry->execute(array($pid,$tid,$subtask,$subsendto,$tdate));
		
		
?>