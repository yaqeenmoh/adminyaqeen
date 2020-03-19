<?php
if ($edit_user_type) {
    foreach ($edit_user_type as $update_user_type) {
        ?>

        <form action="<?php echo base_url(rest_path('User_type/update_user_type?user_type_id_=' . $update_user_type->id . '')); ?>" method="post">
            <label><?php echo $this->lang->line('user_type'); ?> </label>
            <div class="form-group">
                <input type="text"  name="user_name" value="<?php echo $update_user_type->name; ?>" class="form-control" required="">

            </div>
            <label><?php echo $this->lang->line('user_discount'); ?> </label>
            <div class="form-group">
                <input type="text"  name="user_discount" value="<?php echo $update_user_type->discount_percentage ?>" class="form-control">
            </div>


            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('user_type_close_edit'); ?>">
                <input type="submit" name="edit_user_type" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('user_type_save_edit'); ?>">
            </div>
        </form>

        <?php
    }
}
?>
