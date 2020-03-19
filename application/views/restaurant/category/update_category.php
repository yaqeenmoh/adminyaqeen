
<?php
if ($update_category) {
    foreach ($update_category as $updateCategory) {
        ?>
        <form action="<?php echo base_url(rest_path('Category/update_category?category_id=' . $updateCategory->id . '')); ?>" method="post" enctype="multipart/form-data">
            <label><?php echo $this->lang->line('edit_category_ar_name'); ?> </label>
            <div class="form-group">
                <input type="text" name="category_ar_name" value="<?php echo $updateCategory->ar_name; ?>" class="form-control" required="">

            </div>

            <label><?php echo $this->lang->line('edit_category_en_name'); ?> </label>
            <div class="form-group">
                <input type="text" name="category_en_name" value="<?php echo $updateCategory->en_name; ?>" class="form-control">

            </div>


            <label><?php echo $this->lang->line('edit_category_discount'); ?> </label>
            <div class="form-group">
                <input type="number" step="0.01" name="category_discount" value="<?php echo $updateCategory->discount; ?>" class="form-control">
            </div>



            <label><?php echo $this->lang->line('edit_category_image'); ?> </label><br>
            <?php
            if ($updateCategory->image == NULL) {
                echo '<label class="text-danger">' . $this->lang->line('category_no_image') . '</label>';
            } else {
                ?>
                <img src="<?php echo base_url('assets/lib/images/category/') . $updateCategory->image ?>" width="50px" height="50px">
            <?php }
            ?>

            <input type="hidden" value="<?php echo $updateCategory->image ?>" name="category_image" />
            <div class="form-group">
                <div class="position-relative has-icon-left">
                    <label class="custom-file center-block block">
                        <input type="file" id="file"  name="category_image_upload">
                        <span class="custom-file-control"></span>
                    </label>
                </div>

            </div>


            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('category_edit_close'); ?>">
                <input type="submit" name="save_update_category" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('category_edit_save'); ?>">
            </div>
        </form>
        <?php
    }
}
?>



