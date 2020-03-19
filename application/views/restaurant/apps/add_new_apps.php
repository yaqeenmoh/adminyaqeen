


<div class="row_app<?php echo $app_id; ?> card-block" id="app_card_collapse">

    <div class="form-group  col-xl-3 ">
        <label for="app_ar_name_"><?php echo $this->lang->line('app_ar_name') ?></label>
        <div  class="position-relative has-icon-left">
            <input type="text" id="app_ar_name_" class="form-control"
                   placeholder="<?php echo $this->lang->line('app_ar_name') ?>" name="app_ar_name_<?php echo $app_id; ?>"
                   value="" required>
            <div class="form-control-position">
                <i class="icon-navicon2"></i>
            </div>
        </div>
    </div>


    <div class="form-group  col-xl-3 ">
        <label for="ap_en_name_"><?php echo $this->lang->line('app_en_name') ?></label>
        <div class="position-relative has-icon-left">
            <input type="text" id="ap_en_name_" class="form-control"
                   placeholder="<?php echo $this->lang->line('app_en_name') ?>" name="app_en_name_<?php echo $app_id; ?>"
                   value="">


            <div class="form-control-position">
                <i class="icon-navicon2"></i>
            </div>
        </div>
    </div>
    <div class="form-group  col-xl-2 mt-2" align="center">
        <div class="position-relative has-icon-left">

            <a onclick="delete_row_added_app(<?php echo $app_id;?>)" class="btn btn-social btn-min-width mr-1 mb-1 btn-danger"><span class="icon-minus4 font-medium-3"></span>Delete</a>
        </div>
    </div>

</div>
<div class="card-block p-0" id="app_add_form"></div>