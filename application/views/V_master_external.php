<!doctype html>
<html lang="en">
<!-- HEADER -->
<?php $this->load->view('layouts/landing/_header') ?>
<!-- END HEADER -->
<body>
  <div class="splash-container">
    <!-- CONTENTS -->
    <?php 
      if(isset($page_content)){
        $this->load->view($page_content);
      }else{
        echo '<center><h3 class="clearfix m-0" style="padding-top:25%">Halaman Tidak Tersedia</h3><small>Halaman yang dimaksud saat ini tidak tersedia atau telah dihapus.</small></center>';
      }
    ?>
    <!-- END CONTENTS -->
  </div>
  <!-- SCRIPTS -->
  <?php $this->load->view('layouts/landing/_footer') ?>
  <!-- END SCRIPTS -->
</body>
</html>