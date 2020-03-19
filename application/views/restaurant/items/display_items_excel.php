
<div class="card-block card-dashboard">
    <form action="insert_item_excel" enctype="multipart/form-data" method="post" id="items_excel_table">
        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="items_check_data">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('items_ar_name'); ?></th>
                    <th><?php echo $this->lang->line('items_en_name'); ?></th> 
                    <th><?php echo $this->lang->line('items_category'); ?></th> 
                    <th><?php echo $this->lang->line('items_barcode'); ?></th> 
                    <th><?php echo $this->lang->line('items_details'); ?></th> 
                    <th><?php echo $this->lang->line('items_invoice_number'); ?></th> 
                    <th><?php echo $this->lang->line('items_item_number'); ?></th> 
                    <th><?php echo $this->lang->line('items_tax'); ?></th>
                    <th><?php echo $this->lang->line('items_tax'); ?></th>
                    <th><?php echo $this->lang->line('items_tax'); ?></th>
                    <th><?php echo $this->lang->line('items_weight'); ?></th> 
                    <th><?php echo $this->lang->line('items_cost_price'); ?></th> 
                    <th><?php echo $this->lang->line('items_sale_price'); ?></th> 
                    <th><?php echo $this->lang->line('items_whole_price'); ?></th>
                    <th><?php echo $this->lang->line('items_max_discount'); ?></th>
                    <th><?php echo $this->lang->line('items_discount'); ?></th> 
                    <th><?php echo $this->lang->line('items_discount_status'); ?></th> 
                    <th><?php echo $this->lang->line('items_qty'); ?></th> 
                    <th><?php echo $this->lang->line('items_image'); ?></th> 
                    <th><?php echo $this->lang->line('items_type'); ?></th> 
                    <th><?php echo $this->lang->line('items_size'); ?></th> 
                    <th><?php echo $this->lang->line('items_color'); ?></th>
                    <th><?php echo $this->lang->line('items_brand'); ?></th> 
                    <th><?php echo $this->lang->line('items_expiry_date'); ?></th> 
                    <th><?php echo $this->lang->line('items_supplier'); ?></th> 
                    <th><?php echo $this->lang->line('items_sub_category'); ?></th> 
                    <th><?php echo $this->lang->line('items_multi_category'); ?></th> 
                    <th><?php echo $this->lang->line('items_branch_location'); ?></th> 
                    <th><?php echo $this->lang->line('items_custom'); ?></th> 
                    <th><?php echo $this->lang->line('items_bg_color'); ?></th> 

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($mydata as $key => $element) {
                    ?>
                    <tr>
                        <td><input type="text" class="form-control" name="ar_name_<?php echo $i; ?>" value="<?php print $element['ar_name']; ?>" style="border: 0px" id="items_name_<?php echo $i; ?>" required=""> </td>
                        <td><input type="text" class="form-control" name="en_name_<?php echo $i; ?>" value="<?php print $element['en_name']; ?>" style="border: 0px" ></td>
                        <td>
                            <select class="form-control" name="category_<?php echo $i; ?>" id="category_<?php echo $i ?>" required="">
                                <option value="0"></option>
                                <?php
                                if ($get_category) {
                                    foreach ($get_category as $category) {
                                        ?>
                                        <option value="<?php echo $category->id; ?>"><?php
                                            if ($this->session->userdata('site_lang') == "arabic") {
                                                echo $category->ar_name;
                                            } else {
                                                echo $category->en_name;
                                            }
                                            ?></option>
                                        <?php
                                    }
                                }
                                ?>

                            </select>
                        </td>
                        <td><input type="text" class="form-control" name="barcode_<?php echo $i; ?>" value="<?php print $element['barcode']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="details_<?php echo $i; ?>" value="<?php print $element['details']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="invoice_number_<?php echo $i; ?>" value="<?php print $element['invoice_number']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="item_number_<?php echo $i; ?>" value="<?php print $element['item_number']; ?>" style="border: 0px" ></td>
                        <td><input type="text" class="form-control" name="tax_<?php echo $i; ?>" value="<?php print $element['tax_1']; ?>" style="border: 0px" ></td>
                        <td><input type="text" class="form-control" name="tax_2_<?php echo $i; ?>" value="<?php print $element['tax_2']; ?>" style="border: 0px" ></td>
                        <td><input type="text" class="form-control" name="tax_3_<?php echo $i; ?>" value="<?php print $element['tax_3']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="weight_<?php echo $i; ?>" value="<?php print $element['weight']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="cost_price_<?php echo $i; ?>" value="<?php print $element['cost_price']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="sale_price_<?php echo $i; ?>" value="<?php print $element['sale_price']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="whole_price_<?php echo $i; ?>" value="<?php print $element['whole_price']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="max_discount_<?php echo $i; ?>" value="<?php print $element['max_discount']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="discount_<?php echo $i; ?>" value="<?php print $element['discount']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="discount_status_<?php echo $i; ?>" value="<?php print $element['discount_status']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="qty_<?php echo $i; ?>" value="<?php print $element['qty']; ?>" style="border: 0px"></td>
                        <td>
                            <label class="custom-file center-block block">
                                <input type="file" id="file" name="image_<?php echo $i; ?>" class="custom-file-input">
                                <span class="custom-file-control"></span>
                            </label>
                        </td>
                        <td>
                            <select class="form-control" name="type_<?php echo $i; ?>">
                                <option value="0"></option>
                                <?php
                                if ($get_item_type) {
                                    foreach ($get_item_type as $item_type) {
                                        ?>
                                        <option value="<?php echo $item_type->id; ?>">
                                            <?php echo $item_type->name; ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>

                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="size_<?php echo $i; ?>">
                                <option value="0"></option>
                                <?php
                                if ($get_size) {
                                    foreach ($get_size as $size_info) {
                                        ?>
                                        <option value="<?php echo $size_info->id; ?>"><?php
                                            if ($this->session->userdata('site_lang') == "arabic") {
                                                echo $size_info->ar_name;
                                            } else {
                                                echo $size_info->en_name;
                                            }
                                            ?></option>
                                        <?php
                                    }
                                }
                                ?>

                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="color_<?php echo $i; ?>">
                                <option value="0"></option>
                                <?php
                                if ($get_color) {
                                    foreach ($get_color as $color_info) {
                                        ?>
                                        <option value="<?php echo $color_info->id; ?>"><?php
                                            if ($this->session->userdata('site_lang') == "arabic") {
                                                echo $color_info->ar_name;
                                            } else {
                                                echo $color_info->en_name;
                                            }
                                            ?></option>
                                        <?php
                                    }
                                }
                                ?>

                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="brand_<?php echo $i; ?>">
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
                        <td><input type="date" name="expiry_date_<?php echo $i; ?>" class="form-control"></td>
                        <td>
                            <select class="form-control" name="supplier_<?php echo $i; ?>">
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
                            <select class="form-control" name="sub_category_<?php echo $i; ?>">
                                <option value="0"></option>
                                <?php
                                if ($sub_category_information) {
                                    foreach ($sub_category_information as $sub_category) {
                                        ?>
                                        <option value="<?php echo $sub_category->id; ?>"><?php
                                            if ($this->session->userdata('site_lang') == "arabic") {
                                                echo $sub_category->ar_name;
                                            } else {
                                                echo $sub_category->en_name;
                                            }
                                            ?></option>
                                        <?php
                                    }
                                }
                                ?>

                            </select>
                        </td>
                        <td>
                            <?php
                            if ($get_category) {
                                foreach ($get_category as $category) {
                                    ?>
                                    <div class="form-group">
                                        <fieldset>
                                            <label class="custom-control custom-checkbox pt-0 pb-0 pr-1 pl-1 mb-0">
                                                <input type="checkbox" class="custom-control-input" value="<?php echo $category->id ?>" name="items_multi_category[]">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description"><?php
                                                    if ($this->session->userdata('site_lang') == "arabic") {
                                                        echo $category->ar_name;
                                                    } else {
                                                        echo $category->en_name;
                                                    }
                                                    ?></span>
                                            </label>

                                        </fieldset>

                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($get_branch_location) {
                                foreach ($get_branch_location as $branch_location) {
                                    ?>
                                    <fieldset>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="<?php echo $branch_location->branch_location_id ?>" name="branch_location_<?php echo $i; ?>[]">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">
                                                <?php
                                                if ($this->session->userdata('site_lang') == "arabic") {
                                                    echo '<span>';
                                                    echo $branch_location->location_ar_name;
                                                    echo '</span>';
                                                    echo '- &nbsp;';
                                                    echo '<span>';
                                                    echo $branch_location->branch_ar_name;
                                                    echo '</span>';
                                                } else {
                                                    echo '<span>';
                                                    echo $branch_location->location_en_name;
                                                    echo '</span>';
                                                    echo '- &nbsp;';
                                                    echo '<span>';
                                                    echo $branch_location->branch_en_name;
                                                    echo '</span>';
                                                }
                                                ?></span>
                                        </label>

                                    </fieldset>
                                    <?php
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <fieldset>
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="items_custom_<?php echo $i; ?>"  value="1" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description"><?php echo $this->lang->line('items_custom_yes') ?></span>
                                </label>
                            </fieldset>

                            <fieldset>
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="items_custom_<?php echo $i; ?>"  value="0" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description"><?php echo $this->lang->line('items_custom_no') ?></span>
                                </label>
                            </fieldset>
                        </td>
                   
                        <td><input type="color" name="bg_color_<?php echo $i; ?>" class="form-control" style="width: 20%"></td>
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>

        <input type="hidden" value="<?php echo $i?>" name="items_form_number" />
        <div id="items_check_data_error_message" style="text-align: center"></div>
        
        <div class="form-group  col-xl-3">
            <button type="submit" onclick="items_check_data()" name="save_excel_item" id="items_check_excel_data" class="btn btn-primary"><?php echo $this->lang->line('items_save_excel_table'); ?></button>
        </div>

        <div class="form-group  col-xl-3">
            <a href="<?php echo base_url(rest_path('Items')); ?>" class="btn btn-danger"><?php echo $this->lang->line('items_cancel_excel_table'); ?></a>
        </div>
    </form>
</div>
















