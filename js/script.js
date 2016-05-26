// Packages Master starts Here

//created by:Sushant
//18-AUG-15
 
 

 
var appPackages = angular.module('appPackages',['angularUtils.directives.dirPagination','ui.tinymce','ngSanitize']) 
appPackages.controller('ctrlPackages', function ($scope, $http) 
{
  $scope.table1=true;
    $scope.add_Package=true;
	//********************** add the Packages data starts***************************
		$scope.submitData = function () 
		{

			$scope.btn_update = false;
			var answer = confirm("Do you want to Submit?")
			if (!answer) {window.location.href="packages.php";	  }
			else{	
			 $http.post('adddb_packages.php', 
						{
							'packages':$scope.packages,
							'description':$scope.description,
							'file': $scope.parentCtrl.childCtrl.message
						   
							}
					  )
					.success(function (data, status, headers, config) { 
					  // alert(JSON.stringify(data));
					   alert("Data has been Added Successfully"); 
						 window.location.href="packages.php";				   
					  
					})
					.error(function(data, status, headers, config){

					});
				}
		}
		
	//*********************** add the Packages data ends ********************************
	//Child controller for file upload
appPackages.controller('ChildController',function ($scope, $http, $upload)
{
	$scope.parentCtrl.childCtrl = $scope.childCtrl;
	$scope.onFileSelect = function($files)
	{
		$scope.message = "";
		for (var i = 0; i < $files.length; i++)
		{
			var file = $files[i];
			console.log(file);
			$scope.upload = $upload.upload({ url: 'upload.php',method: 'POST',file: file }).success(function(data, status, headers, config)
			{
				$scope.message = data;
				$scope.message=$scope.message.replace('\"', '');
				$scope.childCtrl.message=$scope.message.replace('\"', '');
			})
			.error(function(data, status)
			{
				$scope.message = data;
			});
		}
	};
});
	
	
	
	//**************list of packages starts**************
	$scope.get_packages = function()
	{
		 $scope.btn_package=true;
		$http.get("load_package.php").success(function(data)
		{  
			$scope.pagedItems = data;
		});
    }
	//**************list of packages starts**************

	
	//*****************edit part of package start ****************************
	$scope.edit_package= function(index)
	{ 
			
			$scope.btn_update = true;
			$scope.btn_package = false;
			$scope.add_Package = false;
      
			$http.post('editdb_packages.php', { 'id' :index}) 
			.success(function (data, status, headers, config) 
			{ 
			//alert(data[0]["description"]);
			$scope.id = data[0]["id"];
			$scope.packages = data[0]["name"];
			$scope.description = data[0]["description"];
			$scope.description = $sce.trustAsHtml("&copy; Acme");
	
			window.parent.tinymce.get('description').getContent();
			})
			.error(function(data, status, headers, config)
			{
 			});
	}

	//*****************edit part of package ends****************************

	//*****************view part of package start ****************************
	$scope.view_package= function(index)
	{ 
			$scope.table1=false;
			$scope.btn_update = false;
			$scope.btn_package = false;
			$scope.add_Package = false;
			$scope.cancelData = false;

      	
			$http.post('viewdb_packages.php', { 'id' :index}) 
		
			.success(function (data, status, headers, config) 
			{ 
			//alert(data[0]["id"]);
			
			$scope.packages = data[0]["name"];
			$scope.id = data[0]["id"];
			$scope.description = data[0]["description"];
			})
			.error(function(data, status, headers, config)
			{
 			});
	}

	//*****************view part of package ends****************************
	
	
	// function to update package details after edit from list of package referencing php //

    $scope.update_package = function() {
 var y = confirm("DO you want update ?");
     if(y){
        $http.post('updatedb_package.php', 
                    {
                        'id'            : $scope.id,
                        'packages'      : $scope.packages, 
                        'description'   : $scope.description, 
                    }
                  )
                .success(function (data, status, headers, config) {                 
               //  alert(JSON.stringify(data));
                   alert("Data has been Updated Successfully");
				   window.location.href="packages.php";
                })
                .error(function(data, status, headers, config){

                });
	 }
	 else{
		 
	 }
    }
	
	
	
	/** function to delete package from list of package referencing php **/
 
    $scope.delete_package = function(index) {  
     var x = confirm("Do you want to delete record ?");
     if(x){
      $http.post('deletedb_package.php', 
            {
                'id'     : index
            }
        )      
        .success(function (data, status, headers, config) {               
             
             alert("You have deleted record Successfully");
			 window.location.href="packages.php";
        })
 
        .error(function(data, status, headers, config){
           
        });
      }
	  else{
            
			
      }
    }
	
	
	$scope.cancelData=function()
	{
		var agree=confirm("Do you want to Cancel?");
		
		if(agree)
		{
			//alert("hi");
		}
		else
		{
			//alert("hello");			
		}
		
	};
	
	
		
});
