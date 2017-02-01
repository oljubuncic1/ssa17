<?php
    // configuration, this include checks if user is logged in if not redirects to login.php
    require("php/dzej_config.php");

?>

<section class="container-fluid marginContainer novosti-cont">
    <p class="sectionHeadline"><b>novosti</b></p>
    <p class="sectionHeadlineBottomRed"></p>
    <div class="row">
        <?php

        $novosti = query("SELECT * FROM `novost`");

        
        foreach($novosti as $novost){
            //print_r ($novost);
            //print $novost["datum_objave"];//2017-02-01 03:30:27
            //Prvo pravim datetime objekat iz stringa vrijeme iz baze
            $date = DateTime::createFromFormat("Y-m-d H:i:s",$novost["datum_objave"]);
            //Zatim stvaram objekat mjeseca kako bi izvukao skraceno ime mjeseca tipa feb, dec itd
            $monthObject   = DateTime::createFromFormat('!m', intval($date->format("m")));
            $monthName = $monthObject->format('M'); // March

            $article = "<div class='col-md-6'>
             <div class='mainNewsDiv'>
                    <div>
                        <img class='img-responsive newsImg' src='img/proba.jpg' />
                    </div>
                    <div class='newsMainDate'>
                        <p class='newsDayMargin'>".$date->format("d").".</p>
                     <p>".$monthName."</p>
                     </div>
                     <div>
                        <p class='newsArticleHeader'>".$novost["naslov"]."</p>
                        <p class='newsArticleText'>".$novost["opis"]."</p>
                    </div>
                </div>
            </div>";
            echo $article;
        }
        
        ?>
    </div>
    <div class="container-fluid newsMoreDiv">
        <p><a href="sveNovosti.php"class="newsMoreText">Više novosti...</a></p>
    </div>
    <script>
        $(function() {
            var btn = document.getElementById('myBtn');
            btn.addEventListener('click', function() {
                document.location.href = 'sveNovosti.php';
            });

            $(window).resize(function() {
                responsiveDateDiv();
            });

            var responsiveDateDiv = function() {
                var imgHeight = $($(".newsImg")[0]).height();
                if (imgHeight != 0) {
                    $.each($(".newsMainDate"), function(index, value) {
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
</section>