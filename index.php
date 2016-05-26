<?php
//Created by: ManyaSK---Date: 20-August-2015
error_reporting(0);
session_start();
if($_SESSION['cpid']=="")
{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="fonts/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		
		<!-- Custom styling plus plugins -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/icheck/flat/green.css" rel="stylesheet">
		
		<script src="js/jquery.min.js"></script>
		
		<!--[if lt IE 9]>
		<script src="../assets/js/ie8-responsive-file-warning.js"></script>
		<![endif]-->
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- AngularJS core CSS -->
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script src="js/angularjs/script.js"></script>
		
			<link rel="stylesheet" type="text/css" href="style.css">
		
	</head>
	<body style="background:#F7F7F7;" ng-app="LoginModule">
		<div class="" ng-controller="LoginController">
		
		
			<a class="hiddenanchor" id="tologin"></a>
			
			
				<div id="login" class="animate form">
			
			
			<div class="container">
			<div class="form-group" style="padding-top:30px;">
				<div class="col-sm-3" >
																	
				</div>
				<div class="col-sm-6" >
				<div class="login_content">
				
				<strong class="error">{{getCallJSONResult}}</strong>
						<?php
							if(isset($_REQUEST['status']))
							{
								if($_REQUEST['status']=='1')
								{
						?>
									<strong class="success">Logged out successfully.</strong>
						<?php
								}
								elseif($_REQUEST['status']=='2')
								{
						?>
									<strong class="error">Please login, First.</strong>
						<?php
								}
								else
								{
								}
							}
						?> 
				
				</div>
		
																	
				<div class="col-sm-1" >
																	
				</div>
				<div class="col-sm-10" >						
				<div class="panel panel-default" style="height:550px;width:550px" >
				<div class="login_content">
						<div class="heading">Log In </div>
						<div  style="padding-bottom:75px;">
								<button type="submit" class="btn btn-info">Use Google Account</button> 
						</div>
				</div>	
				<form autocomplete="off" enctype="multipart/form-data" name="ULoginForm" ng-submit="submitData(ULogin)" novalidate>
				
					<div class="form-group" style="padding-left:80px;">
								<div class="col-sm-12" >
										<label class="control-label" >EMAIL ADDRESS</label>			
								</div>	
																					
					</div>
					<div class="form-group" style="padding-left:80px;padding-right:80px;">
						<div class="col-sm-12" >
							<input type="email" required autofocus  required name="username" id="username" class="form-control" ng-model="ULogin.username" />
								<div class="error" ng-show="ULoginForm.username.$dirty && ULoginForm.username.$invalid">
									<small class="error" ng-show="ULoginForm.username.$error.required">Email-Id is required.</small>
									<small class="error" ng-show="ULoginForm.username.$error.username">Invalid Email-Id.</small>
								</div>		
											<p>&nbsp;</p>	
						</div>														
					</div>	
					<div class="form-group" style="padding-left:80px;">
								<div class="col-sm-12" >
											<label class="control-label" >PASSWORD</label>		
								</div>	
																					
					</div>
					<div class="form-group" style="padding-left:80px;padding-right:80px;">
							<div class="col-sm-12" >
							<input type="password" required maxlength="20" name="password" class="form-control" id="Password" ng-model="ULogin.password" ng-minlength="8" ng-maxlength="20" />
								<div class="error" ng-show="ULoginForm.password.$dirty && ULoginForm.password.$invalid">
									<small class="error" ng-show="ULoginForm.password.$error.required">Password is required.</small>
									<small class="error" ng-show="ULoginForm.password.$error.minlength">Password is required to be at least 8 characters</small>
									<small class="error" ng-show="ULoginForm.password.$error.maxlength">Password cannot be longer than 20 characters</small>
								</div>						
							<p>&nbsp;</p>
							</div>	
																					
					</div>
					
					<div class="form-group" style="padding-right:80px;">
								<div class="col-sm-10" >
									
								</div>	
								<div class="col-sm-2" >
										<input type="submit" name="submit" value="Login" class="btn btn-default submit" ng-disabled="ULoginForm.$invalid" />	
								</div>	
																					
					</div>
					
					
					
					<div class="form-group" style="padding-left:70px;">
								<div class="col-sm-12" >
												<button type="submit" class="btn btn-link">Forgot Your Password?</button> 
								</div>	
																					
					</div>
					
					<div class="form-group" style="padding-left:70px;">
								<div class="col-sm-12" >
								
									<a href="registration.php"><i class="btn btn-link"></i>NEW REGISTRATION</a>
												
								</div>	
																					
					</div>
					
				 
				
				
				</form>
				</div>
				</div>
				<div class="col-sm-1" >
																	
				</div>
						
				</div>	
				<div class="col-sm-3" >
																	
				</div>
				
			</div>	
			</div>	
			
	
					</section>
				</div>
		
		</div>
		
		
	</body>
</html>
<?php
}
else
{
	echo "<script language=\"javascript\">window.location=\"welcome.php\";</script>";
}
?>
