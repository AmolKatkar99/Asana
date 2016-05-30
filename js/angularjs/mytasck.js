
var preopcheck = angular.module('preopModule',['angularUtils.directives.dirPagination'])
preopcheck.controller('preopController', function ($scope, $http) 
{


	$scope.a=10;
	$scope.b=1;
	$scope.addptask=false;
	$scope.tasckbutton=false;
	$scope.dydiveB=false;
	$scope.hideprid=false;
	$scope.addpsubtask=false;
	$scope.tasubckbutton=false;
	
	$scope.personal=$scope.username;

	$scope.addtask=function()
	{
		$scope.addptask=true;
		
		$scope.taskdescription ="";
		$scope.dedate = "";
		$scope.task = "";
	
	}
	
	$scope.clicke=function()
	{
		
		$scope.a=6;
		$scope.b=0;
		$scope.dydiveB=true;
		
	
		
		
	}

	$scope.addnewpTask=function(dt)
	{

		$http.post("addpersonaltask.php",{"task":$scope.ptask,"uname":$scope.username,"ddate":dt,"desc":$scope.taskdescription})
		.success(function(data){
			
		});

	}
	
	
	
	$scope.getpersonaltasck=function()
	{
			$http.post("getpresanalTask.php",{"projid":$scope.projid}).success(function(data){
			
				$scope.ptasks = data;
				$scope.pstid=data[0]['ptid'];
				
			});
	}
	
	$scope.ptasklist=function(ptid)
	{
		$scope.a=6;
		$scope.b=0;
		$scope.dydiveB=true;
		
		
		$http.post("getpresanaldetails.php",{"ptid":ptid}).success(function(data){
			
				$scope.taskdescription = data[0]['descrition'];
				$scope.username = data[0]['username'];
				$scope.dedate = data[0]['duedate'];
				$scope.task = data[0]['task'];
				
				
			});
			
		$http.post("getpresosubtaskdet.php", {"ptid":ptid}).
					success(function(data, status) 
					{
					
							if(data[0]["count"]==0)
							{
								
								$scope.psubtasks=null;
							}
							else
							{
								$scope.psubtasks = data;
								
							}
					
					})	
			
			
			
			
			
			
			
		
	}
	
	
	
	
	
	
	
	$scope.showtask=function(ta)
	{
			$scope.task=ta;
	}
	
	
	$scope.subptask=function()
	{
		
		$scope.addpsubtask=true;
		
		
	}
	
	$scope.addnewpsubTask=function()
	{
		
		
		
		$http.post("addsubprsnaltask.php",{"pstid":$scope.pstid,"psubtask":$scope.psubtask})
		.success(function(data){
			
					$http.post("persanelsub.php", {"pstid":$scope.pstid}).
					success(function(data, status) 
					{
					
							
								$scope.psubtasks = data;
								$scope.psubtask="";
						
					
					})	
			
			
			
			
			
			
				
			});
		
	}
	
	
	
	



	
	
	
	
	
	
	//sdebar js
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

