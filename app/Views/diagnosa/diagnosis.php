<!-- app/Views/diagnosa/gejala.php -->

<?= $this->extend('layouts/main') ?>



<?= $this->section('content') ?>


<section class="judul mt-5">
    <div class="container">
        <h2>Diagnosa</h2>
    </div>
</section>


<div class="main-panel d-flex justify-content-center align-items-center" style="margin:10vh 0;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header p-3">
                <h4 class="page-title">Data Diagnosa</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center p-3">
                                <h4 class="card-title p-3"><b>Data Diagnosa</b></h4>
                               
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal new-->
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                           
                                            <th>Penyakit</th>
                                            <th>tanggal Konsultasi</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row=1; foreach ($datadiagnosa as $data) : ?>
                                            <tr>
                                                <td><?= $row++; ?></td>
                                               
                                                <td><?= $data['nama_penyakit'] ?></td>
                                                <td><?= $data['tanggal_konsultasi'] ?></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <div class="d-flex inline-flex">
                                                        
                                                        <form action="<?= base_url('admin/datadiagnosa/delete/'.$data['id']) ?>" method="POST">
                                                            <?= csrf_field() ?>
                                                            <input type="hidden" name="_method" value="delete"/>
                                                            <button type="submit" data-toggle="tooltip" title="" class="btn  btn-danger" data-original-title="Remove" onclick="return confirm('apakah anda yakin ingin menghapus ?')">
                                                                DELETE
                                                            </button>
                                                        </form>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?= $this->endSection() ?>
