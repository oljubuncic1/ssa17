<!DOCTYPE html>
<html>

<head>
    
    <?php include 'partials/headerExt.html'; ?>
    <link rel="stylesheet" href="css/galerija/galerijaMain.css">
	<link rel="stylesheet" href="css/galerija/ihover.min.css">

    <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

</head>

<body>

<?php include 'partials/mainNavbar2.html'; ?>

<div class="marginContainer">
    <div class="container-fluid">
    	 <?php
    $godine = array();
    $path = "./img/galerija";
    $dir = new DirectoryIterator($path);
    $counter = 0;
    foreach ($dir as $fileinfo) {
        if ($fileinfo->isDir() && !$fileinfo->isDot()) {
            $fileName = $fileinfo->getFilename();
            if($fileName != "img"){
              $godine[$counter] = $fileinfo->getFilename();
              $counter++;
            }

        }
    }
        sort($godine);

    ?>

        <div id="album-container">
        <?php for($i = 0; $i < $counter; $i++) { ?>
            <div class="col-lg-4 col-md-6 col-sm-12 col-centered">
                <div class="album-preview center-block"   >

                    <div class="ih-item square effect6 from_top_and_bottom center-block">

                        <?php  echo " <a href=katalog.php?godina=$godine[$i] > "; ?>

                            <div class="img">

                              <?php
                                //if(count(glob('img/galerija/'.$godine[$i] . '/'. "*.{JPG,jpg,png,PNG}", GLOB_BRACE)) > 0) {
                                $fi = new FilesystemIterator('img/galerija/'.$godine[$i].'/', FilesystemIterator::SKIP_DOTS);
                                $pictureCount = iterator_count($fi);
                                if($pictureCount > 0){ ?>

                                  <img src= "./img/galerija/<?php echo "$godine[$i]"?>/cover.jpg" />
                                <!-- Dakle u folder albuma se stavlja slika koja ce predstavljati album na galerije.php
                                      naziv slike je logicno "cover.jpg" -->
                                <?php } else if($pictureCount == 0) { ?>
                                      <img src="./img/galerija/albumempty1.png" />
                                <?php } ?>

                            </div>
                            <div class="info">
                                <h3> SSA '<?php echo substr($godine[$i], 2); ?>  </h3>
                            </div>


                      </a>
                    </div>
                  </div>
            </div>
        <?php } ?>
      </div>  
    </div>

</div>


<?php include 'partials/footer.html'; ?>


</body>

</html>