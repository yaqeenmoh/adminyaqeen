
<?php
if ($users_information) {
    foreach ($users_information as $update_user) {
        ?>
        <form action="Users/update_users_information_by_id?id=<?php echo $update_user->id; ?>" method="post">
            <label><?php echo $this->lang->line('edit_users_username'); ?> </label>
            <div class="form-group">
                <input type="text" name="update_username" value="<?php echo $update_user->username; ?>" placeholder="<?php echo $this->lang->line('edit_users_username'); ?>" class="form-control">

            </div>

            <label><?php echo $this->lang->line('edit_users_password'); ?> </label>
            <div class="form-group">
                <input type="text" name="update_password" value="<?php echo $update_user->password; ?>" placeholder="<?php echo $this->lang->line('edit_users_password'); ?>" class="form-control">

            </div>

            <label><?php echo $this->lang->line('edit_users_user_type'); ?> </label>
            <div class="form-group">
                <select class="form-control" name="update_type_user">
                    <?php
                    if ($user_type) {
                        foreach ($user_type as $type_user) {
                            if ($type_user->disable == 1) {
                                ?>
                                <option value="<?php echo $type_user->id; ?>" <?php
                                if ($type_user->id == $update_user->user_type_id) {
                                    echo 'selected';
                                }
                                ?>>
                                            <?php echo $type_user->name; ?>
                                </option>
                                <?php
                            }
                        }
                    }
                    ?>
                </select>
            </div>

            <label><?php echo $this->lang->line('edit_users_device'); ?> </label>
            <div class="form-group">
                <select class="form-control" name="update_device">

                    <?php
                    if ($update_user->device_id == '') {
                        ?>
                        <option></option>

                        <?php
                    }
                    ?>

                    <?php
                    if ($user_device) {
                        foreach ($user_device as $device) {
                            ?>
                            <option value="<?php echo $device->id ?>" <?php
                            if ($device->id == $update_user->device_id) {
                                echo 'selected';
                            }
                            ?>>
                                        <?php
                                        if ($this->session->userdata('site_lang') == "arabic") {
                                            echo $device->ar_name;
                                        } else {
                                            echo $device->en_name;
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

        <div class="modal-footer">
            <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('users_close_edit'); ?>">
            <input type="submit" name="update_user_information" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('users_save_edit'); ?>">
        </div>
        </form>
        <?php
    }
}
?>



