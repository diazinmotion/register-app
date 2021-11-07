<script src="<?= base_url(PATH_ASSETS) ?>vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="<?= base_url(PATH_ASSETS) ?>vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?= base_url(PATH_ASSETS) ?>vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="<?= base_url(PATH_ASSETS) ?>libs/js/main-js.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script>
  var base_url = '<?php echo base_url(); ?>';
</script>
<?php 
  if(isset($script)){
    foreach($script as $row){
      echo '<script src="'.base_url(PATH_ASSETS.'js/'.$row).'"></script>';
    }
  }
?>