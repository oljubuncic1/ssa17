



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Soft Skills Academy Sarajevo '17</title>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>


    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/kontakt.css">

     <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/script.js"></script>

</head>

<?php

    $emailErr = "";
    $mesErr = "";
    $confMes = "";
    $ime = "";
    $email = "";
    $poruka = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['send'])) {
        $valid = true;

        if(isset($_POST['ime']))
            $ime = htmlspecialchars($_POST['ime']);
        else
            $ime="";

        if(isset($_POST['mail']) and $_POST['mail'] != '')
        {

            $email = htmlspecialchars($_POST['mail']);
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {

                $emailErr = "";

            }
            else
            {
                $valid = false;
                $emailErr = "Molimo vas unesite validnu e-mail adresu.";
            }
        }
        else
        {
            $emailErr = "Molimo unesite vašu e-mail adresu.";
            $valid = false;
        }
       

        if(isset($_POST['poruka']) and $_POST['poruka'] != '')
        {
           $poruka = $_POST['poruka'];
            $mesErr = "";
        }
        else
        {
            $valid = false;
            $mesErr = "Molimo vas unesite poruku.";
        }

        if($valid)
        {
            
            // slanje maila
            $primi = array(
                'adina.omerovic@softskillsacademy.ba',
                'emina.sikira@softskillsacademy.ba',
                'orhan.ljubuncic@softskillsacademy.ba'
            );

            $subject = '[SSA] Kontakt forma';
            $eol = PHP_EOL;

            $message = '<html><body>';
            $message .= 'Od '.$ime.'<br />';
            $message .= 'Email: '.$email.'<br /><br />';
            $message .= $poruka;
            $message .= '</body></html>';

            $headers = 'From: softskillsacademy.ba <noreply@softskillsacademy.ba> ' . "\r\n" .
                            'Reply-To: softskillsacademy.ba <noreply@softskillsacademy.ba>' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
            $headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;

            foreach($primi as $to){
                mail($to, $subject, $message, $headers);
            }
            $confMes = "Hvala što ste nas kontaktirali. Naš tim će nastojati da u što kraćem roku odgovori na vašu poruku.";
        }
        else
        {
           
            $confMes = "";
        }





    }


?>


<body>

<?php include 'partials/mainNavbar2.html'; ?>

<div class="container-fluid kontaktAll">

    <div class="row">
        <div class="col-md-offset-1 col-md-4">
            <div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">
                                Ime i prezime</label>
                            <input type="text" class="form-control" id="name" name="ime"  value="<?php echo $ime;?>"/>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email*</label>
                            <input type="text" class="form-control <?php if($emailErr != '') echo tbError; else echo ''; ?>" id="mail" name="mail" value="<?php echo $email;?>"/>
                            <p class="error"><?php echo $emailErr; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="name">
                                Poruka*</label>
                            <textarea name="poruka" id="message" class="form-control <?php if($mesErr != '') echo tbError; else echo ''; ?>" rows="7" cols="25"
                                ><?php echo $poruka;?></textarea>
                                <p class="error"><?php echo $mesErr; ?></p>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-12">
                        <button type="submit" name="send" class="btn btn-primary pull-right" id="btnContactUs">
                            Pošalji</button>
                    </div>
                </div>
                </form>
            </div>
            <p class="confMessage"><?php echo $confMes; ?></p>
        </div>
        <div class="col-md-6 oo">
            <form>
                            <legend><span class="glyphicon glyphicon-globe"></span> Organizacioni odbor</legend>

                <div class="row">
            <div class="col-md-6">
            <address>
                <strong>Adina Omerović</strong><br>
                Glavna organizatorica<br>
                <label class="gr">adina.omerovic@softskillsacademy.ba<br>
                <abbr title="Phone">
                    </abbr>
                +387 62 984 391</label>
            </address>

        </div>

        <div class="col-md-6">

             <address>
                <strong>Emina Sikira</strong><br>
                Koordinatorica tima za odnose sa javnošću<br>
                <label class="gr">emina.sikira@softskillsacademy.ba<br>
                <abbr title="Phone">
                    </abbr>
                +387 61 692 904</label>
            </address>
        </div>


        <div class="col-md-6">
            <address>
                <strong>Orhan Ljubunčić</strong><br>
                Koordinator tima za informacione tehnologije<br>
                <label class="gr">orhan.ljubuncic@softskillsacademy.ba<br>
                <abbr title="Phone">
                    </abbr>
                +387 61 688 900</label>
            </address>


             
        </div>


        <div class="col-md-6">

             <address>
                <strong>Tarik Šahinović</strong><br>
                Koordinator tima za odnose sa kompanijama<br>
                <label class="gr">tarik.sahinovic@softskillsacademy.ba<br>
                <abbr title="Phone">
                    </abbr>
                +387 62 895 241</label>
            </address>

        </div>


        <div class="col-md-6">

             <address>
                <strong>Adi Pandžić</strong><br>
                Koordinator tima za dizajn i publikacije<br>
                <label class="gr">adi.pandzic@softskillsacademy.ba<br>
                <abbr title="Phone">
                    </abbr>
                +387 60 319 1256</label>
            </address>
        </div>


        <div class="col-md-6">
            <address>
                <strong>Amina Sejdić</strong><br>
                Koordinatorica tima za ljudske resurse i logistiku<br>
                <label class="gr">amina.sejdic@softskillsacademy.ba<br>
                <abbr title="Phone">
                    </abbr>
                +387 62 395 144</label>
            </address>
             
        </div>
            </div>
            </form>
        </div>
    </div>
</div>

<?php include 'partials/footer.html'; ?>


</body>

</html>