<div class="card">
  <div class="card-header text-center">
    <a href="<?php echo base_url() ?>">
      <h1 class="m-0"><?php echo APP_NAME ?></h1>
    </a>
    <span class="splash-description">Masukkan Email dan Password Anda</span>
  </div>
  <div class="card-body">
    <?php if($this->session->flashdata('msg')){ ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $this->session->flashdata('msg') ?>
    </div>
    <? } ?>
    <form method="POST" action="<?php echo current_url() ?>">
      <div class="form-group">
        <input class="form-control form-control-lg" name="email" type="email" placeholder="Email" autocomplete="off">
      </div>
      <div class="form-group">
        <input class="form-control form-control-lg" name="password" type="password" placeholder="Password">
      </div>
      <hr>
      <button type="submit" class="btn btn-primary btn-lg btn-block">Masuk</button>
    </form>
  </div>
</div>