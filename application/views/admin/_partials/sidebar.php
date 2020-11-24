<!-- sidebar -->
<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="<?php echo site_url('akademik') ?>" class="site_title"><i class="fa fa-futbol-o"></i> <span>Helo Admin</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <!-- /menu profile quick info -->
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section" style="margin-top: 20px">
        <!-- menu sidebar -->
        <ul class="nav side-menu">
          <li><a href="<?php echo site_url('admin/data_transaksi') ?>"><i class="fa fa-database"></i> Data Transaksi <span class="fa fa-chevron"></span></a></li>
          <li><a href="<?php echo site_url('admin/proses_apriori') ?>"><i class="fa fa-bolt"></i> Proses Apriori <span class="fa fa-chevron"></span></a></li>
          <li><a href="<?php echo site_url('admin/hasil') ?>"><i class="fa fa-check"></i> Hasil <span class="fa fa-chevron"></span></a></i>

        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= site_url('login/logout') ?>" style="width: 100%">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
  </div>
</div>

