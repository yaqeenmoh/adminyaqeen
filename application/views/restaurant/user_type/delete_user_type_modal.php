<p class="text-danger" style="text-align: center; font-size: 20px">
    <?php echo $this->lang->line('user_type_delete_message'); ?>
</p>

<?php
if ($delete_user_type) {
    foreach ($delete_user_type as $delete_userType) {
        ?>
        <form action="<?php echo base_url(rest_path('User_type/delete_user_type?userType_id_=' . $delete_userType->id . '')); ?>" method="post">
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg float-md-left" data-dismiss="modal" value="<?php echo $this->lang->line('user_type_close_delete'); ?>">
                <input type="submit" name="delete_user_type" class="btn btn-success btn-lg" value="<?php echo $this->lang->line('user_type_delete_no'); ?>">
                <input type="submit" name="delete_user_type_and_users" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line('user_type_delete_yes'); ?>">
            </div>
        </form>
        <?php
    }
}
?>

