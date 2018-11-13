<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/assets/images/favicon.png">
    <title><?php echo getInfoRS('nama_sistem')?></title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/dist/css/style.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
</head>

<body>
<div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <a class="navbar-brand" href="<?php echo base_url('beranda')?>" style="background-color: #03a9f4;">
                        <span class="logo-text" style="font-size: 12pt; color: white; text-decoration: bold; background-color: #03a9f4;">
                           <?php echo getInfoRS('nama_sistem')?>
                        </span>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto">
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <i class="ti-search font-16"></i>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="<?php echo base_url()?>assets/img/dummy/u1.png" alt="user" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="<?php echo base_url()?>assets/img/dummy/u1.png" alt="user" class="img-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?php echo $this->session->userdata('username');?></h4>
                                        <!-- <p class=" m-b-0">admin@gmail.com</p> -->
                                    </div>
                                </div>
                            
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo site_url('Auth/logout')?>">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <br>
                        <?php 
                        if($this->session->userdata('level') == 'admin'){
                            ?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('beranda')?>" aria-expanded="false">
                                        <i class="icon-Car-Wheel"></i>
                                        <span class="hide-menu">Dashboards </span>
                                    </a>
                                </li>
                                <li class="nav-small-cap">
                                    <i class="mdi mdi-dots-horizontal"></i>
                                    <span class="hide-menu">Master Data</span>
                                </li>
                                
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Masterdata')?>" aria-expanded="false">
                                        <i class="icon-Receipt"></i>
                                        <span class="hide-menu"> Master Data</span>
                                    </a>
                                </li>
                                <li class="nav-small-cap">
                                    <i class="mdi mdi-dots-horizontal"></i>
                                    <span class="hide-menu">Monitoring</span>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Note')?>" aria-expanded="false">
                                        <i class="mdi mdi-content-paste"></i>
                                        <span class="hide-menu">SKPA Note</span>
                                    </a>
                                </li>
                                <li class="nav-small-cap">
                                    <i class="mdi mdi-dots-horizontal"></i>
                                    <span class="hide-menu">Pengaturan</span>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('User_data')?>" aria-expanded="false">
                                        <i class="icon-Add-User"></i>
                                        <span class="hide-menu">Manage User</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('profile/update/1')?>" aria-expanded="false">
                                        <i class="icon-Wrench"></i>
                                        <span class="hide-menu">Data sistem</span>
                                    </a>
                                </li>
                            <?php
                        }else{
                            ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('beranda')?>" aria-expanded="false">
                                    <i class="icon-Car-Wheel"></i>
                                    <span class="hide-menu">Dashboards </span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Auth/logout')?>" aria-expanded="false">
                                <i class="mdi mdi-directions"></i>
                                <span class="hide-menu">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
                    <?php
                    echo $contents;
                    ?>
            </div>
            

        </div>
    </div>
 
</body>
<footer class="footer text-center">
                Design by Team DED Soepomo 84
</footer>
</html>
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?php echo base_url()?>assets/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url()?>assets/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url()?>assets/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<script src="<?php echo base_url()?>assets/dist/js/app.min.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/app.init.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/app-style-switcher.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo base_url()?>assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url()?>assets/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo base_url()?>assets/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url()?>assets/dist/js/custom.min.js"></script>
<!--This page plugins -->
<script src="<?php echo base_url()?>assets/assets/extra-libs/DataTables/datatables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="<?php echo base_url()?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>assets/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jszip.min.js"></script>
<script src="<?php echo base_url()?>assets/js/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>assets/js/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>assets/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>assets/js/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/pages/datatable/datatable-advanced.init.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/pages/datatable/datatable-basic.init.js"></script>
