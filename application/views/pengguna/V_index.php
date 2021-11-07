<div class="row">
  <div class="col-xl-12 col-lg-12">
    <div class="card">
      <h5 class="card-header">
        <span class="float-right">
          <a href="#" class="btn btn-success btn-sm export">Download</a>
          <a href="#" class="btn btn-primary btn-sm btn-item-add">Tambah</a>
        </span>
      </h5>
        <div class="card-body">
          <table id="table-content" class="table table-bordered table-striped">
            <thead>
              <th>Nama Lengkap</th>
              <th>Alamat Tinggal</th>
              <th class="text-center">No. Handphone</th>
              <th class="text-center">Rayon</th>
              <th class="text-center hide-export">Action</th>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="modal-action" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <form class="form-action">
          <div class="form-group">
            <input type="hidden" name="id">
            <input class="form-control" name="nama" type="text" placeholder="Nama Lengkap">
          </div>
          <div class="form-group">
            <input class="form-control" name="no_hp" type="text" placeholder="Nomor Handphone">
          </div>
          <div class="form-group">
            <?php
              $opt = [
                'Kasih'           => 'Rayon Kasih',
                'Kesetiaan'       => 'Rayon Kesetiaan',
                'Sukacita'        => 'Rayon Sukacita',
                'Damai Sejahtera' => 'Rayon Damai Sejahtera',
                'Lainnya'         => 'Rayon Lainnya'
              ];

              echo form_dropdown('rayon', $opt, [], 'class="form-control" placeholder="Pilih Rayon"');
            ?>
          </div>
          <div class="form-group">
            <textarea name="alamat" class="form-control" cols="30" rows="10" placeholder="Alamat"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-secondary" data-dismiss="modal">Tutup</a>
        <a href="#" class="btn btn-primary btn-simpan">Simpan</a>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL -->

<script>
  var table_url     = '<?php echo base_url('pengguna/ajax_module_index') ?>';
  var table_columns = ['<?php echo implode('\', \'', $columns) ?>'];
</script>