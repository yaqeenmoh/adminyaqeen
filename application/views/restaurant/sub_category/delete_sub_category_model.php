<p class="text-danger" style="text-align: center; font-size: 20px">
    <?php echo $this->lang->line('sub_category_delete_message'); ?>
</p>

<?php
if ($delete_sub_category) {
    foreach ($delete_sub_category as $sub_category_deleted) {
        ?>
        <form action="<?php echo base_url(rest_path('Sub_category/delete_sub_category?sub_category_id=' . $sub_category_deleted->id . '')); ?>" method="post">
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg float-md-left" data-dismiss="modal" value="<?php echo $this->lang->line('sub_category_close_delete'); ?>">
                <input type="submit" name="delete_sub_category" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line('sub_category_delete_yes'); ?>">
            </div>
        </form>
        <?php
    }
}
?>


