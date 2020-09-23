    <!--  BEGIN FOOTER  -->
    <footer class="footer-section theme-footer">

        <div class="footer-section-1  sidebar-theme"></div>

        <div class="footer-section-2 container-fluid">
            <div class="row">
                
                <div class="col-12">
                    <ul class="list-inline mb-0 d-flex justify-content-center ">
                        <li class="list-inline-item  mr-3">
                            <p class="bottom-footer">&#xA9; 2020 <a target="_blank" href="#">Batches Admin</a></p>
                        </li>
                        <li class="list-inline-item  justify-content-sm-end align-self-center">
                            <div class="scrollTop"><i class="flaticon-up-arrow-fill-1"></i></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--  END FOOTER  -->
 

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script type="text/javascript" src="<?php echo base_url() ?>admin/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>admin/assets/js/loader.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>admin/bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>admin/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>admin/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>admin/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
  
            window.localStorage.removeItem("smde_demo2");
        
        });
    </script>
    <script src="<?php echo base_url() ?>admin/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
 
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
            <script src="<?php echo base_url() ?>admin/plugins/table/datatable/datatables.js"></script>

    <script src="<?php echo base_url() ?>admin/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>admin/plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="<?php echo base_url() ?>admin/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>admin/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script>
        $('#html5-extension').DataTable( {
            // dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5 mb-md-0 mb-5"i><"col-md-7"p>>> >',
            // buttons: {
            //     buttons: [
            //         { extend: 'copy', className: 'btn btn-default btn-rounded btn-sm mb-4' },
            //         { extend: 'csv', className: 'btn btn-default btn-rounded btn-sm mb-4' },
            //         { extend: 'excel', className: 'btn btn-default btn-rounded btn-sm mb-4' },
            //         { extend: 'print', className: 'btn btn-default btn-rounded btn-sm mb-4' }
            //     ]
            // },
            // "language": {
            //     "paginate": {
            //       "previous": "<i class='flaticon-arrow-left-1'></i>",
            //       "next": "<i class='flaticon-arrow-right'></i>"
            //     },
            //     "info": "Showing page _PAGE_ of _PAGES_"
            // }
        } );

    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS --> 
    <script src="<?php echo base_url() ?>admin/plugins/charts/chartist/chartist.js"></script>
    <script src="<?php echo base_url() ?>admin/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="<?php echo base_url() ?>admin/plugins/maps/vector/jvector/worldmap_script/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url() ?>admin/plugins/calendar/pignose/moment.latest.min.js"></script>
    <script src="<?php echo base_url() ?>admin/plugins/calendar/pignose/pignose.calendar.js"></script>
    <script src="<?php echo base_url() ?>admin/plugins/progressbar/progressbar.min.js"></script>
    <script src="<?php echo base_url() ?>admin/assets/js/default-dashboard/default-custom.js"></script>
    <script src="<?php echo base_url() ?>admin/assets/js/support-chat.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="<?php echo base_url() ?>admin/plugins/select2/select2.min.js"></script>
    <script src="<?php echo base_url() ?>admin/plugins/select2/custom-select2.js"></script>
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
      <script src="<?php echo base_url() ?>admin/assets/js/apps/custom-mailbox.js"></script>
    <script src="<?php echo base_url() ?>admin/assets/js/apps/mailbox-chat.js"></script>
    
     <script type="text/javascript">


               $(document).ready(function() {

  $messages = $('.chat-messages');
         $messages.animate({
        scrollTop: $messages.prop('scrollHeight')
      }, 300);



 
        });
       </script>
</body> 
</html>