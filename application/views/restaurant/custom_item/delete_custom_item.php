<p class="text-danger" style="text-align: center; font-size: 20px">
    <?php echo $this->lang->line('custom_item_delete_message'); ?>
</p>

<?php
if ($delete_custom) {
    foreach ($delete_custom as $custom) {
        ?>
        <form action="Custom_item/delete_custom_item?custom_item_id=<?php echo $custom->id;?>" method="post">
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg float-md-left" data-dismiss="modal" value="<?php echo $this->lang->line('custom_item_close_delete'); ?>">
                <input type="submit" name="delete_custom_item" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line('custom_item_delete_yes'); ?>">
            </div>
        </form>
        <?php
    }
}
?>