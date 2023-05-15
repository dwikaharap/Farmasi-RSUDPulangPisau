 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-primary elevation-4">
     <!-- Brand Logo -->
     <a href="<?php echo site_url(' '); ?>" class="brand-link">
         <img src="<?php echo base_url() ?>assets/dist/img/rsudpp.png" alt="Farmasi" class="brand-image img-circle elevation-1" style="opacity: .9">
         <span class="brand-text font-weight-bold">FARMASI</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?php echo base_url() ?>assets/dist/img/menu.png" alt="User Image">
             </div>
             <div class="info">
                 <div class="d-block">Pilihan Menu</div>
             </div>
         </div>
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">

                 <li class="nav-item">
                     <a href="http://localhost/farmasi/Obat" class="nav-link">
                         <i class="nav-icon fas fa-capsules"></i>
                         <p>Semua</p>
                     </a>
                 </li>
                 <br>
                 
                 <li class="nav-item">
                     <a href="<?php echo base_url() ?>ResepObat/ro" class="nav-link">
                         <i class="nav-icon fas fa-indent"></i>
                         <p>Resep Obat</p>
                     </a>
                 </li>
                 <br>

                 <li class="nav-item">
                     <a href="<?php echo base_url() ?>Obat/ap" class="nav-link">
                         <i class="nav-icon fas fa-tablets"></i>
                         <p>Apotek</p>
                     </a>
                 </li>
                 <br>
                 <li class="nav-item">
                     <a href="<?php echo base_url() ?>Obat/far" class="nav-link">
                         <i class="nav-icon fas fa-warehouse"></i>
                         <p>Gudang Farmasi</p>
                     </a>
                 </li>
                 <br>
                 <li class="nav-item">
                     <a href="<?php echo base_url() ?>Obat/expired" class="nav-link danger">
                         <i class="nav-icon fas fa-clock"></i>
                         <p>Obat Expired</p>
                     </a>
                 </li>
                 <br>
                 <li class="nav-item">
                     <a href="<?php echo base_url() ?>Obat/obatkeluar" class="nav-link danger">
                         <i class="nav-icon fas fa-book-medical"></i>
                         <p>Obat Keluar</p>
                     </a>
                 </li>
                 <br>
                 <li class="nav-item">
                     <a href="<?php echo base_url('assets/pdf') ?>/User-Manual-Farmasi.pdf" target="_blank" class="nav-link">
                         <i class="nav-icon fas fa-file-pdf"></i>
                         <p>Lihat Petunjuk</p>
                     </a>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->

     <!-- Control Sidebar -->
     <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
     </aside>
     <!-- /.control-sidebar -->
 </aside>