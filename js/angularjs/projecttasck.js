
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
	$scope.t=1;
	$scope.t1=11;
	$scope.popht=false;
	
	
	
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
			$scope.t=2;
			$scope.t1=10;
		
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
			$scope.t=2;
			$scope.t1=10;
		
			
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

	
	$scope.deleteproject=function()
	{
		
	
		
		
		var answer = confirm("Do you want to Delete Project?")
		if (!answer)
		{               
		}
		else
		{
			
			
				$http.post('deleteproject.php', {"projid":$scope.projid}).
					success(function(data, status) 
					{
			
						//	window.location.href = "welcome.php";

					})
					
					
		}
		
		
		
		
		
		
		
		
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
	
	$scope.addfavarate=function(popid)
	{
		    
			
			$http.post('addpopular.php', {"tid":$scope.taid,"popid":popid}).
					success(function(data, status) 
					{
								$http.post("getTask.php",{"projid":$scope.projid}).success(function(data){
			
										$scope.tasks = data;
				
								});
										
					})		
		
	
		
	}
	

	
	
	$scope.viewname="Incomplete Task";
	
	$scope.incopletetasklist=function()
	{
		$scope.viewname="Incomplete Task";
			
		$http.get('incopletetasklist.php').
			success(function(data, status) 
			{
						$scope.tasks = data;
		
			})
		
		
	}
	
	

	$scope.completetasklist=function()
	{
		$scope.viewname="Complete Task";
			
		$http.get('completetasklist.php').
			success(function(data, status) 
			{
					
						$scope.tasks = data;
		
			})
		
	}
	

	

	$scope.alltask=function()
	{
			$scope.viewname="All Task";
				
		    $http.get('alltasklist.php').
			success(function(data, status) 
			{
						$scope.tasks = data;
			})
			
			
		
	}
	
	$scope.taskduedate=function()
	{
		$scope.viewname="Task By Due Date";
	
		
		    $http.get('duedatetasklist.php').
			success(function(data, status) 
			{
						$scope.tasks = data;
			})	
	}
	
	$scope.taskassignee=function()
	{
		$scope.viewname="Task By Assignee";
	
		
		    $http.get('assitasklist.php').
			success(function(data, status) 
			{
						$scope.tasks = data;
			})
		
		
		
		
	}
	
	$scope.populartask=function()
	{
		$scope.viewname="Popular Task";
		$scope.popht=true;	
			
		 $http.get('populartasklist.php').
			success(function(data, status) 
			{
						$scope.tasks = data;
			})	
	
	
		
	}
	
	$scope.popular=function(tid,popid)
	{

	
		$http.post('addpopular.php', {"tid":tid,"popid":popid}).
						success(function(data, status) 
						{
								 $http.get('populartasklist.php').
									success(function(data, status) 
									{
												$scope.tasks = data;
									})	
	
	
						})
						
		
	}
	
	
	
	$scope.checktask=function(taskid)
	{
		
	
		$http.post('completetask.php', {"taskid":taskid}).
					success(function(data, status) 
					{
					
						$http.post("getTask.php",{"projid":$scope.projid}).success(function(data){
			
								$scope.tasks = data;
				
						});
						
					})
	
	}
	
	
	
	//sdebar js
	
	//top add Task

	
	$scope.addnewshotpTask=function(dt1)
	{
	
		$http.post("addpersonaltask.php",{"task":$scope.ptask1,"uname":$scope.username,"ddate":dt1,"desc":$scope.taskdescription1})
		.success(function(data){
			
			$scope.ptask1="";
			$scope.taskdescription1="";
			$scope.dedate1="";
			
			
			$http.post("getpresanalTask.php",{"projid":$scope.projid}).success(function(data){
			
				$scope.ptasks = data;
				$scope.pstid=data[0]['ptid'];
				
			});
			
			
			
			
		});
	
		
	}
	
	
	$scope.conver=function()
	{
		
		
		
	}
	
	
	
	
	
	
	
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