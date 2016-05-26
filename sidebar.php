

	
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
					
						
							$username = $_SESSION['user_name'];
							$qry1 = $dbConnection->prepare("SELECT * FROM  project WHERE user_name=?");
							$qry1 ->execute(array($username));
						
							
							while($row1 = $qry1->fetch())
							{
									$pid = $row1['pid'];
									$pname = $row1['pname'];
							
							
			
					?>
			
							<li><a href="projecttasck.php?pid=<?php echo $pid;?>"  ><i class=""></i><?php echo $pname ?> <span ></span></a></li>
						
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
			
			
		</div>
	</div>
</div>








