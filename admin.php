<?php
session_start();
	include("php/config.php");
   
   
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['loginSubmit'])) {
      // username and password sent from form 
      



      $user = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));
      $pass = mysqli_real_escape_string($db,htmlspecialchars($_POST['password'])); 

   		
   		$query = "SELECT username, tip_admina_id FROM admin WHERE username=? AND password=?";
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
             $_SESSION['role'] = $col2;
		         $errMessage = "";
		         
		         
		      }else {
		         $errMessage = "Pogrešni pristupni podaci";
             
		      }

    		}
        	
		

      
      
       
   }
   else if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['logoutSubmit']))
   {
      // logout

      if(session_destroy()) 
        header("Location: admin.php");
   
   }

   ?>
   <head>
  <meta charset="utf-8">
</head>
  <?php

	if(isset($_SESSION['username']) and isset($_SESSION['role']))
  {

    if($_SESSION['role'] == 1)
    {
     // general admin
		include("php/adminPrijave.php");
    }
  }
	else
		include("php/login.php");


?>