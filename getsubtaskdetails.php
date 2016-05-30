<?php


		include "dbc/db_connection.php";			
		$dat = json_decode(file_get_contents("php://input")); 
		
		$tid = $dat->tid; 
		$delflag="1";
		$count=0;
		
		$qry1 = $dbConnection->prepare("SELECT * FROM subtasck WHERE tid=? AND del_flag=? order by subid desc");
		$qry1 ->execute(array($tid,$delflag));
		
		if($qry1->rowCount() > 0)
		{
			$count=1;
			while($row1 = $qry1->fetch())
			{
				$subid = $row1['subid'];
				$subtask = $row1['subtask'];
				$assignee = $row1['assignee'];
			
		
				$data[] = array("subid"=>$subid,"subtask"=>$subtask,"assignee"=>$assignee);	
			
			}
		}
		else
		{
			$data[] = array("count"=>$count);	
		}
		
		echo (json_encode($data));
		
?>		