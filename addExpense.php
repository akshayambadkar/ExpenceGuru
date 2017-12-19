<?php header('Access-Control-Allow-Origin: *');
 
// Get Post Data
       $useid= urldecode($_POST['userid']);
       $capturecustcodeinexp_s= urldecode($_POST['capturecustcodeinexp_s']);
       $captureexpamount_s= urldecode($_POST['captureexpamount_s']);
       $captureexptype_s= urldecode($_POST['captureexptype_s']);
       $captureexpisdebit_s= urldecode($_POST['captureexpisdebit_s']);
         
       $jsonData      = array();
       $jsonTempData  = array();       

$conn = mysqli_connect("treeapp.marketin.co.in","ExpenceGuru1","ExpenceGuru1","ExpenceGuru");	
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
                $jsonTempData['addexpences']         = "failed to connect";
	}
	
              $qur = mysqli_query($conn,"INSERT INTO `Expenses`( `user_Id`, `customer_Id`, `amount`, `expense_Type`, `is_Debit`) values  ( '".$userid."' , '".$capturecustcodeinexp_s."' , '".$captureexpamount_s."' ,'".$captureexptype_s."', ".$captureexpisdebit_s.")");
           
			if($qur == 1){                                                           
			     $jsonTempData['addexpences']         = "success"; 					
			}else{
				
			     $jsonTempData['addexpences']         = "failed"; 
			}
                
          $jsonData[] = $jsonTempData;
    
     
     $outputArr = array();
     $outputArr['addexpences'] = $jsonData;
      
     // Encode Array To JSON Data
     print_r( json_encode($outputArr));
      
 
 ?>