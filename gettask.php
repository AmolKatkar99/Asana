<?php
					

		include "dbc/db_connection.php";			
		$dat = json_decode(file_get_contents("php://input")); 
		
		$projid = $dat->projid; 
		
		$delflag="1";
		
		$qry1 = $dbConnection->prepare("SELECT * FROM tasck WHERE pid=? AND del_flag=?");
		$qry1 ->execute(array($projid,$delflag));
		
		while($row1 = $qry1->fetch())
		{
			$tid = $row1['tid'];
			$task = $row1['task'];

			$data[] = array("tid"=>$tid,"task"=>$task);	
			
		}
		
		echo (json_encode($data));
		
?>		