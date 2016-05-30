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

			<link rel="stylesheet" type="text/css" href="css/style.css">
		
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
		<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
		
		<script>
		$(document).ready(function() {
		$('#dateRangePicker')
        .datepicker({
            format: 'dd/mm/yyyy',
       
        })

		});
		</script>
		
		

	</head>
	<body class="nav-md" ng-app="preopModule">
		<div class="container body" ng-controller="preopController">
				<?php include_once ("sidebar.php"); ?>
				<?php include_once ("top.php"); ?>
            <div class="right_col">
                <div class="" >
                    <div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel"  style="height:100px;">
								<div class="col-md-5 col-sm-5 col-xs-5">
										
								</div>
								<div class="col-md-7 col-sm-7 col-xs-7">
										
										<h4> My Personal Tasks </h4>
										
								</div>	
							
							</div>
						</div>
						
					<div ng-show="hideprid">
			 
							<input type="email" class="form-control" ng-model="username"  name="username">
							<input type="text" class="form-control" ng-model="pstid"  name="pstid">
					
									
					</div>
						
						
						
						
						
					
					
					<div class="col-md-12 col-sm-12 col-xs-12">
					
						<div class="col-md-{{b}} col-sm-{{b}} col-xs-{{b}}">
						
						
						</div>
						<div class="col-md-{{a}} col-sm-{{a}} col-xs-{{a}}">
                            <div class="x_panel"  style="height:550px;">
							
							<button type="submit"  ng-click="addtask()" class="btn btn-default">Add Tasck</button> 
							
							 <form id="mytasck" ng-model="mytasck" name="mytasck" ng-init="getpersonaltasck()" novalidate >    
							
							
												
										<div ng-show="addptask">
											<div class="input-group col-md-12 col-sm-12 col-xs-12">
										
												<input type="text" class="form-control" name="ptask" ng-click="clicke()" ng-keyup="showtask(ptask)" ng-model="ptask" placeholder="Add New Task" >
										
											</div>
											
											<div ng-show="tasckbutton">
											
												
												<button  class="btn btn-default" type="submit" ng-click="addnewpTask(dedate)">Add New Task</button>
													
											</div>
												
											
										</div>
										
										<div ng-repeat="ptas in ptasks">
											<div class="input-group col-md-12 col-sm-12 col-xs-12">
										
												<label class="form-control" ng-click="ptasklist(ptas.ptid)" >{{ptas.task}}</label>	
												
											
											</div>
										</div>	
								
								

							</form>			
                            </div>
                          </div>
						<div class="col-md-{{b}} col-sm-{{b}} col-xs-{{b}}">
						
						
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6" ng-show="dydiveB">
						    <div class="x_panel"  style="height:600px;">
							  <div  style="height:420px;overflow-x:auto;">	
							  <div class="col-md-12 col-sm-12 col-xs-12">
								 <div class="col-md-4 col-sm-4 col-xs-4" style="margin-left:-25px;">
									<div class="input-group">
									<span class="input-group-addon">
													<i class="fa fa-user"></i>
									</span>									
								
										<input type="text" class="form-control" name="username" ng-model="username" placeholder="unassigned" >
									</div>	
													
								 </div>
								 
								 <div class="col-md-4 col-sm-4 col-xs-4" style="margin-left:-10px;">
									<div class="input-group ">
									<div class="input-group input-append date" id="dateRangePicker">
											<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
											<input type="text" ng-model="dedate" class="form-control" name="date" placeholder="due date">
											
									</div>
									</div>
								</div>
								 
								 <div class="col-md-1 col-sm-1 col-xs-1">
								
											<button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-heart"></i></button>
								
								</div>
								
								<div class="col-md-1 col-sm-1 col-xs-1">
								
											<button type="button"  ng-click="subptask()" class="btn btn-info btn-circle"><i class=""></i></button>
										
								</div>
								
								<div class="col-md-1 col-sm-1 col-xs-1">
								
										<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">	
											<button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-paperclip"></i></button>
										</a>	
										<ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
										
												<li><a href="" ng-click="attatch()"> Attach From Computer </a></li>
											
										</ul>
										
											
								</div>
								
								<div class="col-md-1 col-sm-1 col-xs-1">
								
										
										
										<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">			
						
													<button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-option-horizontal"></i></button>
						
										</a>
										<ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
												<li><a href="" ng-click="deletetask(taid)"> Delete Task </a></li>
											
										</ul>
										
									
								</div>
								</div>
								
								<div class="col-md-12 col-sm-12 col-xs-12">	
											<hr style="width: 100%; color: black; height: 1px; background-color:black;"/>
								</div>
								
								<div class="col-md-12 col-sm-12 col-xs-12">
								
									<div class="col-md-12 col-sm-12 col-xs-12">
								
											{{task}}
								
									</div>
								
									<div class="col-md-12 col-sm-12 col-xs-12">
											<h4>	<label class="control-label">DESCRIPTION</label> <h4>
									</div>
								
								
									<div class="col-md-12 col-sm-12 col-xs-12">
									
										<textarea class="form-control" ng-model="taskdescription" rows="2" required></textarea>
									
									</div>
								
								
								</div>
								
								<div class="col-md-12 col-sm-12 col-xs-12">	
											<hr style="width: 100%; color: black; height: 1px; background-color:black;"/>
								</div>
								
								<form id="psubtasckform" ng-model="psubtasckform" name="psubtasckform"> 
								
									<div class="col-md-12 col-sm-12 col-xs-12" style="height:100px;">
								
										<div ng-show="addpsubtask">
											<div class="input-group col-md-12 col-sm-12 col-xs-12">
										
												<input type="text" class="form-control" name="psubtask"   ng-model="psubtask" placeholder="Add New SubTask" >
										
											</div>
											
											<div ng-show="tasubckbutton">
											
												
												<button  class="btn btn-default" type="submit" ng-click="addnewpsubTask()">Add New Task</button>
												
													
											</div>
												
											
										</div>
								
										<div ng-repeat="psubtas in psubtasks">
											<div class="input-group col-md-12 col-sm-12 col-xs-12">
										
												<label class="form-control" ng-click="ptasklist(psubtas.pstid)" >{{psubtas.psubtask}}</label>	
												
											
											</div>
										</div>	
								
								
								
								
								
								
									</div>
								
								</form>
								<div class="col-md-12 col-sm-12 col-xs-12">	
											<hr style="width: 100%; color: black; height: 1px; background-color:black;"/>
								</div>
								
								
								
								
								
								</div>
							</div>	
						</div>
						
						
						
						
						
						
							
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
