<?php


		include "dbc/db_connection.php";			
		$dat = json_decode(file_get_contents("php://input")); 
		
		$tid = $dat->tid; 
		$delflag="1";
		
		$qry1 = $dbConnection->prepare("SELECT * FROM tasck WHERE tid=? AND del_flag=? order by tid asc");
		$qry1 ->execute(array($tid,$delflag));
		
		while($row1 = $qry1->fetch())
		{
			$tid = $row1['tid'];
			$task = $row1['task'];
			$assignee = $row1['assignee'];
			$tdescription = $row1['tdescription'];
			$duedate = $row1['duedate'];
		
			
			$data[] = array("tid"=>$tid,"task"=>$task,"assignee"=>$assignee,"tdescription"=>$tdescription,"duedate"=>$duedate);	
			
		}
		
		echo (json_encode($data));
		
		
		
		
		
		

?>