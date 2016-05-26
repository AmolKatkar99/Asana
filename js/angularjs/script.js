//Login Module Starts Here---Created by: ManyaSK---Date: 06-August-2015
var Login = angular.module("LoginModule", [])
Login.controller("LoginController", function ($scope, $http, jsonFilter)
{
	var logResult = function (data, status, headers, config)
	{
		return data;
	};
	
	$scope.submitData = function (ULogin)
	{
		var config = {	params: { ULogin: ULogin }	};
		
		$http.post("loginproc.php", null, config)
		.success(function (data, status, headers, config)
		{			
			//console.log(data);
			$scope.getCallJSONResult = logResult(data, status, headers, config);
			if(data == "Success")
			{
				window.location.href = "welcome.php";
			}
		})
		
		.error(function (data, status, headers, config)
		{
			$scope.getCallJSONResult = logResult(data, status, headers, config);
		});
	};
});
//Login Module Ends Here---Created by: ManyaSK---Date: 06-August-2015

//Change Password Module Starts Here---Created by: ManyaSK---Date: 06-August-2015
var ChangePwd = angular.module("ChangePwdModule", [])
ChangePwd.controller("ChangePwdController", function ($scope, $http, jsonFilter)
{	
	var logResult = function (data, status, headers, config)
	{
		return data;
	};
	
	$scope.submitData = function (UChangePwd)
	{		
		var answer = confirm("Do you want to change password?")
		if (!answer)
		{
			
		}
		else
		{
			var config = { params: { UChangePwd: UChangePwd } };

			$http.post("changepwd_proc.php", null, config)
			.success(function (data, status, headers, config)
			{			
				console.log(data);
				$scope.getChangePwdResult = logResult(data, status, headers, config);
				if(data == "Success")
				{
					window.location.href = "changepassword.php";
					$scope.contentLoaded = true;
				}
			})
			
			.error(function (data, status, headers, config)
			{
				$scope.getChangePwdResult = logResult(data, status, headers, config);
			});
		}		
	};
});
//Change Password Module Ends Here---Created by: ManyaSK---Date: 06-August-2015




/******Optometrist Module Starts Here---Created by: ManyaSK---Date: 31-August-2015******/




/********************************/
//pre op check

