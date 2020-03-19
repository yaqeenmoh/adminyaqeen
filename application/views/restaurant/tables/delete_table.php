
<p class="text-danger" style="text-align: center; font-size: 20px">
    <?php echo $this->lang->line('table_delete_message'); ?>
</p>

<?php
if ($delete_table) {
    foreach ($delete_table as $table_deleted) {
        ?>
        <form action="Tables/delete_table?table_id=<?php echo $table_deleted->id ?>" method="post">
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg float-md-left" data-dismiss="modal" value="<?php echo $this->lang->line('table_close_delete'); ?>">
                <input type="submit" name="delete_table_yes" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line('table_delete_yes'); ?>">

            </div>
        </form>
        <?php
    }
}
?>