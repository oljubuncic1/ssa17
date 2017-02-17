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
          echo "<h3>$godina</h3>";
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
