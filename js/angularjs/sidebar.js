
var preopcheck = angular.module('preopModule',[])
preopcheck.controller('preopController', function ($scope, $http) 
{

	$scope.adddesc=false;
	$scope.uname=false;
	$scope.hideid=false;
	
	$scope.username=document.getElementById("vname").value;

	$scope.addproject=function()
	{

			$http.post('adddbproject.php', {"projname":$scope.projname,"description":$scope.description,"username":$scope.username}).
					success(function(data, status) 
					{
						 window.location.reload(); 
						
					})	
	
		
	}
	

	$http.get("getprojectdetails.php").success(function(data)
		{  
			$scope.project = data;
			
	
		});
		
	$scope.protasck=function(a)
	{
		
	
		window.location.href = "projecttack.php?a="+a;
		
	}

	
	
});

