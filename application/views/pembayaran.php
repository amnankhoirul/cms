<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Toko E' Nam<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('Welcome') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                KATEGORI
            </div>


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('kategori/vivo') ?>">
                    <i class="bi bi-phone"></i>
                    <span>Vivo</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('kategori/realme')?>">
                    <i class="bi bi-phone"></i>
                    <span>Realme</span></a>
            </li>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('kategori/oppo')?>">
                    <i class="bi bi-phone"></i>
                    <span>Oppo</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('kategori/redmi')?>">
                    <i class="bi bi-phone"></i>
                    <span>Redmi</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('kategori/infinix')?>">
                    <i class="bi bi-phone"></i>
                    <span>Infinix</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" action="<?php echo base_url('welcome')?>">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." name="keyword" autocomplete="off" autofocus aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" name="submit"></input>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                        <div class="navbar">
                                            <ul class="nav navbar-nav navrab-right">
                                                <p class="text-center"><i class="bi bi-chat text-blue"></i><a href="https://wa.me/62882003370440" class=" fw-bold"></a></p>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- tambah ke keranjang -->
                        <div class="navbar">
                            <ul class="nav navbar-nav navrab-right">
                                <li>
                                    <?php $keranjang = $this->cart->total_items() ?><i class="bi bi-cart3"></i>
                                    <?php echo anchor('dasbor/detail_keranjang', $keranjang)?>
                                </li>
                            </ul>
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <ul class="na navbar-nav navbar-right " style="text-decoration-color: white;">
                                <?php if ($this->session->userdata('username')) { ?>
                                    <li>
                                        <div style="margin-right: 1rem;" class="btn btn-primary ">Selamat Datang <?php echo $this->session->userdata('username') ?></div>
                                        <div style="margin-right: 1rem;" class="btn btn-primary"><a href="https://wa.me/62882003370440" class=" text-white ">Konfirmasi Pembayaran</a></i></div>
                                    </li>
                                    <button class="btn btn-primary text-white"><?php echo anchor('auth/logout', '<i class="text-white">Logout</i>') ?></button>
                                <?php } else { ?>
                                    <button class="btn btn-primary text-white"><?php echo anchor('auth/login', '<i class="text-white">Login</i>'); ?></button>
                                <?php } ?>

                            </ul>
                        </div>
                        <!-- tambah ke keranjang -->
                    </ul>
                </nav>
                <!-- End of Topbar -->
<!--  -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php 
                $grand_total=0;
                if ($keranjang = $this->cart->contents()){
                    foreach ($keranjang as $item){
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h5>Total Belanja Anda Rp. ".number_format($grand_total,0,',','.');
                
             ?> 

            </div><br><br>
            <h3>Masukkan Alamat Pengiriman dan Pembayaran </h3>
            <form method="post" action="<?php base_url() ?> ../dasbor/proses_pesanan">
                <div class="form-group">
                    <label for="">Nama Lengakap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat Lengakap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input type="text" name="no_telp" placeholder="Nomor Telepon Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jasa Pengiriman</label>
                    <select name="" id="" class="form-control">
                        <option value="">JNT</option>
                        <option value="">GRAB</option>
                        <option value="">POS Indonesia</option>
                        <option value="">GOJEK</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Pilih Bank</label>
                    <select name="" id="" class="form-control">
                        <option value="">BNI - XXXXX</option>
                        <option value="">BRI - XXXXX</option>
                        <option value="">BCA - XXXXX</option>
                        <option value="">MANDIRI - XXXXX</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>
            </form>
            <?php 
            }else{
                echo "<h2>Keranjang Belanja Anda Masih Kosong";
            }
            ?>
        </div>

        <div class="col-md-2"></div>
    </div>
</div>

<!--  -->
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url()?>pembayaran/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>pembayaran/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()?>pembayaran/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url()?>pembayaran/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url()?>pembayaran/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url()?>pembayaran/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url()?>pembayaran/js/demo/chart-pie-demo.js"></script>

</body>

</html>