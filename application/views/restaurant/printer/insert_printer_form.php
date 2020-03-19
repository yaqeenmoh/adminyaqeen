<?php $counter = $printer_id; ?>
<div class="row_<?php echo $counter; ?>">


    <div class="card-block pt-0 pb-0 ">

        <div class="form-group  col-xl-3 ">
            <label><?php echo $this->lang->line('printer_name') ?></label>
            <div class="position-relative has-icon-left">
                <input type="text"  class="form-control"  name="name_<?php echo $counter; ?>" id="printer_name_<?php echo $counter; ?>" placeholder="<?php echo $this->lang->line('printer_name') ?>" required="">
                <div id="error_message_name_<?php echo $counter; ?>"></div>
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>

        </div>


        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('printer_code') ?></label>
            <div class="position-relative has-icon-left">
                <input type="text" class="form-control" name="printer_code_<?php echo $counter; ?>" id="printer_code_<?php echo $counter; ?>" placeholder="<?php echo $this->lang->line('printer_code') ?>" required="">
                <div id="error_message_code_<?php echo $counter; ?>"></div>
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>


        <div class="form-group  col-xl-2"  style="margin-top: 8px;">
            <label for="timesheetinput1"></label>
            <div class="position-relative has-icon-left">
                <div class="position-relative has-icon-left" >
                    <a onclick="delete_row_printer(<?php echo $counter; ?>)" class="btn btn-social btn-min-width mr-1 mb-1 btn-danger">
                        <span class="icon-plus-circle font-medium-3"></span><?php echo $this->lang->line('printer_delete_form'); ?></a>
                </div>

            </div>
        </div>
    </div>
</div>
