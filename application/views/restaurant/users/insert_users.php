<?php $counter = $user_id ?>
<div id="row_<?php echo $counter; ?>">

    <div class="card-block" >
        <div class="form-group  col-xl-5 ">
            <label><?php echo $this->lang->line('users_user_name') ?></label>
            <div class="position-relative has-icon-left">
                <input type="text" id="username_<?php echo $counter; ?>" name="username_<?php echo $counter; ?>" class="form-control" placeholder="<?php echo $this->lang->line('users_user_name') ?>" required="">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>


        <div class="form-group  col-xl-5">
            <label><?php echo $this->lang->line('users_user_password') ?></label>
            <div class="position-relative has-icon-left">
                <input type="password" id="password_<?php echo $counter; ?>" name="password_<?php echo $counter; ?>" class="form-control"  placeholder="<?php echo $this->lang->line('users_user_password') ?>" required=""> 
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>

    </div>
    <div class="card-block pb-0 pt-0">
        <div class="form-group  col-xl-5">
            <label><?php echo $this->lang->line('users_user_type') ?></label>
            <div class="position-relative has-icon-left">
                <div class="input-group">
                    <div class="input-group-addon bg-white">
                        <i class="icon-navicon2"></i>
                    </div>
                    <select class="form-control" name="user_type_<?php echo $counter; ?>" id="user_type_<?php echo $counter; ?>" required="">
                        <option value="0"></option>
                        <?php
                        if ($user_type) {
                            foreach ($user_type as $usersType) {
                                if ($usersType->disable == 1) {
                                    ?>
                                    <option value="<?php echo $usersType->id ?>"><?php echo $usersType->name; ?></option>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>


        <div class="form-group  col-xl-5">
            <label><?php echo $this->lang->line('users_device') ?></label>
            <div class="position-relative has-icon-left">
                <div class="input-group">
                    <div class="input-group-addon bg-white">
                        <i class="icon-navicon2"></i>
                    </div>
                    <select class="form-control " name="device_<?php echo $counter; ?>" id="device_<?php echo $counter; ?>">
                        <option></option>
                        <?php
                        if ($user_device) {
                            foreach ($user_device as $device) {
                                ?>
                                <option value="<?php echo $device->id ?>"><?php
                                    if ($this->session->userdata('site_lang') == "arabic") {
                                        echo $device->ar_name;
                                    } else {
                                        echo $device->en_name;
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
    </div>
    <div class="card-block pb-0 pt-0">
        <div class="form-group col-xl-5" >
            <label><?php echo $this->lang->line('users_branch') ?></label>
            <?php
            if ($user_branch_location) {
                foreach ($user_branch_location as $branch_location) {
                    ?>
                    <fieldset>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input branch_location_<?php echo $counter; ?>" value="<?php echo $branch_location->branch_location_id ?>" name="branch_location_<?php echo $counter; ?>[]" id="branch_location_<?php echo $counter; ?>" required="">
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
                                ?></span>
                        </label>

                    </fieldset>
                    <?php
                }
            }
            ?>

        </div> 

        <div class="form-group  col-xl-2"  style="margin-top: 8px;">
            <label for="timesheetinput1"></label>
            <div class="position-relative has-icon-left">

                <div class="position-relative has-icon-left" >
                    <a onclick="delete_row_users(<?php echo $counter; ?>)" class="btn btn-social btn-min-width mr-1 mb-1 btn-danger">
                        <span class="icon-plus-circle font-medium-3"></span>Delete</a>
                </div>

            </div>
        </div>

    </div>
</div>