<?php $counter = $category_id; ?>
<div  id="row_<?php echo $counter; ?>">


    <div class="card-block">
        <div class="form-group  col-xl-3 mr-1">
            <label><?php echo $this->lang->line('category_insert_ar_name') ?></label>
            <div class="position-relative has-icon-left">
                <input type="text" id="category_ar_name_<?php echo $counter; ?>" name="category_ar_name_<?php echo $counter; ?>" class="form-control" placeholder="<?php echo $this->lang->line('category_insert_ar_name') ?>" required="">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>
        <div class="form-group  col-xl-3 mr-1">
            <label for="timesheetinput1"><?php echo $this->lang->line('category_insert_en_name') ?></label>
            <div class="position-relative has-icon-left">
                <input type="text" id="category_en_name_<?php echo $counter; ?>" name="category_en_name_<?php echo $counter; ?>" class="form-control" placeholder="<?php echo $this->lang->line('category_insert_en_name') ?>">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>
        <div class="form-group  col-xl-3 mr-1">
            <label for="timesheetinput1"><?php echo $this->lang->line('category_insert_discount') ?></label>
            <div class="position-relative has-icon-left">
                <input type="text" id="category_discount_<?php echo $counter; ?>" name="category_discount_<?php echo $counter; ?>" class="form-control" placeholder="<?php echo $this->lang->line('category_insert_discount') ?>">
                <div class="form-control-position">
                    <i class="icon-percent"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card-block pt-0 pb-0">
        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('category_insert_branch_location') ?></label>
            <?php
            if ($category_branch_location) {
                foreach ($category_branch_location as $branch_location) {
                    ?>
                    <fieldset>

                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="<?php echo $branch_location->branch_location_id ?>" name="category_brnach_location_<?php echo $counter; ?>[]" id="category_brnach_location_<?php echo $counter; ?>">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">
                                <?php
                                if ($this->session->userdata('site_lang') == "arabic") {
                                    echo '<span>';
                                    echo $branch_location->location_ar_name;
                                    echo '</span>';
                                    echo '- &nbsp;';
                                    echo '<span>';
                                    echo $branch_location->branch_ar_name;
                                    echo '</span>';
                                } else {
                                    echo '<span>';
                                    echo $branch_location->location_en_name;
                                    echo '</span>';
                                    echo '- &nbsp;';
                                    echo '<span>';
                                    echo $branch_location->branch_en_name;
                                    echo '</span>';
                                }
                                ?>
                            </span>
                        </label>

                    </fieldset>
                    <?php
                }
            }
            ?>
        </div>

        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('category_insert_printer') ?></label>
            <?php
            if ($get_printer) {
                foreach ($get_printer as $printer) {
                    ?>
                    <fieldset>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="<?php echo $printer->id ?>" name="category_printer_<?php echo $counter; ?>[]" id="category_printer_<?php echo $counter; ?>">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">
                                <?php echo $printer->name; ?>    
                            </span>
                        </label>

                    </fieldset>
                    <?php
                }
            }
            ?>

        </div>


        <div class="form-group  col-xl-3 mr-1">
            <label for="timesheetinput1"><?php echo $this->lang->line('category_insert_img') ?></label>
            <div class="position-relative has-icon-left">
                <label class="custom-file center-block block">
                    <input type="file" id="category_image_<?php echo $counter; ?>" name="category_image_<?php echo $counter; ?>" class="custom-file-input">
                    <span class="custom-file-control"></span>
                </label>
            </div>
        </div>
    </div>

    <div class="card-block pb-0 pt-0">
        <div class="form-group  col-xl-2"  style="margin-top: 8px;">
            <label for="timesheetinput1"></label>
            <div class="position-relative has-icon-left">
                <div class="position-relative has-icon-left" >
                    <a onclick="delete_row_category(<?php echo $counter; ?>)" class="btn btn-social btn-min-width mr-1 mb-1 btn-danger">
                        <span class="icon-plus-circle font-medium-3"></span>Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>