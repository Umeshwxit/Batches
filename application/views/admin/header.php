<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/preview-equation/default-light/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 07:09:36 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
      <meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
    <title>Batches</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>img/logo.svg"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo base_url() ?>admin/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>admin/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>admin/assets/css/apps/mailbox-with-chat.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>admin/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>admin/plugins/table/datatable/custom_dt_ordering_sorting.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>admin/plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>admin/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>admin/assets/css/support-chat.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>admin/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>admin/plugins/charts/chartist/chartist.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>admin/assets/css/default-dashboard/style.css"  />   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>admin/plugins/font-icons/fontawesome/css/fontawesome.css"> 
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
</head>
<style>
.notificationIcon {
    position: absolute;
    top: 6px;
    left: 25px;
    font-size: 10px;
    width: 20px;
    height: 20px;
    background-color: #707792;
    line-height: 16px;
    border-radius: 50%;
    text-align: center;
    color:#fff;
    padding-top: 2px;
}

.media-body{padding-left: 10px;}


.main-container{width: 100vw;width: 100%;}
.chat_window {background: #f5f5f5;padding: 15px 0px 0;margin-top: 30px;border-top: 3px solid;}

.flaticon-bell-1 {
    font-size: 23px;
    margin-top: 11px;
    width: 26px;
    height: 27px;
    border-radius: 50%;
    position: relative;
}
</style>
<body class="default-sidebar">
    <?php if($this->uri->segment('1')!='page') { ?>
    <div id="eq-loader">
      <div class="eq-loader-div">
          <div class="eq-loading dual-loader mx-auto mb-5"></div>
      </div>
    </div>
<?php } ?>
    <!-- Tab Mobile View Header -->
    <header class="tabMobileView header navbar fixed-top d-lg-none">
        <div class="nav-toggle">
                <a href="javascript:void(0);" class="nav-link sidebarCollapse" data-placement="bottom">
                    <i class="flaticon-menu-line-2"></i>
                </a>
            <a href="#" class=""> <img src="<?php echo base_url(); ?>admin/assets/img/payla.png" class="img-fluid" alt="logo"></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="nav-item d-lg-none"> 
                <form class="form-inline justify-content-end" role="search">
                    <input type="text" class="form-control search-form-control mr-3">
                </form>
            </li>
        </ul>
    </header>
    <!-- Tab Mobile View Header -->

    <!--  BEGIN NAVBAR  -->
    <header class="header navbar fixed-top navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse d-none d-lg-block" data-placement="bottom"><i class="flaticon-menu-line-2"></i></a>
      
        <ul class="navbar-nav flex-row ml-lg-auto">
  <!--       <li class="nav-item dropdown user-profile-dropdown ml-lg-0 mr-lg-2 ml-3 order-lg-0 order-1">
            <a href="<?php echo base_url(); ?>" class="nav-link dropdown-toggle" id="notification">
                <span class="flaticon-bell-1"></span>
                <div class="notificationIcon">

                </div>
            </a>
        </li> -->
       <li class="nav-item dropdown user-profile-dropdown ml-lg-0 mr-lg-2 ml-3 order-lg-0 order-1">
                
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="flaticon-user-12"></span>
                </a>
                <div class="dropdown-menu  position-absolute" aria-labelledby="userProfileDropdown">
                    <!--<a class="dropdown-item" href="<?php echo base_url(); ?>Admin/profile">-->
                    <!--    <i class="mr-1 flaticon-user-6"></i> <span>My Profile</span>-->
                    <!--</a>-->
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>Admin/logout">
                        <i class="mr-1 flaticon-power-button"></i> <span>Log Out</span>
                    </a>
                </div>
            </li> 
        </ul>
    </header>
    <!--  END NAVBAR  -->
     <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>