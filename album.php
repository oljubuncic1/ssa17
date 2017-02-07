<?php
	$godina = $_GET['godina'];
	$coolGodina = substr($godina, 2);

	$folder_path = 'img/galerija/'.$godina.'/';

	$num_files = glob($folder_path . "*.{JPG,jpg,png}", GLOB_BRACE);

	/*$urlGalerija = $url_home.'galerija'; // OVO PROMIJENITI U 'galerije' AKO JE U .htaccess UMJESTO ^galerija$ STAVLJENO ^galerije$

	if(count($num_files) == 0){

			header('Location: '.$urlGalerija);
			die();

	}*/
	?>
<!DOCTYPE html>
<html>

<head>
    
    <?php include 'partials/headerExt.html'; ?>

    <link rel="stylesheet" href="css/galerija/blueimp-gallery.min.css">
    <link rel="stylesheet" href="css/galerija/album.css">

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
    <div class="text">SSA '<?php echo $coolGodina; ?></div>
        <div id="links">
          <?php

          $folder = opendir($folder_path);

          if(count($num_files) > 0)
          {
            while(false !== ($file = readdir($folder)))
            {
              $file_path = $folder_path.$file;
              $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
              if($extension=='jpg' || $extension =='png')
              {
                ?>
                <div class="slika">
                  <a href="<?php echo $file_path; ?>" data-gallery>

                      <img src="<?php echo $file_path; ?>">
                  </a>
                </div>
                  <?php
                }
              }
            } else
            {
              echo "<script> alert('Album je prazan !')</script>";
            }
            closedir($folder);
            ?>
        </div>
        <div id="blueimp-gallery" class="blueimp-gallery">
            <!-- The container for the modal slides -->
            <div class="slides"></div>
            <!-- Controls for the borderless lightbox -->
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
            <!-- The modal dialog, which will be used to wrap the lightbox content -->
            <div class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body next"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left prev">
                                <i class="glyphicon glyphicon-chevron-left"></i>
                                Previous
                            </button>
                            <button type="button" class="btn btn-primary next">
                                Next
                                <i class="glyphicon glyphicon-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<script src="./js/galerija/blueimp-gallery.js"></script>
<script>
document.getElementById('links').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
        link = target.src ? target.parentNode : target,
        options = {index: link, event: event},
        links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
};
</script>


<?php include 'partials/footer.html'; ?>


</body>

</html>