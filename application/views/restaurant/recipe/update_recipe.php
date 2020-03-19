<?php
if ($edit_recipe) {
    foreach ($edit_recipe as $update_recipe) {
        ?>

        <form action="<?php echo base_url(rest_path('Recipe/update_recipe?recipe_id=' . $update_recipe->id . '')); ?>" method="post">

            <label><?php echo $this->lang->line('recipe_ar_name') ?></label>
            <div class="form-group">
                <input type="text"  class="form-control" name="recipe_ar_name" value="<?php echo $update_recipe->rec_ar_name; ?>">
            </div>

            <label><?php echo $this->lang->line('recipe_en_name') ?></label>
            <div class="form-group">
                <input type="text" class="form-control" name="recipe_en_name"  value="<?php echo $update_recipe->rec_en_name; ?>">
            </div>

            <label><?php echo $this->lang->line('recipe_details') ?></label>
            <div class="form-group">
                <input type="text" class="form-control" name="recipe_details"  value="<?php echo $update_recipe->details; ?>">
            </div>

            <label><?php echo $this->lang->line('recipe_barcode') ?></label>
            <div class="form-group">
                <input type="text" class="form-control" name="recipe_barcode"  value="<?php echo $update_recipe->barcode; ?>">
            </div>

            <label><?php echo $this->lang->line('recipe_brand') ?></label>
            <div class="form-group">
                <select class="form-control" name="recipe_brand">
                    <option></option>
                    <?php
                    if ($brand) {
                        foreach ($brand as $brand_info) {
                            ?>
                            <option value="<?php echo $brand_info->id; ?>" <?php
                            if ($brand_info->id == $update_recipe->brand_id) {
                                echo 'selected';
                            }
                            ?>><?php
                                        if ($this->session->userdata('site_lang') == "arabic") {
                                            echo $brand_info->ar_name;
                                        } else {
                                            echo $brand_info->en_name;
                                        }
                                        ?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
            </div>

            <label><?php echo $this->lang->line('recipe_invoice_number') ?></label>
            <div class="form-group">
                <input type="text" class="form-control" name="recipe_invoice_number"  value="<?php echo $update_recipe->invoice_number; ?>">
            </div>

            <label><?php echo $this->lang->line('recipe_size') ?></label>
            <div class="form-group">
                <input type="text" class="form-control" name="recipe_size"  value="<?php echo $update_recipe->size; ?>">
            </div>

            <label><?php echo $this->lang->line('recipe_color') ?></label>
            <div class="form-group">
                <input type="text" class="form-control" name="recipe_color"  value="<?php echo $update_recipe->color; ?>">
            </div>

            <label><?php echo $this->lang->line('recipe_weight') ?></label>
            <div class="form-group">
                <input type="text" class="form-control" name="recipe_weight"  value="<?php echo $update_recipe->weight; ?>">
            </div>

            <label><?php echo $this->lang->line('recipe_cost_price') ?></label>
            <div class="form-group">
                <input type="text" class="form-control" name="recipe_cost_price"  value="<?php echo $update_recipe->cost_price; ?>">
            </div>

            <label><?php echo $this->lang->line('recipe_sale_price') ?></label>
            <div class="form-group">
                <input type="text" class="form-control" name="recipe_sale_price"  value="<?php echo $update_recipe->sale_price; ?>">
            </div>

            <label><?php echo $this->lang->line('recipe_whole_price') ?></label>
            <div class="form-group">
                <input type="text" class="form-control" name="recipe_whole_price"  value="<?php echo $update_recipe->whole_price; ?>">
            </div>

            <label><?php echo $this->lang->line('recipe_expiry_date') ?></label>
            <input type="text" class="form-control" name="recipe_expiry_date" value="<?php echo $update_recipe->expirey_date; ?>"/>
            <div class="form-group">
                <input type="datetime-local" class="form-control" name="recipe_expiry_date_new">
            </div>

            <label><?php echo $this->lang->line('recipe_qty') ?></label>
            <div class="form-group">
                <input type="number" class="form-control" name="recipe_qty"  value="<?php echo $update_recipe->qty; ?>">
            </div>


            <label><?php echo $this->lang->line('recipe_supplier') ?></label>
            <div class="form-group">
                <select class="form-control" name="recipe_supplier">
                    <option></option>
                    <?php
                    if ($supplier) {
                        foreach ($supplier as $supplier_info) {
                            ?>
                            <option value="<?php echo $supplier_info->id; ?>" <?php
                            if ($supplier_info->id == $update_recipe->supplier_id) {
                                echo 'selected';
                            }
                            ?>>
                                        <?php echo $supplier_info->name; ?>
                            </option>
                            <?php
                        }
                    }
                    ?>

                </select>
            </div>


            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('printer_close_edit'); ?>">
                <input type="submit" name="edit_recipe" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('printer_save_edit'); ?>">
            </div>

        </form>
        <?php
    }
}
?>