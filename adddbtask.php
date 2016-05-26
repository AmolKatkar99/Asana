<?php
					

		include "dbc/db_connection.php";
					
		$dat = json_decode(file_get_contents("php://input")); 
		
		$pid = $dat->pid; 
		$task =$dat->task;
		$tdecription=$dat->tdecription;
		$duedate=$dat->duedate;
		
		$to =$dat->sendto;
		
		$ddate =date('Y-m-d',strtotime($duedate));
		
		$subject="Assing Task";
		
		
		$qry = $dbConnection->prepare("INSERT INTO tasck(pid,task,assignee,tdescription,duedate) VALUES (?,?,?,?,?)");	
		$qry->execute(array($pid,$task,$to,$tdecription,$ddate));
		
		
         $subject = " Task Assign for You ";

		$message = "Dear $to,\n $task";			
		$from1 = "asanademo@gmail.com";
		$from = "Asana Demo";

		$headers .= "Return-Path: $from <$from1>\r\n";
		$headers .= "From: $from <$from1>\r\n";
		$headers .= "Organization: $from\r\n";
		$headers .= "Content-Type: text/plain\r\n";
		$headers .= "X-Sender: <$from1>\n";
		$headers .= "X-Mailer: PHP\n"; // mailer
		$headers .= "X-Priority: 1\n"; //1 Urgent Message, 3 Normal
				
		  $retval = mail($to,$subject,$message,$headers);
		
		  if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
		
			
					
?>