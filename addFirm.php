<?php header('Access-Control-Allow-Origin: *');
 
// Get Post Data
       $capturefirmid_s= urldecode($_POST['capturefirmid_s']);
       $captureuserid_s= urldecode($_POST['captureuserid_s']);
       $capturefirmname_s= urldecode($_POST['capturefirmname_s']);
       $capturefirmmanager_s= urldecode($_POST['capturefirmmanager_s']);
       $capturefirmphone_S= urldecode($_POST['capturefirmphone_S']);
       $capturefirmaddress_S= urldecode($_POST['capturefirmaddress_S']);
         
       $jsonData      = array();
       $jsonTempData  = array();       

$conn = mysqli_connect("treeapp.marketin.co.in","ExpenceGuru1","ExpenceGuru1","ExpenceGuru");	
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
                $jsonTempData['addFirm']         = "failed to connect";
	}
	
              $qur = mysqli_query($conn,"INSERT INTO `FirmDetails`(`user_Id`, `firm_Name`, `manager`, `phone_Number`, `address`) VALUES ('".$captureuserid_s."','".$capturefirmname_s."', '".$capturefirmmanager_s."' ,'".$capturefirmphone_S."', '".$capturefirmaddress_S."')");
           

	
			if($qur == 1){                                                           
			     $jsonTempData['addFirm']         = "success"; 					
			}else{
				
			     $jsonTempData['addFirm']         = "failed"; 
			}
                
          $jsonData[] = $jsonTempData;
    
     
     $outputArr = array();
     $outputArr['addFirm'] = $jsonData;
      
     // Encode Array To JSON Data
     print_r( json_encode($outputArr));
      
 
 ?>