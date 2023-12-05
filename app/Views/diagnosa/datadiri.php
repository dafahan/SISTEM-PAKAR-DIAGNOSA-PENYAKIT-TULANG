<!-- views/diagnosa/datadiri.php -->

<?= $this->extend('layouts/main') ?>



<?= $this->section('content') ?>
<style>
    .judul {
        height: 25vh;
    }

    .judul .container {
        border-bottom: 2px solid #000;
        height: 25vh;
        padding-top: 15vh;
    }

    .form {
        height: 100%;
        padding-bottom: 70px;
    }
</style>

<section class="judul mt-5">
    <div class="container">
        <h2>Diagnosa</h2>
    </div>
</section>

<section class="form mt-5">
    <div class="container">
        <div class="navbar">
            <div class="kolom" style="width:35%; height:100%;">
                <img src="<?= base_url('img/Monitorwithcardiogramtubes.png') ?>" alt="" width="450px;">
            </div>
            <div class="kolom" style="width:65%; height:100%; padding-left:60px;">
                <div>
                    <p style="
                    width: 187px;
                    height: 60px;
                    font-style: normal;
                    font-weight: 600;
                    font-size: 35px;
                    line-height: 60px;
                    
                    letter-spacing: -0.005em;
                    
                    color: #000000;">Data Diri</p>
                    <p style="
                    font-style: normal;
                    font-weight: 500;
                    font-size: 16px;
                    line-height: 30px;
                    /* or 200% */
                    
                    letter-spacing: -0.015em;
                    
                    color: rgba(0, 79, 136, 0.8); padding-bottom:10px;"> Untuk pasien yang ingin melakukan konsultasi masalah keluhan yang dialami, 
                        Terlebih dahulu melakukan pengisian data yang telah diminta, isi data sesuai prosedur 
                        dan keterangan yang ada</p>
                </div>
                <div class="container">
                    <div class="row justify-content-left">
                        <div class="card-body">
                            <form method="post" action="<?= base_url('konsultasi') ?>" name="input">
                                <?= csrf_field() ?>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-3 col-form-label"><?= ('Nama') ?></label>

                                    <div class="col-md-8">
                                        <input id="nama" type="text" class="form-control <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" name="nama" autofocus>

                                        <?php if (session('errors.nama')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.nama') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-3 col-form-label"><?=  ('Tanggal Lahir') ?></label>

                                    <div class="col-md-8">
                                        <input id="tanggal_lahir" type="date" class="form-control <?php if (session('errors.tanggal_lahir')) : ?>is-invalid<?php endif ?>" name="tanggal_lahir">

                                        <?php if (session('errors.tanggal_lahir')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.tanggal_lahir') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-3 col-form-label"><?= ('Email') ?></label>

                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email">

                                        <?php if (session('errors.email')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.email') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-3 col-form-label"><?= ('No-handphone') ?></label>

                                    <div class="col-md-8">
                                        <input id="no_telp" type="text" class="form-control <?php if (session('errors.no_telp')) : ?>is-invalid<?php endif ?>" name="no_telp">

                                        <?php if (session('errors.no_telp')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.no_telp') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-3 col-form-label"><?= ('Jenis kelamin') ?></label>

                                    <div class="col-md-8">
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value=""><?= ('Pilih jenis kelamin') ?></option>
                                            <option value="L"><?= ('L') ?></option>
                                            <option value="P"><?= ('P') ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-0" style="padding-top: 10px;">
                                    <div class="col-md-6">
                                        <a href=""><button type="submit" class="btn btn-primary">
                                                <?= ('Kirim dan Lanjutkan Konsultasi') ?>
                                            </button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
