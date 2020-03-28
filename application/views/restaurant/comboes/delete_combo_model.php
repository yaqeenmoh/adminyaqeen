
<p class="text-danger" style="text-align: center; font-size: 20px">
    <?php echo $this->lang->line('combo_delete_message'); ?>
</p>

<?php
if ($delete_combo) {
    foreach ($delete_combo as $combo) {
        ?>
        <form action="Combo/delete_combo?combo_id=<?php echo $combo->combo_id; ?>" method="post">
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg float-md-left" data-dismiss="modal" value="<?php echo $this->lang->line('combo_close_delete'); ?>">
                <input type="submit" name="delete_combo_yes" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line('combo_delete_yes'); ?>">
                <input type="submit" name="delete_combo_no" class="btn btn-success btn-lg" value="<?php echo $this->lang->line('combo_delete_no'); ?>">
            </div>
        </form>
        <?php
    }
}
?>