<!doctype html>
<html lang="en">
<!-- HEADER -->
<?php $this->load->view('layouts/admin/_header') ?>
<!-- END HEADER -->
<body>
  <div class="dashboard-main-wrapper">
    <!-- TOPBAR -->
    <?php $this->load->view('layouts/admin/_topbar') ?>
    <!-- END TOPBAR -->
    <!-- SIDEBAR -->
    <?php $this->load->view('layouts/admin/_sidebar') ?>
    <!-- END SIDEBAR -->
    <div class="dashboard-wrapper">
      <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content" style="min-height:900px;">
            <? if(isset($page_title)){ ?>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title"><?php echo $page_title ?></h2>
                    </div>
                </div>
            </div>
            <? } ?>
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
      </div>
      <!-- FOOTER -->
      <div class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                © <?php echo date('Y').' '.APP_NAME ?>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                v<?php echo APP_VERSION ?>
            </div>
          </div>
        </div>
      </div>
      <!-- END FOOTER -->
    </div>
  </div>
  <!-- SCRIPTS -->
  <?php $this->load->view('layouts/admin/_footer') ?>
  <!-- END SCRIPTS -->
</body>
</html>