<!-- Add printer Excel sheet-->
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('printer_excel_sheet') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="<?php echo base_url(rest_path('Printer/download_printer_excel')); ?>"><i class="icon-file-excel-o text-success bg-white" style="font-size: 25px;" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('printer_download_excel'); ?>"></i></a></li>
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true" style="">
        <div class="card-block">
            <form action="<?php echo base_url(rest_path('Printer/upload_printer_excel')); ?>" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group  col-xl-4">
                    <label><?php echo $this->lang->line('upload_printer_excel') ?></label>
                    <div class="position-relative has-icon-left">
                        <fieldset class="form-group">
                            <label class="custom-file center-block block">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="fileURL" required="">
                                <span class="custom-file-control"></span>
                            </label>

                        </fieldset>
                    </div>
                </div>
                <div class="form-group  col-xl-3" style="margin-top: 8px">
                    <label for="timesheetinput1"></label>
                    <div class="position-relative has-icon-left">
                        <button type="submit" name="import" class="float-right btn btn-success"><?php echo $this->lang->line('import_printer'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- Add user type-->
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('add_printer') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>


    <div class="card-body collapse in" aria-expanded="true" style=""> 
        <form action="<?php echo base_url(rest_path('Printer/insert_printer')); ?>" method="post" id="insert_printer"> 
            <div class="card-block pb-0">
                <div class="form-group  col-xl-3 ">
                    <label><?php echo $this->lang->line('printer_name') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text"  class="form-control" name="name_1" id="printer_name_1" placeholder="<?php echo $this->lang->line('printer_name') ?>" required="">
                        <div id="error_message_name_1"></div>
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('printer_code') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" class="form-control" name="printer_code_1" id="printer_code_1" placeholder="<?php echo $this->lang->line('printer_code') ?>" required="">
                        <div id="error_message_code_1"></div>
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-block p-0 pt-0" id="printer_add_form"></div>

            <div class="card-block pt-0 pb-0">
                <div class="form-group  col-xl-3" style="margin-top: 8px">
                    <label for="add"></label>
                    <div class="position-relative has-icon-left">
                        <a onclick="add_new_insert_row_printer()" class="btn btn-social btn-min-width mr-1 mb-1 btn-blue-grey">
                            <span class="icon-plus-circle font-medium-3"></span>
                            <?php echo $this->lang->line('printer_add_form'); ?></a>
                    </div>
                </div>

                <div class="form-group  col-xl-3" style="margin-top: 8px">
                    <label for="timesheetinput1"></label>
                    <div class="">
                        <input type="submit" class="btn btn-social btn-min-width pr-1 pl-1 mr-1 mb-1 btn-info" name="save_printre" value="<?php echo $this->lang->line('save_printer'); ?>"/>
                    </div> 

                </div>  
            </div>
            <input type="hidden" value="1" name="printers_form_number" id="printers_form_number"/>
        </form>
    </div>
</div>


<!-- Show printer -->
<section>
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('admin_printer'); ?></h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="printer_table">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('printer_name'); ?></th>
                                    <th><?php echo $this->lang->line('printer_code'); ?></th> 
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($get_printer) {
                                    foreach ($get_printer as $printer) {
                                        if ($printer->disable == 1) {
                                            ?>

                                            <tr>
                                                <td><?php echo $printer->name; ?></td>
                                                <td><?php echo $printer->printer_id; ?></td>

                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="<?php echo base_url(rest_path('Printer/update_printer?printer_id_=' . $printer->id . '')); ?>" data-toggle="modal"   data-target="#edit_printer"  class="btn btn-outline-success btn-round"><?php echo $this->lang->line('printer_edit'); ?></a>
                                                        <a href="<?php echo base_url(rest_path('Printer/delete_printer?printer_id_=' . $printer->id . '')); ?>"  data-toggle="modal"   data-target="#delete_printer" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('printer_delete'); ?></a>
                                                    </div>
                                                </td>
                                            </tr>   

                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Edit Modal popup -->
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_printer" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('edit_printer'); ?></label>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Delete Modal popup -->
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal animated lightSpeedIn text-xs-left" data-backdrop="static" data-keyboard="false" id="delete_printer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('delete_printer'); ?></label>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>