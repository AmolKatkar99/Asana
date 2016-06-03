<?php
					

		include "dbc/db_connection.php";			
		$dat = json_decode(file_get_contents("php://input")); 
		
		$projid = $dat->projid; 
		
		$delflag="1";
		$cmpid ="1";
		
		$qry1 = $dbConnection->prepare("SELECT * FROM tasck WHERE pid=? AND comid=? AND del_flag=? order by tid desc");
		$qry1 ->execute(array($projid,$cmpid,$delflag));
		
		while($row1 = $qry1->fetch())
		{
			$tid = $row1['tid'];
			$task = $row1['task'];
			$popular = $row1['popular'];

			$data[] = array("tid"=>$tid,"task"=>$task,"popular"=>$popular);	
			
		}
		
		echo (json_encode($data));
		
?>		