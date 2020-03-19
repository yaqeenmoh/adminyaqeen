<?php $user_type_id; ?>

<div class="card-block row_<?php echo $user_type_id; ?>">

    <div class="form-group  col-xl-3">
        <label><?php echo $this->lang->line('user_type') ?></label>
        <div class="position-relative has-icon-left">
            <input type="text" id="name_<?php echo $user_type_id; ?>" name="name_<?php echo $user_type_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('user_type');?>" required="">
            <div class="form-control-position">
                <i class="icon-navicon2"></i>
            </div>
        </div>
    </div>

    <div class="form-group  col-xl-3 ">
        <label><?php echo $this->lang->line('user_discount') ?></label>
        <div class="position-relative has-icon-left">
            <input type="number" id="discount_percentage_<?php echo $user_type_id; ?>" name="discount_percentage_<?php echo $user_type_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('user_discount');?>" >
            <div class="form-control-position">
                <i class="icon-percent"></i>
            </div>
        </div>
    </div>

    <div class="form-group  col-xl-2"  style="margin-top: 8px;">
        <label for="timesheetinput1"></label>
        <div class="position-relative has-icon-left">
            <div class="position-relative has-icon-left" >
                <a onclick="delete_row_user_type(<?php echo $user_type_id; ?>)" class="btn btn-social btn-min-width mr-1 mb-1 btn-danger">
                    <span class="icon-plus-circle font-medium-3"></span><?php echo $this->lang->line('user_type_delete_form');?></a>
            </div>
        </div>
    </div>
    
</div>