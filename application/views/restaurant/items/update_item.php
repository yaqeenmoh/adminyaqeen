<?php
if ($get_item_by_id) {
    foreach ($get_item_by_id as $update_items) {
        ?>
        <form action="Items/update_item_information?item_info_id=<?php echo $update_items->id; ?>" method="post" enctype="multipart/form-data">


            <label><?php echo $this->lang->line('items_ar_name'); ?> </label>
            <div class="form-group">
                <input type="text"  name="items_ar_name" value="<?php echo $update_items->ar_name; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('items_en_name'); ?> </label>
            <div class="form-group">
                <input type="text"  name="items_en_name" value="<?php echo $update_items->en_name; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('items_details'); ?> </label>
            <div class="form-group">
                <input type="text"  name="items_details" value="<?php echo $update_items->details; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('items_barcode'); ?> </label>
            <div class="form-group">
                <input type="text"  name="items_barcode" value="<?php echo $update_items->barcode; ?>" class="form-control">
            </div>



            <label><?php echo $this->lang->line('items_image'); ?> </label>
            <input type="text" value="<?php echo $update_items->image; ?>" name="image_default"/>
            <?php
            if ($update_items->image == NUll) {
                echo $this->lang->line('items_no_image');
            } else {
                ?>
                <img src="<?php echo base_url('assets/lib/images/items/') . $update_items->image; ?>" width="50px" height="50px">
            <?php }
            ?>
            <div class="form-group">
                <label class="custom-file center-block block">
                    <input type="file" id="file" name="items_image" class="custom-file-input">
                    <span class="custom-file-control"></span>
                </label>
            </div>

            <label><?php echo $this->lang->line('items_invoice_number'); ?> </label>
            <div class="form-group">
                <input type="text"  name="items_invoice_number" value="<?php echo $update_items->invoice_number; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('items_item_number'); ?> </label>
            <div class="form-group">
                <input type="text" name="items_item_number" value="<?php echo $update_items->item_number; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('items_tax'); ?> </label>
            <div class="form-group">
                <input type="number" step="0.01" name="items_tax" value="<?php echo $update_items->tax_1; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('items_type'); ?> </label>
            <div class="form-group">
                <select class="form-control" name="items_type">
                    <option value="0"></option>
                    <?php
                    if ($get_item_type) {
                        foreach ($get_item_type as $item_type) {
                            ?>
                            <option value="<?php echo $item_type->id; ?>" <?php
                            if ($item_type->id == $update_items->type_id) {
                                echo 'selected';
                            }
                            ?>>
                                        <?php echo $item_type->name; ?>
                            </option>
                            <?php
                        }
                    }
                    ?>

                </select>
            </div>

            <label><?php echo $this->lang->line('items_size'); ?> </label>
            <div class="form-group">
                <select class="form-control" name="items_size">
                    <option value="0"></option>
                    <?php
                    if ($get_size) {
                        foreach ($get_size as $size_info) {
                            ?>
                            <option value="<?php echo $size_info->id; ?>" <?php
                            if ($size_info->id == $update_items->size_id) {
                                echo 'selected';
                            }
                            ?>>
                                        <?php
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
            </div>


            <label><?php echo $this->lang->line('items_color'); ?> </label>
            <div class="form-group">
                <select class="form-control" name="items_color">
                    <option value="0"></option>
                    <?php
                    if ($get_color) {
                        foreach ($get_color as $color_info) {
                            ?>
                            <option value="<?php echo $color_info->id; ?>" <?php
                            if ($color_info->id == $update_items->color_id) {
                                echo 'selected';
                            }
                            ?>>
                                        <?php
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
            </div>

            <label><?php echo $this->lang->line('items_weight'); ?> </label>
            <div class="form-group">
                <input type="text" name="items_weight" value="<?php echo $update_items->weight; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('items_brand'); ?> </label>
            <div class="form-group">
                <select class="form-control" name="items_brand">
                    <option value="0"></option>
                    <?php
                    if ($brand) {
                        foreach ($brand as $brand_info) {
                            ?>
                            <option value="<?php echo $brand_info->id; ?>" <?php
                            if ($brand_info->id == $update_items->brand_id) {
                                echo 'selected';
                            }
                            ?>>
                                        <?php
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

            <label><?php echo $this->lang->line('items_expiry_date'); ?> </label>
            <div class="form-group">
                <input type="date"  name="items_expiry_date" value="<?php echo $update_items->expiry_date; ?>" class="form-control mt-2">
            </div>

            <label><?php echo $this->lang->line('items_cost_price'); ?> </label>
            <div class="form-group">
                <input type="number" step="0.01" name="items_cost_price" value="<?php echo $update_items->cost_price; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('items_sale_price'); ?> </label>
            <div class="form-group">
                <input type="number" step="0.01" name="items_sale_price" value="<?php echo $update_items->sale_price; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('items_whole_price'); ?> </label>
            <div class="form-group">
                <input type="number" step="0.01" name="items_whole_price" value="<?php echo $update_items->whole_price; ?>" class="form-control">
            </div> 

            <label><?php echo $this->lang->line('items_supplier'); ?> </label>
            <div class="form-group">
                <select class="form-control" name="items_supplier">
                    <option value="0"></option>
                    <?php
                    if ($supplier) {
                        foreach ($supplier as $supplier_info) {
                            ?>
                            <option value="<?php echo $supplier_info->id; ?>" <?php
                            if ($supplier_info->id == $update_items->supplier_id) {
                                echo 'selected';
                            }
                            ?>>
                                <?php echo $supplier_info->name; ?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
            </div>

            <label><?php echo $this->lang->line('items_category'); ?> </label>
            <div class="form-group">
                <select class="form-control" name="items_category">
                    <?php
                    if ($get_category) {
                        foreach ($get_category as $category) {
                            ?>
                            <option value="<?php echo $category->id; ?>" <?php
                            if ($category->id == $update_items->category_id) {
                                echo 'selected';
                            }
                            ?>>
                                        <?php
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
            </div>

            <label><?php echo $this->lang->line('items_sub_category'); ?> </label>
            <div class="form-group">
                <select class="form-control" name="items_sub_category">
                    <option value="0"></option>
                    <?php
                    if ($sub_category_information) {
                        foreach ($sub_category_information as $sub_category) {
                            ?>
                            <option value="<?php echo $sub_category->id; ?>" <?php
                            if ($sub_category->id == $update_items->sub_category_id) {
                                echo 'selected';
                            }
                            ?>>
                                        <?php
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
            </div>

            <label><?php echo $this->lang->line('items_max_discount'); ?> </label>
            <div class="form-group">
                <input type="number" step="0.01" name="items_max_discount" value="<?php echo $update_items->max_discount; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('items_discount'); ?> </label>
            <div class="form-group">
                <input type="number" step="0.01" name="items_discount" value="<?php echo $update_items->discount; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('items_discount_status'); ?> </label>
            <div class="form-group">
                <input type="number" step="0.01" name="items_discount_status" value="<?php echo $update_items->discount_status; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('items_qty'); ?> </label>
            <div class="form-group">
                <input type="number" name="items_qty" value="<?php echo $update_items->qty; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('items_branch_location'); ?> </label>
            <div class="form-group">
                <?php
                if ($get_branch_location) {
                    foreach ($get_branch_location as $branch_location) {
                        ?>
                        <fieldset>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="<?php echo $branch_location->branch_location_id ?>" name="items_branch_location" <?php
                                if ($branch_location->branch_location_id == $update_items->branch_location_id) {
                                    echo 'checked=""';
                                }
                                ?>>
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
            </div>

            <label><?php echo $this->lang->line('items_custom'); ?> </label>
            <div class="form-group">
                <fieldset>
                    <label class="custom-control custom-radio">
                        <input type="radio" name="items_custom"  value="1" class="custom-control-input" <?php
                        if ($update_items->custom == 1) {
                            echo 'checked=""';
                        }
                        ?>>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><?php echo $this->lang->line('items_custom_yes') ?></span>
                    </label>
                </fieldset>

                <fieldset>
                    <label class="custom-control custom-radio">
                        <input type="radio" name="items_custom"  value="0" class="custom-control-input" <?php
                        if ($update_items->custom == 0) {
                            echo 'checked=""';
                        }
                        ?>>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><?php echo $this->lang->line('items_custom_no') ?></span>
                    </label>
                </fieldset>
            </div>

            <label><?php echo $this->lang->line('items_bg_color'); ?> </label>
            <div class="form-group">
                <input type="color"  name="items_bg_color" value="<?php echo $update_items->bg_color; ?>" class="form-control">
            </div>


            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('customer_close_edit'); ?>">
                <input type="submit" name="edit_items" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('customer_save_edit'); ?>">
            </div>

        </form>

        <?php
    }
}
?>


