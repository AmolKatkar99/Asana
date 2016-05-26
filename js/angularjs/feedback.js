
var preopcheck = angular.module('preopModule',['angularUtils.directives.dirPagination'])
preopcheck.controller('preopController', function ($scope, $http) 
{

	

	
	//**************list of Counseling starts**************
	
	$scope.dreport=true;
	$scope.greport=true;
	

	$scope.report=function(sdt,tdt)
	{
	
		
			$http.post('get_datefeedback.php', {'sdt':sdt,'tdt':tdt}) 
					.success(function (data, status, headers, config) { 
	
						
		
					if(data[0]["count"]==0)
					{
						
						alert("Not Fount Records!!");
						
					}
					else
					{
						
						$scope.dreport=false;
						$scope.pagedItems = data;
						
					}
			
		
		
		});
		
		
		
	}
	
	
	$scope.greport=function(grt)
	{
		
		$http.post('get_greatefeedback.php', {'grt':grt}) 
		.success(function (data, status, headers, config) { 
	
			if(data[0]["count"]==0)
			{
						
					alert("Not Fount Records!!");
						
			}
			else
			{
					
					$scope.greport=false;
					$scope.pagedItems = data;
						
			}
	
	

		
		});
		
	}
	

	
	$scope.get_preop= function(sdt)
	{
			//alert(dt);
			
			if(sdt==null){
				
				$http.get("load_feedback.php").success(function(data)
				{  
						$scope.pagedItems = data;
	
				});
					
			}
			else{
	
			
				
			}
      
		
    }
	

	
});

