<?php
    // Sll require statements
    require("php/dzej_config.php");
    require("partials/header.html");
    require("partials/mainNavbar2.html");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // else render form
        if(isset($_POST["novostId"]))
        {
            $novost = query("SELECT * FROM `novost` WHERE `id` = ?", $_POST["novostId"])[0];

                        //Prvo pravim datetime objekat iz stringa vrijeme iz baze
            $date = DateTime::createFromFormat("Y-m-d H:i:s",$novost["datum_objave"]);
            //Zatim stvaram objekat mjeseca kako bi izvukao skraceno ime mjeseca tipa feb, dec itd
            $monthObject   = DateTime::createFromFormat('!m', intval($date->format("m")));
            $monthName = $monthObject->format('M'); // Mar,Dec etc for full month name F

            $article = " <div class='row'>
            <div class='col-md-12'>
                <div class='mainNewsDivOne'>
                        <div>
                            <img class='img-responsive newsImgOne' src='".$novost["slika"]."' />
                        </div>
                        <div class='newsMainDateOne'>
                            <p class='newsDayMargin'>".$date->format("d").".</p>
                        <p>".$monthName."</p>
                        </div>
                        <div>
                            <p class='newsArticleHeaderOne'>".$novost["naslov"]."</p>
                            <p class='newsArticleTextOne'>".$novost["tekst"]."</p>
                        </div>
                    </div>
                </div>
            </div>";
            echo $article;
            //querying database and inserting interest of user
            //print "Poslali ste argument ". $_POST["novostId"];
        }
    }
?>
    <script>
        $(function() {
            $(window).resize(function() {
                responsiveDateDiv();
            });

            var responsiveDateDiv = function() {
                var imgHeight = $($(".newsImgOne")[0]).height();
                if (imgHeight != 0) {
                    $.each($(".newsMainDateOne"), function(index, value) {
                        if ($(window).width() > 768) {
                            $(value).css("top", (imgHeight - 80) + "px");
                        } else {
                            $(value).css("top", (imgHeight - 35) + "px");
                        }
                    });
                }
            };
            responsiveDateDiv();           
        });
    </script>

<?php
    require("partials/footer.html"); 
?>