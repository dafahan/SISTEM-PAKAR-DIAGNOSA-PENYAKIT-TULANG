<?= $this->extend('partials/sidebaradmin') ?>



<?= $this->section('content') ?>
	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">Data Gejala</h4>
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
							<a href="/admin/datagejala">Data Gejala</a>
						</li>
					</ul>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<h4 class="card-title"><b>Data Gejala</b></h4>
									<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
										<i class="fa fa-plus"></i>&NonBreakingSpace;Tambahkan
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
														Gejala
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
															<form action="<?= base_url('admin/datagejala/store'); ?>" method="POST">
																<?= csrf_field() ?>
																<div>
																	<label>Kode Gejala</label>
																	<input type="text" class="form-control" name="kode_gejala" value="<?= $kode ?>" placeholder="masukan kode gejala" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;" readonly>
																	<br>
																	<label>Gejala</label>
																	<input type="text" class="form-control" name="nama_gejala" placeholder="masukan gejala" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;">
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
												<th>Kode</th>
												<th>Gejala</th>
												<th style="width: 10%">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $row=1; foreach ($datagejala as $data): ?>
												<tr>
													<td><?= $row++; ?></td>
													<td><?= $data['kode_gejala'] ?></td>
													<td><?= $data['nama_gejala'] ?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="modal" title="" data-target="#updateRowModal<?= $data['id'] ?>" class="btn btn-link btn-warning btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit">&NonBreakingSpace; Edit</i>
															</button>

															<!-- modal update -->
															<div class="modal fade" id="updateRowModal<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header no-bd">
																			<h5 class="modal-title">
																				<span class="fw-mediumbold">
																				Edit</span> 
																				<span class="fw-light">
																					Gejala
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
																						<form action="<?= base_url('admin/datagejala/update/'.$data['id']); ?>" method="POST">
																						<input type="hidden" name="_method" value="put">

																							<?= csrf_field() ?>
																							<div>
																								<label>Kode Gejala</label>
																								<input type="text" class="form-control"  value="<?= $data['kode_gejala'] ?>" name="kode_gejala" placeholder="masukan kode gejala" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;" readonly>
																								<br>
																								<label>Gejala</label>
																								<input type="text" class="form-control" value="<?= $data['nama_gejala'] ?>" name="nama_gejala" placeholder="masukan gejala" style="border: 1px solid #f1f1f1; line-height:40px; padding-left:10px;">
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

															<form action="<?= base_url('admin/datagejala/delete/'.$data['id']); ?>" method="POST">
																<?= csrf_field() ?>
																<input type="hidden" name="_method" value="delete">

																<button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="return confirm('apakah anda yakin ingin menghapus ?')">
																	<i class="fa fa-trash">&NonBreakingSpace; Delete</i>
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

	<!-- Core JS Files -->
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#basic-datatables').DataTable();

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
