<head>
	<meta charset="utf-8">
  
</head>


<?php
	include("php/config.php");
   session_start();
   $user = "";
   $pass = "";
   $errMessage = "";
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      



      $user = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));
      $pass = mysqli_real_escape_string($db,htmlspecialchars($_POST['password'])); 

   		
   		$query = "SELECT username, password FROM admin WHERE username=? AND password=?";
   		$stmt = $db->stmt_init();
   		if(!$stmt->prepare($query))
		{
   			print "Failed to prepare statement\n";
		}
		else

		{

			$stmt->bind_param("ss", $user, md5($pass));
			$stmt->execute();

        	$stmt->bind_result($col1, $col2);
        	$count = 0;
        	while ($stmt->fetch()) {
        		$count++;
    		}

    		if($count == 1)
    		{
    			// tacni log in podaci

    			
		         $_SESSION['username'] = $user;
		         $errMessage = "";
		         
		         
		      }else {
		         $errMessage = "Pogrešni pristupni podaci";
		      }

    		}
        	
		

      
      
       
   }

	if(isset($_SESSION['username']))
		include("php/adminPanel.php");
	else
		include("php/login.php");


?>