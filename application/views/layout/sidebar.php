<!-- sidebar -->
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="<?= base_url('user/index')?>"><img class="main-logo" src="<?= base_url(); ?>template/img/logo/logo.png" alt="" /></a>
            <strong><img src="<?= base_url(); ?>template/img/logo/logosn.png" alt="" /></strong>
        </div>
        <div class="nalika-profile">
            <div class="profile-dtl">
                <a href="#"><img src="<?= base_url(); ?>template/img/notification/4.jpg" alt="" /></a>
                <h2><?= $user['nama'] ?></span></h2>
            </div>
            
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="active">
                        <a class="has-arrow" href="index.html">
                               <i class="icon nalika-home icon-wrap"></i>
                               <span class="mini-click-non">Ecommerce</span>
                            </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            
                            <li><a title="Dashboard" href="<?= base_url('user/index') ?>"><span class="mini-sub-pro">Dashboard</span></a></li>
                            <li><a title="Product List" href="<?= base_url('user/register') ?>"><span class="mini-sub-pro">Registrasi</span></a></li>
                            <li><a title="Product Edit" href="<?= base_url('user/saldo') ?>"><span class="mini-sub-pro">Saldo</span></a></li>
                            <li><a title="Product Cart" href="<?= base_url('user/transaksi') ?>"><span class="mini-sub-pro">Transaksi</span></a></li>
                            <li><a title="Product Detail" href="<?= base_url('data/index') ?>"><span class="mini-sub-pro">Data Master</span></a></li>
                            
                            
                            
                            
                        </ul>
                    </li>
                    
                    
                    
                    
                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- sidebar end -->

<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="<?= base_url('user/index')?>"><img class="main-logo" src="<?= base_url(); ?>template/img/logo/logo.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="icon nalika-menu-task"></i>
                                            </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    <div class="header-top-menu tabl-d-n">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            
                                            <li class="nav-item">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <i class="icon nalika-user nalika-user-rounded header-riht-inf" aria-hidden="true"></i>
                                                        <span class="admin-name">Sistem Nasabah</span>
                                                        <i class="icon nalika-down-arrow nalika-angle-dw nalika-icon"></i>
                                                    </a>
                                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                    
                                                    <li><a href="<?= base_url('login/logout') ?>"><span class="icon nalika-unlocked author-log-ic"></span> Log Out</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    