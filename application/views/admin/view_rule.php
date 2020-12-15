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

						<div class="card mb-3">
							<div class="card-header">
								<a href="<?php echo site_url('admin/hasil/') ?>"><i class="fa fa-arrow-left"></i>
									Back </a>
							</div>
							<div class="card-body">
								<div class="x_title">
									<h2>Rule ID : <?php echo $RuleID->id ?> </h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="row">
										<div class="col-sm-12">
											<div class="col-sm-5">
												<h4>Min Support: <?php echo $RuleID->min_support ?> </h4>
												<h4>Min Confidence: <?php echo $RuleID->min_confidence ?> </h4>
											</div>
											<div class="col-sm-5">
												<h4>Start Date: <?php echo $RuleID->start_date ?> </h4>
												<h4>End Date: <?php echo $RuleID->end_date ?> </h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- initial array $data_confidence -->
						<?php $data_confidence = []; ?>

						<div class="x_panel">
							<div class="x_title">
								<h2>Confidence dari itemset 3 </h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class="display table table-striped table-bordered"
												style="width:100%">
												<thead>
													<tr>
														<th> No. </th>
														<th> X => Y </th>
														<th> Support X U Y </th>
														<th> Support X </th>
														<th> Confidence </th>
														<th> Keterangan </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach ($ConfidenceItemset3 as $ConfidenceItemset3): ?>
													<tr>
														<td align="center" width="5"><?php echo $j ?></td>
														<td align="center" width="130">
															<?php echo $ConfidenceItemset3->kombinasi1." => ".$ConfidenceItemset3->kombinasi2 ?>
														</td>
														<td align="center" width="130">
															<?php echo $ConfidenceItemset3->support_xUy ?></td>
														<td align="center" width="130">
															<?php echo $ConfidenceItemset3->support_x ?></td>
														<td align="center" width="130">
															<?php echo $ConfidenceItemset3->confidence ?></td>
														<?php $keterangan = ($ConfidenceItemset3->confidence <= $ConfidenceItemset3->min_confidence)?"Tidak Lolos":"Lolos"; ?>
														<td align="center" width="130"><?php echo $keterangan ?></td>
													</tr>
													<?php 
                                                        $j++;
                                                        if($ConfidenceItemset3->lolos == 1){
                                                            $data_confidence[] = $ConfidenceItemset3;
                                                            } 
                                                    ?>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="x_panel">
							<div class="x_title">
								<h2>Confidence dari itemset 2 </h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">

								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered"
												style="width:100%">
												<thead>
													<tr>
														<th> No. </th>
														<th> X => Y </th>
														<th> Support X U Y </th>
														<th> Support X </th>
														<th> Confidence </th>
														<th> Keterangan </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach ($ConfidenceItemset2 as $ConfidenceItemset2): ?>
													<tr>
														<td align="center" width="5"><?php echo $j ?></td>
														<td align="center" width="130">
															<?php echo $ConfidenceItemset2->kombinasi1." => ".$ConfidenceItemset2->kombinasi2 ?>
														</td>
														<td align="center" width="130">
															<?php echo $ConfidenceItemset2->support_xUy ?></td>
														<td align="center" width="130">
															<?php echo $ConfidenceItemset2->support_x ?></td>
														<td align="center" width="130">
															<?php echo $ConfidenceItemset2->confidence ?></td>
														<?php $keterangan = ($ConfidenceItemset2->confidence <= $ConfidenceItemset2->min_confidence)?"Tidak Lolos":"Lolos"; ?>
														<td align="center" width="130"><?php echo $keterangan ?></td>
													</tr>
													<?php 
                                                        $j++;
                                                        if($ConfidenceItemset2->lolos == 1){
                                                            $data_confidence[] = $ConfidenceItemset2;
                                                            } 
                                                    ?>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- <div class="x_panel">
							<div class="x_title">
								<h2>Rule Asosiasi </h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered"
												style="width:100%">
												<thead>
													<tr>
														<th> No. </th>
														<th> X => Y </th>
														<th> Confidence </th>
														<th> Nilai Uji Lift </th>
														<th> Korelasi Rule </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach($data_confidence as $val){?>
													<tr>
														<td align="center" width="5"><?php echo $j ?></td>
														<td align="center" width="130">
															<?php echo $val->kombinasi1." => ".$val->kombinasi2 ?>
														</td>
														<td align="center" width="130">
															<?php echo $val->confidence ?></td>
														<td align="center" width="130">
															<?php echo $val->nilai_uji_lift ?></td>
														<td align="center" width="130">
															<?php echo $val->korelasi_rule ?></td>
													</tr>
													<?php 
                                                        $j++;
                                                    } 
                                                    ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div> -->

						<div class="x_panel">
							<div class="x_title">
								<h2>Hasil Analisa </h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered"
												style="width:100%">
												<thead>
													<tr>
														<th> No. </th>
														<th> Rule </th>
														<th> Confidence </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach($data_confidence as $val){?>
													<tr>
														<td align="center" width="5"><?php echo $j ?></td>
														<td> Jika konsumen membeli <?php echo $val->kombinasi1 ?>, maka
															konsumen juga akan membeli <?php echo $val->kombinasi2 ?>
														</td>
														<td align="center" width="150">
															<?php echo $val->confidence ?></td>
													</tr>
													<?php 
                                                        $j++;
                                                    } 
                                                    ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Tabel Itemset 1  -->
						<div class="x_panel">
							<div class="x_title">
								<h2>Perhitungan Itemset 1</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered"
												style="width:100%">
												<!-- initial array $ItemSet1Lolos -->
												<?php $ItemSet1Lolos = []; ?>
												<thead>
													<tr>
														<th> No. </th>
														<th> Item 1 </th>
														<th> Jumlah </th>
														<th> Support </th>
														<th> Keterangan </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach($ItemSet1 as $ItemSet1){?>
													<tr>
														<td align="center" width="5"><?php echo $j ?></td>
														<td> <?php echo $ItemSet1->atribut ?></td>
														<td> <?php echo $ItemSet1->jumlah ?></td>
														<td> <?php echo $ItemSet1->support ?></td>
														<td> <?php echo $ItemSet1->lolos==1?"Lolos":"Tidak Lolos" ?>
														</td>
													</tr>

													<?php
                                                    if($ItemSet1->lolos==1){
                                                        $ItemSet1Lolos[] = $ItemSet1;//item yg lolos itemset1
                                                    }
                                                        $j++;
                                                    } 
                                                    ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- <div class="x_panel">
							<div class="x_title">
								<h2>Itemset 1 Lolos</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered"
												style="width:100%">
												<thead>
													<tr>
														<th> No. </th>
														<th> Item 1 </th>
														<th> Jumlah </th>
														<th> Support </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach($ItemSet1Lolos as $ItemSet1Lolos){?>
													<tr>
														<td align="center" width="5"><?php echo $j ?></td>
														<td> <?php echo $ItemSet1Lolos->atribut ?></td>
														<td> <?php echo $ItemSet1Lolos->jumlah ?></td>
														<td> <?php echo $ItemSet1Lolos->support ?></td>
													</tr>
													<?php
                                                        $j++;
                                                    } 
                                                    ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div> -->


						<!-- Tabel Itemset 2  -->
						<div class="x_panel">
							<div class="x_title">
								<h2>Perhitungan Itemset 2</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered"
												style="width:100%">
												<!-- initial array $ItemSet2Lolos -->
												<?php $ItemSet2Lolos = []; ?>
												<thead>
													<tr>
														<th> No. </th>
														<th> Item 1 </th>
														<th> Item 2 </th>
														<th> Jumlah </th>
														<th> Support </th>
														<th> Keterangan </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach($ItemSet2 as $ItemSet2){?>
													<tr>
														<td align="center" width="5"><?php echo $j ?></td>
														<td> <?php echo $ItemSet2->atribut1 ?></td>
														<td> <?php echo $ItemSet2->atribut2 ?></td>
														<td> <?php echo $ItemSet2->jumlah ?></td>
														<td> <?php echo $ItemSet2->support ?></td>
														<td> <?php echo $ItemSet2->lolos==1?"Lolos":"Tidak Lolos" ?>
														</td>
													</tr>

													<?php
                                                    if($ItemSet2->lolos==1){
                                                        $ItemSet2Lolos[] = $ItemSet2;//item yg lolos itemset1
                                                    }
                                                        $j++;
                                                    } 
                                                    ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- <div class="x_panel">
							<div class="x_title">
								<h2>Itemset 2 Lolos</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered"
												style="width:100%">
												<thead>
													<tr>
														<th> No. </th>
														<th> Item 1 </th>
														<th> Item 2 </th>
														<th> Jumlah </th>
														<th> Support </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach($ItemSet2Lolos as $ItemSet2Lolos){?>
													<tr>
														<td align="center" width="5"><?php echo $j ?></td>
														<td> <?php echo $ItemSet2Lolos->atribut1 ?></td>
														<td> <?php echo $ItemSet2Lolos->atribut2 ?></td>
														<td> <?php echo $ItemSet2Lolos->jumlah ?></td>
														<td> <?php echo $ItemSet2Lolos->support ?></td>
													</tr>
													<?php
                                                        $j++;
                                                    } 
                                                    ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div> -->

						<!-- Tabel Itemset 3  -->
						<div class="x_panel">
							<div class="x_title">
								<h2>Perhitungan Itemset 3</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered"
												style="width:100%">
												<!-- initial array $ItemSet2Lolos -->
												<?php $ItemSet3Lolos = []; ?>
												<thead>
													<tr>
														<th> No. </th>
														<th> Item 1 </th>
														<th> Item 2 </th>
														<th> Item 3 </th>
														<th> Jumlah </th>
														<th> Support </th>
														<th> Keterangan </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach($ItemSet3 as $ItemSet3){?>
													<tr>
														<td align="center" width="5"><?php echo $j ?></td>
														<td> <?php echo $ItemSet3->atribut1 ?></td>
														<td> <?php echo $ItemSet3->atribut2 ?></td>
														<td> <?php echo $ItemSet3->atribut3 ?></td>
														<td> <?php echo $ItemSet3->jumlah ?></td>
														<td> <?php echo $ItemSet3->support ?></td>
														<td> <?php echo $ItemSet3->lolos==1?"Lolos":"Tidak Lolos" ?>
														</td>
													</tr>

													<?php
                                                    if($ItemSet3->lolos==1){
                                                        $ItemSet3Lolos[] = $ItemSet3;//item yg lolos itemset3
                                                    }
                                                        $j++;
                                                    } 
                                                    ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- <div class="x_panel">
							<div class="x_title">
								<h2>Itemset 3 Lolos</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered"
												style="width:100%">
												<thead>
													<tr>
														<th> No. </th>
														<th> Item 1 </th>
														<th> Item 2 </th>
														<th> Item 3 </th>
														<th> Jumlah </th>
														<th> Support </th>
													</tr>
												</thead>
												<tbody>
													<?php 
                                                    $j = 1; 
                                                    if ($ItemSet3Lolos != ""){
                                                        foreach($ItemSet3Lolos as $ItemSet3Lolos){
                                                    ?>
													<tr>
														<td align="center" width="5"><?php echo $j ?></td>
														<td> <?php echo $ItemSet3Lolos->atribut1 ?></td>
														<td> <?php echo $ItemSet3Lolos->atribut2 ?></td>
														<td> <?php echo $ItemSet3Lolos->atribut3 ?></td>
														<td> <?php echo $ItemSet3Lolos->jumlah ?></td>
														<td> <?php echo $ItemSet3Lolos->support ?></td>
													</tr>
													<?php
                                                        $j++;
                                                    } }
                                                    ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div> -->


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
	<script type="text/javascript">
		$(document).ready(function () {
			$('table.display').DataTable();
		});

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
		});

	</script>
</body>

</html>
