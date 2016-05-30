
var preopcheck = angular.module('preopModule',['angularUtils.directives.dirPagination'])
preopcheck.controller('preopController', function ($scope, $http) 
{


	


	$scope.hideprid=true;
	$scope.tasckbutton=false;
	$scope.a=9;
	$scope.dydiveA=true;
	$scope.dydiveB=false;
	$scope.adtask=true;
	$scope.attfile=false;
	$scope.scomment=false;

	
	
	
	$scope.projid=document.getElementById("vprojectid").value;

		
	
	
	$scope.inputs = [];
	$scope.addtasck=function()
	{
			$scope.adtask=false;
			
			$scope.sendto="";
			$scope.dedate="";
			$scope.taskdescription="";
			$scope.subtasks=null;
			
			
			//$scope.inputs.push({})
			//$scope.taskInput = "";
			
	}
	  

	$scope.tasklist=function(tid)
	{
		
			$scope.a=6;
			$scope.dydiveA=false;
			$scope.dydiveB=true;
		
		$scope.taid=tid;
		
		
		
		
		$http.post('gettaskdetails.php', {"tid":tid}).
					success(function(data, status) 
					{
						$scope.sendto = data[0]['assignee'];
						$scope.task = data[0]['task'];
						$scope.taskdescription = data[0]['tdescription'];
						$scope.dedate = data[0]['duedate'];
		
						
					})
					
					
		$http.post('getsubtaskdetails.php', {"tid":tid}).
					success(function(data, status) 
					{
					
							if(data[0]["count"]==0)
							{
								
								$scope.subtasks=null;
							}
							else
							{
								$scope.subtasks = data;
								
							}
					
					})		
					
				
			$http.post('getcomment.php', {"tid":$scope.taid}).
						success(function(data, status) 
						{
							
							if(data[0]["count"]==0)
							{
									$scope.scomment=false;
								
							}
							else
							{
								$scope.scomment=true;
								$scope.comments = data;
								
							}
						
							
						})			



					
					
					
					
					
	
	}
	  
	  
	  
	
	$scope.addnewTask=function(task,ddate)
	{
	
		//$scope.inputs.push({})
		//$scope.taskInput = "";
		$scope.adtask=false;
		
	
	
		
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
						
								$http.post("getTask.php",{"projid":$scope.projid}).success(function(data){
			
									$scope.tasks = data;
				
								});

							$scope.sendto="";
							$scope.dedate="";
							$scope.taskdescription="";
			
					})	

	}
	
	$scope.addnewsubTask=function(stask)
	{
		
	
			$http.post('adddbsubtask.php', {
			"tid":$scope.taid,
			"subtask":stask,
			"subsendto":$scope.subsendto,
			"pid":$scope.projid
			
			//"duedate":ddate,
			//"tdecription":$scope.taskdescription
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
			
		if($scope.taskInput==null)
		{
			$scope.sendto="";
			$scope.dedate="";
			$scope.taskdescription="";
			$scope.subtasks=null;
		}
		
		
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
	
	
	$scope.editproject=function()
	{
		
			$http.post("geteditproject.php",{"projid":$scope.projid}).success(function(data){
			
						$scope.editname = data[0]['projectname'];
						$scope.editdescription = data[0]['description'];
						
				
			});
		
	}
	
	$scope.updateproject=function()
	{
		
		$http.post('updateproject.php', {"projid":$scope.projid,"pname":$scope.editname,"desc":$scope.editdescription}).
					success(function(data, status) 
					{
					
						 window.location.reload(); 
						
					})
		
	}

	
	$scope.addmember=function()
	{
		
		$http.post("addmember.php",{"projid":$scope.projid,"member":$scope.membername}).
		success(function(data){
			
		
				
			});
		
		
	}
	
	
	$scope.deletetask=function(dtid)
	{
		
		//alert(dtid);
		
		$http.post("deletetask.php",{"dtid":dtid}).
		success(function(data){
			
			
				$http.post("getTask.php",{"projid":$scope.projid}).success(function(data){
			
									$scope.tasks = data;
				
								});

			});
		
	}
	

	
	
	
	$scope.addcomment=function()
	{

			$http.post('addcomment.php', {"tid":$scope.taid,"comment":$scope.commt,}).
					success(function(data, status) 
					{
						$scope.commt="";
						$scope.scomment=true;
						
						
					$http.post('getcomment.php', {"tid":$scope.taid}).
						success(function(data, status) 
						{
							$scope.comments = data;
						})	
						
						
					
					})	

	}
	
	
	$scope.deletetcomment=function(dcid)
	{
		
		$http.post("deletecomment.php",{"dcid":dcid}).
		success(function(data){
				
					$http.post('getcomment.php', {"tid":$scope.taid}).
						success(function(data, status) 
						{
							if(data[0]["count"]==0)
							{
									$scope.scomment=false;
								
							}
							else
							{
								$scope.scomment=true;
								$scope.comments = data;
								
							}
						
						})	
			});
		
		
		
	}
	
	
	
	
	//sdebar js
	$scope.adddesc=false;
	$scope.uname=false;
	$scope.hideid=false;
	
	$scope.username=document.getElementById("vname").value;
	$scope.owner=document.getElementById("vname").value;

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