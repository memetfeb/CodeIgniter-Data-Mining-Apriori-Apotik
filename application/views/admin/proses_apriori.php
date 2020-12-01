<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<?php $this->load->view("admin/_partials/sidebar.php") ?>
			<!-- top navigation -->
			<?php $this->load->view("admin/_partials/navbar.php") ?>
			<!-- /top navigation -->
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="row">
					<div class="col-md-12 col-sm-12 ">
						<?php if ($this->session->flashdata('success')) { ?>
						<div class="alert alert-success" role="alert">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<?php echo $this->session->flashdata('success'); ?>
						</div>
						<?php } else if($this->session->flashdata('error')){ ?>
						<div class="alert alert-danger">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
						</div>
						<?php } else if($this->session->flashdata('warning')){ ?>
						<div class="alert alert-warning">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
						</div>
						<?php } else if($this->session->flashdata('info')){ ?>
						<div class="alert alert-info">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
						</div>
						<?php } ?>

						<div class="x_panel">
							<div class="x_title">
								<h2>Proses Apriori</h2>

								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<form action="<?php echo site_url('admin/proses_apriori/prosesapriori') ?>" method="post">
										<div class="col-sm-12">

											<div class="form-group col-md-12 col-sm-12">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Rentang Tanggal Transaksi Yang Di
													Proses : </label>
												<div class="col-md-6 col-sm-6 ">
													<div class="input-prepend input-group">
														<span class="add-on input-group-addon">
															<i class="fa fa-calendar"></i></span>
														<input type="text" style="width: 200px" name="range_tanggal" id="reservation"
															class="form-control" required />
													</div>
												</div>
											</div>

											<div class="form-group col-md-12 col-sm-12">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Min Support : </label>
												<div class="col-md-6 col-sm-6 ">
													<input class="form-control" type="number" step="any" name="support" placeholder="Min Support" required />
												</div>
											</div>

											<div class="form-group col-md-12 col-sm-12">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Min Confidence : </label>
												<div class="col-md-6 col-sm-6 ">
													<input class="form-control" type="number" step="any" name="confidence" placeholder="Min Confidence"
														required />
												</div>
											</div>

											<div class="form-group col-md-12 col-sm-12">
												<label class="col-form-label col-md-4 col-sm-4 label-align"></label>
												<div class="col-md-6 col-sm-6 ">
													<button type="submit" class="btn btn-success">Proses Data</button>
												</div>
											</div>

										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
					<!-- /DataTables -->
				</div>
				<br />
			</div>
			<!-- /page content -->

			<!-- footer content -->
			<?php $this->load->view("admin/_partials/footer.php") ?>
			<!-- /footer content -->
		</div>
	</div>
	<!-- js -->
	<!-- jQuery -->
	<script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url('assets/fastclick/lib/fastclick.js') ?>"></script>
	<!-- NProgress -->
	<script src="<?php echo base_url('assets/nprogress/nprogress.js') ?>"></script>
	<!-- iCheck -->
	<script src="<?php echo base_url('assets/iCheck/icheck.min.js') ?>"></script>
	<!-- Datatables -->
	<script src="<?php echo base_url('assets/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
	<script src="<?php echo base_url('assets/datatables.net-scroller/js/dataTables.scroller.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/jszip/dist/jszip.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/pdfmake/build/pdfmake.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/pdfmake/build/vfs_fonts.js') ?>"></script>
	</script>
	<!-- Custom Theme Scripts -->
	<script src="<?php echo base_url('js/custom.min.js') ?>"></script>
	<script>
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}

	</script>
	<!-- bootstrap-daterangepicker -->
	<script src="<?php echo base_url('assets/moment/min/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
	<script src="<?php echo base_url().'js/jquery-ui.js'?>" type="text/javascript"></script>
	<!-- bootstrap-datetimepicker -->
	<script src="<?php echo base_url('assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>">
	</script>
	<!-- Initialize datetimepicker -->
	<script type="text/javascript">
		$('.myDatepicker2').datetimepicker({
			format: 'YYYY/MM/DD'
		});
		$('#myDatepicker3').datetimepicker({
			format: 'YYYY'
		})

	</script>
</body>

</html>
