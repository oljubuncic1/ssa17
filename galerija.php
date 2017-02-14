<!DOCTYPE html>
<html>

<head>
    
    <?php include 'partials/headerExt.html'; ?>
    <link rel="stylesheet" href="css/galerija/galerijaMain.css"/>
	<link rel="stylesheet" href="css/galerija/ihover.min.css"/>
    <script type="text/javascript" src="js/galerija/saha-gallery.js"></script>

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
            if($fileName != "img" && $fileName != "thumbs"){
              //$godine[$fileName]["godina"] = $fileName;
              $godine[$fileName] = array();

              $it = new DirectoryIterator($path."/".$fileName);

              foreach($it as $day){
                  if ($day->isDir() && !$day->isDot()){
                      $dayName = $day->getFilename();
                      if($dayName != "img" && $dayName != "thumbs"){
                          $godine[$fileName][] = $dayName;
                      }
                  }
              }

              $counter++;
            }
        }
    }
    //print_r($godine);
    ?>

        <div id="album-container">
        <?php 
        $niz = new ArrayObject($godine);
        $it = $niz->getIterator();
        foreach($it as $key=>$val) { ?>
            <div class="col-lg-4 col-md-6 col-sm-12 col-centered">
                <div class="album-preview center-block">

                    <div class="ih-item square effect6 from_top_and_bottom center-block"
                         onclick="showDays(<?php echo $key ?>)"  >

                        <?php  /*echo " <a href= album.php?godina=$godine[$i] > ";*/ ?>
                        <a href="#">
                            <div class="img">

                              <?php
                                //if(count(glob('img/galerija/'.$godine[$i] . '/'. "*.{JPG,jpg,png,PNG}", GLOB_BRACE)) > 0) {
                                $fi = new FilesystemIterator('img/galerija/'.$key.'/', FilesystemIterator::SKIP_DOTS);
                                $pictureCount = iterator_count($fi);
                                if($pictureCount > 0){ ?>

                                  <img src= "./img/galerija/<?php echo $key ?>/thumbs/cover.jpg" />
                                <!-- Dakle u folder albuma se stavlja slika koja ce predstavljati album na galerije.php
                                      naziv slike je logicno "cover.jpg" -->
                                <?php } else if($pictureCount == 0) { ?>
                                      <img src="./img/galerija/albumempty1.png" />
                                <?php } ?>

                            </div>
                            <div class="info">
                                <h3> SSA '<?php echo substr($key, 2); ?>  </h3>
                            </div>


                      </a>
                    </div>
                  </div>
            </div>
        <?php } ?>
      </div>  
    </div>

</div>

<?php include 'partials/modalDays.php'; ?>

<?php include 'partials/footer.html'; ?>


</body>

</html>