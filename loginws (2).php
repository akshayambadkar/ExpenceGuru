<?php header('Access-Control-Allow-Origin: *');
 
    // Get Post Data
 
       $user   = urldecode($_GET['user']);
       $pass   = urldecode($_GET['pass']);
       
	$conn = mysqli_connect("treeapp.marketin.co.in","ExpenceGuru1","ExpenceGuru1","ExpenceGuru");	
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

   	$jsonTempData  = array();


	$qur = mysqli_query($conn,"SELECT count(user_Id) as usercount FROM  UserDetails WHERE  user_Name = '".$user."' and password = '".$pass."'");

	$result =array();

	
 
   while($r = mysqli_fetch_array($qur)){
			extract($r);
			if($usercount ==1){
                               			
				$jsonTempData['login']  = "success"; 
			}else{
				
			     $jsonTempData['login']     = "failes"; 
			}
                 }
 
 
          $jsonData[] = $jsonTempData;
   
     $outputArr = array();
     $outputArr['Android'] = $jsonData;
      
     // Encode Array To JSON Data
     print_r( json_encode($outputArr));
      
 
 ?>