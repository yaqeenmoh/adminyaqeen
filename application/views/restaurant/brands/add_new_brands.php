

<div class="row_brand<?php echo $id;?> card-block">
    <p>
    <div class="form-group  col-xl-3 ">

        <label for="ar_name"><?php echo $this->lang->line('brand_ar_name') ?></label>
        <div class="position-relative has-icon-left">
            <input type="text" id="ar_name" class="form-control"
                   placeholder="<?php echo $this->lang->line('brand_ar_name') ?>" name="ar_name_<?php echo $id;?>"
                   value="<?php echo set_value('ar_name'); ?>" required="">
                   <?php echo form_error('ar_name', '<div class="text-danger">', '</div>'); ?>

            <div class="form-control-position">
                <i class="icon-navicon2"></i>
            </div>
        </div>
    </div>


    <div class="form-group  col-xl-3 ">
        <label for="en_name"><?php echo $this->lang->line('brand_en_name') ?></label>
        <div class="position-relative has-icon-left">
            <input type="text" id="en_name" class="form-control"
                   placeholder="<?php echo $this->lang->line('brand_en_name') ?>" name="en_name_<?php echo $id;?>"
                   value="<?php echo set_value('en_name'); ?>">

            <?php echo form_error('en_name', '<div class="text-danger">', '</div>'); ?>

            <div class="form-control-position">
                <i class="icon-navicon2"></i>
            </div>
        </div>
    </div>
    <div class="input-group col-xl-3">
        <label for="select_branch_location" class="filled"><?php echo $this->lang->line('combo_select_location_branch') ?></label>
        <?php
        if ($branches) {
            foreach ($branches as $branch) {
                ?>
                <label class="display-inline-block custom-control custom-radio ml-1">
                    <input value="<?php echo $branch['branch_location_id']; ?>" type="checkbox" name="branch_location_id_<?php echo $id;?>[]" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description ml-0"><?php
                        if ($this->session->userdata('site_lang') == "arabic") {
                            echo $branch['location_ar_name'] . "," . $branch['branch_ar_name'];
                        } else {
                            echo $branch['location_en_name'] . "," . $branch['location_en_name'];
                        }
                        ?></span>
                </label>

                <?php
            }
        }
        ?>
    </div>
    <div class="form-group  col-xl-2" align="center">
        <div class="position-relative has-icon-left">

            <a onclick="delete_row_added_brand(<?php echo $id;?>)" class="btn btn-social btn-min-width mr-1 mb-1 btn-danger"><span class="icon-minus4 font-medium-3"></span>Delete</a>
        </div>
    </div>


</div>

<div class="card-block p-0" id="brand_add_form"></div>

