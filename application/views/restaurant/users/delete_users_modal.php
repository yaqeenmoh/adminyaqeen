<p class="text-danger" style="text-align: center; font-size: 20px">
    <?php echo $this->lang->line('users_delete_message'); ?>
</p>

<?php
if ($delete_user) {
    foreach ($delete_user as $users_deleted) {
        ?>
<form action="Users/delete_users?delete_user_id=<?php echo $users_deleted->id ?>" method="post">
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg float-md-left" data-dismiss="modal" value="<?php echo $this->lang->line('users_close_delete'); ?>">
                <input type="submit" name="delete_users" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line('users_delete_yes'); ?>">
            </div>
        </form>
        <?php
    }
}
?>
