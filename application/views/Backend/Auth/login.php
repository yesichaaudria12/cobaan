<body class="login-body">

  <!--Login Wrapper-->

  <div class="container-fluid login-wrapper">
    <div class="login-box">
      <h1 class="text-center mb-5"><i class="fa fa-users"></i> Selamat Datang</h1>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-12 login-box-info">
          <p class="mb-4">
            <img src="./gambar/logo.png" style="max-width: 90%; height: auto;" alt="Management Karyawan">
          </p>
          <h3 class="mb-4">Sistem Manajemen Pengajian Terpadu</h3>

        </div>
        <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
          <h3 class="mb-4 text-center">Login</h3>
          <!-- // -->

          <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <p><strong><i class="fa fa-check"></i> <?= $this->session->flashdata('message'); ?></strong></p>
              <?= $this->session->unset_userdata('message'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif ?>
          <form class="user" method="post" action="<?= base_url('auth'); ?>" class="mt-2">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan email" value="<?= set_value('email'); ?>">
              <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
              </div>
              <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
              <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
              <button class="btn btn-theme btn-block p-2 mb-1">Login</button>
              <a href="#">

              </a>
            </div>
          </form>
          <!--  -->
        </div>
      </div>
    </div>
  </div>