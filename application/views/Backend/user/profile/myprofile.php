<!--Content right-->
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-3"><strong>Profile</strong></h5>

    <!--Dashboard widget-->
    <?php if ($this->session->flashdata('flash')) : ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
        <?= $this->session->unset_userdata('flash'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif ?>
    <div class="mt-1 mb-3 button-container">
        <div class="alert alert-primary" role="alert">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <p>Selamat Datang, <b><?= $user['name'] ?></b></p>
                </div>

                <!-- <div class="modal fade bd-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <?= form_open('profile/MyProfile/update_profile'); ?>
                            <?= form_hidden('id', $user->id ?? ''); ?>
                            <h5 class="text-secondary text-center"><strong>Edit Profil</strong></h5>

                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-horizontal"
                                        action="<?php echo base_url() . 'pegawai/edit-profil' ?>/<?= $user['id'] ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-sm-12">Email</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="email" class="form-control"
                                                    value="<?= $user['email'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Nama</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="nama" class="form-control"
                                                    value="<?= $user['name'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-1 ml-3">Photo</label>
                                                <div class="col-sm-2 ml-3">
                                                    <img src="<?php echo base_url() . '/gambar/pegawai/' . $user['image']; ?>"
                                                        class="card-img mx-auto d-block"
                                                        style="width: 120px; height: 140px;">
                                                </div>
                                                <div class="col-sm-6 ml-5">
                                                    <input type="file" name="userfilefoto" class="form-control"
                                                        id="userfilefoto">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-footer mt-3">
                                    <button type="button" class="btn btn-default btn-flat"
                                        onclick="closeForm()">Close</button>
                                    <button type="submit" class="btn btn-primary btn-flat" id="save">Save</button>
                                </div>

                                </form>
                            </div>

                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="text-secondary text-center"><strong>Perbarui Password</strong></h5>
                                </div>

                                <form class="form-horizontal"
                                    action="<?php echo base_url() . 'pegawai/edit-password' ?>/<?= $user['id'] ?>"
                                    method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-sm-12">Password Lama</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="password_lama" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Password Baru</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="password_baru" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Konfirmasi Password</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="password_baru1" class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-footer mt-3">
                                        <button type="button" class="btn btn-default btn-flat"
                                            onclick="closeForm()">Close</button>
                                        <button type="submit" class="btn btn-primary btn-flat" id="save">Save</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>