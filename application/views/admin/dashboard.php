<?php 
$this->load->view('admin/header');
    //     $this->load->view('admin/nav');
?>
 <style>
   .text_wrapper div {margin-bottom: 50px;}
   .text_wrapper div text{box-shadow: none !important}

 </style>    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>

        <!--  BEGIN SIDEBAR  -->

        <?php  $this->load->view('admin/nav'); ?>

            <!--  END SIDEBAR  -->

            <!--  BEGIN CONTENT PART  -->
            <div id="content" class="main-content" style="display: block;">
                <div class="container">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Dashboard</h3>
                        </div>
                    </div>

                    <div class="row layout-spacing " style="display:none">

                        <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
                            <div class="widget-content-area  data-widgets br-4">
                                <div class="widget  t-sales-widget">
                                    <div class="media">
                                        <div class="icon ml-2">
                                            <i class="flaticon-settings-1"></i>
                                        </div>
                                         <div class="media-body text-right">
                                            <p class="widget-text mb-0">Service</p>
                                            <p class="widget-numeric-value"><?php //echo $service->service; ?></p>
                                        </div> 
                                    </div>
                                    <!--                                 <p class="widget-total-stats mt-2">94% New Sales</p>
 -->
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
                            <div class="widget-content-area  data-widgets br-4">
                                <div class="widget  t-order-widget">
                                    <div class="media">
                                        <div class="icon ml-2">
                                            <i class="flaticon-cart-bag"></i>
                                        </div>
                                         <div class="media-body text-right">
                                            <p class="widget-text mb-0">Tranning Program</p>
                                            <p class="widget-numeric-value"><?php //echo $Tranning_Program->program; ?></p>
                                        </div> 
                                    </div>
                                    <!-- <p class="widget-total-stats mt-2">552 New Orders</p> -->
                                </div>
                            </div>
                        </div> 

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-sm-0 mb-4">
                            <div class="widget-content-area  data-widgets br-4">
                                <div class="widget  t-customer-widget">
                                    <div class="media">
                                        <div class="icon ml-2">
                                            <i class="flaticon-cart-bag"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <p class="widget-text mb-0">product</p>
                                            <p class="widget-numeric-value"><?php //echo $product->product; ?></p>
                                        </div>
                                    </div>
                                    <p class="widget-total-stats mt-2"></p> 
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                            <div class="widget-content-area  data-widgets br-4">
                                <div class="widget  t-income-widget">
                                    <div class="media">
                                        <div class="icon ml-2">
                                            <i class="flaticon-user-11"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <p class="widget-text mb-0">Customer</p>
                                            <p class="widget-numeric-value"><?php //echo $contactus->contactus; ?></p>
                                        </div>
                                    </div>
                                    <!-- <p class="widget-total-stats mt-2">$2.1 M This Week</p> -->
                                </div>
                            </div>
                        </div>

                    </div>
                                    
                        </div>
            
                <div style="height: 30px; background: #E9ECEF"></div>


                    <div class="row">
                       

                       
                    </div>

                </div>
            </div>
            <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <?php    $this->load->view('admin/footer'); ?>
