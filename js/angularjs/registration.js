
var preopcheck = angular.module('preopModule',[])
preopcheck.controller('preopController', function ($scope, $http) 
{

	$scope.registration=function()
	{
		$http.post('adddbregistration.php', {"name":$scope.name,"orgname":$scope.orgname,"uname":$scope.uname,"pass":$scope.pass}).
		success(function(data, status) 
		{
	
				alert("you have been successfully registered");
				window.location.href = "index.php";
	
		})
		
		
	}
	
	
	$scope.cancel=function()
	{
			window.location.href = "index.php";
	}

	
});