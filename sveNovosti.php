<?php
    // Sll require statements
    require("php/dzej_config.php");
    require("partials/header.html");
    require("partials/mainNavbar.html");
    require('partials/title.html');
    require('partials/secondNavbar.html');
?>

<section class="container-fluid marginContainer novosti-cont">
    <p class="sectionHeadline"><b>sve novosti</b></p>
    <p class="sectionHeadlineBottomRed"></p>
    <div class="row">
        <?php

        $novosti = query("SELECT * FROM `novost`");

        
        foreach($novosti as $novost){
            //2017-02-01 03:30:27
            //Prvo pravim datetime objekat iz stringa vrijeme iz baze
            $date = DateTime::createFromFormat("Y-m-d H:i:s",$novost["datum_objave"]);
            //Zatim stvaram objekat mjeseca kako bi izvukao skraceno ime mjeseca tipa feb, dec itd
            $monthObject   = DateTime::createFromFormat('!m', intval($date->format("m")));
            $monthName = $monthObject->format('M'); // Mar,Dec etc for full month name F

            $article = "<div class='col-md-6 novostiDiv' id='".$novost["id"]."'>
             <div class='mainNewsDiv'>
                    <div>
                        <img class='img-responsive newsImg' src='".$novost["slika"]."' />
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
    <script>
        $(function() {
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

            $(".novostiDiv").on('click',function(event){
                console.log(event);     
       
                $.redirect('viseONovosti.php', {'novostId': $(this).attr('id'), 'arg2': 'value2'});
            });
            
        });
    </script>
</section>


<?php
    require("partials/footer.html"); 
?>