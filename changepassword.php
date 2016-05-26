<?php
//Created by: ManyaSK---Date: 20-August-2015
session_start();
if($_SESSION['cpid']=="")
{
	echo "<script language=\"javascript\">window.location=\"index.php?status=2\";</script>";
}
else
{
	include "../dbc/db_connection.php";	
	$cpid = $_SESSION['cpid'];	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once ("title.php"); ?>
		<!-- AngularJS Script Starts Here -->
			<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
			<script src="js/angularjs/script.js"></script>
		<!-- AngularJS Script Ends Here -->
	</head>
	<body class="nav-md" ng-app="ChangePwdModule">
		<div class="container body" ng-controller="ChangePwdController">
			<!-- Sidebar Starts Here -->
			<?php include_once("sidebar.php"); ?>
			<!-- Sidebar Ends Here -->			
			
			<!-- Top Starts Here -->
			<?php include_once("top.php"); ?>
			<!-- Top Ends Here -->
			
			<!-- page content -->
			<div class="right_col">
				<div class="">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
								<h2>Change Password</h2>
								<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<form class="form-horizontal form-label-left" id="demo-form2" autocomplete="off" enctype="multipart/form-data" name="UChangePwdForm" ng-submit="submitData(UChangePwd)" novalidate>
										<p style="text-align:center;"><strong class="error" ng-hide="contentLoaded">{{getChangePwdResult}}</strong></p>
										<div class="alert alert-success alert-dismissible fade in" ng-show="contentLoaded" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Password changed successfully.</strong>
										</div>
										<div class="form-group">
											<div style="padding: 0 10px 0 0;" class="col-md-4">
												<label class="control-label">Current Password</label>
												<input type="password" class="form-control" maxlength="20" autofocus placeholder="Current Password." required name="current_pwd" id="current_pwd" ng-model="UChangePwd.current_pwd" ng-minlength="8" ng-maxlength="20" />
												<div class="error" ng-show="UChangePwdForm.current_pwd.$dirty && UChangePwdForm.current_pwd.$invalid">
													<small class="error" ng-show="UChangePwdForm.current_pwd.$error.required">Current Password is required.</small>
													<small class="error" ng-show="UChangePwdForm.current_pwd.$error.minlength">Current Password is required to be at least 8 characters</small>
													<small class="error" ng-show="UChangePwdForm.current_pwd.$error.maxlength">Current Password cannot be longer than 20 characters</small>
												</div>
											</div>
											<div style="padding: 0 10px 0 10px;" class="col-md-4">
												<label class="control-label">New Password</label>
												<input type="password" class="form-control" maxlength="20" placeholder="New Password." required name="new_pwd" id="new_pwd" ng-model="UChangePwd.new_pwd" ng-minlength="8" ng-maxlength="20" />
												<div class="error" ng-show="UChangePwdForm.new_pwd.$dirty && UChangePwdForm.new_pwd.$invalid">
													<small class="error" ng-show="UChangePwdForm.new_pwd.$error.required">New Password is required.</small>
													<small class="error" ng-show="UChangePwdForm.new_pwd.$error.minlength">New Password is required to be at least 8 characters</small>
													<small class="error" ng-show="UChangePwdForm.new_pwd.$error.maxlength">New Password cannot be longer than 20 characters</small>
												</div>
											</div>
											<div style="padding: 0 0 0 10px;" class="col-md-4">
												<label class="control-label">Re-Type Password</label>
												<input type="password" class="form-control " maxlength="20" placeholder="Re-Type Password." required name="retype_pwd" id="retype_pwd" ng-model="UChangePwd.retype_pwd" ng-minlength="8" ng-maxlength="20" />
												<div class="error" ng-show="UChangePwdForm.retype_pwd.$dirty && UChangePwdForm.retype_pwd.$invalid">
													<small class="error" ng-show="UChangePwdForm.retype_pwd.$error.required">New Password is required.</small>
													<small class="error" ng-show="UChangePwdForm.retype_pwd.$error.minlength">New Password is required to be at least 8 characters</small>
													<small class="error" ng-show="UChangePwdForm.retype_pwd.$error.maxlength">New Password cannot be longer than 20 characters</small>
												</div>
											</div>
										</div>
										<input type="submit" name="submit" id="submit" value="Change Password" class="btn btn-success" ng-disabled="UChangePwdForm.$invalid" />
<input type="button" name="cancel" id="cancel" value="Cancel" class="btn btn-primary" onclick="window.location.href='welcome.php';" />						
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>	
				<!-- Footer Starts Here -->
					<?php include_once("footer.php"); ?>
				<!-- Footer Ends Here -->
			</div>
		</div>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>
<?php
}
?>
