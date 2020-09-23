 <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Stock</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="<?php echo base_url() ?>admin/index"><i class="flaticon-home-fill"></i></a></li>
                                <li><a href="<?php echo base_url() ?>admin/index">Admin</a></li>
                                <li class="active"><a href="#">Stock</a> </li>
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
                                        <h4>Stock </h4>
                                    </div>
                                   
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
<table id="html5-extension" class="table table-striped table-bordered table-hover" style="width:100%">                                        <thead>
                                            <tr>
                                            <th>S.No.</th>
                                            <th> Color</th>
                                            <th> Size</th>
                                            <th> Sale Quantity</th>
                                            <th> Remaining Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            <?php $i=0;foreach ($list as $each_data) {?>
                                    <tr>
                                    <td class="text-primary"><?php echo $i=$i+1; ?></td>

                                    <td>
                                        <?php
                                            $cid=$each_data->pcs_color_id;
                                            $table='colors';
                                            $data = array('color_id' => $cid);
                                            $colour= $this->Comman_model->getdata($table, $data);
                                            echo  $colour->color_name;
                                        ?>
                                        </td>

                                    <td>
                                        <?php
                                            $sid=$each_data->pcs_size;
                                            $table1='sizes';
                                            $data1 = array('size_id' => $sid);
                                            $sizes= $this->Comman_model->getdata($table1, $data1);
                                            echo  $sizes->size_name;
                                        ?>
                                        </td>



<td>
    <?php 
        $pscid=$each_data->pcs_id;
        $table    = 'order_products';
        $where  = array('pcs_id' =>  $pscid,'product_id'=> $this->uri->segment(3));
        $oderBy = 'pcs_id';        
        $sale  =$this->Comman_model->getAllData($table, $where, $oderBy = '');
        $a=0;
        foreach ($sale as $key => $value) {
        $a=$a+$value->order_quantity;
        }
      echo  $a;
      
  ?>
</td>
<td><?php  echo  $each_data->pcs_qty; ?></td>

                                    </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                        <th>S.No.</th>
                                        <th> Color</th>
                                        <th> Size</th>
                                        <th> Sale Quantity</th>
                                        <th> Remaining Quantity</th>

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
    <!-- END MAIN CONTAINER -->
    