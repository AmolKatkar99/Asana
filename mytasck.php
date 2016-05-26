<?php
//session_start();
if($_SESSION['cpid']=="")
{
	echo "<script language=\"javascript\">window.location=\"index.php?status=2\";</script>";
}
else
{
	include "dbc/db_connection.php";	
	$userid = $_SESSION['cpid'];

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once ("title.php"); ?>
		<!-- AngularJS core CSS -->
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script src="js/angularjs/mytasck.js"></script>
		<script src="lib/dirPagination.js"></script>

		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
		<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
		

	</head>
	<body class="nav-md" ng-app="preopModule">
		<div class="container body" ng-controller="preopController">
				<?php include_once ("sidebar.php"); ?>
				<?php include_once ("top.php"); ?>
            <div class="right_col">
                <div class="" >
                    <div class="row">
                        <div class="col-md-1 col-sm-1 col-xs-1">
						
						
						</div>
						 <div class="col-md-10 col-sm-10 col-xs-10">
                            <div class="x_panel"  style="height:550px;">
							
						
								 <form id="mytasck" ng-model="mytasck" name="mytasck" novalidate >    
							
								<button type="submit" ng-mousemove="showsect()" ng-mouseleave="hidesect()" class="btn btn-default">Add Tasck</button> 
												
								<button ng-hide="sect" ng-mousemove="showsect()" type="submit"  class="btn btn-default">Add Section</button> 								
									
								
								
								
								
								
								
							
						
										
										
							

								</form>			
                               </div>
                            </div>
							  <div class="col-md-1 col-sm-1 col-xs-1">
						
						
						</div>
							
							
							
                        </div>
                    </div>
                </div>
					<?php include_once ("footer.php"); ?>
           </div>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>
<?php
}
?>
