
<div class="card-block pb-0">
    <div class="form-group  col-xl-3 mr-1">
        <label for="timesheetinput1"><?php echo $this->lang->line('sub_category_insert_ar_name') ?></label>
        <div class="position-relative has-icon-left">
            <input type="text" id="sub_category_ar_name_1" name="sub_category_ar_name_1" class="form-control" placeholder="<?php echo $this->lang->line('sub_category_insert_ar_name') ?>" required="">
            <div id="name_sub_category_one_error_message_1"></div>
            <div class="form-control-position">
                <i class="icon-navicon2"></i>
            </div>
        </div>
    </div>
    <div class="form-group  col-xl-3 mr-1">
        <label for="timesheetinput1"><?php echo $this->lang->line('sub_category_insert_en_name') ?></label>
        <div class="position-relative has-icon-left">
            <input type="text" id="sub_category_en_name_1" name="sub_category_en_name_1" class="form-control" placeholder="<?php echo $this->lang->line('sub_category_insert_en_name') ?>">
            <div class="form-control-position">
                <i class="icon-navicon2"></i>
            </div>
        </div>
    </div>
    <div class="form-group  col-xl-3 mr-1">
        <label for="timesheetinput1"><?php echo $this->lang->line('sub_category_insert_discount') ?></label>
        <div class="position-relative has-icon-left">
            <input type="number" step="0.01" id="sub_category_discount_1" name="sub_category_discount_1" class="form-control" placeholder="<?php echo $this->lang->line('sub_category_insert_discount') ?>">
            <div class="form-control-position">
                <i class="icon-percent"></i>
            </div>
        </div>
    </div>
</div>
<div class="card-block pb-0 pt-0">
    <div class="form-group  col-xl-3">
        <label><?php echo $this->lang->line('category_insert_category') ?></label>
        <div class="position-relative has-icon-left">
            <div class="input-group">
                <div class="input-group-addon bg-white">
                    <i class="icon-navicon2"></i>
                </div>
                <select class="form-control" name="sub_category_1" id="sub_category_1">
                    <option value="0"></option>
                    <?php
                    if ($category) {
                        foreach ($category as $sub_category) {
                            ?>
                            <option value="<?php echo $sub_category->id ?>">
                                <?php
                                if ($this->session->userdata('site_lang') == "arabic") {
                                    echo $sub_category->ar_name;
                                } else {
                                    echo $sub_category->en_name;
                                }
                                ?>

                            </option>
                            <?php
                        }
                    }
                    ?>

                </select>
            </div>
        </div>
    </div>

    <div class="form-group  col-xl-2"  style="margin-top: 8px;">
        <label for="add"></label>
        <div class="position-relative has-icon-left">
            <div class="position-relative has-icon-left" >
                <a onclick="add_sub_category_form()" class="btn btn-social btn-min-width mr-1 mb-1 btn-blue-grey">
                    <span class="icon-plus-circle font-medium-3"></span>
                    <?php echo $this->lang->line('sub_category_add_form'); ?></a>
            </div>

        </div>
    </div>

    <div class="form-group  col-xl-2"  style="margin-top: 8px;">
        <label for="timesheetinput1"></label>
        <div class="">
            <input type="submit" value="<?php echo $this->lang->line('save_sub_category'); ?>" class="btn btn-social btn-min-width pl-1 pr-1 mr-1 mb-1 btn-info" />
        </div>
    </div>
</div>

<input type="hidden" value="1" name="sub_category_form_number" id="sub_category_form_number" />