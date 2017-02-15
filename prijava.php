<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta property="og:type" content="website">
      <meta property="og:title" content="Soft Skills Academy Sarajevo '17" />
      <meta property="og:description" content="Soft Skills Academy Sarajevo - Besplatna trodnevna radionica ličnih i profesionalnih vještina za studente svih fakulteta u Sarajevu" />
      <meta property="og:image" content="img/greenLogo.jpg" />
      <meta property="og:url" content="." />

    <title>Soft Skills Academy Sarajevo '17</title>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>


    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/kontakt.css">
    <link rel="stylesheet" href="css/prijava.css">

        <link rel="shortcut icon" type="image/jpg" href="img/favicon.png"/>


     <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/prijava.js"></script>
    <script src="js/select.js"></script>
     <script src="js/scroll.js"></script>

</head>

<?php
    

    //header('Content-Type: text/html; charset=utf-8');
    
    include("php/config.php");
    $valid = true;
    $message = '';
    $dozvoljeniFakulteti = array();
    $idFakulteta = array();
        $query = "SELECT id, naziv FROM fakultet ORDER BY naziv";
        $stmt = $db->stmt_init();
        if(!$stmt->prepare($query))
        {
            print "Greška u konekciji sa bazom podataka.\n";
        }
        else

        {
            $stmt->execute();
            $stmt->bind_result($col0, $col1);

            while ($stmt->fetch())
            {
                array_push($dozvoljeniFakulteti, $col1);
                array_push($idFakulteta, $col0);
            }

        }

    
    if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['prijavaSubmit']))

     {
        $valid = true;
    $message = '';

        //echo "poslano";
        // validacija
            



        // korak 1

        $ime = NULL;
        $prezime = NULL;
        $datum = NULL;
        $telefon = NULL;
        $email = NULL;
        $majica = NULL;

        $regexIme = "/^[a-z ,.'-ćčšžđČĆŠŽĐ]+$/i";


        if(isset($_POST['ime']) and $_POST['ime'] != '' and preg_match($regexIme, $_POST['ime']) and strlen($_POST['ime']) <= 30)
            $ime = htmlspecialchars($_POST['ime']);
        else
        {
            $valid = false;
            $message = 'Molimo unesite ispravno sva polja';

        }


        


        if(isset($_POST['prezime']) and $_POST['prezime'] != '' and preg_match($regexIme, $_POST['prezime']) and strlen($_POST['prezime']) <= 30)
            $prezime = htmlspecialchars($_POST['prezime']);
         else
        {
            $valid = false;
            $message = 'Molimo unesite ispravno sva polja';
        }

        $regDatum = '/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})\.?$/';

        if(isset($_POST['datum']) and $_POST['datum'] != '' and preg_match($regDatum, $_POST['datum']) and strlen($_POST['datum']) <= 15)
            $datum = htmlspecialchars($_POST['datum']);
         else
        {
            $valid = false;
            $message = 'Molimo unesite ispravno sva polja';
        }

        if(isset($_POST['telefon']) and $_POST['telefon'] != '' and strlen($_POST['telefon']) <= 20)
            $telefon = htmlspecialchars($_POST['telefon']);
         else
        {
            $valid = false;
            $message = 'Molimo unesite ispravno sva polja';
        }

        if(isset($_POST['email']) and $_POST['email'] != '')
        {

            $email = htmlspecialchars($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }
        }
        else
           {
            $valid = false;
            $message = 'Molimo unesite ispravno sva polja';
        }



        $velicine = array('S', 'M', 'L', 'XL', 'XXL');

        if(isset($_POST['majica']) and $_POST['majica'] != '')
        {
            $majica = htmlspecialchars($_POST['majica']);
            if(!in_array($majica, $velicine))
                {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        }
        else
        {
            $valid = false;
            $message = 'Molimo unesite ispravno sva polja';
        }



        // korak 2

        $fakulteti = array();
        $godine = array();
        $odsjeci = array();

        foreach ($_POST as $key => $value)
        {
            if (strpos($key, 'fakultet') !== false)
                array_push($fakulteti, htmlspecialchars($value));
            else if(strpos($key, 'godina') !== false)
                array_push($godine, htmlspecialchars($value));
            else if(strpos($key, 'odsjek') !== false)
                { 
                  if($value != '')
                array_push($odsjeci, htmlspecialchars($value));
                else
                array_push($odsjeci, NULL);

                }

        }

        //sort($fakulteti);
        //sort($godine);
        //sort($odsjeci);

        


         
        
        $dozvoljeneGodine = array('1.', '2.', '3.', '4.', '5.', '6.');

        if(count($fakulteti) != count($godine) || count($fakulteti) != count($odsjeci) || count($godine) != count($odsjeci))
                {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        if(count($fakulteti) <= 0)
            {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

       
            for($i=0;$i < count($fakulteti); $i++)
            {
                if(!in_array($fakulteti[$i], $dozvoljeniFakulteti))
                    {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

                if(!in_array($godine[$i], $dozvoljeneGodine))
                    {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                    }

            }
        




        $govor = NULL;
        $raz = NULL;

        $jezik = array('1', '2', '3', '4', '5');

        if(isset($_POST['govor']) and $_POST['govor'] != '')
        {
            
            $govor = htmlspecialchars($_POST['govor']);
            if(!in_array($govor, $jezik))
            {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        }
        else
            {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        if(isset($_POST['raz']) and $_POST['raz'] != '')
        {
            $raz = htmlspecialchars($_POST['raz']);
            if(!in_array($raz, $jezik))
            {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        }
        else
           {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        

        // korak 3

        $pismo = NULL;

        if(isset($_POST['pismo']) and $_POST['pismo'] != '')
            $pismo = htmlspecialchars($_POST['pismo']);
        else
            {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }


        // korak 4

        $ranije = NULL;
        $trenutno = NULL;
        $kako = NULL;

        $dane = array('DA', 'NE');

        if(isset($_POST['ranije']) and $_POST['ranije'] != '')
        {
            $ranije = htmlspecialchars($_POST['ranije']);
            if(!in_array($ranije, $dane))
                {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        }
        else
            {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        if(isset($_POST['trenutno']) and $_POST['trenutno'] != '')
        {
            $trenutno = htmlspecialchars($_POST['trenutno']);
            if(!in_array($trenutno, $dane))
                {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        }
        else
            {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        $kakoniz = array("Promocija na fakultetu", "Društvene mreže", "Mediji", "Web stranica", "Preporuka prijatelja", "Promotivni leci i plakati", "Ništa od navedenog");


        if(isset($_POST['kakostesaznali']) and $_POST['kakostesaznali'] != '')
        {
            $kako = htmlspecialchars($_POST['kakostesaznali']);
            if(!in_array($kako, $kakoniz))
                {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        }
        else
            {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        $radno = NULL;
        $seminari = NULL;
        $nvo = NULL;
        $softUcesce = NULL;

        if(isset($_POST['radno']))
        {
            if($_POST['radno'] != '') 
                $radno = htmlspecialchars($_POST['radno']);
        }
        else
            {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        if(isset($_POST['seminari']))
        {   
            if($_POST['seminari'] != '') 
            $seminari = htmlspecialchars($_POST['seminari']);
        }

        else
            {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        if(isset($_POST['nvo']))
        {
            if($_POST['nvo'] != '') 
            $nvo = htmlspecialchars($_POST['nvo']);
        }
        else
            {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

        if(isset($_POST['softUcesce']))
        {
            if($_POST['softUcesce'] != '') 
            $softUcesce = htmlspecialchars($_POST['softUcesce']);
        }
        else
            {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }


        // korak 5
        $dodatne = NULL;

        if(isset($_POST['dodatne']))
        {
            if($_POST['dodatne'] != '') 
            $dodatne = htmlspecialchars($_POST['dodatne']);
        }
        else
            {
                    $valid = false;
                    $message = 'Molimo unesite ispravno sva polja';
                }

   


            //provjera da li vec postoji taj mail

            $query = "SELECT email FROM participant";
        $stmt = $db->stmt_init();
        if(!$stmt->prepare($query))
        {
            print "Greška u konekciji sa bazom podataka.\n";
        }
        else

        {
            $stmt->execute();
            $stmt->bind_result($col0);

            while ($stmt->fetch())
                if($email == $col0)
                {
                    $valid = false;
                    $message = "Već postoji prijava sa navedenim emailom.";
                }

        }
            

         if($valid)
        {
            //dodavanje u bazu

            // participant

            $query = "INSERT INTO participant (ime, prezime, broj_telefona, datum_rodjenja, email, velicina_majice) VALUES(?, ?, ?, ?, ?, ?)";
            $stmt = $db->stmt_init();
            if(!$stmt->prepare($query))
            {
                print "Failed to prepare statement\n";
            }
            else

            {

                // VAZNO!! zamijenjeni su datum i telefon greskom
                $stmt->bind_param("ssssss", $ime, $prezime, $datum, $telefon, $email, $majica);
                $stmt->execute();
                $participant_id = $db->insert_id;

            }

            // prijava

            $query = "INSERT INTO prijava (motivaciono_pismo, ss_iskustvo, seminari_iskustvo, nvo_iskustvo, napomene, ranije_ucesce, radno_iskustvo, trenutno_zaposlenje, participant_id, kako_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $db->stmt_init();
            if(!$stmt->prepare($query))
            {
                print "Failed to prepare statement\n";
            }
            else

            {
                if($ranije == 'DA')
                    $ranijeInt = 1;
                else
                    $ranijeInt = 0;

                if($trenutno == 'DA')
                    $trenutnoInt = 1;
                else
                    $trenutnoInt = 0;
                $kakoId = array_search($kako, $kakoniz) + 1; // ma ev dobro

                $stmt->bind_param("sssssisiii", $pismo, $softUcesce, $seminari, $nvo, $dodatne, $ranijeInt, $radno, $trenutnoInt, $participant_id, $kakoId);
                $stmt->execute();
                $prijava_id = $db->insert_id;

            }

            for($i=0;$i < count($fakulteti); $i++)
            {
                $index = array_search($fakulteti[$i], $dozvoljeniFakulteti);
                $faxId = $idFakulteta[$index];

                $query = "INSERT INTO participant_has_fakultet (participant_id, fakultet_id, odsjek, godina_studija) VALUES(?, ?, ?, ?)";
                $stmt = $db->stmt_init();
                if(!$stmt->prepare($query))
                {
                    print "Failed to prepare statement\n";
                }
                else

                {
                    $godinaInt = ord($godine[$i][0]) - 48;

                    $stmt->bind_param("iisi", $participant_id, $faxId, $odsjeci[$i], $godinaInt);
                    $stmt->execute();

                }

            }

            $query = "INSERT INTO participant_has_jezik (participant_id, jezik_id, razumijevanje, govor) VALUES(?, ?, ?, ?)";
                $stmt = $db->stmt_init();
                if(!$stmt->prepare($query))
                {
                    print "Failed to prepare statement\n";
                }
                else

                {

                    $razInt = ord($raz) - 48;
                    $govorInt = ord($govor) - 48;
                    $jezikId = 1;
                    //hardcodirano samo za engleski jezik, ali je u bazi modularno za prosirenja

                    $stmt->bind_param("iiii", $participant_id, $jezikId, $razInt, $govorInt);
                    $stmt->execute();

                }

                // slanje maila potvrde participantu

                

                $subject = '[SSA] Potvrda prijave';
                $eol = PHP_EOL;

            $mes = '<html><body>';
            $mes .= 'Vaša prijava je zabilježena i spremljena u našu bazu podataka. Nakon zatvaranja prijava bit ćete obaviješteni o ishodu.' .$eol . $eol .'Sretno!';
            $mes .= '</body></html>';

            $headers = 'From: softskillsacademy.ba <noreply@softskillsacademy.ba> ' . "\r\n" .
                            'Reply-To: softskillsacademy.ba <noreply@softskillsacademy.ba>' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
            $headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;

            
                mail($email, $subject, $mes, $headers);

                $message = 'Vaša prijava je uspješno poslana. Uskoro biste trebali dobiti email sa potvrdom prijave. Ukoliko ne dobijete email molimo Vas da nas kontaktirate. Sretno!';


    }

        



    }





?>

<body>

<?php include 'partials/mainNavbar2.html'; ?>


    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p class="naslov">Prijavi se - Budi korak ispred!</p>
                <p class="<?php if(!$valid) echo errorMessage; else echo confMessage; ?>"><?php echo $message; ?></p>         

            </div>
        </div>

        <form name="prijavaForm" id="prijavaForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <div class="row form-group">
            <div class="col-xs-12 col-md-4">
                <ul class="nav nav-pills nav-stacked  thumbnail setup-panel koraci">
                    <li class="active"><a class="korak" href="#step-1" id="korak1">
                        <h4 class="list-group-item-heading tekstKoraka ">Korak 1</h4>
                        <p class="list-group-item-text tekstKoraka">Osnovni podaci</p>
                    </a></li>
                    <li ><a class="korak" href="#step-2" id="korak2">
                        <h4 class="list-group-item-heading tekstKoraka">Korak 2</h4>
                        <p class="list-group-item-text tekstKoraka">Podaci o obrazovanju</p>
                    </a></li>
                    <li ><a class="korak" href="#step-3" id="korak3">
                        <h4 class="list-group-item-heading tekstKoraka">Korak 3</h4>
                        <p class="list-group-item-text tekstKoraka">Motivaciono pismo</p>
                    </a></li>
                    <li><a class="korak" href="#step-4" id="korak4">
                        <h4 class="list-group-item-heading tekstKoraka">Korak 4</h4>
                        <p class="list-group-item-text tekstKoraka">Prethodno iskustvo</p>
                    </a></li> 
                    <li ><a class="korak" href="#step-5" id="korak5">
                        <h4 class="list-group-item-heading tekstKoraka">Korak 5</h4>
                        <p class="list-group-item-text tekstKoraka">Dodatne napomene</p>
                    </a></li> 
                     <li ><a class="korak" href="#step-6" id="korak6">
                        <h4 class="list-group-item-heading tekstKoraka">Korak 6</h4>
                        <p class="list-group-item-text tekstKoraka">Slanje prijave</p>
                    </a></li>    
                </ul>
            </div>
            <div class="col-xs-12 col-md-8">
            

    <div class="setup-content" id="step-1">
            <div class="col-xs-12 well">
               <!-- <p class="naslov1">Osnovni podaci</p> -->
             <p class="napomena"><i>Napomena: Polja označena sa * su obavezna.</i></p> 

            <div class="form-group prvaForma col-xs-12 col-md-6">
                            <label for="ime">
                                Ime*</label>
                            <input type="text" class="form-control" id="ime" name="ime" maxlength="30"/>
                            <p class="error" id="errorIme"></p>

                        </div>
                        <div class="form-group prvaForma col-xs-12 col-md-6">
                            <label for="prezime">
                                Prezime*</label>
                            <input type="text" class="form-control" id="prezime" name="prezime" maxlength="30"/>
                            <p class="error" id="errorPrezime"></p>
                        </div>
                         <div class="form-group prvaForma col-xs-12 col-md-6">
                            <label for="datum">
                                Datum rođenja*</label>
                            <input type="text" class="form-control" id="datum" name="datum"  maxlength="15"/>
                            <p class="error" id="errorDatum"></p>
                        </div>
                          <div class="form-group prvaForma col-xs-12 col-md-6">
                            <label for="telefon">
                                Broj telefona*</label>
                            <input type="text" class="form-control" id="telefon" name="telefon"  maxlength="20"/>
                            <p class="error" id="errorTelefon"></p>
                        </div>
                        <div class="form-group prvaForma col-xs-12 col-md-6">
                            <label for="email">
                                Email*</label>
                            <input type="text" class="form-control" id="email" name="email"/>

                            <p class="error" id="errorEmail"></p>
                        </div>   
                        <div class="form-group  prvaForma col-xs-12 col-md-6">
                            <label for="majica">
                                Veličina majice*</label>
                                <a id="majicaLista" class=" listbox btn btn-info btn-select btn-select-light">
    <input type="hidden" class="btn-select-input" id="majica" name="majica" value="S" />
    <span class="btn-select-value">Select an Item</span>
    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
    <ul class="selectLista">
        <li class="selected listItem">S</li>
        <li class="majica listItem">M</li>
        <li class="majica listItem">L</li>
        <li class="majica listItem">XL</li>
        <li class="majica listItem">XXL</li>
    </ul>
</a>
                                  <p class="error" id="errorMajica"></p>
                        </div>           
                
    
        <a class="sljedeci btn pull-right" >Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>





           

    <div  class="setup-content" id="step-2">
            <div class="col-xs-12 well">

            <label class="podnaslov podaciOFaxu">Podaci o fakultetu</label><br><br>

            <div  id="sviFaksovi">
            <div id="addr0">
                
<div class="form-group col-xs-12 col-md-9">
                            <label for="fakultet">
                                Fakultet*</label>
                                <a class=" listbox btn btn-info btn-select btn-select-light">
    <input type="hidden" class="btn-select-input" id="fakultet0" name="fakultet0" value="<?php echo $dozvoljeniFakulteti[0]; ?>" />
    <span class="btn-select-value">Select an Item</span>
    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
    <ul class="selectLista">
        <li class="selected listItem"><?php echo $dozvoljeniFakulteti[0]; ?></li>
        <?php
            for($i=1; $i < count($dozvoljeniFakulteti); $i++)
                echo '<li class="listItem">' . $dozvoljeniFakulteti[$i] .'</li>';
        ?>
    </ul>
</a>
                                  <p class="error" id="errorFakultet0"></p>
                        </div>

                        <div class="form-group col-xs-12 col-md-3">
                            <label for="godinaStudija">
                                Godina studija*</label>
                                <a class=" listbox btn btn-info btn-select btn-select-light">
    <input type="hidden" class="btn-select-input" id="godina0" name="godina0" value="1." />
    <span class="btn-select-value">Select an Item</span>
    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
    <ul class="selectLista">
        <li class="selected listItem">1.</li>
        <li class="listItem">2.</li>
        <li class="listItem">3.</li>
        <li class="listItem">4.</li>
        <li class="listItem">5.</li>
        <li class="listItem">6.</li>
    </ul>
</a>
                                  <p class="error" id="errorGodina0"></p>
                        </div>


                        <div class="form-group col-xs-12 col-md-6 prviFaks">
                            <label for="odsjek">
                                Odsjek</label>
                            <input type="text" class="form-control" id="odsjek0" name="odsjek0"  />
                            <p class="error" id="errorOdsjek0"></p>
                        </div>

                        </div>

                        <div id="addr1"></div>

                        </div>


                         <div class="form-group col-xs-12">
                           <input type="button" value="Dodaj fakultet" class="btnSlanje col-xs-12  btn " id="add_row">
                        </div> 

                            
                          <div class="form-group col-xs-12 col-md-12">
                         <label class="podnaslov">Poznavanje engleskog jezika</label><br><br>

                            
            
                        </div>

                        <div class="form-group col-xs-12 col-md-6">
                            <label for="govor">
                                Govor*</label><br>

                    <div id="radioBtn1" class="btn-group">
                        <a class="btn btn-primary btn-sm active" data-toggle="govor" data-title="1">1</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="govor" data-title="2">2</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="govor" data-title="3">3</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="govor" data-title="4">4</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="govor" data-title="5">5</a>

                    </div>
                    <p class="error" id="errorGovor"></p>
                    <input type="hidden" name="govor" id="govor" value="1">
                                      </div>

                         <div class="form-group col-xs-12 col-md-6">
                            <label for="raz">
                                Razumijevanje*</label><br>

                    <div id="radioBtn2" class="btn-group">
                        <a class="btn btn-primary btn-sm active" data-toggle="raz" data-title="1">1</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="raz" data-title="2">2</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="raz" data-title="3">3</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="raz" data-title="4">4</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="raz" data-title="5">5</a>

                    </div>
                    <p class="error" id="errorRaz"></p>
                    <input type="hidden" name="raz" id="raz" value="1">
                                      </div>

                    


           
                
    
        <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>






    <div  class="setup-content" id="step-3">
            <div class="col-xs-12 well">
                <p class="napomena">Motivaciono pismo je ključni kriterij prilikom izbora kandidata za radionicu. Preporučujemo vam da pažljivo napišete što bolje motivaciono pismo kako biste imali veće šanse za učešće na radionici.</p>

 <div class="form-group col-xs-12">
                            <label for="pismo">
                                Motivaciono pismo*</label>
                            <textarea name="pismo" id="pismo" class="form-control" rows="12" cols="25"
                                ></textarea>
                                <p class="error" id="errorPismo"></p>
                        </div>             
                
    
        <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>





    <div  class="setup-content" id="step-4">
            <div class="col-xs-12 well">
                

<div class="form-group col-xs-12 col-md-4 margina">
                            <label for="ranijeUcesce">
                                Ranije učešće na SSA*</label>
                                <a id = "ranijeLista" class=" listbox btn btn-info btn-select btn-select-light">
    <input type="hidden" class="btn-select-input" id="ranije" name="ranije" value="NE" />
    <span class="btn-select-value">Select an Item</span>
    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
    <ul class="selectLista">
        <li class="selected listItem">NE</li>
        <li class="listItem">DA</li>
    </ul>
</a>
                                  <p class="error" id="errorRanije"></p>
                        </div> 

                        <div class="form-group col-xs-12 col-md-4 margina">
                            <label for="kakostesaznali">
                                Kako ste saznali za SSA*</label>
                                <a class=" listbox btn btn-info btn-select btn-select-light">
    <input type="hidden" class="btn-select-input" id="kakostesaznali" name="kakostesaznali" value="Promocija na fakultetu" />
    <span class="btn-select-value">Select an Item</span>
    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
    <ul class="selectLista">
        <li class="selected listItem">Promocija na fakultetu</li>
        <li class="listItem">Društvene mreže</li>
        <li class="listItem">Mediji</li>
        <li class="listItem">Web stranica</li>
                <li class="listItem">Preporuka prijatelja</li>
                <li class="listItem">Promotivni leci i plakati</li>
            <li class="listItem">Ništa od navedenog</li>






    </ul>
</a>
                                  <p class="error" id="errorKako"></p>
                        </div> 

                        <div class="form-group col-xs-12">
                            <label for="radno">
                                Radno iskustvo</label>
                            <textarea name="radno" id="radno" class="form-control" rows="9" cols="25"
                                ></textarea>
                                <p class="error" id="errorRadno"></p>
                        </div>  


                        <div class="form-group col-xs-12 col-md-4 margina">
                            <label for="trenutno">
                                Trenutno zaposlenje*</label>
                                <a class=" listbox btn btn-info btn-select btn-select-light">
    <input type="hidden" class="btn-select-input" id="trenutno" name="trenutno" value="NE" />
    <span class="btn-select-value">Select an Item</span>
    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
    <ul class="selectLista">
        <li class="selected listItem">NE</li>
        <li class="listItem">DA</li>
    </ul>
</a>
                                  <p class="error" id="errorTrenutno"></p>
                        </div>  


                        <div class="form-group col-xs-12">
                            <label for="softUcesce">
                                Učešće na soft skills treninzima</label>
                            <textarea name="softUcesce" id="softUcesce" class="form-control" rows="9" cols="25"
                                ></textarea>
                                <p class="error" id="errorUcesce"></p>
                        </div> 


                        <div class="form-group col-xs-12">
                            <label for="seminari">
                                Učešće na seminarima</label>
                            <textarea name="seminari" id="seminari" class="form-control" rows="9" cols="25"
                                ></textarea>
                                <p class="error" id="errorSeminari"></p>
                        </div>  

                        <div class="form-group col-xs-12">
                            <label for="nvo">
                                Iskustvo u NVO</label>
                            <textarea name="nvo" id="nvo" class="form-control" rows="9" cols="25"
                                ></textarea>
                                <p class="error" id="errorNvo"></p>
                        </div>      
                
    
        <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>





    <div  class="setup-content" id="step-5">
            <div class="col-xs-12 well">
               <p class="napomena">Ukoliko smatrate da postoji još nešto važno što bismo trebali znati iskoristite ovo polje kako biste nam to rekli.</p>

 <div class="form-group col-xs-12">
                            <label for="pismo">
                                Dodatne napomene</label>
                            <textarea name="dodatne" id="dodatne" class="form-control" rows="9" cols="25"
                                ></textarea>
                                <p class="error" id="errorDodatne"></p>
                        </div>             
                
    
        <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljedeći korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>



    <div  class="setup-content" id="step-6">
            <div class="col-xs-12 well">
               <p class="napomena">Klikom na dugme Pošalji prijavu Vaša prijava će biti poslana. Molimo Vas da prije slanja još jednom provjerite da li ste ispravno popunili sve korake.</p>

 <div class="form-group col-xs-12">
                           <input type="submit" name="prijavaSubmit" value="Pošalji prijavu" class="btnSlanje col-xs-12  btn">
                        </div>    

                
    
        <a class="btn pull-left prethodni">Prethodni korak</a>
    
                
<!-- </form> -->
                
            </div>
        
    </div>

</form>

</div>
        </div>
    </div>  



    


<?php include 'partials/footer.html'; ?>


</body>

</html>