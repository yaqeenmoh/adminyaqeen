

<! –– start modal body  to edit brand ––>
<?php
if ($brand) {
    foreach ($brand as $value) {
        ?>
        <form action="Brand/update_brand?brand_id=<?php echo $value->id; ?>" method="post">
            <label><?php echo $this->lang->line('ar_name'); ?> </label>
            <div class="form-group">
                <input type="text" name="brand_ar_name" value="<?php echo $value->ar_name ?>" class="form-control">

            </div>

            <label><?php echo $this->lang->line('en_name'); ?> </label>
            <div class="form-group">
                <input type="text" name="brand_en_name" value="<?php echo $value->en_name ?>" class="form-control">

            </div>




            <!--<label for="branch_location_id"><?php echo $this->lang->line('branch_location_name') ?></label>-->
<!--            <div class="form-group">
                <select id="branch_location_id" name="update_branch_location" class="selectBox border-success bg-white form-control">

                    <?php
                    if (!empty($branches)) {
                        foreach ($branches as $branch) {
                            ?>
                            <option value="<?php echo $branch['branch_location_id']; ?>"
                            <?php
                            if ($branch['branch_location_id'] == $value->branch_location_id) {
                                echo 'selected';
                            }
                            ?>
                                    > 
                                        <?php
                                        if ($this->session->userdata('site_lang') == "arabic") {
                                            echo '<span>';
                                            echo $branch['branch_ar_name'];
                                            echo '</span>';
                                            echo '- &nbsp;';
                                            echo '<span>';
                                            echo $branch['location_ar_name'];
                                        } else {
                                            echo '<span>';
                                            echo $branch['branch_en_name'];
                                            echo '</span>';
                                            echo '- &nbsp;';
                                            echo '<span>';
                                            echo $branch['location_en_name'];
                                            echo '</span>';
                                        }
                                        ?>


                            </option>

                            <?php
                        }
                    }
                }
                ?>
            </select>
        </div>
       -->
        <div class="modal-footer">
            <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('brand_modal_exit'); ?>">
            <input type="submit" name="update_brand" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('brand_modal_save'); ?>">
        </div>
    </form>

    <?php
}
?>
<! –– end modal body  to edit brand ––>