


<div class="row_color_<?php echo $color_row_id; ?> card-block pb-0">
    <div class="form-group  col-xl-3 ">
        <label for="color_ar_name_"><?php echo $this->lang->line('color_ar_name') ?></label>
        <div  class="position-relative has-icon-left">
            <input type="text" id="color_ar_name_<?php echo $color_row_id; ?>" class="form-control"
                   placeholder="<?php echo $this->lang->line('color_ar_name') ?>" name="ar_name_<?php echo $color_row_id; ?>"
                   value="" required="">
            <div id="color_name_error_message_<?php echo $color_row_id; ?>"></div>

            <div class="form-control-position">
                <i class="icon-navicon2"></i>
            </div>
        </div>
    </div>


    <div class="form-group  col-xl-3 ">
        <label for="color_en_name_"><?php echo $this->lang->line('color_en_name') ?></label>
        <div class="position-relative has-icon-left">
            <input type="text" id="color_en_name_<?php echo $color_row_id; ?>" class="form-control"
                   placeholder="<?php echo $this->lang->line('color_en_name') ?>" name="en_name_<?php echo $color_row_id; ?>"
                   value="">

            <div class="form-control-position">
                <i class="icon-navicon2"></i>
            </div>
        </div>
    </div>

    <div class="form-group  col-xl-2 mt-2" align="center">
        <div class="position-relative has-icon-left">
            <a onclick="delete_row_added_color(<?php echo $color_row_id; ?>)" class="btn btn-social btn-min-width mr-1 mb-1 btn-danger"><span class="icon-minus4 font-medium-3"></span><?php echo $this->lang->line('color_delete_row');?></a>
        </div>
    </div>
</div>

<div class="card-block p-0" id="color_add_form"></div>