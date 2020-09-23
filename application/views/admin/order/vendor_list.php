
 <!--  BEGIN CONTENT PART  -->
   

        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Assign Order</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="<?php echo base_url() ?>admin/index"><i class="flaticon-home-fill"></i></a></li>
                                <li><a href="<?php echo base_url() ?>admin/index">Admin</a></li>
                                <li class="active"><a href="#">Assign Order</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php if($this->session->flashdata('msg')){?>
                    <div class="alert alert-success mb-4" role="alert"> <i class="flaticon-cancel-12 close" data-dismiss="alert"></i> <strong>Success!</strong> <?php  echo $this->session->flashdata('msg');?>  </div>
                <?php  }            ?>
                <div class="row" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6"   >
                                        <h4>Order</h4>
                                    </div>
                                   
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
<table id="html5-extension" class="table table-striped table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th style="display: none;"></th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            <?php $i=0;foreach ($list as $each_data) {?>
                                            <tr>
                                                <td style="display: none;"></td>
        <td class="text-primary"><?php echo $each_data->id; ?></td>
        <td class="text-primary"><?php echo $each_data->name; ?></td>
        <td class="text-primary"><?php echo $each_data->mobile; ?></td>
        <td class="text-primary">

            <?php  $id=$each_data->id;
           $q= $this->db->query("SELECT * FROM `orders` WHERE `ord_driver_id`=' $id' and (`ord_status`='1' or `ord_status`='4') ");
           if($q->num_rows()>0){
            echo "<span style='color:purple;'>Busy</span>";
           }else if(!$each_data->fcmId){
            echo "<span style='color:red;'>Not Available</span>";
           }else{
            echo "<span style='color:green;'>Available</span>";

           }


             ?>
                


            </td>


 <td class="align-center">

<?php  $id=$each_data->id;
           $q= $this->db->query("SELECT * FROM `orders` WHERE `ord_driver_id`=' $id' and (`ord_status`='1' or `ord_status`='4') ");
           if($q->num_rows()>0){?>

    <a href="<?php echo base_url() ?>order/assignorder/<?php echo $each_data->id  ?>/<?php echo $this->uri->segment(3) ?>"  class="btn btn-default btn-sm"><i class="icon-search"></i> Assign</a>

          <?php  }else if(!$each_data->fcmId){ ?>


            <span style='color:red;'>Not Available</span>

         <?php   }else{ ?>

    <a href="<?php echo base_url() ?>order/assignorder/<?php echo $each_data->id  ?>/<?php echo $this->uri->segment(3) ?>"  class="btn btn-default btn-sm"><i class="icon-search"></i> Assign</a>

       <?php } ?>
               


</td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>ID</th>
                                               
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Status</th>

                                        <th>Action</th>
                                                                                              
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--  END CONTENT PART  -->
    </div>