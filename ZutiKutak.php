<?php
header("Location: .");
?>
<!DOCTYPE html>
<html>

<head>
    
    <?php include 'partials/headerExt.html'; ?>

    <!-- Za Carousel -->
   
    
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <script src="js/scroll.js"></script>
    <script src="js/carousel.js"></script>
    
   

   


    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>


<body>

<?php include 'partials/mainNavbar2.html'; ?>


<div class="container-fluid oprojektu-cont">
<div class="row aboutProjectRowMargin">
        <div class="col-md-6 aboutProjectImgDiv">
            
                <div class="container-citat">
    <br>
    <div id="myCarousel" class="carousel carouselClanak slide" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="citat">
                <img class="img-responsive aboutProjectImg" src="img/proba1.jpg" />
            </div>
        </div>

        <div class="item">
            <div class="citat">
            <img class="img-responsive aboutProjectImg" src="img/proba1.jpg" />

            </div> 
        </div>
        
        <div class="item">
            <div class="citat">
                <img class="img-responsive aboutProjectImg" src="img/proba1.jpg" />
            </div>
        </div>  

        <div class="item">
            <div class="citat"> 
                <img class="img-responsive aboutProjectImg" src="img/proba1.jpg" /> 
            </div>
        </div>

        <div class="item">
            <div class="citat"> 
               <img class="img-responsive aboutProjectImg" src="img/proba1.jpg" />
            </div>
        </div>

        <div class="item">
            <div class="citat"> 
               <img class="img-responsive aboutProjectImg" src="img/proba1.jpg" />
            </div>
        </div>

        <div class="item">
            <div class="citat"> 
                <img class="img-responsive aboutProjectImg" src="img/proba1.jpg" />
            </div>
        </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control"  href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    </div>
            
        </div>
        <div class="col-md-5 justifyText clanakText">
            <p class="aboutProjectTextHeader">Žuti kutak</p>
            <p class="aboutProjectBottomRed"></p>
            <p class="aboutProjectTextTop">
                Soft Skills Academy Sarajevo je besplatna trodnevna radionica ličnih i profesionalnih vještina za studente svih fakulteta u Sarajevu, koja podstiče studente na razvoj neformalnih vještina neophodnih za zapošljavanje i uspješnu karijeru, ali i za izazove modernog života, koje tradicionalan način studiranja ne može obezbijediti. Ovogodišnji SSA se održava u periodu od 10 - 12. 03. 2017. godine u prostorijama Academy387 Sarajevo.

            </p>
            <p class="aboutProjectTextBottom">
                40 najambicioznijih studenata svih fakulteta u Sarajevu učestvovat će u treninzima kao što su prezentacijske vještine, liderstvo, motivacija i mnogi drugi na kojima će steći veoma važne vještine koje će im pomoći u daljem školovanju i poslovnom životu.
                
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 justifyText clanakText2">
            <p class="aboutProjectTextBottom">
                40 najambicioznijih studenata svih fakulteta u Sarajevu učestvovat će u treninzima kao što su prezentacijske vještine, liderstvo, motivacija i mnogi drugi na kojima će steći veoma važne vještine koje će im pomoći u daljem školovanju i poslovnom životu.
            </p>
        </div>

    </div>

</div>


<?php include 'partials/footer.html'; ?>

</body>

</html>