var preopcheck = angular.module('preopModule',['angularUtils.directives.dirPagination'])
preopcheck.controller('preopController', function ($scope, $http) 
{
	$scope.view_preop=false;
	$scope.btn_pat=true;
	$scope.list=true;
	//**************list of Counseling starts**************
	$scope.get_preop= function()
	{
     $scope.list=true;
      
		$http.get("load_preop_details.php").success(function(data)
		{  
			$scope.pagedItems = data;
	
		});
    }

	$scope.poperation="Operation Success";
	$scope.edit_preop=function(index){
		 $scope.view_preop=true;
	         $scope.list=false;
			
      
$http.post('editdb_preopcheck.php', { 'id' :index}) 
.success(function (data, status, headers, config) { 
$scope.id=data[0]["id"];		
$scope.mrno=data[0]["mrno"];
$scope.PatientName=data[0]["patient_name"];
$scope.gender=data[0]["gender"];
$scope.age=data[0]["age"];
$scope.dob=new Date(data[0]["date_surgery"]);
$scope.surgeon=data[0]["doc_name"];
$scope.surgery_name=data[0]["surgery_name"];
$scope.surgeon_am=data[0]["surgerytime_array"];
$scope.reaction=data[0]["reaction"];
$scope.testdose=data[0]["testdose"];
$scope.bp=data[0]["bp"];
$scope.pulse=data[0]["pulse"];
$scope.arrivaltime=data[0]["arrival_time"];
$scope.arriveam_pm=data[0]["am_pm"];
$scope.surgerytime=data[0]["surgerytime"];
$scope.surgeon=data[0]["surgeon"];

$scope.c1=function ()
			{
			    var checked = false;
			    if(data[0]["operated_righteye"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.c2=function ()
			{
			    var checked = false;
			    if(data[0]["operated_lefteye"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.c3=function ()
			{
			    var checked = false;
			    if(data[0]["operated_both"])
			    {
			    	checked = true;
			    }
			    return checked;
			};

$scope.allergies_nill=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_nill"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.allergies_penicillin=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_penicillin"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.allergies_xylocaine=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_xylocaine"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.allergies_sulpha=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_sulpha"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.allergies_atropin=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_atropin"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.allergies_drosyn=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_drosyn"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.allergies_others=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_others"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			
			$scope.tropicamide1=function ()
			{
			    var checked = false;
			    if(data[0]["tropicamide1"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
				$scope.tropicamide2=function ()
			{
			    var checked = false;
			    if(data[0]["tropicamide2"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
				$scope.tropicamide3=function ()
			{
			    var checked = false;
			    if(data[0]["tropicamide3"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.tropicamide4=function ()
			{
			    var checked = false;
			    if(data[0]["tropicamide4"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.tropicamide5=function ()
			{
			    var checked = false;
			    if(data[0]["tropicamide5"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.tropicamide6=function ()
			{
			    var checked = false;
			    if(data[0]["tropicamide6"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.vigamox1=function ()
			{
			    var checked = false;
			    if(data[0]["vigamox1"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.vigamox2=function ()
			{
			    var checked = false;
			    if(data[0]["vigamox2"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			
			$scope.vigamox3=function ()
			{
			    var checked = false;
			    if(data[0]["vigamox3"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			
			$scope.vigamox4=function ()
			{
			    var checked = false;
			    if(data[0]["vigamox4"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.vigamox5=function ()
			{
			    var checked = false;
			    if(data[0]["vigamox5"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.vigamox6=function ()
			{
			    var checked = false;
			    if(data[0]["vigamox6"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.cyclogel1=function ()
			{
			    var checked = false;
			    if(data[0]["cyclogel1"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.cyclogel2=function ()
			{
			    var checked = false;
			    if(data[0]["cyclogel2"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			
			$scope.cyclogel3=function ()
			{
			    var checked = false;
			    if(data[0]["cyclogel3"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.cyclogel4=function ()
			{
			    var checked = false;
			    if(data[0]["cyclogel4"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.cyclogel5=function ()
			{
			    var checked = false;
			    if(data[0]["cyclogel5"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			
			$scope.cyclogel6=function ()
			{
			    var checked = false;
			    if(data[0]["cyclogel6"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			
			$scope.flur1=function ()
			{
			    var checked = false;
			    if(data[0]["flur1"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.flur2=function ()
			{
			    var checked = false;
			    if(data[0]["flur2"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.flur3=function ()
			{
			    var checked = false;
			    if(data[0]["flur3"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.flur4=function ()
			{
			    var checked = false;
			    if(data[0]["flur4"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.flur5=function ()
			{
			    var checked = false;
			    if(data[0]["flur5"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.flur6=function ()
			{
			    var checked = false;
			    if(data[0]["flur6"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			
			$scope.atropine1=function ()
			{
			    var checked = false;
			    if(data[0]["atropine1"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.atropine2=function ()
			{
			    var checked = false;
			    if(data[0]["atropine2"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
		$scope.atropine3=function ()
			{
			    var checked = false;
			    if(data[0]["atropine3"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			
			$scope.atropine4=function ()
			{
			    var checked = false;
			    if(data[0]["atropine4"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			
			$scope.atropine5=function ()
			{
			    var checked = false;
			    if(data[0]["atropine5"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			
			$scope.atropine6=function ()
			{
			    var checked = false;
			    if(data[0]["atropine6"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			
			
			$scope.paracain1=function ()
			{
			    var checked = false;
			    if(data[0]["paracain1"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			
			$scope.paracain2=function ()
			{
			    var checked = false;
			    if(data[0]["paracain2"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.paracain3=function ()
			{
			    var checked = false;
			    if(data[0]["paracain3"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.paracain4=function ()
			{
			    var checked = false;
			    if(data[0]["paracain4"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.paracain5=function ()
			{
			    var checked = false;
			    if(data[0]["paracain5"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.paracain6=function ()
			{
			    var checked = false;
			    if(data[0]["paracain6"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.aciol=function ()
			{
			    var checked = false;
			    if(data[0]["aciol"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.secondary_pc=function ()
			{
			    var checked = false;
			    if(data[0]["secondary_pc"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.phaco_trabeculectomy=function ()
			{
			    var checked = false;
			    if(data[0]["phaco_trabeculectomy"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.phaco_cg=function ()
			{
			    var checked = false;
			    if(data[0]["phaco_cg"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.icl=function ()
			{
			    var checked = false;
			    if(data[0]["icl"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.cataract=function ()
			{
			    var checked = false;
			    if(data[0]["catarct"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.signed=function ()
			{
			    var checked = false;
			    if(data[0]["document_signed"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.topical=function ()
			{
			    var checked = false;
			    if(data[0]["topical"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
		$scope.generalkey=function ()
			{
			    var checked = false;
			    if(data[0]["generalkey"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.local=function ()
			{
			    var checked = false;
			    if(data[0]["local"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
		
		});
	}
	
	
	
	
	$scope.add_postop=function(){
		
		$http.post('afterop.php', { 
		'id' :$scope.id,
		'mrno' :$scope.mrno,
		'status' :$scope.poperation,
		}) 
.success(function (data, status, headers, config) { 
window.location.href="list_opsurgery.php";

});
		
	}
	
});


// add the preop checklist form

var Addpreopcheck = angular.module('AddpreopModule',['angularUtils.directives.dirPagination'])
Addpreopcheck.controller('AddpreopController', function ($scope, $http) 
{
	
	/************************/
	// to get the mrno for preopController
	//Dropdown for MRNO
	$scope.selectedMRNO = null;
	$scope.MRAccounts = [];
	$http({ method: 'GET', url: 'get_mrno_preop.php', data: { applicationId: 3 } })
	.success(function (result)
	{
		$scope.MRAccounts = result;
	});
	
	//Dropdwon for Time Type
	$scope.timetypeArray = ["AM", "PM"];
	
	
	/*********************/
	$scope.get_patientdetails=function(selectedMRNO){
		$http.post('get_preopcheck_details.php', { 'id' :$scope.selectedMRNO}) 
.success(function (data, status, headers, config) { 
 
$scope.PatientName=data[0]["patient_name"];
$scope.gender=data[0]["gender"];
$scope.age=data[0]["Age"];

$scope.dob=new Date(data[0]["operation_date"]);

$scope.surgeon=data[0]["doc_name"];
$scope.surgery_name=data[0]["surgery"];
$scope.c1=function ()
			{
			    var checked = false;
			    if(data[0]["operated_righteye"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.c2=function ()
			{
			    var checked = false;
			    if(data[0]["operated_lefteye"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			$scope.c3=function ()
			{
			    var checked = false;
			    if(data[0]["operated_both"])
			    {
			    	checked = true;
			    }
			    return checked;
			};

$scope.allergies_nill=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_nill"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.allergies_penicillin=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_penicillin"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.allergies_xylocaine=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_xylocaine"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.allergies_sulpha=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_sulpha"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.allergies_atropin=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_atropin"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.allergies_drosyn=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_drosyn"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
			
			$scope.allergies_others=function ()
			{
			    var checked = false;
			    if(data[0]["allergies_others"])
			    {
			    	checked = true;
			    }
			    return checked;
			};
	//$scope.dob=new Date(data[0]["operation_date"]);
	


});
		
		
	}
	$scope.poperation="Patient Ready For Operation";
	
	$scope.add_preop=function(){
		
		var answer = confirm("Do you want to Submit?")
		if (!answer)
		{               
		}
		else
		{
			$scope.right_eye = document.getElementById("right_eye").checked;
			$scope.left_eye = document.getElementById("left_eye").checked;
			$scope.both = document.getElementById("both").checked;
			$scope.anill = document.getElementById("anill").checked;
			$scope.apencillin = document.getElementById("apencillin").checked;
			$scope.axylocaine = document.getElementById("axylocaine").checked;
			$scope.asulpha = document.getElementById("asulpha").checked;
			$scope.aatropin = document.getElementById("aatropin").checked;
			$scope.adrosyn = document.getElementById("adrosyn").checked;
			$scope.aothers = document.getElementById("aothers").checked;
			//alert($scope.poperation);
			$scope.dob=document.getElementById('dob').value;
			$http.post('adddb_preopcheck.php',{ 
			'mrno': $scope.selectedMRNO,
			'date_surgery': $scope.dob,
			'name': $scope.PatientName,
			'arrivaltime': $scope.arrivaltime,
			'am_pm':$scope.selectedtimetype,
			'gender': $scope.gender,
			'age': $scope.age,
			'right_eye': $scope.right_eye,
			'left_eye': $scope.left_eye,
			'both': $scope.both,
			'anill': $scope.anill,
			'apencillin': $scope.apencillin,
			'axylocaine': $scope.axylocaine,
			'asulpha': $scope.asulpha,
			'aatropin': $scope.aatropin,
			'adrosyn': $scope.adrosyn,
			'aothers': $scope.aothers,
			'cataract': $scope.cataract,
			'icl': $scope.icl,
			'phaco_cg': $scope.phaco_cg,
			'phaco_trabeculectomy' : $scope.phaco_trabeculectomy,
			'secondary_pc': $scope.secondary_pc,
			'aciol': $scope.aciol,
			'pulse': $scope.pulse,
			'bp': $scope.bp,
			'tropicamide1': $scope.tropicamide1,
			'tropicamide2': $scope.tropicamide2,
			'tropicamide3': $scope.tropicamide3,
			'tropicamide4': $scope.tropicamide4,
			'tropicamide5': $scope.tropicamide5,
			'tropicamide6': $scope.tropicamide6,
			'vigamox1': $scope.vigamox1,
			'vigamox2': $scope.vigamox2,
			'vigamox3': $scope.vigamox3,
			'vigamox4': $scope.vigamox4,
			'vigamox5': $scope.vigamox5,
			'vigamox6': $scope.vigamox6,
			'cyclogel1': $scope.cyclogel1,
			'cyclogel2': $scope.cyclogel2,
			'cyclogel3': $scope.cyclogel3,
			'cyclogel4': $scope.cyclogel4,
			'cyclogel5': $scope.cyclogel5,
			'cyclogel6': $scope.cyclogel6,
			'flur1': $scope.flur1,
			'flur2': $scope.flur2,
			'flur3': $scope.flur3,
			'flur4': $scope.flur4,
			'flur5': $scope.flur5,
			'flur6': $scope.flur6,
			'atropine1': $scope.atropine1,
			'atropine2': $scope.atropine2,
			'atropine3': $scope.atropine3,
			'atropine4': $scope.atropine4,
			'atropine5': $scope.atropine5,
			'atropine6': $scope.atropine6,
			'paracain1': $scope.paracain1,
			'paracain2': $scope.paracain2,
			'paracain3': $scope.paracain3,
			'paracain4': $scope.paracain4,
			'paracain5': $scope.paracain5,
			'paracain6': $scope.paracain6,
			'testdose': $scope.testdose,
			'reaction': $scope.reaction,
			'topical': $scope.topical,
			'local': $scope.local,
			'general': $scope.general,
			'surgerytime': $scope.surgerytime,
			'surgery_am':$scope.selectedSurgerytime,
			'surgeon': $scope.surgeon,
			'status':$scope.poperation,
			'surgery_name':$scope.surgery_name,
			'signed': $scope.signed,			
			})
			.success(function (data, status, headers, config)
			{
				
				alert(JSON.stringify(data));
				$scope.content=true;
				window.location.href = "list_opsurgery.php";
			})
			
			.error(function(data, status, headers, config)
			{
				
			});
		}
	
		
	}
	
});
/********************************/
//POST op Pterygium Surgery

var postoppter = angular.module('postoppterygium',['angularUtils.directives.dirPagination'])
postoppter.controller('postoppterController', function ($scope, $http) 
{
	$scope.view_postoppter=false;
	$scope.btn_pat=true;
	$scope.list=true;
	$scope.print_form = false;
	//**************list of Counseling starts**************
	$scope.get_postoppter= function()
	{
     $scope.list=true;
      
		$http.get("load_pterygium.php").success(function(data)
		{  
			$scope.pagedItems = data;
	
		});
    }

	$scope.print_postoppter=function(index){
		 $scope.view_postoppter=true;
	         $scope.list=false;
			 $scope.btn_pat=false;
      
$http.post('load_pterygium.php', { 'id' :index}) 
.success(function (data, status, headers, config) { 
		
		
		});
	}



// to print
	$scope.print_patient = function(index)
	{
		
		$scope.add_form=false;
		$scope.list=false;
		$scope.print_form = false;
		$scope.btn_pat=false;

		
		$http.post('editdb_pterygium.php', { 'id' : index} )
		.success(function (data, status, headers, config)
		{
		var mrno=data[0]["mrno"];
		var name = data[0]["name"];
		var date = data[0]["date"];

		var dolo=data[0]["dolo"];
		var dolot = data[0]["dolot"];
		var restyl = data[0]["restyl"];
		var restylt=data[0]["restylt"];
		var predforte = data[0]["predforte"];
		var predforted = data[0]["predforted"];
		var zymaxid=data[0]["zymaxid"];
		var zymaxidd = data[0]["zymaxidd"];
		var nextvisit = data[0]["nextvisit"];
		var time=data[0]["time"];
		var timetype = data[0]["timetype"];
		var wardnurse = data[0]["wardnurse"];	
	               window.document.open();
 
  window.document.write('<html><head><style type="text/css">body{padding:0 0 0 0;margin:0 auto 0 auto;background-color: #FFFFFF;text-align:center;}@media print{ @page{size:portrait;margin:0 auto 0 auto;background-color: #FFFFFF;}body{margin:0 auto 0 auto;padding:30px 30px 30px 30px;background-color:#FFFFFF;text-align:justify;word-break: break-all;line-height:36px;font-family:Arial;font-weight:400;font-size:13px;color:#000000;width:21cm;height:27.5cm;box-shadow:0 0 30px rgba(50,50,50,0.75);}ol { margin:0px 0px 0px 0px; padding: 0px 0px 0px 22px;} .border{border-bottom:1px solid #000000;} ol li { margin:0px 0px 0px 0px;padding:5px 0px 5px 0px;line-height:1.25em;}}</style></head><body onload="window.print()"><table width="100%"><tr><td colspan="3" align="center" style="width:100%;"><strong class="border">'+"MAXIVISION EYE HOSPITAL"+'</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td align="center" colspan="3"><strong class="border">'+"MEDICATION FOR POST OF PTERYGIUM SURGERY"+'</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="35%"><strong>' +"MRNo:"+'</strong>&nbsp;'+mrno+'</td><td align="left" width="35%" ><strong>' +"Name:"+'</strong>&nbsp;'+name+'</td><td align="right" width="30%" ><strong>' +"Date:"+'</strong>&nbsp;'+date+'</td></tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+dolo+''+'</td><td align="left" width="70%" colspan="2" >'+dolot+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+restyl+''+'</td><td align="left" width="70%" colspan="2" >'+restylt+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+predforte+''+'</td><td align="left" width="70%" colspan="2" >'+predforted+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+zymaxid+''+'</td><td align="left" width="70%" colspan="2" >'+zymaxidd+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td colspan="3" align="center" style="width:100%;"><strong class="border">'+"WHAT SHOULD BE EXPECTED AFTER TREATMENT"+'</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td colspan="3"><ol><li>It is quite likely that you will have mild discomfort possibly with watering for the first 5 days.</li><li>Experience has shown that best approach to rest both eyes for first 2 days whenever possible as reading and watching TV will tend to irritate the treated eye.</li><li>The most important thing with cataract  operation is never to rub the eye for one week.</li><li>After the cataract operation procedure you can start taking bath/Shower from day 2 onwards without letting any soap water into the eyes.You can start takinh headbath from day3 onwards.</li><li>While sleeping you can sleep on either side.</li><li>There is no restriction on diet.There is nop restriction to walking around. From day 2 onwards you can watch tv, Use Computer,play etc.</li><li>It is also important to know that the eye is now in an artificial state and isd not the god given eye,Therefore, please give time for the eye to heal and settle. During The first year, every 6 months the should be checked for possible change of power in the glasses.</li></ol></td></tr><tr><td>&nbsp;</td></tr></tr><tr><td  colspan="3">All of our staff in here at the centre will be happy to help, Should you require any further information.</td></tr><tr><td>&nbsp;</td></tr><tr><td colspan="3" align="center"><strong>KEEP YOUR EYES CLOSED AS FAR AS POSSIBLE FOR 3 DAYS</strong></td></tr><tr><td  colspan="3" align="center"><strong>DO NOT RUB THE OPERATED EYE</strong></td></tr><tr><td  colspan="3" align="center"><strong>NOTE:PLEASE BRING ALL THE MEDICINES DURING YOUR NEXT VISIT.</strong></td></tr><tr><td  colspan="3" align="center"><strong>FOR ANY INSSISTANCE PLEASE CONTACT: 9392155678</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="35%"><strong>' +"Next Visit Date:"+'</strong>&nbsp;'+nextvisit+'</td><td align="left" width="35%" ><strong>' +"Time:"+'</strong>&nbsp;'+time+'&nbsp;'+timetype+'</td><td align="right" width="30%" ><strong>' +"Ward Sister:"+'</strong>&nbsp;'+wardnurse+'</td></tr><td>&nbsp;</td><tr><tr><td colspan="3" align="center" style="width:100%;"><strong>'+" USE POLARIZED / U.V PROTECTED GOGGLES FOR EYE PROTECTION"+'</strong></td></tr></table></body></html>');
 	
  window.document.close();
	window.location.href = "list_oppterygium.php";		


		})
		
		.error(function(data, status, headers, config)
		{
			
		});
		


	
	}
	
	
	$scope.Back1=function()
	{
		window.location.href = "list_oppterygium.php";
	}
	



});
// add the POST OP Pterygium Surgery form

var addpterygiumsurgery = angular.module('Addpterygium',['angularUtils.directives.dirPagination'])
addpterygiumsurgery.controller('AddpterygiumController', function ($scope, $http) 
{
$scope.fdate=new Date();
	
	/************************/
	// to get the mrno for preopController
	//Dropdown for MRNO
	$scope.selectedMRNO = null;
	$scope.MRAccounts = [];
	$http({ method: 'GET', url: 'getmrno_pteryggium.php', data: { applicationId: 3 } })
	.success(function (result)
	{
		$scope.MRAccounts = result;
	});

$scope.dolot=function()
{
$scope.dolo_tab="Tab Dolo/P.650mg";
}
$scope.dolo1=function()
{
$scope.dolo="Tablet twice a day for 3 days";
}
$scope.restylt=function()
{

$scope.restyl_tab="Tab Restyl/0.5mg";
}
$scope.restyl1=function()
{

$scope.restyl="Tablet twice a day for 1 day";
}	
$scope.zymaxidt=function()
{
$scope.zymaxid_eyedrop="ZYmaxid / Moxiblu Eye drops";
}
$scope.zymaxid1=function()
{
$scope.zymaxid="4 times a day for 1 week";
}
$scope.predforte1=function()
{
$scope.predforte="Pred forte eye drops";
}
	//Dropdwon for Time Type
	$scope.timetypeArray = ["AM", "PM"];
	//Dropdwon for Pred Forte Eye Drops
	$scope.forteArray = ["1 drop 6 times a day for 10 days 1", "1 drop 4 times a day for 10 days 1", "1 drop 2 times a day for 10 days 4"];
	
	
	/*********************/
	$scope.get_patientdetails=function(selectedMRNO){
	$http.post('getpatient_surgery.php', { 'id' :$scope.selectedMRNO}) 
	.success(function (data, status, headers, config) { 
 
		$scope.PatientName=data[0]["patient_name"];
		$scope.surgery=data[0]["operation_name"];
		
		
});	
	}
	
	$scope.add_preop=function(){
		var answer = confirm("Do you want to Submit?")
		if (!answer)
		{               
		}
		else
		{
//alert($scope.zymaxid);
			$http.post('adddb_pterygium.php',{ 
			'mrno': $scope.selectedMRNO,
			'name': $scope.PatientName,
			'surgery': $scope.surgery,
			'date': $scope.fdate,
			'dolot': $scope.dolo_tab,
			'dolo': $scope.dolo,
			'restylt': $scope.restyl_tab,
			'restyl': $scope.restyl,
			'zymaxidt': $scope.zymaxid_eyedrop,
			'zymaxid': $scope.zymaxid,
			'predforte': $scope.predforte,
			'forte': $scope.selectedforte,
			'ndate': $scope.ndate,
			'time': $scope.time,
			'stime': $scope.selectedtime,
			'wardsister': $scope.wardsister,
			
			})
			.success(function (data, status, headers, config)
			{
				//alert("hi");
				alert(JSON.stringify(data));
				$scope.content=true;
				window.location.href = "list_oppterygium.php";
			})
			
			.error(function(data, status, headers, config)
			{
				
			});
		}
	
		
	}
	
});



/********************************/
//POST op Cataract Surgery

var cataract = angular.module('cataractsur',['angularUtils.directives.dirPagination'])
cataract.controller('addcataractController', function ($scope, $http) 
{
	$scope.view_cataract=false;
	$scope.btn_pat=true;
	$scope.list=true;
	$scope.print_form = false;
$scope.get_cataract= function()
	{
     $scope.list=true;
      
		$http.get("load_cataractsurgery.php").success(function(data)
		{  

			$scope.pagedItems = data;
	
		});
    }

	// to print
	$scope.print_patient = function(index)
	{
		
		alert("hi");
		$scope.list=false;
		
		
		$http.post('editdb_cataract.php', { 'id' : index} )
		.success(function (data, status, headers, config)
		{
		var mrno=data[0]["mrno"];
		var name = data[0]["name"];
		var date = data[0]["date"];
		var augmentin=data[0]["augmentin"];
		var augmentint = data[0]["augmentint"];
		var predforte = data[0]["predforte"];
		var predforted=data[0]["predforted"];
		var vigamox = data[0]["vigamox"];
		var vigamoxd = data[0]["vigamoxd"];
		var combigan=data[0]["combigan"];
		var combigand = data[0]["combigand"];
		var acuvali = data[0]["acuvali"];
		var acuvalid = data[0]["acuvalid"];
		var nevanac=data[0]["nevanac"];
		var nevanacd = data[0]["nevanacd"];
		var nextvisit = data[0]["nextvisit"];
		var time=data[0]["time"];
		var timetype = data[0]["timetype"];
		var wardnurse = data[0]["wardnurse"];	
	               window.document.open();
 
  window.document.write('<html><head><style type="text/css">body{padding:0 0 0 0;margin:0 auto 0 auto;background-color: #FFFFFF;text-align:center;}@media print{ @page{size:portrait;margin:0 auto 0 auto;background-color: #FFFFFF;}body{margin:0 auto 0 auto;padding:30px 30px 30px 30px;background-color:#FFFFFF;line-height:36px;font-family:Arial;font-weight:400;font-size:13px;color:#000000;width:21cm;height:27.5cm;box-shadow:0 0 30px rgba(50,50,50,0.75);}ol { margin:0px 0px 0px 0px; padding: 0px 0px 0px 20px;} ol li { margin:0px 0px 0px 0px;padding:5px 0px 5px 0px;line-height:1.25em;}}</style></head><body onload="window.print()"><table width="100%"><tr><td colspan="3" align="center" style="width:100%;"><strong style="border-bottom:1px solid #000000;">'+"MAXIVISION EYE HOSPITAL"+'</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td align="center" colspan="3"><strong style="border-bottom:1px solid #000000;">'+"MEDICATION FOR POST OF CATARACT SURGERY"+'</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="35%"><strong>' +"MRNO:"+'</strong>&nbsp;'+mrno+'</td><td align="center" width="35%" ><strong>' +"Name:"+'</strong>&nbsp;'+name+'</td><td align="right" width="30%" ><strong style="text-align:right;">' +"Date:"+'</strong>&nbsp;'+date+'</td></tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+augmentin+''+'</td><td align="left" width="70%" colspan="2" >'+augmentint+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+predforte+''+'</td><td align="left" width="70%" colspan="2" >'+predforted+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+vigamox+''+'</td><td align="left" width="70%" colspan="2" >'+vigamoxd+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+combigan+''+'</td><td align="left" width="70%" colspan="2" >'+combigand+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+acuvalid+''+'</td><td align="left" width="70%" colspan="2" >'+acuvali+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+nevanac+''+'</td><td align="left" width="70%" colspan="2" >'+nevanacd+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td colspan="3" align="center" style="width:100%;"><strong style="border-bottom:1px solid #000000;">'+"ALL DROPS WITH 5 MINUTES TIME GAP"+'</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td colspan="3" align="center" style="width:100%;"><strong style="border-bottom:1px solid #000000;">'+"INSTRUCTIONS"+'</strong></td></tr><tr><td colspan="3"><ol><li>It is quite likely that you will have mild Discomfort possibly with watering for the first 5 days.</li><li>Experience has shown that best approach to rest both eyes for first 2 days whenever possible as reading and watching TV will tend to irritate the treated eye.</li><li>The most important thing with cataract  operation is never to rub the eye for one week.</li><li>After the cataract operation procedure you can start taking bath/Shower from day 2 onwards without letting any soap water into the eyes.You can start takinh headbath from day3 onwards.</li><li>While sleeping you can sleep on either side.</li><li>There is no restriction on diet.There is nop restriction to walking around. From day 2 onwards you can watch tv, Use Computer,play etc.</li><li>It is also important to know that the eye is now in an artificial state and isd not the god given eye,Therefore, please give time for the eye to heal and settle. During The first year, every 6 months the should be checked for possible change of power in the glasses.</li></ol></td></tr><tr><td>&nbsp;</td></tr></tr><tr><td  colspan="3">All of our staff in here at the centre will be happy to help, Should you require any further information.</td></tr><tr><td>&nbsp;</td></tr><tr><td   colspan="3" align="center"><strong>KEEP YOUR EYES CLOSED AS FAR AS POSSIBLE FOR 3 DAYS</strong></td></tr><tr><td  colspan="3" align="center"><strong>DO NOT RUB THE OPERATED EYE</strong></td></tr><tr><td  colspan="3" align="center"><strong>NOTE:PLEASE BRING ALL THE MEDICINES DURING YOUR NEXT VISIT.</strong></td></tr><tr><td colspan="3" align="center"><strong>FOR ANY INSSISTANCE PLEASE CONTACT: 9392155678</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="35%"><strong>' +"Next Visit Date:"+'</strong>&nbsp;'+nextvisit+'</td><td align="center" width="35%" ><strong>' +"Time:"+'</strong>&nbsp;'+time+'&nbsp;'+timetype+'</td><td align="right" width="30%" ><strong>' +"Ward Sister:"+'</strong>&nbsp;'+wardnurse+'</td></tr><tr><td>&nbsp;</td></tr><tr><td colspan="3" align="center" style="width:100%;"><strong>'+" USE POLARIZED / U.V PROTECTED GOGGLES FOR EYE PROTECTION"+'</strong></td></tr></table></body></html>');
 	
  window.document.close();
	window.location.href = "list_oppterygium.php";
		})
		.error(function(data, status, headers, config)
		{
			
		});
		
	}
	$scope.Back1=function()
	{
		window.location.href = "list_oppterygium.php";
	}
	
});


// add the POST OP Cataract Surgery form

var addcataractsurgery = angular.module('Addcataract',['angularUtils.directives.dirPagination'])
addcataractsurgery.controller('addcataractController', function ($scope, $http) 
{
$scope.fdate=new Date();
$scope.augmt=function()
{
$scope.augm_tab="Tab Augmentin 625mg";
}
$scope.augmentin1=function()
{
$scope.augmentin="1 Tablet twice a day for 3 days";
}
$scope.combigant=function()
{
$scope.combigan_drop="Combigan Eye Drops";
}
$scope.combigan1=function()
{
$scope.combigan="1 Drop 2 times a day for 1 week";
}	
$scope.acuvaild=function()
{
$scope.acuvail_drop="Acuvail Eye drops";
}
$scope.acuvail1=function()
{
$scope.acuvail="1 Drop 4 times a day for 5 weeks";
}
$scope.nevanacd=function()
{
$scope.nevanac_drop="Nevanac Eye drops";
}
$scope.nevanac1=function()
{
$scope.nevanac="1 Drop 3 times a day for 1 Month";
}
$scope.predforte1=function()
{
$scope.predforte="Pred forte eye drops";
}
$scope.vigamoxd=function()
{
$scope.vigamox="Vigamox / Zymar Eye Drops";
}
	/************************/
	// to get the mrno for preopController
	//Dropdown for MRNO
	$scope.selectedMRNO = null;
	$scope.MRAccounts = [];
	$http({ method: 'GET', url: 'getmrno_cataractsurgery.php', data: { applicationId: 3 } })
	.success(function (result)
	{
		$scope.MRAccounts = result;
	});
	
	//Dropdwon for Time Type
	$scope.timetypeArray = ["AM", "PM"];
	//Dropdwon for Pred Forte Eye Drops
	$scope.forteArray = ["Day 1- 1 drop for every hour", "Day 2- 1 drop 6 times a day for 1 week", "1 drop 4 times a day for 1 week", "1 drop 3 times a day for 1 week", "1 drop 2 times a day for 1 week", "1 drop once a day for 1 week"];

$scope.vigamoxArray = ["Day 1- 1 drop for every hour", "Day 2 onwards- 1 drop every 2 hours for 5 days"];
	
	
	/*********************/
	$scope.get_patientdetails=function(selectedMRNO){
		$http.post('getpatient_surgery.php', { 'id' :$scope.selectedMRNO}) 
.success(function (data, status, headers, config) { 
 
$scope.PatientName=data[0]["patient_name"];
$scope.surgery=data[0]["operation_name"];
});	
	}
	
	$scope.add_preop=function(){
		
		var answer = confirm("Do you want to Submit?")
		if (!answer)
		{               
		}
		else
		{
			
			$http.post('adddb_cataract.php',{ 
			'mrno': $scope.selectedMRNO,
			'name': $scope.PatientName,
			'surgery': $scope.surgery,
			'date': $scope.fdate,
			'augmentint': $scope.augm_tab,
			'augmentin': $scope.augmentin,
			'combigant': $scope.combigan_drop,
			'combigan': $scope.combigan,
			'acuvaild': $scope.acuvail_drop,
			'acuvail': $scope.acuvail,
			'nevanacd': $scope.nevanac_drop,
			'nevanac': $scope.nevanac,
			'predforte': $scope.predforte,
			'forte': $scope.selectedforte,
			'vigamoxd': $scope.vigamox,
			'vigamox': $scope.selectedvigamox,
			'ndate': $scope.ndate,
			'time': $scope.time,
			'stime': $scope.selectedtime,
			'wardsister': $scope.wardsister,
			
			})
			.success(function (data, status, headers, config)
			{
				alert(JSON.stringify(data));
				$scope.content=true;
				window.location.href = "list_cataractsurgery.php";
			})
			
			.error(function(data, status, headers, config)
			{
				
			});
		}
	
		
	}
	
});



/********************************/
//POST op Cataract Surgery

var listiclsurgery = angular.module('iclsurgery',['angularUtils.directives.dirPagination'])
listiclsurgery.controller('iclsurgeryController', function ($scope, $http) 
{
	$scope.view_iclsurgery=false;
	$scope.btn_pat=true;
	$scope.list=true;
	//**************list of Counseling starts**************
	$scope.get_iclsurgery= function()
	{
     $scope.list=true;
      
		$http.get("load_iclsurgery.php").success(function(data)
		{  
			$scope.pagedItems = data;
	
		});
    }

	$scope.edit_iclsurgery=function(index){
		 $scope.view_iclsurgery=true;
	         $scope.list=false;
			 $scope.btn_pat=false;
      
$http.post('editdb_preopcheck.php', { 'id' :index}) 
.success(function (data, status, headers, config) { 
		
		
		});
	}


// to print
	$scope.print_patient = function(index)
	{
		
		$scope.list=false;
		
		
		$http.post('editdb_iclsurgery.php', { 'id' : index} )
		.success(function (data, status, headers, config)
		{
		var mrno=data[0]["mrno"];
		var name = data[0]["name"];
		var date = data[0]["date"];
		var vigamox=data[0]["vigamox"];
		var vigamoxd = data[0]["vigamoxd"];
		var predforte = data[0]["predforte"];
		var predforted=data[0]["predforted"];
		var nevanac=data[0]["nevanac"];
		var nevanacd = data[0]["nevanacd"];
		var combigan=data[0]["combigan"];
		var combigand = data[0]["combigand"];
		var dolo = data[0]["dolo"];
		var dolot = data[0]["dolot"];
		var diamox=data[0]["diamox"];
		var diamoxt = data[0]["diamoxt"];
		var nextvisit = data[0]["nextvisit"];
		var time=data[0]["time"];
		var timetype = data[0]["timetype"];
		var wardnurse = data[0]["wardnurse"];	
	               window.document.open();
 
  window.document.write('<html><head><style type="text/css">body{padding:0 0 0 0;margin:0 auto 0 auto;background-color: #FFFFFF;text-align:center;}@media print{ @page{size:portrait;margin:0 auto 0 auto;background-color: #FFFFFF;}body{margin:0 auto 0 auto;padding:30px 30px 30px 30px;background-color:#FFFFFF;line-height:36px;font-family:Arial;font-weight:400;font-size:13px;color:#000000;width:21cm;height:27.5cm;box-shadow:0 0 30px rgba(50,50,50,0.75);}ol { margin:0px 0px 0px 0px; padding: 0px 0px 0px 0px;} ol li { margin:0px 0px 0px 20px;padding:5px 0px 5px 0px;line-height:1.25em;}}</style></head><body onload="window.print()"><table width="100%"><tr><td colspan="3" align="center" style="width:100%;"><strong style="border-bottom:1px solid #000000;">'+"MAXIVISION EYE HOSPITAL"+'</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td align="center" colspan="3"><strong style="border-bottom:1px solid #000000;">'+"MEDICATION FOR ICL SURGERY"+'</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="35%"><strong>' +"MRNO:"+'</strong>&nbsp;'+mrno+'</td><td align="left" width="35%" ><strong>' +"Name:"+'</strong>&nbsp;'+name+'</td><td align="right" width="30%" ><strong>' +"Date:"+'</strong>&nbsp;'+date+'</td></tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+vigamox+''+'</td><td align="left" width="70%" colspan="2" >'+vigamoxd+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+predforte+''+'</td><td align="left" width="70%" colspan="2" >'+predforted+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+nevanac+''+'</td><td align="left" width="70%" colspan="2" >'+nevanacd+''+""+'</td></tr><tr><td>&nbsp;</td></tr></tr><tr><td align="left" width="30%">'+combigan+''+'</td><td align="left" width="70%" colspan="2" >'+combigand+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+dolo+''+'</td><td align="left" width="70%" colspan="2" >'+dolot+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%">'+diamox+''+'</td><td align="left" width="70%" colspan="2" >'+diamoxt+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td colspan="3" align="center" style="width:100%;"><strong style="border-bottom:1px solid #000000;">'+"WHAT SHOULD BE EXPECTED AFTER TREATMENT"+'</strong></td></tr><tr><td colspan="3"><ol><li>It is quite likely that you will have mild Discomfort possibly with watering for the first 24 hrs.</li><li>Experience has shown that best approach to rest both eyes for first 2 days whenever possible as reading and watching TV will tend to irritate the treated eye.</li><li>The most important thing with cataract  operation is never to rub the eye for one week.</li><li>After the cataract operation procedure you can start taking bath/Shower from day 2 onwards without letting any soap water into the eyes.You can start takinh headbath from day3 onwards.</li><li>While sleeping you can sleep on either side.</li><li>There is no restriction on diet.There is nop restriction to walking around. From day 2 onwards you can watch tv, Use Computer,play etc.</li><li>It is also important to know that the eye is now in an artificial state and isd not the god given eye,Therefore, please give time for the eye to heal and settle. During The first year, every 6 months the should be checked for possible change of power in the glasses.</li></ol></td></tr><tr><td>&nbsp;</td></tr></tr><tr><td  colspan="3">All of our staff in here at the centre will be happy to help, Should you require any further information.</td></tr><tr><td>&nbsp;</td></tr><tr><td  colspan="3" align="center"><strong>DO NOT RUB THE OPERATED EYE</strong></td></tr><tr><td  colspan="3" align="center"><strong>NOTE:PLEASE BRING ALL THE MEDICINES DURING YOUR NEXT VISIT.</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="35%"><strong>' +"Next Visit Date:"+'</strong>&nbsp;'+nextvisit+'</td><td align="left" width="35%" ><strong>' +"Time:"+'</strong>&nbsp;'+time+'&nbsp;'+timetype+'</td><td align="right" width="30%" ><strong>' +"Ward Sister:"+'</strong>&nbsp;'+wardnurse+'</td></tr><tr><td>&nbsp;</td></tr><tr><td colspan="3" align="center" style="width:100%;"><strong>'+" USE POLARIZED / U.V PROTECTED GOGGLES FOR EYE PROTECTION"+'</strong></td></tr></table></body></html>');
 	
  window.document.close();
	window.location.href = "list_iclsurgery.php";
		})
		.error(function(data, status, headers, config)
		{
			
		});
		
	}
	$scope.Back1=function()
	{
		window.location.href = "list_iclsurgery.php";
	}
	
});


// add the POST OP Cataract Surgery form

var addiclsurgery = angular.module('addiclsurgery',['angularUtils.directives.dirPagination'])
addiclsurgery.controller('addiclsurgeryController', function ($scope, $http) 
{	

$scope.fdate=new Date();


$scope.vigamoxd=function()
{
$scope.vigamox_drop="Vigamox Eye Drops";
}
$scope.vigamox1=function()
{
$scope.vigamox="1 Drop 6 times a day for week";
}
$scope.nevanacd=function()
{
$scope.nevanac_drop="Nevanac Eye drops";
}
$scope.nevanac1=function()
{
$scope.nevanac="1 Drop 4 times a day for 1 Month";
}
$scope.combigant=function()
{
$scope.combigan_drop="Combigan Eye Drops";
}
$scope.combigan1=function()
{
$scope.combigan="1 Drop 2 times a day for 2 weeks";
}
$scope.dolot=function()
{
$scope.dolo_tab="Tab Dolo 650mg";
}
$scope.dolo1=function()
{
$scope.dolo="Tablet 3 times a day for 3 days";
}
$scope.diamoxt=function()
{
$scope.diamox_tab="Tab Diamox 250mg";
}
$scope.diamox1=function()
{
$scope.diamox=" 1 Tablet Twice a day for 3 days";
}
$scope.predforte1=function()
{
$scope.predforte="Pred forte eye drops";
}
	/************************/
	// to get the mrno for preopController
	//Dropdown for MRNO
	$scope.selectedMRNO = null;
	$scope.MRAccounts = [];
	$http({ method: 'GET', url: 'getmrno_iclsurgery.php', data: { applicationId: 3 } })
	.success(function (result)
	{
		$scope.MRAccounts = result;
	});
	
	//Dropdwon for Time Type
	$scope.timetypeArray = ["AM", "PM"];
	//Dropdwon for Pred Forte Eye Drops
	$scope.forteArray = ["1 drop 4 times a day for 1 month 1", "1 drop 3 times a day for 1 Week 1", "1 drop 2 times a day for 1 week","1 drop once a day for 1 week"];
	
	
	
	/*********************/
	$scope.get_patientdetails=function(selectedMRNO){
		$http.post('getpatient_surgery.php', { 'id' :$scope.selectedMRNO}) 
.success(function (data, status, headers, config) { 
 
$scope.PatientName=data[0]["patient_name"];
$scope.surgery=data[0]["operation_name"];



	//$scope.dob=new Date(data[0]["operation_date"]);
	



});
		
		
	}
	
	$scope.add_preop=function(){
		
		var answer = confirm("Do you want to Submit?")
		if (!answer)
		{               
		}
		else
		{
			$http.post('adddb_iclsurgery.php',{ 
			'mrno': $scope.selectedMRNO,
			'name': $scope.PatientName,
			'surgery': $scope.surgery,
			'date': $scope.fdate,
			'vigamoxd': $scope.vigamox_drop,
			'vigamox': $scope.vigamox,
			'nevanacd': $scope.nevanac_drop,
			'nevanac': $scope.nevanac,
			'combigant': $scope.combigan_drop,
			'combigan': $scope.combigan,
			'dolot': $scope.dolo_tab,
			'dolo': $scope.dolo,
			'diamoxt': $scope.diamox_tab,
			'diamox': $scope.diamox,
			'predforte': $scope.predforte,
			'forte': $scope.selectedforte,
			'ndate': $scope.ndate,
			'time': $scope.time,
			'stime': $scope.selectedtime,
			'wardsister': $scope.wardsister,
			
			
			})
			.success(function (data, status, headers, config)
			{
				alert(JSON.stringify(data));
				$scope.content=true;
				window.location.href = "list_iclsurgery.php";
			})
			
			.error(function(data, status, headers, config)
			{
				
			});
		}
	
		
	}
	
});



/********************************/
//POST op Retina Surgery

var listretina = angular.module('retina',['angularUtils.directives.dirPagination'])
listretina.controller('retinaController', function ($scope, $http) 
{
	$scope.view_retina=false;
	$scope.btn_pat=true;
	$scope.list=true;
	//**************list of Counseling starts**************
	$scope.get_retina= function()
	{
     $scope.list=true;
      
		$http.get("load_retinasurgery.php").success(function(data)
		{  
			$scope.pagedItems = data;
	
		});
    }

	$scope.edit_retina=function(index){
		 $scope.view_retina=true;
	         $scope.list=false;
			 $scope.btn_pat=false;
      
$http.post('editdb_preopcheck.php', { 'id' :index}) 
.success(function (data, status, headers, config) { 
		
		
		});
	}


// to print
	$scope.print_patient = function(index)
	{
		
		$scope.list=false;
		
		
		$http.post('editdb_retina.php', { 'id' : index} )
		.success(function (data, status, headers, config)
		{
		var mrno=data[0]["mrno"];
		var name = data[0]["name"];
		var date = data[0]["date"];
		var predforte=data[0]["predforte"];
		var predforted = data[0]["predforted"];
		var vigamox = data[0]["vigamox"];
		var vigamoxd=data[0]["vigamoxd"];
		var atropin=data[0]["atropin"];
		var atropind = data[0]["atropind"];
		var combigan=data[0]["combigan"];
		var combigand = data[0]["combigand"];
		var cifron = data[0]["cifron"];
		var cifront = data[0]["cifront"];
		var dizmox=data[0]["dizmox"];
		var dizmoxd = data[0]["dizmoxd"];


		var timolost=data[0]["timolost"];
		var timolostd = data[0]["timolostd"];
		var dorzox = data[0]["dorzox"];
		var dorzoxd=data[0]["dorzoxd"];
		var optive=data[0]["optive"];
		var optived = data[0]["optived"];
		var waysalone = data[0]["waysalone"];
		var waysalonet = data[0]["waysalonet"];
		var pantod=data[0]["pantod"];
		var pantodt = data[0]["pantodt"];


		var nextvisit = data[0]["nextvisit"];
		var time=data[0]["time"];
		var timetype = data[0]["timetype"];
		var wardnurse = data[0]["wardnurse"];	
	               window.document.open();
 
  window.document.write('<html><head><style type="text/css">body{padding:0 0 0 0;margin:0 auto 0 auto;background-color: #FFFFFF;text-align:center;}@media print{ @page{size:portrait;margin:0 auto 0 auto;background-color: #FFFFFF;}body{margin:0 auto 0 auto;padding:30px 30px 30px 30px;background-color:#FFFFFF;line-height:36px;font-family:Arial;font-weight:400;font-size:13px;color:#000000;width:21cm;height:27.5cm;box-shadow:0 0 30px rgba(50,50,50,0.75);}ol { margin:0px 0px 0px 0px; padding: 0px 0px 0px 0px;} ol li { margin:0px 0px 0px 20px;padding:5px 0px 5px 20px;line-height:1.25em;}}</style></head><body onload="window.print()"><table width="100%"><tr><td colspan="3" align="center" style="width:100%;"><strong style="border-bottom:1px solid #000000;">'+"MAXIVISION EYE HOSPITAL"+'</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td align="center" colspan="3"><strong style="border-bottom:1px solid #000000;">'+"MEDICATION FOR POST OF Retina SURGERY"+'</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%"><strong>' +"MRNO:"+'</strong>&nbsp;'+mrno+'</td><td align="left" width="30%" ><strong>' +"Name:"+'</strong>&nbsp;'+name+'</td><td align="left" width="40%" ><strong>' +"Date:"+'</strong>&nbsp;'+date+'</td></tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="50%">'+predforte+''+'</td><td align="left" width="50%%" colspan="2" >'+predforted+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="50%">'+vigamox+''+'</td><td align="left" width="50%%" colspan="2" >'+vigamoxd+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="50%">'+atropin+''+'</td><td align="left" width="50%%" colspan="2" >'+atropind+''+""+'</td></tr><tr><td>&nbsp;</td></tr></tr><tr><td align="left" width="50%">'+combigan+''+'</td><td align="left" width="50%%" colspan="2" >'+combigand+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="50%">'+cifron+''+'</td><td align="left" width="50%%" colspan="2" >'+cifront+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="50%">'+timolost+''+'</td><td align="left" width="50%%" colspan="2" >'+timolostd+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="50%">'+dorzox+''+'</td><td align="left" width="50%%" colspan="2" >'+dorzoxd+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="50%">'+optive+''+'</td><td align="left" width="50%%" colspan="2" >'+optived+''+""+'</td></tr><tr><td>&nbsp;</td></tr></tr><tr><td align="left" width="50%">'+waysalone+''+'</td><td align="left" width="50%%" colspan="2" >'+waysalonet+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="50%">'+pantod+''+'</td><td align="left" width="50%%" colspan="2" >'+pantodt+''+""+'</td></tr><tr><td>&nbsp;</td></tr><tr><td colspan="3" align="center" style="width:100%;"><strong style="border-bottom:1px solid #000000;">'+"WHAT SHOULD BE EXPECTED AFTER TREATMENT"+'</strong></td></tr><tr><td colspan="3"><ol><li>It is quite likely that you will have mild Discomfort possibly with watering for the first 24 hrs.</li><li>Experience has shown that best approach to rest both eyes for first 2 days whenever possible as reading and watching TV will tend to irritate the treated eye.</li><li>The most important thing with cataract  operation is never to rub the eye for one week.</li><li>After the cataract operation procedure you can start taking bath/Shower from day 2 onwards without letting any soap water into the eyes.You can start takinh headbath from day3 onwards.</li><li>While sleeping you can sleep on either side.</li><li>There is no restriction on diet.There is nop restriction to walking around. From day 2 onwards you can watch tv, Use Computer,play etc.</li><li>It is also important to know that the eye is now in an artificial state and isd not the god given eye,Therefore, please give time for the eye to heal and settle. During The first year, every 6 months the should be checked for possible change of power in the glasses.</li></ol></td></tr><tr><td>&nbsp;</td></tr></tr><tr><td  colspan="3" align="center"><strong>DO NOT RUB THE OPERATED EYE</strong></td></tr><tr><td  colspan="3" align="center"><strong>NOTE:PLEASE BRING ALL THE MEDICINES DURING YOUR NEXT VISIT.</strong></td></tr><tr><td colspan="3" align="center"><strong>FOR ANY INSSISTANCE PLEASE CONTACT: 9392155678</strong></td></tr><tr><td>&nbsp;</td></tr><tr><td align="left" width="30%"><strong>' +"Next Visit Date:"+'</strong>&nbsp;'+nextvisit+'</td><td align="left" width="30%" ><strong>' +"Time:"+'</strong>&nbsp;'+time+'&nbsp;'+timetype+'</td><td align="left" width="40%" ><strong>' +"Ward Sister:"+'</strong>&nbsp;'+wardnurse+'</td></tr></table></body></html>');
 	
  window.document.close();
	window.location.href = "list_retinasurgery.php";
		})
		.error(function(data, status, headers, config)
		{
			
		});
		
	}
	$scope.Back1=function()
	{
		window.location.href = "list_retinasurgery.php.php";
	}
	
});


// add the POST OP Cataract Surgery form

var addretinasur = angular.module('retinasur',['angularUtils.directives.dirPagination'])
addretinasur.controller('retinasurController', function ($scope, $http) 
{

$scope.fdate=new Date();


$scope.vigamoxd=function()
{
$scope.vigamox_drop="Moxoft / Vigamox / Zymaxid Eye Drops";
}
$scope.vigamox1=function()
{
$scope.vigamox="1 Drop every hour 12 times a for week";
}
$scope.atropind=function()
{
$scope.atropin_drop="Atropin / Homide Eye drops";
}
$scope.atropin1=function()
{
$scope.atropin="1 Drop 3 times a day for 1 week";
}
$scope.combigand=function()
{
$scope.combigan_drop=" Brimocom / Combigan Briopt Eye Drops";
}
$scope.combigan1=function()
{
$scope.combigan="1 Drop 2 times a day";
}
$scope.cifront=function()
{
$scope.cifron_tab="Cifron 500 mg Tablet";
}
$scope.cifron1=function()
{
$scope.cifron="1 Tablet Twice a day for 5 days";
}
$scope.dizmoxt=function()
{
$scope.dizmox_tab="Dizmox 250mg Tablet";
}
$scope.dizmox1=function()
{
$scope.dizmox=" 2 Tablets Twice a day for 3 days";
}
$scope.timolostd=function()
{
$scope.timolost_drop="Timolost 0.5% Eye Drops";
}
$scope.timolost1=function()
{
$scope.timolost="Once Daily at Bed Time";
}
$scope.dorzoxd=function()
{
$scope.dorzox_drop="Dorzox eye drops";
}
$scope.dorzox1=function()
{
$scope.dorzox=" 1 drop 3 times a day";
}
$scope.optived=function()
{
$scope.optive_drop="Optive / Refresh TS / Veldrop eye drops";
}
$scope.optive1=function()
{
$scope.optive=" 1 drop 4 times a day";
}
$scope.waysalonet=function()
{
$scope.waysalone_tab="Waysolone 70/60/50/40/30/20/10 tablets";
}
$scope.waysalone1=function()
{
$scope.waysalone="Once Daily after Break fast";
}
$scope.pantodt=function()
{
$scope.pantod_tab="Panto - D 40 mg tablet";
}
$scope.pantod1=function()
{
$scope.pantod="Once Daily Before Break fast";
}

$scope.predforte1=function()
{
$scope.predforte="Pred forte eye drops";
}
	/************************/
	// to get the mrno for preopController
	//Dropdown for MRNO
	$scope.selectedMRNO = null;
	$scope.MRAccounts = [];
	$http({ method: 'GET', url: 'getmrno_retina.php', data: { applicationId: 3 } })
	.success(function (result)
	{
		$scope.MRAccounts = result;
	});
	
	//Dropdwon for Time Type
	$scope.timetypeArray = ["AM", "PM"];
	//Dropdwon for Pred Forte Eye Drops
	$scope.forteArray = ["1 drop every hour 12 times a day for 1 week", "1 drop 10 times a day for 1 Week 1", "1 drop 8 times a day for 1 week","1 drop 6 times a day for 1 week","1 drop 5 times a day for 1 week","1 drop 4 times a day for 1 week","1 drop 3 times a day for 1 week","1 drop 2 times a day for 1 week","1 drop once a day for 1 week"];
	
	
	
	/*********************/
	$scope.get_patientdetails=function(selectedMRNO){
		$http.post('getpatient_surgery.php', { 'id' :$scope.selectedMRNO}) 
		.success(function (data, status, headers, config) { 
 		$scope.PatientName=data[0]["patient_name"];
		$scope.surgery=data[0]["operation_name"];
		});
	}
	
	$scope.add_preop=function(){
		
		var answer = confirm("Do you want to Submit?")
		if (!answer)
		{               
		}
		else
		{
			$http.post('adddb_retina.php',{ 
			'mrno': $scope.selectedMRNO,
			'name': $scope.PatientName,
			'surgery': $scope.surgery,
			'date': $scope.fdate,
			'vigamoxd': $scope.vigamox_drop,
			'vigamox': $scope.vigamox,
			'atropind': $scope.atropin_drop,
			'atropin': $scope.atropin,
			'combigand': $scope.combigan_drop,
			'combigan': $scope.combigan,
			'cifront': $scope.cifron_tab,
			'cifron': $scope.cifron,
			'dizmoxt': $scope.dizmox_tab,
			'dizmox': $scope.dizmox,
			'timolostd': $scope.timolost_drop,
			'timolost': $scope.timolost,
			'dorzoxd': $scope.dorzox_drop,
			'dorzox': $scope.dorzox_drop,
			'optived': $scope.optive_drop,
			'optive': $scope.optive,
			'waysalonet': $scope.waysalone_tab,
			'waysalone': $scope.waysalone,
			'pantodt': $scope.pantod_tab,
			'pantod': $scope.pantod,
			'predforte': $scope.predforte,
			'forte': $scope.selectedforte,
			'ndate': $scope.ndate,
			'time': $scope.time,
			'stime': $scope.selectedtime,
			'wardsister': $scope.wardsister,
			
			
			})
			.success(function (data, status, headers, config)
			{
				alert(JSON.stringify(data));
				$scope.content=true;
				window.location.href = "list_retinasurgery.php";
			})
			
			.error(function(data, status, headers, config)
			{
				
			});
		}
	
		
	}
	
});


/***************************************************************************************************************************/


var addcataractnote = angular.module('addcataractnotes',['angularUtils.directives.dirPagination'])
addcataractnote.controller('addcatanotescontroller', function ($scope, $http) 
{

	
	$scope.incissionArray = ["Superior", "Temporal","Corneal", "Limbal","Scleral", "Others"];

	$scope.selectedMRNO = null;
	$scope.MRAccounts = [];
	$http({ method: 'GET', url: 'getmrno_cataractnotes.php', data: { applicationId: 3 } })
	.success(function (result)
	{
		$scope.MRAccounts = result;
	});
	/*********************/
	$scope.get_patientdetails=function(selectedMRNO){
		$http.post('getcataractnotes.php', { 'id' :$scope.selectedMRNO}) 
		.success(function (data, status, headers, config) { 
 		$scope.PatientName=data[0]["patient_name"];
 		$scope.age=data[0]["age"];
 		$scope.gender=data[0]["gender"];
		});
	}
	//to remove the row 
		
		  $scope.removeRow = function(name){
          var index = -1;
          var comArr = eval( $scope.data );
		  
		  
          for( var i = 0; i < comArr.length; i++ ) {
                if( comArr[i].name === name ) {
					
                    index = i;
                    break;
                 }
          }
          if( index === -1 ) {
               
          }
          $scope.data.splice( index, 1 );
       };
		
		
		// dynamic row creation 
	$scope.data = [{}];
	
	 $scope.addFormField = function() {
		 
	 
            $scope.data.push({});
			//alert($scope.data.length);
		    //$scope.tableParams.append();
			

		}

});

var addTrab = angular.module('addtrab',['angularUtils.directives.dirPagination'])
addTrab.controller('addtrabcontroller', function ($scope, $http) 
{

//to remove the row 
		
$scope.injuctionArray = ["Normal", "Temporal","Superior", "Others"];
$scope.positionArray = ["Superior", "Temporal","Others"];
$scope.shapeArray = ["Rectangular", "Squre","Triangle","trapezoidal"];
$scope.acformationArray = ["Air", "bative"];
$scope.conjunctivalArray = ["10-0 nylon", "8-0","others"];
$scope.typeArray = ["Interrupted","Continuous"];

	$scope.MRAccounts = [];
	$http({ method: 'GET', url: 'getmrno_cataractnotes.php', data: { applicationId: 3 } })
	.success(function (result)
	{
		$scope.MRAccounts = result;
	});
	/*********************/
	$scope.get_patientdetails=function(selectedMRNO){
		$http.post('getcataractnotes.php', { 'id' :$scope.selectedMRNO}) 
		.success(function (data, status, headers, config) { 
 		$scope.PatientName=data[0]["patient_name"];
 		$scope.age=data[0]["age"];
 		$scope.gender=data[0]["gender"];
		});
	}

		  $scope.removeRow = function(name){
          var index = -1;
          var comArr = eval( $scope.data );
		  
		  
          for( var i = 0; i < comArr.length; i++ ) {
                if( comArr[i].name === name ) {
					
                    index = i;
                    break;
                 }
          }
          if( index === -1 ) {
               
          }
          $scope.data.splice( index, 1 );
       };
		
		
		// dynamic row creation 
	$scope.data = [{}];
	
	 $scope.addFormField = function() {
		 
	 
            $scope.data.push({});
			//alert($scope.data.length);
		    //$scope.tableParams.append();
			

		}
$scope.add_preop=function(){
		var answer = confirm("Do you want to Submit?")
		if (!answer)
		{               
		}
		else
		{


$http.post('adddb_trab.php', { 'id' :selectedMRNO}) 
.success(function (data, status, headers, config) { 

	$scope.selectedMRNO=data[0]["selectedMRNO"];
	$scope.PatientName=data[0]["PatientName"];
	$scope.age=data[0]["age"];
	$scope.gender=data[0]["gender"];
	$scope.date=data[0]["date"];
	$scope.oprno=data[0]["oprno"];
	$scope.caseno=data[0]["caseno"];
	$scope.stime=data[0]["stime"];
	$scope.etime=data[0]["etime"];
	$scope.surgeon=data[0]["surgeon"];
	$scope.assistant=data[0]["assistant"];
	$scope.sn=data[0]["sn"];
	$scope.anaesthesiologist=data[0]["anaesthesiologist"];
	$scope.preop_diagnosis=data[0]["preop_diagnosis"];
	$scope.batchno=data[0]["batchno"];
	$scope.addi_proc=data[0]["addi_proc"];
	$scope.Concentration=data[0]["Concentration"];
	$scope.ctime=data[0]["ctime"];
	$scope.cbatchno=data[0]["cbatchno"];
	$scope.dilution=data[0]["dilution"];
	$scope.thickness=data[0]["thickness"];
	$scope.suturematerial=data[0]["suturematerial"];
	$scope.selectedacformation=data[0]["selectedacformation"];
	$scope.selectedconjunctival=data[0]["selectedconjunctival"];
	$scope.selectedtype=data[0]["selectedtype"];
	$scope.selectedinjuction=data[0]["selectedinjuction"];
	$scope.selectedposition=data[0]["selectedposition"];
	$scope.selectedshape=data[0]["selectedshape"];
	$scope.dilation=data[0]["dilation"];
	$scope.mitomycin=data[0]["mitomycin"];
	$scope.paracentesis=data[0]["paracentesis"];
	$scope.scleral=data[0]["scleral"];
	$scope.peripheral=data[0]["peripheral"];

	$scope.od=function ()
	{
	    var checked = false;
	    if(data[0]["od"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.os=function ()
	{
	    var checked = false;
	    if(data[0]["os"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.bss=function ()
	{
	    var checked = false;
	    if(data[0]["bss"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.rl=function ()
	{
	    var checked = false;
	    if(data[0]["rl"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.surgerytrab=function ()
	{
	    var checked = false;
	    if(data[0]["surgerytrab"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.surgerysics=function ()
	{
	    var checked = false;
	    if(data[0]["surgerysics"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.surgeryecce=function ()
	{
	    var checked = false;
	    if(data[0]["surgeryecce"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.surgeryicce=function ()
	{
	    var checked = false;
	    if(data[0]["surgeryicce"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.general=function ()
	{
	    var checked = false;
	    if(data[0]["general"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.peribular=function ()
	{
	    var checked = false;
	    if(data[0]["peribular"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.topical=function ()
	{
	    var checked = false;
	    if(data[0]["topical"])
	    {
	    	checked = true;
	    }
	    return checked;
	};

	$scope.betadine=function ()
	{
	    var checked = false;
	    if(data[0]["betadine"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.sterile=function ()
	{
	    var checked = false;
	    if(data[0]["sterile"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.castorviejo=function ()
	{
	    var checked = false;
	    if(data[0]["castorviejo"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.wire=function ()
	{
	    var checked = false;
	    if(data[0]["wire"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.superior=function ()
	{
	    var checked = false;
	    if(data[0]["superior"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.inferior=function ()
	{
	    var checked = false;
	    if(data[0]["inferior"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.corneal=function ()
	{
	    var checked = false;
	    if(data[0]["corneal"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.general=function ()
	{
	    var checked = false;
	    if(data[0]["general"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
	$scope.Peribulbar=function ()
	{
	    var checked = false;
	    if(data[0]["Peribulbar"])
	    {
	    	checked = true;
	    }
	    return checked;
	};
			
		})

}
}

});

var addDalk = angular.module('adddalk',['angularUtils.directives.dirPagination'])
addDalk.controller('adddalkcontroller', function ($scope, $http) 
{

//to remove the row 
		
		  $scope.removeRow = function(name){
          var index = -1;
          var comArr = eval( $scope.data );
		  
		  
          for( var i = 0; i < comArr.length; i++ ) {
                if( comArr[i].name === name ) {
					
                    index = i;
                    break;
                 }
          }
          if( index === -1 ) {
               
          }
          $scope.data.splice( index, 1 );
       };
		
		
		// dynamic row creation 
	$scope.data = [{}];
	
	 $scope.addFormField = function() {
		 
	 
            $scope.data.push({});
			//alert($scope.data.length);
		    //$scope.tableParams.append();
			

		}
		



});


// DESK MODULE starts

var adddesk = angular.module('adddesk',['angularUtils.directives.dirPagination'])
adddesk.controller('adddeskcontroller', function ($scope, $http) 
{

//to remove the row 
		
		  $scope.removeRow = function(name){
          var index = -1;
          var comArr = eval( $scope.data );
		  
		  
          for( var i = 0; i < comArr.length; i++ ) {
                if( comArr[i].name === name ) {
					
                    index = i;
                    break;
                 }
          }
          if( index === -1 ) {
               
          }
          $scope.data.splice( index, 1 );
       };
		
		
		// dynamic row creation 
	$scope.data = [{}];
	

	
      
		 
		
	
	
	 $scope.addFormField = function() {
		 
	 
            $scope.data.push({});
			//alert($scope.data.length);
		    //$scope.tableParams.append();
			

		}
		



});


/***************************************************************************************************************************/
