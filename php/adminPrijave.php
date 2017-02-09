<?php 


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

    <title>Soft Skills Academy Sarajevo '17</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" type="image/jpg" href="img/favicon.png"/>


</head>

<html>
<body>

    <div class="row">
        <div class="container-fluid">
        <div class="col-xs-12 col-md-2">
	<p style="text-align:center; margin-top:30px;">Ulogovani ste kao <b><?php echo $_SESSION['username']; ?></b>.</p>


    <form name="logoutForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="submit" name="logoutSubmit" value="Log out" class="btn btn-custom btn-lg btn-block">

    </form>

</div>

</div>
</div>

<div class="row">
    <div class="container-fluid">

        <div class="col-xs-12 col-md-3">
            <br><br>
            <h1>Pregled prijava</h1>
            <br><br>
            <?php
                $query = "SELECT id, ime, prezime, datum_rodjenja, email FROM participant ORDER BY prezime, ime";
        $stmt = $db->stmt_init();
        if(!$stmt->prepare($query))
        {
            print "Failed to prepare statement\n";
        }
        else

        {

            $stmt->execute();
            $rb = 1;
            $stmt->bind_result($idevi, $imena, $prezimena, $telefoni, $emailovi);
            while ($stmt->fetch()) {
                echo '<div class="sec">';
                echo $rb . '. ' . '<b>' . $imena . ' ' . $prezimena .'</b>';
                echo '<br>';
                echo $telefoni;
                echo '<br>';
                echo $emailovi;
                echo '<br>';
                echo '<a href="./php/singlePrijava.php?id=' . $idevi . '">Pregled prijave</a>';
                echo '<br>';
                echo '<br>';
                echo '</div>';
                echo '<br><br>';
                $rb++;
            }

        }


            ?>
        </div>
        </div>

    </div>

	</body>
</html>