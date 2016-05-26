<?php
//Created by: ManyaSK---Date: 20-August-2015
session_start();
if($_SESSION['cpid']=="")
{
	echo "<script language=\"javascript\">window.location=\"index.php?status=2\";</script>";
}
else
{
	include "dbc/db_connection.php";	
	$cpid = $_SESSION['cpid'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once ("mytasck.php"); ?>
	
	</head>
	<body class="nav-md">

	</body>
</html>
<?php
}
?>
