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
                $jsonTempData['getexpanse']         = "failed to connect";
	}

	$result=array();
	
	$qur = mysqli_query($conn,"SELECT `expenses_Id`, `amount`, `expense_Type`, `is_Debit` FROM `Expenses`");

	while($r = mysqli_fetch_array($qur)){
		extract($r);
		if($expenses_Id){					
    			$result[] = array("expenses_Id" => $expenses_Id, "amount" => $amount,"expense_Type" => $expense_Type,"is_Debit" => $is_Debit); 
		}else{
			$result[] = array("expenses_Id" => "failed");
		}
	}
		
	     
	     $outputArr = array();
	     $outputArr['getexpanse'] = $result;	    
	      
	     // Encode Array To JSON Data
	     print_r( json_encode($outputArr));
	      
 
 ?>