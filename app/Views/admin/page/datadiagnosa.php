<?= $this->extend('partials/sidebaradmin') ?>


<?= $this->section('content') ?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Diagnosa</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="/home">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="">Manajemen Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/datadiagnosa">Data Diagnosa</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"><b>Data Diagnosa</b></h4>
                                <a href="/konsultasi" class="btn btn-primary btn-round ml-auto" data-toggle="modal">
                                    <i class="fa fa-plus"></i>&NonBreakingSpace;Tambahkan
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal new-->
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Penyakit</th>
                                            <th>tanggal Konsultasi</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row=1; foreach ($datadiagnosa as $data) : ?>
                                            <tr>
                                                <td><?= $row++; ?></td>
                                                <td><?= $data['nama_pasien'] ?></td>
                                                <td><?= $data['nama_penyakit'] ?></td>
                                                <td><?= $data['tanggal_konsultasi'] ?></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <form action="<?= base_url('admin/datadiagnosa/delete/'.$data['id']) ?>" method="POST">
                                                            <?= csrf_field() ?>
                                                            <input type="hidden" name="_method" value="delete"/>
                                                            <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="return confirm('apakah anda yakin ingin menghapus ?')">
                                                                <i class="fa fa-trash">&NonBreakingSpace; Delete</i>
                                                            </button>
                                                        </form>
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

    <!--   Core JS Files   -->
    <script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="../../assets/js/core/popper.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="../../assets/js/plugin/datatables/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({});

            $('#multi-filter-select').DataTable({
                "pageLength": 5,
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" data-target="#addRowModal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            // $('#addRowButton').click(function() {
            // 	$('#add-row').dataTable().fnAddData([
            // 		$("#addNamaPenyakit").val(),
            // 		action
            // 		]);
            // 	$('#addRowModal').modal('hide');

            // });
        });
    </script>

    <?= $this->endSection() ?>
