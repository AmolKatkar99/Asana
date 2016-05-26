<?php



	include "dbc/db_connection.php";
	$data = json_decode(file_get_contents("php://input"));
	

	$projname = $data->projname;
	$description = $data->description;
	$usernam = $data->username;
	
	$qry = $dbConnection->prepare("INSERT INTO project(pname,pdesciption,user_name) VALUES (?,?,?)");	
	$qry->execute(array($projname,$description,$usernam));
	

?>