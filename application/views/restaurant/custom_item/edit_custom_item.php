<?php
if ($edit_custom) {
    foreach ($edit_custom as $edit) {
        ?>
        <form action="Custom_item/edit_custom_item?custom_item_id=<?php echo $edit->id; ?>" method="post">





            <div class="form-group">
                <div class="form-group">
                    <span class="col-xl-5 "><label><?php echo $this->lang->line('custom_item_option'); ?> </label></span>
                    <span class="col-xl-5 "><label><?php echo $this->lang->line('custom_item_option_price'); ?></label></span>
                </div>
                <?php
                $options = $edit->custom_option;
                $data = json_decode($options);
                $i = 1;
                foreach ($data as $key => $value) {
                    ?>

                    <div class="form-group">
                        <span class="col-xl-5 mt-1 "><input  type="text" name="custom_item_option_<?php echo $i; ?>" value="<?php echo $key; ?>" class="form-control"></span>
                        <span class="col-xl-5 mt-1 "><input type="text" name="custom_item_option_price_<?php echo $i; ?>" value="<?php echo $value; ?>" class="form-control"></span> 
                    </div>
                    <?php
                    $i++;
                }
                ?>

            </div>

            <div class="form-group">

                <span class="col-xl-5 "><label><?php echo $this->lang->line('custom_item_option_minimum'); ?> </label></span> 
                <span class="col-xl-5 "><label><?php echo $this->lang->line('custom_item_option_maximum'); ?> </label></span> 



                <span class="col-xl-5 "><input type="text" name="custom_item_minimum" value="<?php echo $edit->minimum; ?>" class="form-control"></span> 
                <span class="col-xl-5 "><input type="text" name="custom_item_maximum" value="<?php echo $edit->maximum; ?>" class="form-control"></span> 

            </div>






            <div class="form-group">
             
                <div class="modal-footer" style="border-top: none !important;">
                    
                    <input style="margin-top: 10px " type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('category_edit_close'); ?>">
                    <input style="margin-top: 10px ;" type="submit" name="save_update_custome" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('category_edit_save'); ?>">
                </div>
            </div>
        </form>

        <?php
    }
}
?>