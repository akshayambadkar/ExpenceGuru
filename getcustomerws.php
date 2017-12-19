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
                $jsonTempData['getcustomer']         = "failed to connect";
	}

	$result=array();
	
	$qur = mysqli_query($conn,"SELECT `customer_Id`, `customer_Name`, `customer_Type`, `phone_Number` FROM `CustomerDetails` ");

	while($r = mysqli_fetch_array($qur)){
		extract($r);
		if($customer_Id){					
    			$result[] = array("customer_Id" => $customer_Id, "customer_Name" => $customer_Name,"customer_Type" => $customer_Type,"phone_Number" => $phone_Number); 
		}else{
			$result[] = array("customer_Id" => "failed");
		}
	}
		
	     
	     $outputArr = array();
	     $outputArr['getcustomer'] = $result;	    
	      
	     // Encode Array To JSON Data
	     print_r( json_encode($outputArr));
	      
 
 ?>