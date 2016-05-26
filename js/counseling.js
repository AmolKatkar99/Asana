// Packages Master starts Here

//created by:Sushant
//18-AUG-15

var counseling = angular.module('counseling',['angularUtils.directives.dirPagination']) 
counseling.controller('counsil', function ($scope, $http) 
{

	
	//**************list of Counseling starts**************
	$scope.get_packages = function()
	{
		 $scope.btn_package=true;
		$http.get("load_counseling.php").success(function(data)
		{  
			$scope.pagedItems = data;
		});
    }
	//**************list of Counseling Ends**************

	
	
	
	
		
});
