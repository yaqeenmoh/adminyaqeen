<?php $counter = $tables_id ?>

<div class="row_<?php echo $counter; ?>">


    <div class="card-block pb-0">
        <div class="form-group col-xl-3">
            <label><?php echo $this->lang->line('tables_name') ?></label>
            <div class="position-relative has-icon-left">
                <input type="text" class="form-control" id="table_name_<?php echo $counter; ?>" name="table_name_<?php echo $counter; ?>" placeholder="<?php echo $this->lang->line('tables_name') ?>">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>

        <div class="form-group col-xl-3">
            <label><?php echo $this->lang->line('tables_chair_number') ?></label>
            <div class="position-relative has-icon-left">
                <input type="number" class="form-control" id="table_chair_number_<?php echo $counter; ?>" name="table_chair_number_<?php echo $counter; ?>" placeholder="<?php echo $this->lang->line('tables_chair_number') ?>">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>

        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('tables_floor_select') ?></label>
            <div class="position-relative has-icon-left">
                <div class="input-group">
                    <div class="input-group-addon bg-white">
                        <i class="icon-navicon2"></i>
                    </div>
                    <select class="form-control" name="table_floor_<?php echo $counter; ?>" id="table_floor_<?php echo $counter; ?>" required="">
                        <option value="0"></option>
                        <?php
                        if ($floor) {
                            foreach ($floor as $floors) {
                                ?>
                                <option value="<?php echo $floors->id ?>"><?php
                                    if ($this->session->userdata('site_lang') == "arabic") {
                                        echo $floors->ar_name;
                                    } else {
                                        echo $floors->en_name;
                                    }
                                    ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('tables_image') ?></label>
            <div class="position-relative has-icon-left">
                <div class="input-group">
                    <div class="input-group-addon bg-white">
                        <i class="icon-navicon2"></i>
                    </div>
                    <select class="form-control" name="table_image_<?php echo $counter; ?>" id="table_image_<?php echo $counter; ?>">
                        <option></option>
                        <option value="barAvailable"><?php echo $this->lang->line('tables_bar'); ?></option>
                        <option value="towChairAvailable"><?php echo $this->lang->line('tables_two_chair'); ?></option>
                        <option value="fourChairAvailable"><?php echo $this->lang->line('tables_four_chair'); ?></option>
                        <option value="sixChairAvailable"><?php echo $this->lang->line('tables_six_chair'); ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-block pt-0 pb-0">
        <div class="form-group  col-xl-2"  style="margin-top: 8px;">
            <label for="timesheetinput1"></label>
            <div class="position-relative has-icon-left">
                <div class="position-relative has-icon-left" >
                    <a onclick="delete_row_tables(<?php echo $counter; ?>)" class="btn btn-social btn-min-width mr-1 mb-1 btn-danger">
                        <span class="icon-plus-circle font-medium-3"></span><?php echo $this->lang->line('printer_delete_form'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>