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
                <h2>Data Transaksi</h2>
                <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#importTransaksi" class="btn btn-danger"><i class="fa fa-plus"></i> Import Transaksi</a></ul>
                <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#tambahTransaksi" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Transaksi</a></ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                     <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Kode</th>
                          <th>Tanggal</th>
                          <th>Produk</th>
                          <th>Total harga</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $j = 1; ?>
                        <?php foreach ($data_transaksi as $data_transaksi): ?>
                          <tr>
                            <td align="center" width="10"><?php echo $j ?></td>
                            <td align="center" width="100"><?php echo $data_transaksi->id_transaksi ?></td>
                            <td align="center" width="80"><?php echo $data_transaksi->transaction_date ?></td>
                            <td><?php echo $data_transaksi->produk ?></td>
                            <td align="center" width="80">
                              <?php $this->load->helper('rupiah_helper'); echo rupiah($data_transaksi->total) ?>
                            </td>
                            <td align="center" width="80">
                            <a href="#"  data-toggle="modal" data-target="#editModal<?php echo $data_transaksi->id; ?>" style="margin-right: 9px" ><i class="fa fa-edit"></i> Edit </a>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?php echo $data_transaksi->id; ?>" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title"> Edit Id. <?php echo $data_transaksi->id_transaksi; ?> </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                  <div class="modal-body">
                                    <form role="form" action="<?php echo site_url('admin/data_transaksi/editTransaksi/'.$data_transaksi->id) ?>" method="post">
                                    <div class="form-group col-md-12 col-sm-12">
                                      <label class="col-form-label col-md-4 col-sm-4 label-align" >ID Transaksi : </label>
                                      <div class="col-md-6 col-sm-6 ">
                                        <input class="form-control" type="text" name="id_transaksi" placeholder="ID Transaksi" required value="<?php echo $data_transaksi->id_transaksi ?>"/>
                                      </div>
                                    </div> 
                                      <div class="form-group col-md-12 col-sm-12">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align">Tanggal Transaksi : </label>
                                        <div class='col-md-6 col-sm-6'>
                                          <div class='input-group date myDatepicker2' >
                                            <input type="text" class="form-control" placeholder="Tanggal Transaksi" name="tanggal_transaksi" required value="<?php echo $data_transaksi->transaction_date ?>"/>
                                            <span class="input-group-addon" style="padding-top: 10px">
                                              <span class="fa fa-calendar-o"></span>
                                            </span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-12 col-sm-12">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align" >Total Harga : </label>
                                        <div class="col-md-6 col-sm-6 ">
                                          <input class="form-control" type="number" name="total" placeholder="Total Harga" required value="<?php echo $data_transaksi->total ?>"/>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-12 col-sm-12">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align">Produk : </label>
                                        <div class="col-md-6 col-sm-6 ">
                                        <textarea class="form-control" name="produk" rows="5" required><?php echo $data_transaksi->produk ?></textarea>
                                          <!-- <input class="form-control" type="text" name="produk" required value="<?php echo $data_transaksi->produk ?>"/> -->
                                        </div>
                                      </div>
                                  
                                      <br>
                                      <div class="modal-footer">  
                                        <button type="submit" class="btn btn-success">Edit</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <br>
                            <a onclick="deleteConfirm('<?php echo site_url('admin/data_transaksi/hapusTransaksi/'.$data_transaksi->id) ?>')" href="#!" ><i class="fa fa-trash"></i> Hapus</a>
                          </td>
                           </tr>
                          <?php $j++; ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /DataTables -->
      </div>
      <br />
    </div>
    <!-- /page content -->

<!-- Tambah via Upload Excel Modal -->
<div class="modal fade" id="importTransaksi" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Import Transaksi</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- ada sesuatu disini yang menyebabkan javascript ga jalan -->
          
          <!-- pokoknya diatas ini -->
          <form action="<?php print site_url();?>/admin/data_transaksi/importTransaksi" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="form-group col-md-12 col-sm-12">
              <div class="col-md-8 col-sm-8">
                <input type="file" class="custom-file-input" id="validatedCustomFile" name="fileURL">
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
              </div>
              <div class="col-md-4 col-sm-4">
                <button type="submit" name="import" class="float-right btn btn-primary">Import</button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="col-md-12 col-sm-12">  
            <div class="col-md-12">
              <div> <label>Contoh template excel untuk upload</label>
              </div>
              <div class="float-right">  
                <a href="<?php print base_url('assets/uploads/sample1-xlsx.xlsx') ?>" class="btn btn-link btn-sm"><i class="fa fa-file-excel"></i> Sample .XLSX</a>
                <a href="<?php print base_url('assets/uploads/sample-xls.xls') ?>" class="btn btn-link btn-sm"><i class="fa fa-file-excel"></i> Sample .XLS</a>
                <a href="<?php print base_url('assets/uploads/sample-csv.csv') ?>" class="btn btn-link btn-sm" target="_blank" ><i class="fa fa-file-csv"></i> Sample .CSV</a>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Tambah K Modal -->
<div class="modal fade" id="tambahTransaksi" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Tambah Transaksi </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form role="form" action="<?php echo site_url('admin/data_transaksi/tambahTransaksi') ?>" method="post">
          <div class="form-group col-md-12 col-sm-12">
            <label class="col-form-label col-md-4 col-sm-4 label-align" >ID Transaksi : </label>
            <div class="col-md-6 col-sm-6 ">
              <input class="form-control" type="text" name="id_transaksi" placeholder="ID Transaksi" required />
            </div>
          </div>  
          <div class="form-group col-md-12 col-sm-12">
            <label class="col-form-label col-md-4 col-sm-4 label-align">Tanggal Transaksi : </label>
            <div class='col-md-6 col-sm-6'>
              <div class='input-group date myDatepicker2' >
                <input type="text" class="form-control" placeholder="Tanggal Transaksi" name="tanggal_transaksi" required/>
                <span class="input-group-addon" style="padding-top: 10px">
                  <span class="fa fa-calendar-o"></span>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group col-md-12 col-sm-12">
            <label class="col-form-label col-md-4 col-sm-4 label-align" >Total Harga : </label>
            <div class="col-md-6 col-sm-6 ">
              <input class="form-control" type="number" name="total" placeholder="Total Harga" required />
            </div>
          </div>
          
          <div class="form-group col-md-12 col-sm-12">
            <label class="col-form-label col-md-4 col-sm-4 label-align">Produk : </label>
            <div class="col-md-6 col-sm-6 ">
              <textarea class="form-control" name="produk" required></textarea>
            </div>
          </div>
          
          <br>
            <div class="modal-footer">  
              <button type="submit" class="btn btn-success">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

 

<!-- Delete Confirmation-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Apakah anda yakin?
          </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
        </div>
      </div>
    </div>
  </div>
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
      function deleteConfirm(url){
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
      }
    </script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('assets/moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
    <script src="<?php echo base_url().'js/jquery-ui.js'?>" type="text/javascript"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo base_url('assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>
    <!-- Initialize datetimepicker -->
    <script  type="text/javascript"> 
      $('.myDatepicker2').datetimepicker({
        format: 'YYYY/MM/DD'
      });
      $('#myDatepicker3').datetimepicker({
        format: 'YYYY'
      });  
    </script>
  </body>
  </html>
