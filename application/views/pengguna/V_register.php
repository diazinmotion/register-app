<div class="card">
  <div class="card-header">
    <span>
      Untuk menghadiri Ibadah di GKI Delima mohon mendaftarkan diri Anda, silakan lengkapi data yang tersedia pada form di bawah ini. Form ini digunakan untuk keperluan pendataan dan alokasi tempat
    </span>
  </div>
  <div class="card-body">
    <?php if($this->session->flashdata('msg')){ ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $this->session->flashdata('msg') ?>
    </div>
    <? } ?>
    <?php if($this->session->flashdata('msg_success')){ ?>
    <div class="alert alert-success" role="alert">
      <?php echo $this->session->flashdata('msg_success') ?>
    </div>
    <? } ?>
    <form method="POST" action="<?php echo current_url() ?>">
      <div class="form-group">
        <input class="form-control form-control-lg" name="nama" type="text" placeholder="Nama Lengkap">
      </div>
      <div class="form-group">
        <input class="form-control form-control-lg" name="no_hp" type="text" placeholder="No Handphone">
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
        <textarea name="alamat" class="form-control" cols="30" rows="2" placeholder="Alamat"></textarea>
      </div>
      <hr>
      <button type="submit" class="btn btn-primary btn-lg btn-block">Daftar</button>
    </form>
  </div>
</div>