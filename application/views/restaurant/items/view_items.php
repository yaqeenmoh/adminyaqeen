<!-- Add items Excel sheet-->
<div class="card">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('items_excel_sheet') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="<?php echo base_url(rest_path('Items/download_items_excel')); ?>"><i class="icon-file-excel-o text-success bg-white" style="font-size: 25px;" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('items_download_excel'); ?>"></i></a></li>
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>

            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true" style="">
        <div class="card-block">
            <form action="<?php echo base_url(rest_path('Items/upload_items_excel')); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group  col-xl-4 ">
                    <label><?php echo $this->lang->line('upload_items_excel') ?></label>
                    <div class="position-relative has-icon-left">
                        <fieldset class="form-group">
                            <label class="custom-file center-block block">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="fileURL" required="">
                                <span class="custom-file-control"></span>
                            </label>
                        </fieldset>
                    </div>

                </div>


                <div class="form-group  col-xl-3" style="margin-top: 8px">
                    <label for="timesheetinput1"></label>
                    <div class="position-relative has-icon-left">
                        <div class="position-relative has-icon-left">
                            <button type="submit" name="import" class="float-right btn btn-success"><?php echo $this->lang->line('items_import_excel'); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Add Items -->
<div class="card">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('items_add_item') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true">
        <form action="<?php echo base_url(rest_path('Items/insert_items_information')); ?>" method="post" id="items_information" enctype="multipart/form-data">
            <div class="card-block pb-0">
                <div class="form-group  col-xl-3 ">
                    <label><?php echo $this->lang->line('items_ar_name') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" name="items_ar_name" class="form-control" placeholder="<?php echo $this->lang->line('items_ar_name') ?>" required="">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>


                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_en_name') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" name="items_en_name" class="form-control"  placeholder="<?php echo $this->lang->line('items_en_name') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>


                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_details') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" name="items_details" class="form-control"  placeholder="<?php echo $this->lang->line('items_details') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_barcode') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" name="items_barcode" class="form-control"  placeholder="<?php echo $this->lang->line('items_barcode') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-block pb-0 pt-0">
                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_invoice_number') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" name="items_invoice_number" class="form-control"  placeholder="<?php echo $this->lang->line('items_invoice_number') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_item_number') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" name="items_item_number" class="form-control"  placeholder="<?php echo $this->lang->line('items_item_number') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_tax') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" step="0.01" name="items_tax" class="form-control"  placeholder="<?php echo $this->lang->line('items_tax') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_tax') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" step="0.01" name="items_tax_2" class="form-control"  placeholder="<?php echo $this->lang->line('items_tax') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-block pb-0 pt-0">
                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_tax') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" step="0.01" name="items_tax_3" class="form-control"  placeholder="<?php echo $this->lang->line('items_tax') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_size') ?></label>
                    <select class="form-control" name="items_size">
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
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_color') ?></label>
                    <select class="form-control" name="items_color">
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
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_weight') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" name="items_weight" class="form-control"  placeholder="<?php echo $this->lang->line('items_weight') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-block pb-0 pt-0">
                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_brand') ?></label>
                    <div class="position-relative has-icon-left">
                        <select class="form-control" name="items_brand">
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
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_expiry_date') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="date" name="items_expiry_date" class="form-control">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>



                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_cost_price') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" name="items_cost_price" class="form-control" placeholder="<?php echo $this->lang->line('items_cost_price') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_sale_price') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" name="items_sale_price" class="form-control" placeholder="<?php echo $this->lang->line('items_sale_price') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-block pb-0 pt-0">
                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_whole_price') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" name="items_whole_price" class="form-control" placeholder="<?php echo $this->lang->line('items_whole_price') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>


                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_max_discount') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" step="0.01" name="items_max_discount" class="form-control" placeholder="<?php echo $this->lang->line('items_max_discount') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>



                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_discount') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" step="0.01" name="items_discount" class="form-control" placeholder="<?php echo $this->lang->line('items_discount') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_discount_status') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" step="0.01" name="items_discount_status" class="form-control" placeholder="<?php echo $this->lang->line('items_discount_status') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-block pb-0 pt-0">
                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_qty') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" step="0.01" name="items_qty" class="form-control" placeholder="<?php echo $this->lang->line('items_qty') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_custom') ?></label>
                    <fieldset>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="items_custom"  value="1" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description"><?php echo $this->lang->line('items_custom_yes') ?></span>
                        </label>
                    </fieldset>

                    <fieldset>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="items_custom"  value="0" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description"><?php echo $this->lang->line('items_custom_no') ?></span>
                        </label>
                    </fieldset>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_supplier') ?></label>
                    <div class="position-relative has-icon-left">
                        <select class="form-control" name="items_supplier">
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
                    </div>
                </div>


                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_category') ?></label>
                    <div class="position-relative has-icon-left">
                        <select class="form-control" name="items_category" required="true">
                            <option></option>
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

                    </div>
                </div>
            </div>

            <div class="card-block pb-0 pt-0"> 
                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_sub_category') ?></label>
                    <div class="position-relative has-icon-left">
                        <select class="form-control" name="items_sub_category">
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
                    </div>
                </div>


                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_branch_location') ?></label>
                    <?php
                    if ($get_branch_location) {
                        foreach ($get_branch_location as $branch_location) {
                            ?>
                            <fieldset>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="<?php echo $branch_location->branch_location_id ?>" name="items_branch_location[]">
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

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_type') ?></label>
                    <div class="position-relative has-icon-left">
                        <select class="form-control" name="items_type">
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
                    </div>
                </div>



            </div>

            <div class="card-block pb-0 pt-0"> 
                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_bg_color') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="color" name="items_bg_color" class="form-control">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('items_multi_category') ?></label>
                    <?php
                    if ($get_category) {
                        foreach ($get_category as $category) {
                            ?>
                            <fieldset>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="<?php echo $category->id; ?>" name="items_multi_category[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">
                                        <?php
                                        if ($this->session->userdata('site_lang') == "arabic") {
                                            echo $category->ar_name;
                                        } else {
                                            echo $category->en_name;
                                        }
                                        ?>
                                    </span>
                                </label>

                            </fieldset>
                            <?php
                        }
                    }
                    ?>

                </div>

                <div class="form-group  col-xl-3">
                    <label for="timesheetinput1"><?php echo $this->lang->line('items_image') ?></label>
                    <div class="position-relative has-icon-left">
                        <label class="custom-file center-block block">
                            <input type="file" id="file" name="items_image" class="custom-file-input">
                            <span class="custom-file-control"></span>
                        </label>
                    </div>
                </div>
                <div class="form-group  col-xl-3" style="margin-top: 8px;">
                    <label for="timesheetinput1"></label>
                    <div class="">
                        <input type="submit" class="btn btn-social btn-min-width pl-1 pr-1 mr-1 mb-1 btn-info" value=" <?php echo $this->lang->line('save_items'); ?>" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Show items -->
<section>
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('admin_items'); ?></h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="items_table">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('items_ar_name'); ?></th>
                                    <th><?php echo $this->lang->line('items_en_name'); ?></th> 
                                    <th><?php echo $this->lang->line('items_details'); ?></th> 
                                    <th><?php echo $this->lang->line('items_barcode'); ?></th> 
                                    <th><?php echo $this->lang->line('items_image'); ?></th> 
                                    <th><?php echo $this->lang->line('items_invoice_number'); ?></th> 
                                    <th></th>
                                    <th><?php echo $this->lang->line('items_item_number'); ?></th> 
                                    <th><?php echo $this->lang->line('items_tax'); ?></th> 
                                    <th><?php echo $this->lang->line('items_type'); ?></th> 
                                    <th><?php echo $this->lang->line('items_size'); ?></th> 
                                    <th><?php echo $this->lang->line('items_color'); ?></th> 
                                    <th><?php echo $this->lang->line('items_weight'); ?></th> 
                                    <th><?php echo $this->lang->line('items_brand'); ?></th> 
                                    <th><?php echo $this->lang->line('items_expiry_date'); ?></th> 
                                    <th><?php echo $this->lang->line('items_cost_price'); ?></th> 
                                    <th><?php echo $this->lang->line('items_sale_price'); ?></th> 
                                    <th><?php echo $this->lang->line('items_whole_price'); ?></th> 
                                    <th><?php echo $this->lang->line('items_supplier'); ?></th> 
                                    <th><?php echo $this->lang->line('items_category'); ?></th> 
                                    <th><?php echo $this->lang->line('items_sub_category'); ?></th> 
                                    <th><?php echo $this->lang->line('items_max_discount'); ?></th> 
                                    <th><?php echo $this->lang->line('items_discount'); ?></th> 
                                    <th><?php echo $this->lang->line('items_discount_status'); ?></th> 
                                    <th><?php echo $this->lang->line('items_qty'); ?></th> 
                                    <th><?php echo $this->lang->line('items_branch_location'); ?></th> 
                                    <th><?php echo $this->lang->line('items_custom'); ?></th> 
                                    <th><?php echo $this->lang->line('items_bg_color'); ?></th> 

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($get_item_information) {
                                    foreach ($get_item_information as $items) {
                                        ?>
                                        <tr>
                                            <td><?php echo $items->ar_name; ?></td>
                                            <td><?php echo $items->en_name; ?></td>
                                            <td><?php echo $items->details; ?></td>
                                            <td><?php echo $items->barcode; ?></td>
                                            <td>  <?php
                                                if ($items->image == NUll) {
                                                    echo $this->lang->line('items_no_image');
                                                } else {
                                                    ?>
                                                    <img src="<?php echo base_url('assets/lib/images/items/') . $items->image; ?>" width="50px" height="50px">
                                                <?php }
                                                ?></td>
                                            <td><?php echo $items->invoice_number; ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example" >
                                                    <a href="Items/update_item_information?item_info_id=<?php echo $items->id; ?>" data-toggle="modal"   data-target="#edit_items"  class="btn btn-outline-success btn-round"><?php echo $this->lang->line('items_edit'); ?></a>
                                                    <a href="Items/delete_item?item_info_id=<?php echo $items->id; ?>"  data-toggle="modal"   data-target="#delete_items" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('items_delete'); ?></a>
                                                </div>
                                            </td>
                                            <td><?php echo $items->item_number; ?></td>
                                            <td><?php echo round($items->tax_1, 2); ?></td>
                                            <td><?php echo $items->name; ?></td>
                                            <td><?php
                                                if ($this->session->userdata('site_lang') == "arabic") {
                                                    echo $items->size_ar_name;
                                                } else {
                                                    echo $items->size_en_name;
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($this->session->userdata('site_lang') == "arabic") {
                                                    echo $items->color_ar_name;
                                                } else {
                                                    echo $items->color_en_name;
                                                }
                                                ?></td>
                                            <td><?php echo $items->weight; ?></td>
                                            <td><?php
                                                if ($this->session->userdata('site_lang') == "arabic") {
                                                    echo $items->brand_ar_name;
                                                } else {
                                                    echo $items->brand_en_name;
                                                }
                                                ?></td>
                                            <td><?php echo $items->expiry_date; ?></td>
                                            <td><?php echo round($items->cost_price, 2); ?></td>
                                            <td><?php echo round($items->sale_price, 2); ?></td>
                                            <td><?php echo round($items->whole_price, 2); ?></td>
                                            <td><?php echo $items->supplier_name; ?></td>
                                            <td><?php
                                                if ($this->session->userdata('site_lang') == "arabic") {
                                                    echo $items->category_ar_name;
                                                } else {
                                                    echo $items->category_en_name;
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($this->session->userdata('site_lang') == "arabic") {
                                                    echo $items->sub_category_ar_name;
                                                } else {
                                                    echo $items->sub_category_en_name;
                                                }
                                                ?></td>
                                            <td><?php echo round($items->max_discount, 2); ?></td>
                                            <td><?php echo $items->discount; ?></td>
                                            <td><?php echo $items->discount_status; ?></td>
                                            <td><?php echo $items->qty; ?></td>
                                            <td><?php
                                                if ($this->session->userdata('site_lang') == "arabic") {
                                                    echo '<span>';
                                                    echo $items->loc_ar_name;
                                                    echo '</span>';
                                                    echo '- &nbsp;';
                                                    echo '<span>';
                                                    echo $items->branch_ar_name;
                                                    echo '</span>';
                                                } else {
                                                    echo '<span>';
                                                    echo $items->loc_en_name;
                                                    echo '</span>';
                                                    echo '- &nbsp;';
                                                    echo '<span>';
                                                    echo $items->branch_en_name;
                                                    echo '</span>';
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($items->custom == 0) {
                                                    echo $this->lang->line('items_no_custom');
                                                } else {
                                                    echo $this->lang->line('items_custom');
                                                }
                                                ?></td>
                                           
                                            <td><input type="color" value="<?php echo $items->bg_color; ?>"></td>


                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- Edit Modal popup -->
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_items" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('edit_items'); ?></label>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal popup -->
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal animated lightSpeedIn text-xs-left" id="delete_items" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('delete_items'); ?></label>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>