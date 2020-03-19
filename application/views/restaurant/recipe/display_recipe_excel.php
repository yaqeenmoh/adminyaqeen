<div class="card-block card-dashboard">
    <form action="insert_recipe_excel" method="post">
        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="recipe_check_data">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('recipe_ar_name'); ?></th>
                    <th><?php echo $this->lang->line('recipe_en_name'); ?></th> 
                    <th><?php echo $this->lang->line('recipe_details'); ?></th> 
                    <th><?php echo $this->lang->line('recipe_barcode'); ?></th> 
                    <th><?php echo $this->lang->line('recipe_invoice_number'); ?></th> 
                    <th><?php echo $this->lang->line('recipe_size'); ?></th> 
                    <th><?php echo $this->lang->line('recipe_color'); ?></th> 
                    <th><?php echo $this->lang->line('recipe_weight'); ?></th> 
                    <th><?php echo $this->lang->line('recipe_cost_price'); ?></th> 
                    <th><?php echo $this->lang->line('recipe_sale_price'); ?></th> 
                    <th><?php echo $this->lang->line('recipe_whole_price'); ?></th> 
                    <th><?php echo $this->lang->line('recipe_qty'); ?></th> 
                    <th><?php echo $this->lang->line('recipe_supplier'); ?></th> 
                    <th><?php echo $this->lang->line('recipe_brand'); ?></th> 
                    <th><?php echo $this->lang->line('recipe_expiry_date'); ?></th> 

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;

                foreach ($mydata as $key => $element) {
                    ?>
                    <tr>
                        <td><input type="text" class="form-control" name="recipe_ar_name_<?php echo $i; ?>" value="<?php print $element['ar_name']; ?>" style="border: 0px" id="recipe_name_<?php echo $i?>" required=""></td>
                        <td><input type="text" class="form-control" name="recipe_en_name<?php echo $i; ?>" value="<?php print $element['en_name']; ?>" style="border: 0px" ></td>
                        <td><input type="text" class="form-control" name="recipe_details_<?php echo $i; ?>" value="<?php print $element['details']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="recipe_barcode_<?php echo $i; ?>" value="<?php print $element['barcode']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="recipe_invoice_number_<?php echo $i; ?>" value="<?php print $element['invoice_number']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="recipe_size_<?php echo $i; ?>" value="<?php print $element['size']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="recipe_color_<?php echo $i; ?>" value="<?php print $element['color']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="recipe_weight_<?php echo $i; ?>" value="<?php print $element['weight']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="recipe_cost_price_<?php echo $i; ?>" value="<?php print $element['cost_price']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="recipe_sale_price_<?php echo $i; ?>" value="<?php print $element['sale_price']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="recipe_whole_price_<?php echo $i; ?>" value="<?php print $element['whole_price']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="recipe_qty_<?php echo $i; ?>" value="<?php print $element['qty']; ?>" style="border: 0px"></td>
                        <td>
                            <select class="form-control" name="recipe_supplier_<?php echo $i; ?>">
                                <option value="0"></option>
                                <?php
                                if ($supplier) {
                                    foreach ($supplier as $supplier_info) {
                                        ?>
                                        <option value="<?php echo $supplier_info->id; ?>"><?php echo $supplier_info->name; ?></option>
                                        <?php
                                    }
                                }
                                ?>

                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="recipe_brand_<?php echo $i; ?>">
                                <option value="0"></option>
                                <?php
                                if ($brand) {
                                    foreach ($brand as $brand_info) {
                                        ?>
                                        <option value="<?php echo $brand_info->id; ?>"><?php
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
                        </td>
                        <td> <input type="date"  class="form-control" name="recipe_expiry_date_<?php echo $i; ?>"></td>
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        
        <input type="hidden" value="<?php echo $i;?>" name="recipe_form_number"/>
        <div id="recipe_check_data_error_message" style="text-align: center"></div>
        <div class="form-group  col-xl-3">
            <button type="submit" onclick="recipe_check_data()" name="save_excel" id="recipe_check_excel_data" class="btn btn-primary"><?php echo $this->lang->line('recipe_save_excel_table'); ?></button>
        </div>

        <div class="form-group  col-xl-3">
            <a href="<?php echo base_url(rest_path('Recipe'));?>" class="btn btn-danger"><?php echo $this->lang->line('recipe_cancel_excel_table'); ?></a>
        </div>
    </form>
</div>