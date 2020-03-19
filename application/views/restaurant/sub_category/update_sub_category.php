<?php
if ($update_sub_category) {
    foreach ($update_sub_category as $sub_category) {
        ?>

        <form action="<?php echo base_url(rest_path('Sub_category/update_sub_category?sub_category_id=' . $sub_category->id . '')); ?>" method="post">
            <label><?php echo $this->lang->line('edit_sub_category_ar_name'); ?> </label>
            <div class="form-group">
                <input type="text" name="sub_category_ar_name" value="<?php echo $sub_category->ar_name ?>" class="form-control" required="">

            </div>

            <label><?php echo $this->lang->line('edit_sub_category_en_name'); ?> </label>
            <div class="form-group">
                <input type="text" name="sub_category_en_name" value="<?php echo $sub_category->en_name ?>" class="form-control">

            </div>


            <label><?php echo $this->lang->line('edit_sub_category_discount'); ?> </label>
            <div class="form-group">
                <input type="number" step="0.01" name="sub_category_discount" value="<?php echo $sub_category->discount ?>" class="form-control">
            </div>


            <label><?php echo $this->lang->line('edit_sub_category_category'); ?> </label>
            <div class="form-group">
                <?php
                if ($sub_category_level) {
                    foreach ($sub_category_level as $value) {

                        $sub_level = $sub_category->sub_level;
                        $level = explode("-", $sub_level);
                        $last_level = end($level);
                        ?>
                        <fieldset>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" value="<?php echo $value->sub_level ?>" class="custom-control-input"  name="sub_category_category" <?php
                                if ($sub_category->id == $value->id) {
                                    echo 'checked=""';
                                }
                                ?>>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">
                                    <?php echo $value->sub_ar_name; ?>
                                </span>
                            </label>
                        </fieldset>
                        <?php
                    }
                }
                ?>

            </div>
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('sub_category_edit_close'); ?>">
                <input type="submit" name="save_update_sub_category" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('sub_category_edit_save'); ?>">
            </div>
        </form>

        <?php
    }
}
?>