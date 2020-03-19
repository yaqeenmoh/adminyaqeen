<?php $counter = $sub_category_id ?>

<div id="row_<?php echo $counter; ?>" >
    <div class="card-block pb-0" >
        <div class="form-group  col-xl-3 mr-1">
            <label for="timesheetinput1"><?php echo $this->lang->line('sub_category_insert_ar_name') ?></label>
            <div class="position-relative has-icon-left">
                <input type="text" id="sub_category_ar_name_<?php echo $counter; ?>" name="sub_category_ar_name_<?php echo $counter; ?>" class="form-control" placeholder="<?php echo $this->lang->line('sub_category_insert_ar_name') ?>" required="">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>
        <div class="form-group  col-xl-3 mr-1">
            <label for="timesheetinput1"><?php echo $this->lang->line('sub_category_insert_en_name') ?></label>
            <div class="position-relative has-icon-left">
                <input type="text" id="sub_category_en_name_<?php echo $counter; ?>" name="sub_category_en_name_<?php echo $counter; ?>" class="form-control" placeholder="<?php echo $this->lang->line('sub_category_insert_en_name') ?>">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>
        <div class="form-group  col-xl-3 mr-1">
            <label for="timesheetinput1"><?php echo $this->lang->line('sub_category_insert_discount') ?></label>
            <div class="position-relative has-icon-left">
                <input type="number" step="0.01" id="sub_category_discount_<?php echo $counter; ?>" name="sub_category_discount_<?php echo $counter; ?>" class="form-control" placeholder="<?php echo $this->lang->line('sub_category_insert_discount') ?>">
                <div class="form-control-position">
                    <i class="icon-percent"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card-block pt-0 pb-0">
        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('category_insert_category') ?></label>
            <div class="position-relative has-icon-left">
                <div class="input-group">
                    <div class="input-group-addon bg-white">
                        <i class="icon-navicon2"></i>
                    </div>
                    <select class="form-control" name="sub_category_<?php echo $counter; ?>" id="sub_category_<?php echo $counter; ?>">
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
            <label for="timesheetinput1"></label>
            <div class="position-relative has-icon-left">
                <div class="position-relative has-icon-left" >
                    <a onclick="delete_row_sub_category(<?php echo $counter; ?>)" class="btn btn-social btn-min-width mr-1 mb-1 btn-danger">
                        <span class="icon-plus-circle font-medium-3"></span><?php echo $this->lang->line('printer_delete_form'); ?></a>
                </div>
            </div>
        </div>
    </div>

</div>