<?php header('Access-Control-Allow-Origin: *');
 
 
    // Get Post Data
 
              
        $jsonData      = array();
        $jsonTempData  = array();    
	$statusData      = array();
	
	
	$conn = mysqli_connect("treeapp.marketin.co.in","ExpenceGuru1","ExpenceGuru1","ExpenceGuru");	
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
                $jsonTempData['getfirm']         = "failed to connect";
	}

	$result=array();
	
	$qur = mysqli_query($conn,"SELECT `firm_Id`, `firm_Name`, `manager`, `phone_Number`, `address` FROM `FirmDetails` ");

	while($r = mysqli_fetch_array($qur)){
		extract($r);
		if($firm_Id){					
    			$result[] = array("firm_Name" => $firm_Name,"manager" => $manager,"phone_Number" => $phone_Number,"address" => $address); 
		}else{
			$result[] = array("firm_Id" => "failed");
		}
	}
		
	     
	     $outputArr = array();
	     $outputArr['getfirm'] = $result;	    
	      
	     // Encode Array To JSON Data
	     print_r( json_encode($outputArr));
	      
 
 ?>