<?php 

session_start();
if(!isset($_SESSION['username']) or !isset($_SESSION['role']))
{
    header('Location: ../admin.php');
}

else if($_SESSION['role'] != 1) // general admin
{
        header('Location: ../admin.php');
    }

?>

<head>
	<meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="../css/print.css" media="print"/>

  
</head>

<html>
<body>

<div class="row">
    <div class="container-fluid">
        <div class="col-xs-12 col-md-6">

<?php



    if($_SERVER["REQUEST_METHOD"] == "GET")
    {

        echo '<a class="inv" href="../admin.php"><-- Sve prijave</a><br><br>';
        echo '<a  class="inv" href="javascript:window.print()" >
            Print/Export to PDF
          </a>';


    	$participantId = htmlspecialchars($_GET['id']);
    	include("./config.php");

    	$query = "SELECT p.ime, p.prezime, p.broj_telefona, p.datum_rodjenja, p.email, p.velicina_majice,
                         pr.motivaciono_pismo, pr.ss_iskustvo, pr.seminari_iskustvo, pr.nvo_iskustvo, pr.napomene, pr.ranije_ucesce, 
                         pr.radno_iskustvo, pr.trenutno_zaposlenje, 
                         pj.razumijevanje, pj.govor,
                         j.naziv,
                         pf.odsjek, pf.godina_studija,
                         k.naziv, 
                         f.naziv
         FROM participant p, prijava pr, jezik j, fakultet f, participant_has_jezik pj, participant_has_fakultet pf, kakostesaznali k
           WHERE p.id = pr.participant_id AND j.id = pj.jezik_id AND pj.participant_id = p.id AND f.id = pf.fakultet_id 
           AND pf.participant_id = p.id AND k.id = pr.kako_id AND p.id=?";

   		$stmt = $db->stmt_init();
   		if(!$stmt->prepare($query))
		{
   			print "Failed to prepare statement\n";
		}
		else

		{

			$stmt->bind_param("i", $participantId);
			$stmt->execute();

        	$stmt->bind_result($ime, $prezime, $tel, $dat, $email, $majica, 
                $mot, $ss, $semin, $nvo, $nap, $ranije, $radno, $trenutno, $raz, $gov,
                $jezik, $odsjek, $godina, $kakoNaziv, $nazivFaksa);
        	
        	

        	while ($stmt->fetch()) {
                // osnovni podaci
                echo '<div class="sec">';
                echo '<h2>Osnovni podaci</h2>';
                echo '<br><br>';
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
                echo '</div>';

                // obrazovanje

                echo '<div class="sec">';
                echo '<h2>Podaci o obrazovanju</h2>';
                echo '<br><br>';
                echo '<h3>Podaci o fakultetu</h3>';
                 echo '<b>Fakultet: </b>' . $nazivFaksa;
                echo '<br>';
                echo '<b>Odsjek: </b>' . $odsjek;
                echo '<br>';
                echo '<b>Godina studija: </b>' . $godina;
                echo '<br>';
                echo '<br>';
                echo '<h3>' . $jezik . '</h3>';
                echo '<b>Razumijevanje: </b>' . $raz;
                echo '<br>';
                echo '<b>Govor: </b>' . $gov;
                echo '<br><br><br>';
                echo '--------------------------------------------------------------';
                echo '<br><br>';
                echo '</div>';

                // motivaciono

                echo '<div class="sec">';
                echo '<h2>Motivaciono pismo</h2>';
                echo '<p>' . $mot . '</p>';
                echo '--------------------------------------------------------------';
                echo '<br><br>';
                echo '</div>';

                // prethodno iskustvo

                echo '<div class="sec">';
                echo '<h2>Prethodno iskustvo</h2>';
                echo '<b>Ranije učešće na SSA: </b>';
                if($ranije == 1) echo "DA";
                else echo "NE";
                echo '<br>';
                echo '<b>Kako ste saznali za SSA: </b>' . $kakoNaziv;
                echo '<br>';
                echo '<b>Radno iskustvo: </b><p>' . $radno . '</p>';
                echo '<br>';
                echo '<b>Trenunto zaposlenje: </b>';
                if($trenutno == 1) echo "DA";
                else echo "NE";
                echo '<br>';
                echo '<b>Učešče na soft skills treninzima: </b><p>' . $ss . '</p>';
                echo '<br>';
                echo '<b>Učešće na seminarima: </b><p>' . $semin . '</p>';
                echo '<br>';
                echo '<b>Iskustvo u NVO: </b><p>' . $nvo . '</p>';
                echo '--------------------------------------------------------------';
                echo '<br><br>';
                echo '</div>';


                // dodatne napomene
                echo '<div class="sec">';
                echo '<h2>Dodatne napomene</h2><p>' . $nap . '</p>';
                echo '</div>';


    		}

    	}
    }
  

?>

</div>
</div>
</div>

</body>
</html>