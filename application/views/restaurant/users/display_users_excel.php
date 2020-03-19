<div class="card-block card-dashboard">
    <form action="<?php echo base_url(rest_path('Users/insert_users_excel')); ?>" enctype="multipart/form-data" method="post" id="excel_users">
        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="users_excel_table">
            <thead>
                <tr>
                    <th scope="col"><?php echo $this->lang->line('users_username_excel'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('users_password_excel'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('users_user_type_excel'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('users_device_excel'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('users_branch_location_excel'); ?></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($mydata as $key => $element) {
                    ?>
                    <tr>
                        <td><input type="text" class="form-control" id="excel_username_<?php echo $i; ?>" name="username_<?php echo $i; ?>" value="<?php print $element['username']; ?>" style="border: 0px" required=""></td>
                        <td><input type="text" class="form-control" id="excel_password_<?php echo $i; ?>" name="password_<?php echo $i; ?>" value="<?php print $element['password']; ?>" style="border: 0px" required=""></td>
                        <td>
                            <div class="input-group">
                                <select class="form-control" name="user_type_<?php echo $i; ?>" id="excel_user_type_<?php echo $i; ?>" required>
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
                        </td>
                        <td><div class="input-group">
                                <select class="form-control" name="device_<?php echo $i; ?>" id="excel_device_<?php echo $i; ?>">
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
                            </div></td>


                        <td> <div class="input-group">
                                <?php
                                if ($user_branch_location) {
                                    foreach ($user_branch_location as $branch_location) {
                                        ?>
                                        <fieldset>

                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" value="<?php echo $branch_location->branch_location_id ?>" name="branch_location_<?php echo $i; ?>[]" id="excel_branch_location_<?php echo $i; ?>" required="">
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
                        </td>
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        
        <input type="hidden" value="<?php echo $i?>" name="users_form_number" />
        <div id="users_check_data_error_message" style="text-align: center"></div>
        <div class="form-group  col-xl-3">
            <button type="submit" onclick="users_check_data()" id="users_check_excel_data" name="save_excel" class="btn btn-primary" id="users_save_excel"><?php echo $this->lang->line('users_save_excel_table'); ?></button>
        </div>
        <div class="form-group  col-xl-3">
            <a href="<?php echo base_url(rest_path('Users'));?>" class="btn btn-danger"><?php echo $this->lang->line('users_cancel_excel_table'); ?></a>
        </div>

    </form>

</div>


















