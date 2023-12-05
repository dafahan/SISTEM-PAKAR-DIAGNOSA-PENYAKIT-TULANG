<?= $this->extend('partials/sidebaradmin') ?>



<?= $this->section('content') ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title"><b>Data Pasien</b></h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="<?= base_url('/home') ?>">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/penyakit') ?>">Manajemen Data</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/datapasien') ?>">Data Pasien</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title"><b>Data pasien</b></h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                        <i class="fa fa-plus"></i>
                                        &nbsp;Tambahkan Pasien
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Modal new-->
                                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header no-bd">
                                                <h5 class="modal-title">
                                                    <span class="fw-mediumbold">
                                                    Tambahkan</span> 
                                                    <span class="fw-light">
                                                        Pasien
                                                    </span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <form action="<?= base_url('admin/datapasien/store') ?>" method="POST">
                                                                <?= csrf_field() ?>
                                                                <div>
                                                                    <label>Nama</label>
                                                                    <input type="text" class="form-control" name="nama" placeholder="masukan nama" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;">
                                                                    <br>
                                                                    <label>Tanggal Lahir</label>
                                                                    <input type="date" class="form-control" name="tanggal_lahir" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;">
                                                                    <br>
                                                                    <label>Email</label>
                                                                    <input type="text" class="form-control" name="email" placeholder="masukan email" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;">
                                                                    <br>
                                                                    <label>No Telpon</label>
                                                                    <input type="text" class="form-control" name="no_telp" placeholder="masukan no-telpon" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;">
                                                                    <br>
                                                                    <label>Jenis Kelamin</label>
                                                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" style="border: 1px solid #f1f1f1; height:40px; padding:13px 10px;">
                                                                        <option value="">Pilih jenis kelamin</option>
                                                                        <option value="L">L</option>
                                                                        <option value="P">P</option>
                                                                    </select> 
                                                                </div>

                                                                <div class="modal-footer no-bd">
                                                                    <input type="submit" class="btn btn-primary" name="submit" value="Add">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>        
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $row=1; foreach ($datapasien as $data): ?>
                                                <tr>
                                                    <td><?= $row++; ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['tanggal_lahir'] ?></td>
                                                    <td><?= $data['jenis_kelamin'] ?></td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button type="button" data-toggle="modal" title="" data-target="#updateRowModal<?= $data['id'] ?>" class="btn btn-link btn-warning btn-lg" data-original-title="Edit Task">
                                                                <i class="fa fa-edit">&nbsp; Edit</i>
                                                            </button>

                                                            <!-- modal update -->
                                                            <div class="modal fade" id="updateRowModal<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header no-bd">
                                                                            <h5 class="modal-title">
                                                                                <span class="fw-mediumbold">
                                                                                Update</span> 
                                                                                <span class="fw-light">
                                                                                    nama penyakit
                                                                                </span>
                                                                            </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group form-group-default">
                                                                                        <form action="<?= base_url('admin/datapasien/update/' . $data['id']) ?>" method="POST">
                                                                                            
                                                                                            <?= csrf_field() ?>
                                                                                            <input type="hidden" name="_method" value="put"/>
                                                                                            <div>
                                                                                                <label>Nama</label>
                                                                                                <input type="text" class="form-control" value="<?= $data['nama'] ?>" name="nama" placeholder="masukan nama" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;">
                                                                                                <br>
                                                                                                <label>Tanggal Lahir</label>
                                                                                                <input type="date" class="form-control" value="<?= $data['tanggal_lahir'] ?>" name="tanggal_lahir" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;">
                                                                                                <br>
                                                                                                <label>Email</label>
                                                                                                <input type="text" class="form-control" value="<?= $data['email'] ?>" name="email" placeholder="masukan email" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;">
                                                                                                <br>
                                                                                                <label>No Telpon</label>
                                                                                                <input type="text" class="form-control" value="<?= $data['no_telp'] ?>" name="no_telp" placeholder="masukan no-telpon" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;">
                                                                                                <br>
                                                                                                <label>Jenis Kelamin</label>
                                                                                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" style="border: 1px solid #f1f1f1; height:40px; padding:13px 10px;">
                                                                                                    <option value="<?= $data['jenis_kelamin'] ?>"><?= $data['jenis_kelamin'] ?></option>
                                                                                                    <option value="L">L</option>
                                                                                                    <option value="P">P</option>
                                                                                                </select> 
                                                                                            </div>

                                                                                            <div class="modal-footer no-bd">
                                                                                                <input type="submit" class="btn btn-warning" name="submit" value="Update">
                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>        
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <form action="<?= base_url('admin/datapasien/delete/' . $data['id']) ?>" method="POST">
                                                                <?= csrf_field() ?>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                                    <i class="fa fa-trash">&nbsp; Delete</i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
