<p class="text-danger" style="text-align: center; font-size: 20px">
    <?php echo $this->lang->line('items_delete_message'); ?>
</p>

<?php
if ($get_items_item_info) {
    foreach ($get_items_item_info as $delete_item) {
        ?>
        <form action="Items/delete_item?item_info_id=<?php echo $delete_item->id; ?>" method="post">
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg float-md-left" data-dismiss="modal" value="<?php echo $this->lang->line('item_close_delete'); ?>">
                <input type="submit" name="delete_item" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line('item_delete_yes'); ?>">
            </div>
        </form>
        <?php
    }
}
?>

