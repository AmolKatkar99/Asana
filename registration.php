<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<?php include_once ("title.php"); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script src="js/angularjs/registration.js"></script>



<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
</head>
<body ng-app="preopModule">
<div ng-controller="preopController">
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">NEW REGISTRATION</h4>
            </div>
            <div class="modal-body" style=" padding-left:50px;padding-right:50px;"   >
		
                <form class="form-horizontal form-label-left" id="registation" ng-model="registation"  name="registation" novalidate>
                    <div class="form-group">
                        <input type="text" ng-model="name" class="form-control" name="name" placeholder="Name"  required>
						<div class="error" ng-show="registation.name.$dirty && registation.name.$invalid">
																											
								<small class="error" style="color:red" ng-show="registation.name.$error.required">Name Is Required</small>
																
						</div>
						
						
                    </div>
					
					 <div class="form-group">
                        <input type="text" class="form-control" ng-model="orgname" name="orgname" placeholder="Organization Name" required>
						<div class="error" ng-show="registation.orgname.$dirty && registation.orgname.$invalid">
																											
								<small class="error" style="color:red" ng-show="registation.orgname.$error.required">Organization Name Is Required</small>
																
						</div>
					
                    </div>
                    <div class="form-group">
                        <input type="email" ng-model="uname" name="uname" class="form-control" placeholder="Email Address" required>
						
						<div class="error" ng-show="registation.uname.$dirty && registation.uname.$invalid">
																											
								<small class="error" style="color:red" ng-show="registation.uname.$error.required">Email Is Required</small>
								<small class="error" style="color:red" ng-show="registation.uname.$error.email">Not Valid Email!</small>
																	
						</div>
						
						
						
                    </div>
					  <div class="form-group">
                        <input type="password" class="form-control" ng-model="pass" name="pass" placeholder="Password"  ng-minlength="8" ng-maxlength="10"  required>
						<div class="error" ng-show="registation.pass.$dirty && registation.pass.$invalid">
																											
								<small class="error" style="color:red" ng-show="registation.pass.$error.required">Password Is Required</small>
								<span class="error" style="color:red" ng-show="registation.pass.$error.minlength">Password Required Minimum 8 Character</span>
								<span class="error" style="color:red" ng-show="registation.pass.$error.maxlength">Password Required Maximum 10 Character</span>									
						</div>
						
						
						
                    </div>
					
					 <div class="form-group">
                        
						 <button type="submit" class="btn btn-primary" data-dismiss="modal" ng-click="registration()" ng-disabled="registation.$invalid">REGISTRATION</button>
						
						 <button type="submit" class="btn btn-primary" data-dismiss="modal" ng-click="cancel()">CANCEl</button>
						
                    </div>
					
					
					
                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>                                		