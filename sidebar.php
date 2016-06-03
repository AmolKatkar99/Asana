

	
<div class="main_container" ng-app="preopModule">
	<div class="col-md-3 left_col" ng-controller="preopController">
		<div class="left_col scroll-view">
			<div class="navbar nav_title" style="border: 0;">
				<a href="index.php" class="site_title"><span>asana</span></a>
			</div>
			<div class="clearfix"></div>
			
			<!-- sidebar menu -->
			<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
				<div class="menu_section">
					<ul class="nav side-menu">
						<li><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li>
						<li><a href="" data-toggle="modal" data-target="#myModal" ><i class="fa fa-home"></i>Project  <i class="glyphicon glyphicon-plus-sign"></i></a></li>
					
	
					
					
					<?php
					
						
							$delflag =1;
							$username = $_SESSION['user_name'];
							$qry1 = $dbConnection->prepare("SELECT * FROM  project WHERE user_name=? AND delflag=?");
							$qry1 ->execute(array($username,$delflag));
						
							
							while($row1 = $qry1->fetch())
							{
									$pid = $row1['pid'];
									$pname = $row1['pname'];
							
							
			
					?>
			
							<li><a href="projecttasck.php?pid=<?php echo $pid;?>"  ><i class=""></i> <?php  echo $pname  ?> <span ></span></a></li>						
					<?php				
							
							
							
						
							}
					?>
					
					
					
					
				<div id="divId">
				 	<input type="text" id="vname"  value='<?php echo $username?>'/> 	
						<input type="text"  ng-model="username" > 
				</div>
				 
				<script type="text/javascript">document.getElementById('divId').style.display = 'none';</script>
				
				
				 
					</ul>
				</div>
			</div>
			<!-- sidebar menu -->
			<!--Add project-->
		<form class="form-horizontal form-label-left" id="project" ng-model="project"  name="project" novalidate>	
			  <div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
    
					<!-- Modal content-->
					<div class="modal-content">
							<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><b> New Project </b></h4>
							</div>
							<div class="modal-body">
							
							
							
							
								<div class="form-group">
									<div class="col-sm-3" >
										<label class="control-label" >PROJECT NAME</label>			
									</div>	
									<div class="col-sm-9" >
										<input type="text" class="form-control" ng-model="projname"  name="projname" required>
										
										<div class="error" ng-show="project.projname.$dirty && project.projname.$invalid">
																											
														<small class="error" style="color:red" ng-show="project.projname.$error.required">Project Name Is Required</small>
																	
										</div>
									</div>
																					
								</div>	
							
								<div class="form-group">
									<div class="col-sm-3" >
										<label class="control-label" >DESCRIPTION</label>			
									</div>	
									<div class="col-sm-9" >
									
										
										 <textarea class = "form-control" rows = "3" ng-model="description" name="description" required></textarea>
										 
										 <div class="error" ng-show="project.description.$dirty && project.description.$invalid">
																											
														<small class="error" style="color:red" ng-show="project.description.$error.required">Description Is Required</small>
																	
										</div>
										
									</div>
																					
								</div>	
									
								<div class="form-group">
									<div class="col-sm-9" >
										
									</div>	
									<div class="col-sm-3" >
									
										<button type="submit" class="btn btn-primary" ng-click="addproject(projname,description)" data-dismiss="modal" ng-disabled="project.$invalid">Create Project</button> 
									
									</div>
																					
								</div>	
							
							</div>
						
					</div>
      
				</div>
			</div>
		</form>
		 <!--End Add Project-->	
		 
		 <!--Top Personal Task-->
			<form class="form-horizontal form-label-left" id="mytaskshot" ng-model="mytaskshot"  name="mytaskshot" novalidate>	
			  <div class="modal fade" id="myTaskShotcut" role="dialog">
					<div class="modal-dialog">
    
			
					<div class="modal-content">
							<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><b> New Task </b></h4>
							</div>
							<div class="modal-body">
							
							
							
							<div class="form-group">
									<div class="col-sm-3" >
										<label class="control-label" >FOR</label>			
									</div>	
									<div class="col-sm-9" >
										<input type="text" class="form-control" ng-model="username"  name="username">
										
										
									</div>
																					
								</div>	
							
							
								<div class="form-group">
									<div class="col-sm-3" >
										<label class="control-label" >TASK NAME</label>			
									</div>	
									<div class="col-sm-9" >
										<input type="text" class="form-control" ng-model="ptask1"  name="ptask" required>
										
										<div class="error" ng-show="mytaskshot.ptask.$dirty && mytaskshot.ptask.$invalid">
																											
														<small class="error" style="color:red" ng-show="mytaskshot.ptask.$error.required">Task Name Is Required</small>
																	
										</div>
									</div>
																					
								</div>	
							
								<div class="form-group">
									<div class="col-sm-3" >
										<label class="control-label" >DESCRIPTION</label>			
									</div>	
									<div class="col-sm-9" >
									
										
										 <textarea class = "form-control" rows = "3" ng-model="taskdescription1" name="taskdescription" required></textarea>
										 
										 <div class="error" ng-show="mytaskshot.taskdescription.$dirty && mytaskshot.taskdescription.$invalid">
																											
														<small class="error" style="color:red" ng-show="mytaskshot.taskdescription.$error.required">Description Is Required</small>
																	
										</div>
										
									</div>
																					
								</div>	
								
								<div class="form-group">
									<div class="col-sm-3" >
										<label class="control-label" >DUE DATE</label>			
									</div>	
									<div class="col-sm-9" >
									
										<div class="input-group input-append date" id="dateRangePicker1">
											<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
											<input type="text" ng-model="dedate1" class="form-control" name="dedate" placeholder="due date" required>
											
										</div>
										
										 <div class="error" ng-show="mytaskshot.dedate.$dirty && mytaskshot.dedate.$invalid">
																											
														<small class="error" style="color:red" ng-show="mytaskshot.dedate.$error.required">Due Date Is Required</small>
																	
										</div>
										
									</div>
																					
								</div>
								
							
								<div class="form-group">
									<div class="col-sm-9" >
										
									</div>	
									<div class="col-sm-3" >
									
										<button type="submit" class="btn btn-primary" ng-click="addnewshotpTask(dedate1)" data-dismiss="modal" ng-disabled="mytaskshot.$invalid">Create Project</button> 
									
									</div>
																					
								</div>	
							
							</div>
						
					</div>
      
				</div>
			</div>
		</form>	
		
				
			<script>
		$(document).ready(function() {
		$('#dateRangePicker1')
        .datepicker({
            format: 'dd/mm/yyyy',
       
        })

		});
		</script>
	
		 <!--End Personal Task--> 
		 
		 <!-- Add conversation-->
		 
		<form class="form-horizontal form-label-left" id="myconv" ng-model="myconv"  name="myconv" novalidate>	
			  <div class="modal fade" id="myconversation" role="dialog">
					<div class="modal-dialog">
    
			
					<div class="modal-content">
							<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><b> New conversation </b></h4>
							</div>
							<div class="modal-body">
							
							
							
							<div class="form-group">
									<div class="col-sm-12" >
										<label class="control-label" >TO</label>			
									</div>	
									<div class="col-sm-12" >
										<input type="text" class="form-control" ng-model="toconv"  name="toconv" placeholder="Any Team Or Project" required>
										<div class="error" ng-show="myconv.toconv.$dirty && myconv.toconv.$invalid">
																											
													<small class="error" style="color:red" ng-show="myconv.toconv.$error.required">To Is Required</small>
																	
										</div>
										
										
									</div>
																					
							</div>	
							
								
							<div class="form-group">
								
									<div class="col-sm-12" >
										<input type="text" class="form-control" ng-model="subject"  name="subject" placeholder="Subject" required>
										<div class="error" ng-show="myconv.subject.$dirty && myconv.subject.$invalid">
																											
														<small class="error" style="color:red" ng-show="myconv.subject.$error.required">Subject Is Required</small>
																	
										</div>
										
										
									</div>
																					
							</div>
							
							
							
							
							
								<div class="form-group">
									
									<div class="col-sm-12" >
									
										
										 <textarea class = "form-control" rows ="3" ng-model="conversation" name="conversation"   placeholder="Start A Conversation" required></textarea>
										 
										 <div class="error" ng-show="myconv.conversation.$dirty && myconv.conversation.$invalid">
																											
														<small class="error" style="color:red" ng-show="myconv.conversation.$error.required">Conversation Is Required</small>
																	
										</div>
										
									</div>
																					
								</div>	
						
								
							
								<div class="form-group">
									<div class="col-sm-10" >
										
									</div>	
									<div class="col-sm-2" >
									
										<button type="submit" class="btn btn-primary" ng-click="conver()" data-dismiss="modal">Post</button>
										
									</div>
																					
								</div>	
							
							</div>
						
					</div>
      
				</div>
			</div>
		</form>	
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 <!-- End conversation-->
		 
		 
	
		 
			
			
		</div>
	</div>
</div>








