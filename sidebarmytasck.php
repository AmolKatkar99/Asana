

	
<div class="main_container" ng-app="Module">
	<div class="col-md-3 left_col" ng-controller="Controller">
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
					
							$count=0;
							
							$qry = $dbConnection->prepare("SELECT * FROM  login_master");
							$qry ->execute(array());
							$row =$qry->fetch();
							$username = $row['user_name'];
		
							$qry1 = $dbConnection->prepare("SELECT * FROM  project WHERE user_name=?");
							$qry1 ->execute(array($username));
							$count=$qry1->rowCount();
							//$num = $qry->fetchColumn();
							
							while($row1 = $qry1->fetch())
							{
									$pid = $row1['pid'];
									$pname = $row1['pname'];
									$data[] = array("projectname"=>$pname);	
							}
			
					?>
					<?php
							if($count>0)
							{
									
								foreach($data as $product){
									 foreach($product as $key => $val){
									
								
								
								?>	
								
								
							
											<li><a href="" ><i class=""></i><?php echo $val ?> <span ></span></a></li>
									
									
									
					<?php				
							
									 }
								}
								
							}
							
						
							
					?>
					
								
					
					<table>
						<tbody>
							<tr ng-repeat="con in project">
							
									<td ng-show="hideid" >{{con.pid}}</td>
						
								
									<td><button type="submit" class="btn btn-default " ng-click="protasck(con.pid) ">{{con.projectname}}</button></td> 
								
							
									
							</tr>
					
						<tbody>
					</table>
					
					
				
				
				<div id="divId">
				 	<input type="text" id="vname"  value='<?php echo $username?>'/> 	
					<input type="text"  ng-model="username" > 
				</div>	
				 
				 
				 <script type="text/javascript">document.getElementById('divId').style.display = 'none';</script>
				 
				 
						<li>
							<a><i class="fa fa-table"></i>Feedback Reports<span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu" style="display: none;">
			
								<li><a href="datewise_report.php">Datewise Feedback</a></li>
								<li><a href="greatwise_report.php">Gradewise Feedback</a></li>
								
							</ul>
						</li>
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








