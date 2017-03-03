<?php
header("Location: .");
?>
<!DOCTYPE html>
<html>

<head>
    
    <?php include 'partials/headerExt.html'; ?>
    <link rel="stylesheet" href="css/clanak.css">

</head>

<body>

<?php include 'partials/mainNavbar2.html'; ?>

<!-- kod clanak -->

<div class="marginContainer">
    <div class="container-fluid">
    <?php 

        $titles = array(
            "Infobip",
            "Microsoft",
            "Authority Partners"
        );

        // Svaka kompanija ima id kojem odgaraju 3 slike i jedan text. Id se proslijedi kao parametar u url-u.
        $text =array(
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in   voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit involuptate    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit involuptate    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        );

        $images = array(
            array("img/proba1.jpg", "img/proba1.jpg", "img/proba1.jpg"), 
            array("img/proba1.jpg", "img/proba1.jpg", "img/proba1.jpg"),
            array("img/proba1.jpg", "img/proba1.jpg", "img/proba1.jpg")
        );
    
        $id = htmlspecialchars($_GET["id"]);

        echo "<h1>" . $titles[$id] . "</h1>";

        echo "<div class=row>";
        for ($i = 0; $i < 3; $i++)
            echo "<div class=\"col-md-4 col-xs-12\"><div class =\"clanak-image\"><img src=" . $images[$id][$i] . "></div></div>";
        echo "</div>";
        echo "<div class=\"clanak-text row\"><p>" . $text[$id] . "</p></div>";
    ?>
    </div>
</div>

<?php include 'partials/footer.html'; ?>

</body>

</html>