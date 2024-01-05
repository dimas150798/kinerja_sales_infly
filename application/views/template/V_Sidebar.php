<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <img src="<?php echo base_url(); ?>assets/assets/img/inflynetworks_LogoOnly.png" alt="Infly Networks Logo" width="46" height="46" class="sidebar-brand-full">
            <img src="<?php echo base_url(); ?>assets/assets/img/inflynetworks_LogoOnly.png" alt="Infly Networks Logo" width="46" height="46" class="sidebar-brand-narrow">
        </div>


        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/C_DashboardAdmin') ?>">
                    <i class="bi bi-speedometer2">&nbsp;</i> Dashboard<span class="badge badge-sm bg-info ms-auto"></span></a></li>

            <!-- <li class="nav-title">Data Master</li> -->

            <!-- <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/data_dp/C_Data_DP') ?>">
                    <i class="bi bi-bookmarks">&nbsp;</i> Data DP<span class="badge badge-sm bg-info ms-auto"></span></a></li> -->

            <li class="nav-title">Data Pelanggan</li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <i class="bi bi-wifi">&nbsp;</i> Aktif</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/pelanggan_aktif_all/C_Pelanggan_Aktif_All') ?>"><i class="bi bi-clipboard2-data-fill">&nbsp;</i> All</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/pelanggan_distribution/C_Pelanggan_Distribution') ?>"><i class="bi bi-clipboard2-data-fill">&nbsp;</i> Need Distribusi</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/pelanggan_survey/C_Pelanggan_Survey') ?>"><i class="bi bi-clipboard2-data-fill">&nbsp;</i> Survey</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/pelanggan_on_net/C_Pelanggan_On_Net') ?>"><i class="bi bi-clipboard2-data-fill">&nbsp;</i> On Net</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/pelanggan_aktif/C_Pelanggan_Aktif') ?>"><i class="bi bi-clipboard2-data-fill">&nbsp;</i> Aktif</a></li>
                </ul>
            </li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <i class="bi bi-wifi-off">&nbsp;</i> Terminasi</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="base/accordion.html"><i class="bi bi-clipboard2-data-fill">&nbsp;</i> Data Pelanggan</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/terminasi/C_Terminasi_Perbulan') ?>"><i class="bi bi-clipboard2-data-fill">&nbsp;</i> Jumlah Persales</a></li>
                </ul>
            </li>
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="<?php echo base_url(); ?>assets/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button><a class="header-brand d-md-none" href="#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="assets/brand/coreui.svg#full"></use>
                    </svg></a>

            </div>
            <div class="header-divider"></div>

        </header>