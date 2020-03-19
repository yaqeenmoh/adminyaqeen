

</div>
</div>
</div>

<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
</footer>

<!-- BEGIN VENDOR JS-->



<script src="<?php echo general_app_assets('js/core/libraries/jquery.min.js'); ?>" type="text/javascript"></script>

<script src="<?php echo general_app_assets('vendors/js/ui/tether.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('js/core/libraries/bootstrap.min.js'); ?>" type="text/javascript"></script>

<script src="<?php echo general_app_assets('vendors/js/ui/perfect-scrollbar.jquery.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/ui/unison.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/ui/blockUI.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/ui/jquery.matchHeight-min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/ui/jquery-sliding-menu.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/sliders/slick/slick.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/ui/screenfull.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/extensions/pace.min.js'); ?>" type="text/javascript"></script>


<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="<?php echo general_app_assets('vendors/js/tables/jquery.dataTables.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/tables/datatable/dataTables.bootstrap4.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/tables/datatable/dataTables.responsive.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/tables/buttons.colVis.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/tables/datatable/dataTables.colReorder.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/tables/datatable/dataTables.buttons.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/tables/datatable/buttons.bootstrap4.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('vendors/js/tables/datatable/dataTables.fixedHeader.min.js'); ?>" type="text/javascript"></script>



<!-- END PAGE VENDOR JS-->

<!-- BEGIN ROBUST JS-->

<script src="<?php echo general_app_assets('js/core/app-menu.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('js/core/app.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('js/scripts/ui/fullscreenSearch.js'); ?>" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<script src="<?php echo general_app_assets('js/scripts/tables/datatables-extensions/datatable-responsive.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_app_assets('js/scripts/modal/components-modal.js'); ?>" type="text/javascript"></script>
<script src="<?php echo general_assets('js/scripts.js'); ?>" type="text/javascript"></script>

<script>
    $('#customer_table').dataTable({
        "ordering": false,
        "language": {
            "paginate": {
                "previous": "<?php echo $this->lang->line('pagination_prev'); ?>",
                "next": "<?php echo $this->lang->line('pagination_next'); ?>"
            }
        }
    });


    $('#user_type_table').dataTable({
        "ordering": false,
        "language": {
            "paginate": {
                "previous": "<?php echo $this->lang->line('pagination_prev'); ?>",
                "next": "<?php echo $this->lang->line('pagination_next'); ?>"
            }
        }
    });
    
    $('#users_table').dataTable({
        "ordering": false,
        "language": {
            "paginate": {
                "previous": "<?php echo $this->lang->line('pagination_prev'); ?>",
                "next": "<?php echo $this->lang->line('pagination_next'); ?>"
            }
        }
    });
    
    $('#category_table').dataTable({
        "ordering": false,
        "language": {
            "paginate": {
                "previous": "<?php echo $this->lang->line('pagination_prev'); ?>",
                "next": "<?php echo $this->lang->line('pagination_next'); ?>"
            }
        }
    });
    
     $('#sub_category_table').dataTable({
        "ordering": false,
        "language": {
            "paginate": {
                "previous": "<?php echo $this->lang->line('pagination_prev'); ?>",
                "next": "<?php echo $this->lang->line('pagination_next'); ?>"
            }
        }
    });
    
     $('#custom_item_table').dataTable({
        "ordering": false,
        "language": {
            "paginate": {
                "previous": "<?php echo $this->lang->line('pagination_prev'); ?>",
                "next": "<?php echo $this->lang->line('pagination_next'); ?>"
            }
        }
    });
    
     $('#printer_table').dataTable({
        "ordering": false,
        "language": {
            "paginate": {
                "previous": "<?php echo $this->lang->line('pagination_prev'); ?>",
                "next": "<?php echo $this->lang->line('pagination_next'); ?>"
            }
        }
    });
    
     $('#tables_table').dataTable({
        "ordering": false,
        "language": {
            "paginate": {
                "previous": "<?php echo $this->lang->line('pagination_prev'); ?>",
                "next": "<?php echo $this->lang->line('pagination_next'); ?>"
            }
        }
    });





</script>



</body>
</html>
