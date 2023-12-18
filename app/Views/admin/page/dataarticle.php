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
                                    <h4 class="card-title"><b>Data Article</b></h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                        <i class="fa fa-plus"></i>
                                        &nbsp;Tambahkan Article
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
                                                        Article
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
                                                            <form action="<?= base_url('article/add') ?>" method="POST">
                                                                <?= csrf_field() ?>
                                                                <div>
                                                                    <label>Headline</label>
                                                                    <input type="text" class="form-control" name="headline" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;">
                                                                    <br>
                                                                    <label>Description</label>
                                                                    <textarea  class="form-control" name="description" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;"></textarea>
                                                                    <br>
                                                                    <label>Text</label>
                                                                    <textarea type="text" class="form-control" name="text"  style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;"></textarea>
                                                                    
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
                                            <th></th>
                                            <th>Headline</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                <?php $no=1; foreach ($article as $dt) : ?>
                                                    <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $dt['headline']; ?></td>
                                                    <td><?= $dt['description']; ?></td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button type="button" data-toggle="modal" title="" data-target="#updateRowModal<?=$no?>" class="btn btn-link btn-warning btn-lg" data-original-title="Edit Task">
                                                                <i class="fa fa-edit">&nbsp; Edit</i>
                                                            </button>

                                                            <!-- modal update -->
                                                            <div class="modal fade" id="updateRowModal<?= $no?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                                        <form action="<?= base_url('article/edit/'.$no ) ?>" method="POST">
                                                                                            
                                                                                        <?= csrf_field() ?>
                                                                                                <div>
                                                                                                    <label>Headline<?= $no?></label>
                                                                                                    <input type="text" class="form-control" value="<?= $dt['headline']; ?>" name="headline" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;">
                                                                                                    <br>
                                                                                                    <label>Description</label>
                                                                                                    <textarea  class="form-control" name="description"  style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;"><?= $dt['description']; ?></textarea>
                                                                                                    <br>
                                                                                                    <label>Text</label>
                                                                                                    <textarea type="text" class="form-control" name="text"   style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;"><?= $dt['hasPart'][0]['text']; ?></textarea>
                                                                                                    
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
                                                            <a href="<?=base_url('article/detail/'.$no)?>" data-toggle="tooltip" class="btn btn-link btn-info" >
                                                                    <i class="fa fa-info">&nbsp; Detail</i>
                                                            </a>
                                                            <form action="<?= base_url('article/delete/'.$no) ?>" method="GET">
                                                                <?= csrf_field() ?>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                                    <i class="fa fa-trash">&nbsp; Delete</i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php $no++; endforeach;  ?>
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
    <!--   Core JS Files   -->
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>

	<script src="../../js/jquery.3.6.1.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
	$(document).ready(function() {
		$('.js-example-basic-multiple').select2();
	});
	</script>
	<script>
	$(document).ready(function() {
		$('.js-multiple').select2();
	});
	</script>

	


	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
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
