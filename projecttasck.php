<?php
session_start();
if($_SESSION['cpid']=="")
{
	echo "<script language=\"javascript\">window.location=\"index.php?status=2\";</script>";
}
else
{
	include "dbc/db_connection.php";	
	$userid = $_SESSION['cpid'];
	
	$pidd= $_GET['pid'];
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once ("title.php"); ?>
		<!-- AngularJS core CSS -->
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script src="js/angularjs/projecttasck.js"></script>
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
									 <div class="col-md-5 col-sm-5 col-xs-5">
										
										<h4>	<input type="text"  ng-model="projheading" style="border: none" ></h4>
										
									 </div>	
									  <div class="col-md-2 col-sm-2 col-xs-2">
										
									 </div>	
									 
									 
									 
							  </div>	
						</div>
				</div>		
				
                    <div class="row">
                     
						 <div class="col-md-{{a}} col-sm-{{a}} col-xs-{{a}}">
                            <div class="x_panel"  style="height:600px;">
							
						
								   
							
								<button type="submit"  ng-click="addtasck()" class="btn btn-default">Add Tasck</button> 
												
								<button ng-hide="sect" ng-mousemove="showsect()" type="submit"  class="btn btn-default">Add Section</button> 								
									
								
								<div ng-hide="hideprid">
									<input type="text" id="vprojectid"  value='<?php echo $pidd ?>'/> 	
									<input type="text"  ng-model="projid" > 
									<input type="email" class="form-control" ng-model="username"  name="username" >
									<input type="email" class="form-control" ng-model="sendto"  name="sendto" >
									<input type="email" class="form-control" ng-model="subsendto"  name="subsendto" >
									
								</div>
								
							 <form id="mytasck" ng-model="mytasck" name="mytasck" ng-init="getprojtasck()" novalidate> 
								
								
								
								
								
									<div class="form-actions">
										<div  ng-repeat="taskInput in inputs">
										
							
											<div class="input-group col-md-12 col-sm-12 col-xs-12">
											 
															<input type="text" class="form-control" ng-click="clicke()" ng-keyup="showtask(taskInput.value)" name="taskkk" ng-model="taskInput.value" placeholder="Add New Task" >
															  <span class="input-group-addon">
															  
																		<a href="" data-toggle="modal" data-target="#assigneeModal" ><i class="fa fa-user"></i>  </a>
					
															  </span>
														
											</div>
											
											
											
											
										
											
									
											<div  class="input-group-btn">
											
													
											</div>	
												
											<div ng-show="tasckbutton">
											
												<button  class="btn btn-default" type="submit" ng-click="addnewTask(taskInput.value,dedate)"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Task</button>
												
													
											</div>
												
											
										</div>
										
										
										<div ng-repeat="tas in tasks">
											<div class="input-group col-md-12 col-sm-12 col-xs-12">
											
											
														<lable class="form-control">{{tas.task}}</label>
											 
												
											</div>
										</div>	
										
									</div>
								
								</form>		
								
								
										
                               </div>
                            </div>
						 <div class="col-md-3 col-sm-3 col-xs-3" ng-show="dydiveA" >
						    <div class="x_panel" style="height:150px;" >
								 <div class="col-md-12 col-sm-12 col-xs-12">
										<label class="control-label">DESCRIPTION</label>
								</div>	
								 <div class="col-md-12 col-sm-12 col-xs-12">
										
										<input type="text"  ng-model="decription" style="border: none" > 
										
								</div>
						 
						 
						
							</div>
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
								
										<input type="text" class="form-control" name="comment" ng-model="sendto" placeholder="unassigned" >
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
								
											<button type="button"  ng-click="subtask()" class="btn btn-info btn-circle"><i class=""></i></button>
										
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								
											<button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-paperclip"></i></button>
											
											
								</div>
								
								<div class="col-md-1 col-sm-1 col-xs-1">
								
										<button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-option-horizontal"></i></button>
												
											
								</div>
								
							</div>
							
							<div class="col-md-12 col-sm-12 col-xs-12">
								
								<hr style="width: 100%; color: black; height: 1px; background-color:black;" />
								
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
								
								<hr style="width: 100%; color: black; height: 1px; background-color:black;" />
								
							</div>
							
							<div class="col-md-12 col-sm-12 col-xs-12" style="height:100px;">
							
								<div  ng-repeat="substak in subinput">
									<div class="input-group col-md-12 col-sm-12 col-xs-12">
											 
										<input type="text" class="form-control" ng-click="clicke()"  name="stask" ng-model="substak.value" placeholder="Add Sub Task" >
										  <span class="input-group-addon">
								
														<a href="" data-toggle="modal" data-target="#subassigneeModal" ><i class="fa fa-user"></i>  </a>
									
										  </span>
																				
									</div>
								</div>	
									<div ng-show="subtasckbutton">
											
												<button  class="btn btn-default" type="submit" ng-click="addnewsubTask(substak.value)"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Task</button>
												
													
											</div>

									</div>
							
							<div class="col-md-12 col-sm-12 col-xs-12">
								
								<hr style="width: 100%; color: black; height: 1px; background-color:black;" />
								
							</div>
						
							
						</div>
						
						<!--Mian-->
						<div>
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								
								  <textarea class="form-control" rows="2" placeholder="Weite A Comment"></textarea>
								
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-9 col-sm-9 col-xs-9">
							
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2" style="padding-right:30px;">
							
										<button type="button" class="btn btn-info">Comment</button>
									
							
							</div>
						
						
						</div>
						
						
					</div>
				</div>	
						
					
					
					
					
              </div>		
								
						
							
							
							
							
							
							<!-- task assign-->
				 <form id="assigneetask" ng-model="assigneetask" name="assigneetask" novalidate > 
							
				<div class="modal fade" id="assigneeModal" role="dialog">
					<div class="modal-dialog">
    
					<!-- Modal content-->
					<div class="modal-content">
							<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><b> ASSIGN TASK </b></h4>
							</div>
							<div class="modal-body" style="height:200px">
							
							
							
								<div class="form-group">
									<div class="col-sm-3" >
										<label class="control-label" >ASSIGNEE NAME</label>			
									</div>	
									<div class="col-sm-9" >
										<input type="email" class="form-control" ng-model="assignee"  name="assignee" required>
										
										<div class="error" ng-show="assigneetask.assignee.$dirty && assigneetask.assignee.$invalid">
																											
														<small class="error" style="color:red" ng-show="assigneetask.assignee.$error.required">Assignee Name Is Required</small>
														<small class="error" style="color:red" ng-show="assigneetask.assignee.$error.email">Not Valid Email!</small>
																	
										</div>
									</div>
																					
								</div>	
						
						
						
								<div class="form-group">
								
									<div class="col-sm-12" >
									
									</div>	
									
								
																			
								</div>
								
								
								
								
									<div style=" padding-left:270px;">
									
											<button type="submit" class="btn btn-primary" ng-click="assigneefun(assignee)" data-dismiss="modal" ng-disabled="assigneetask.$invalid">INVITE</button> 
									
									
									</div>
								
																			
								
								
								
								
								
								<div class="form-group">
								
									<div class="col-sm-6" >
									
									</div>	
									<div class="col-sm-6" >
									
											<label class="control-label" >OR</label>	
									</div>
								
																			
								</div>	
							
								
								<div class="form-group">
								
									<div class="col-sm-5" >
									
									
									
									
									</div>	
									<div class="col-sm-6" >
									
											<button type="submit" class="btn btn-primary" ng-click="assigneefun(username)" data-dismiss="modal" >ASSIGN TO ME</button> 
		
									</div>
								
																			
								</div>	
								
							
							
									
								
							
							</div>
						
					</div>
      
				</div>
			</div>
				
			</form>
							<!--End Task Assign-->
							
							<!--sub task assign-->
			 <form id="subassigneetask" ng-model="subassigneetask" name="subassigneetask" novalidate > 
							
				<div class="modal fade" id="subassigneeModal" role="dialog">
					<div class="modal-dialog">
    
					<!-- Modal content-->
					<div class="modal-content">
							<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><b> ASSIGN sub TASK </b></h4>
							</div>
							<div class="modal-body" style="height:200px">
							
							
							
								<div class="form-group">
									<div class="col-sm-3" >
										<label class="control-label" >ASSIGNEE NAME</label>			
									</div>	
									<div class="col-sm-9" >
										<input type="email" class="form-control" ng-model="subassignee"  name="assignee" required>
										
										<div class="error" ng-show="subassigneetask.subassignee.$dirty && subassigneetask.subassignee.$invalid">
																											
														<small class="error" style="color:red" ng-show="subassigneetask.subassignee.$error.required">Assignee Name Is Required</small>
														<small class="error" style="color:red" ng-show="subassigneetask.subassignee.$error.email">Not Valid Email!</small>
																	
										</div>
									</div>
																					
								</div>	
						
						
						
								<div class="form-group">
								
									<div class="col-sm-12" >
									
									</div>	
									
								
																			
								</div>
								
								
								
								
									<div style=" padding-left:270px;">
									
											<button type="submit" class="btn btn-primary" ng-click="subassigneefun(subassignee)" data-dismiss="modal" ng-disabled="subassigneetask.$invalid">INVITE</button> 
									
									
									</div>
								
																			
								
								
								
								
								
								<div class="form-group">
								
									<div class="col-sm-6" >
									
									</div>	
									<div class="col-sm-6" >
									
											<label class="control-label" >OR</label>	
									</div>
								
																			
								</div>	
							
								
								<div class="form-group">
								
									<div class="col-sm-5" >
									
									
									
									
									</div>	
									<div class="col-sm-6" >
									
											<button type="submit" class="btn btn-primary" ng-click="subassigneefun(username)" data-dismiss="modal" >ASSIGN TO ME</button> 
		
									</div>
								
																			
								</div>	
								
							
							
									
								
							
							</div>
						
					</div>
      
				</div>
			</div>
				
			</form>			
							
							
							
							
							
						
							<!--End TAsk-->
				
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
