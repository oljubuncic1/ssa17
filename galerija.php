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

                        <a href="#">
                            <div class="img">

                              <?php
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


<?php include 'partials/footer.html'; ?>
 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Izaberite dan</h4>
      </div>
      <div class="modal-body">
        <div id="album-container">
        <?php
          $godina = isset($_POST['godina']) ? $_POST['godina'] : 2012;
          $niz2 = new ArrayObject($godine[$godina]);
          $it2 = $niz2->getIterator();
          foreach($it2 as $val){ ?>
            <div class="col-lg-4 col-md-6 col-sm-12 col-centered">
              <div class="album-preview center-block">
                <div class="ih-item square effect6 from_top_and_bottom center-block" >
                  <a <?php echo "href=\"?godina=$godina&dan=$val\" " ?> >
                    <div class="img">

                      <?php
                        $fi = new FilesystemIterator('img/galerija/'.$godina.'/'.$val.'/', FilesystemIterator::SKIP_DOTS);
                        $pictureCount = iterator_count($fi);
                        if($pictureCount > 0) ?>

                        <img src= "./img/galerija/<?php echo $godina.'/thumbs//'.$val ?>/cover.jpg" />
                    </div>
                    <div class="info">
                      <h3> DAN <?php echo $val ?> </h3>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


</body>

</html>