<?php 

session_start();

?>

<head>
	<meta charset="utf-8">
  
</head>

<?php

if(!isset($_SESSION['username']) or !isset($_SESSION['role']))
{
	header('Location: ../admin.php');
}

else if($_SESSION['role'] != 1) // general admin
{
		header('Location: ../admin.php');
    }

    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
    	$participantId = htmlspecialchars($_GET['id']);
    	include("./config.php");

    	$query = "SELECT * FROM participant WHERE id=?";
   		$stmt = $db->stmt_init();
   		if(!$stmt->prepare($query))
		{
   			print "Failed to prepare statement\n";
		}
		else

		{

			$stmt->bind_param("i", $participantId);
			$stmt->execute();

        	$stmt->bind_result($id1, $ime, $prezime, $tel, $dat, $email, $majica);
        	
        	echo '<h2>Osnovni podaci</h2>';
        	echo '<br><br>';

        	while ($stmt->fetch()) {
        		echo $ime . ' ' . $prezime;
                echo '<br>';
                echo '<b>Datum rođenja: </b>' . $tel;
                echo '<br>';
                echo '<b>Broj telefona: </b>' . $dat;
                echo '<br>';
                echo '<b>Email adresa: </b>' . $email;
                echo '<br>';
                echo '<b>Veličina majice: </b>' . $majica;
                echo '<br>';

                
                echo '<br>';
                echo '<br>';
                echo '--------------------------------------------------------------';
                echo '<br><br>';
    		}

    	}




    		$query = "SELECT fakultet_id, odsjek, godina_studija FROM participant_has_fakultet WHERE participant_id=?";
   		$stmt = $db->stmt_init();
   		if(!$stmt->prepare($query))
		{
   			print "Failed to prepare statement\n";
		}
		else

		{

			$stmt->bind_param("i", $participantId);
			$stmt->execute();

        	$stmt->bind_result($idFaksa, $odsjek, $godina);
        	
        	echo '<h2>Podaci o obrazovanju</h2>';
        	echo '<br><br>';


        	while ($stmt->fetch()) {
        		$idFaksa1 = $idFaksa;
        		$odjsek1 = $odsjek;
        		$godina1 = $godina;

        	}

        }
        	
        		$query = "SELECT naziv FROM fakultet WHERE id=?";
   		$stmt = $db->stmt_init();
   		if(!$stmt->prepare($query))
		{
   			print "Failed to prepare statement\n";
		}
		else

		{

			$stmt->bind_param("i", $idFaksa);
			$stmt->execute();

        	$stmt->bind_result($nazivFaksa);
        	
        	echo '<h3>Podaci o fakultetu</h3>';

        	while ($stmt->fetch()) {
        		
                echo '<b>Fakultet: </b>' . $nazivFaksa;
                echo '<br>';
                echo '<b>Odsjek: </b>' . $odsjek;
                echo '<br>';
                echo '<b>Godina studija: </b>' . $godina;
                echo '<br>';
                echo '<br>';
                
    		}

        		
    		}

    		// engleski

    		echo '<h3>Engleski jezik</h3>';

    		$query = "SELECT razumijevanje, govor FROM participant_has_jezik WHERE participant_id=?";
   		$stmt = $db->stmt_init();
   		if(!$stmt->prepare($query))
		{
   			print "Failed to prepare statement\n";
		}
		else

		{

			$stmt->bind_param("i", $participantId);
			$stmt->execute();

        	$stmt->bind_result($raz, $gov);
        	
        	

        	while ($stmt->fetch()) {
        		
                echo '<b>Razumijevanje: </b>' . $raz;
                echo '<br>';
                echo '<b>Govor: </b>' . $gov;
                echo '<br><br><br>';
                echo '--------------------------------------------------------------';
                echo '<br><br>';
                
                
    		}

        		
    		}

    		// ostalo

    		echo '<h2>Motivaciono pismo</h2>';

    		$query = "SELECT motivaciono_pismo, ss_iskustvo, seminari_iskustvo, nvo_iskustvo, napomene, ranije_ucesce, radno_iskustvo, trenutno_zaposlenje, kako_id FROM prijava WHERE participant_id=?";
   		$stmt = $db->stmt_init();
   		if(!$stmt->prepare($query))
		{
   			print "Failed to prepare statement\n";
		}
		else

		{

			$stmt->bind_param("i", $participantId);
			$stmt->execute();

        	$stmt->bind_result($mot, $ss, $semin, $nvo, $nap, $ranije, $radno, $trenutno, $kako);
        	
        	

        	while ($stmt->fetch()) {
        		
                echo '<p>' . $mot . '</p>';
                echo '--------------------------------------------------------------';
                echo '<br><br>';

                echo '<h2>Prethodno iskustvo</h2>';
                $ss1 = $ss;
                $semin1 = $semin;
                $nvo1 = $nvo;
                $nap1 = $nap;
                $ranije1 = $ranije;
                $radno1 = $radno;
                $trenutno1 = $trenutno;
                $kako_id1 = $kako;
                
                
    		}

        		
    		}

    		$query = "SELECT naziv FROM kakostesaznali WHERE id=?";
   		$stmt = $db->stmt_init();
   		if(!$stmt->prepare($query))
		{
   			print "Failed to prepare statement\n";
		}
		else

		{

			$stmt->bind_param("i", $kako_id1);
			$stmt->execute();

        	$stmt->bind_result($kakoNaziv);
        	
        	

        	while ($stmt->fetch()) {
        		
               
        		echo '<b>Ranije učešće na SSA: </b>';
        		if($ranije1 == 1) echo "DA";
        		else echo "NE";
                echo '<br>';
            	echo '<b>Kako ste saznali za SSA: </b>' . $kakoNaziv;
            	echo '<br>';
            	echo '<b>Radno iskustvo: </b><p>' . $radno1 . '</p>';
            	echo '<br>';
            	echo '<b>Trenunto zaposlenje: </b>';
        		if($trenutno1 == 1) echo "DA";
        		else echo "NE";
        		echo '<br>';
        		echo '<b>Učešče na soft skills treninzima: </b><p>' . $ss1 . '</p>';
            	echo '<br>';
            	echo '<b>Učešće na seminarima: </b><p>' . $semin1 . '</p>';
            	echo '<br>';
            	echo '<b>Iskustvo u NVO: </b><p>' . $nvo1 . '</p>';
            	echo '--------------------------------------------------------------';
                echo '<br><br>';


            	echo '<b>Dodatne napomene: </b><p>' . $nap1 . '</p>';
            	
                
                
    		}

        		
    		}



    }
  

?>