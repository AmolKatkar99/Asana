<!DOCTYPE html>
<html lang="en">
	<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	
	<link rel="stylesheet" type="text/css" href="style.css">
	

	</head>
	<body style="background:#F7F7F7;" ng-app="LoginModule">
	<div class="container">
			
		<div class="red">
			
	
		</div>
		<div class="form-group" style="padding-top:50px;">
			<div class="col-sm-3" >
																	
			</div>
			<div class="col-sm-6" >
																				 
			<div class="panel panel-default" style="height:550px;" >
				<div class="heading">Log In </div>
				
				<form class="form-horizontal form-label-left" id="login" ng-model="login"  name="login" novalidate>	
					<div class="space">
				
						<div  style="padding-left:100px;padding-bottom:25px">
							<button type="submit" class="btn btn-info">Use Google Account</button> 
						</div>
						
					
				
						<div>
				
						<div class="form-group">
								<div class="col-sm-12" >
										<label class="control-label" >EMAIL ADDRESS</label>			
								</div>	
																					
						</div>
						<div class="form-group">
								<div class="col-sm-12" >
										<input type="email" class="form-control" ng-model="email" name="email" required>										
								</div>	
																					
						</div>
						<div class="form-group">
								<div class="col-sm-12" >
										<label class="control-label" >PASSWORD</label>			
								</div>	
																					
						</div>
						<div class="form-group">
								<div class="col-sm-12" >
										<input type="email" class="form-control" ng-model="email" name="email" required>										
								</div>	
																					
						</div>
						
						<div class="form-group">
								<div class="col-sm-12" >
									<button type="submit" class="btn btn-link">Forgot Your Password?</button> 			
								</div>	
																					
						</div>
						<div class="form-group">
								<div class="col-sm-10" >
									
								</div>	
								<div class="col-sm-2" >
									<button type="submit" class="btn btn-defaul">Log In</button> 			
								</div>	
																					
						</div>
						
				
						</div>
				
					</div>
				</form>
			</div>													
																				 
			</div>
			<div class="col-sm-3" >
																	
			</div>
			
			
																							
		</div>	
		

			
		
		
	</div>
	</body>
</html>

