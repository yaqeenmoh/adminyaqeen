
<p class="text-danger" style="text-align: center; font-size: 20px">
    <?php echo $this->lang->line('category_delete_message'); ?>
</p>

<?php
if ($delete_category) {
    foreach ($delete_category as $category_deleted) {
        ?>
        <form action="<?php echo base_url(rest_path('Category/delete_category?category_id=' . $category_deleted->id . '')) ?>" method="post">
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg float-md-left" data-dismiss="modal" value="<?php echo $this->lang->line('category_close_delete'); ?>">
                <input type="submit" name="delete_category_yes" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line('category_delete_yes'); ?>">
                <input type="submit" name="delete_category_no" class="btn btn-success btn-lg" value="<?php echo $this->lang->line('category_delete_no'); ?>">
            </div>
        </form>
        <?php
    }
}
?>