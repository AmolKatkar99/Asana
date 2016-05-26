
var preopcheck = angular.module('preopModule',['angularUtils.directives.dirPagination'])
preopcheck.controller('preopController', function ($scope, $http) 
{


	


	$scope.hideprid=true;
	$scope.tasckbutton=false;
	$scope.a=9;
	$scope.dydiveA=true;
	$scope.dydiveB=false;

	$scope.projid=document.getElementById("vprojectid").value;

	
	
	$scope.inputs = [];
	$scope.addtasck=function()
	{
			$scope.inputs.push({})
	}
	  
	
	  getTask(); // Load all available tasks 
	function getTask(){  
	
	};
	  
	  
	  
	
	$scope.addnewTask=function(task,ddate)
	{
	
		$scope.inputs.push({})
		$scope.taskInput = "";
	

	
	
		$http.post('adddbtask.php', {
			"task":task,
			"sendto":$scope.sendto,
			"pid":$scope.projid,
			"duedate":ddate,
			"tdecription":$scope.taskdescription
			}).
					success(function(data, status) 
					{
						
						
					})	
		
		

		
		
	}
	
	$scope.assigntask=function()
	{
	 
		
	}
	
	$scope.assigneefun=function(assignee)
	{
		

		$scope.sendto=assignee;
		

	
	}
	
	$scope.clicke=function()
	{
			$scope.a=6;
			$scope.dydiveA=false;
			$scope.dydiveB=true;
			
	}
	
	$scope.subassigneefun=function(subassignee)
	{
		
			$scope.subsendto=subassignee;
			
	}
	
	

	
	
	
	$scope.getprojtasck=function()
	{

			$http.post('getproject.php', {"projid":$scope.projid}).
					success(function(data, status) 
					{
						$scope.decription = data[0]['description'];
						$scope.projheading= data[0]['projectname'];
						
					})	
		$http.post("getTask.php",{"projid":$scope.projid}).success(function(data){
			
				$scope.tasks = data;
				
			});	
	
	
		
	}
	
	$scope.subinput = [];
	$scope.subtask=function()
	{
		
		
		$scope.subinput.push({})
		
	
	}
	
	$scope.showtask=function(ta)
	{
		
		$scope.task=ta;
	
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