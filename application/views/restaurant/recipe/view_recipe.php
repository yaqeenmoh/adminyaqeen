<!-- Add recipe Excel sheet-->
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('recipe_excel_sheet') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="<?php echo base_url(rest_path('Recipe/download_recipe_excel')); ?>"><i class="icon-file-excel-o text-success bg-white" style="font-size: 25px;" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('recipe_download_excel'); ?>"></i></a></li>
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true" style="">
        <div class="card-block">
            <form action="<?php echo base_url(rest_path('Recipe/upload_recipe_excel')); ?>" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group  col-xl-4">
                    <label><?php echo $this->lang->line('upload_recipe_excel') ?></label>
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
                        <button type="submit" name="import" class="float-right btn btn-success"><?php echo $this->lang->line('import_recipe'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Add recipe-->
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('recipe_add_recipe') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>


    <div class="card-body collapse in" aria-expanded="true" style=""> 
        <form action="<?php echo base_url(rest_path('Recipe/insert_recipe')); ?>" method="post" id="insert_recipe">
            <div class="card-block pb-0">
                <div class="card-block pb-0">
                    <div class="form-group  col-xl-3 ">
                        <label><?php echo $this->lang->line('recipe_ar_name') ?></label>
                        <div class="position-relative has-icon-left">
                            <input type="text"  class="form-control" name="recipe_ar_name_1" placeholder="<?php echo $this->lang->line('recipe_ar_name') ?>" required="">
                            
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>


                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_en_name') ?></label>
                        <div class="position-relative has-icon-left">
                            <input type="text" class="form-control" name="recipe_en_name_1"  placeholder="<?php echo $this->lang->line('recipe_en_name') ?>">
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_details') ?></label>
                        <div class="position-relative has-icon-left">
                            <input type="text" class="form-control" name="recipe_details_1"  placeholder="<?php echo $this->lang->line('recipe_details') ?>">
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_barcode') ?></label>
                        <div class="position-relative has-icon-left">
                            <input type="text" class="form-control" name="recipe_barcode_1"  placeholder="<?php echo $this->lang->line('recipe_barcode') ?>">
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-block pt-0 pb-0">
                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_brand') ?></label>
                        <div class="position-relative has-icon-left">
                            <select class="form-control" name="recipe_brand_1">
                                <option></option>
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
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>

                    </div>


                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_invoice_number') ?></label>
                        <div class="position-relative has-icon-left">
                            <input type="text" class="form-control" name="recipe_invoice_number_1"  placeholder="<?php echo $this->lang->line('recipe_invoice_number') ?>">
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_size') ?></label>
                        <div class="position-relative has-icon-left">
                            <input type="text" class="form-control" name="recipe_size_1"  placeholder="<?php echo $this->lang->line('recipe_size') ?>">
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_color') ?></label>
                        <div class="position-relative has-icon-left">
                            <input type="text" class="form-control" name="recipe_color_1"  placeholder="<?php echo $this->lang->line('recipe_color') ?>">
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-block pt-0 pb-0">
                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_weight') ?></label>
                        <div class="position-relative has-icon-left">
                            <input type="text" class="form-control" name="recipe_weight_1"  placeholder="<?php echo $this->lang->line('recipe_weight') ?>">
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_cost_price') ?></label>
                        <div class="position-relative has-icon-left">
                            <input type="number"  class="form-control" name="recipe_cost_price_1"  placeholder="<?php echo $this->lang->line('recipe_cost_price') ?>">
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_sale_price') ?></label>
                        <div class="position-relative has-icon-left">
                            <input type="number"  class="form-control" name="recipe_sale_price_1"  placeholder="<?php echo $this->lang->line('recipe_sale_price') ?>">
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>


                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_whole_price') ?></label>
                        <div class="position-relative has-icon-left">
                            <input type="number"  class="form-control" name="recipe_whole_price_1"  placeholder="<?php echo $this->lang->line('recipe_whole_price') ?>">
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-block pt-0">
                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_expiry_date') ?></label>
                        <div class="position-relative has-icon-left">
                            <input type="date"  class="form-control" name="recipe_expiry_date_1"  placeholder="<?php echo $this->lang->line('recipe_expiry_date') ?>">
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_qty') ?></label>
                        <div class="position-relative has-icon-left">
                            <input type="number"  class="form-control" name="recipe_qty_1"  placeholder="<?php echo $this->lang->line('recipe_qty') ?>">
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group  col-xl-3">
                        <label><?php echo $this->lang->line('recipe_supplier') ?></label>
                        <div class="position-relative has-icon-left">
                            <select class="form-control" name="recipe_supplier_1">
                                <option></option>
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
                            <div class="form-control-position">
                                <i class="icon-navicon2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-block">
                <div class="form-group  col-xl-3" style="margin-top: 8px">
                    <label for="timesheetinput1"></label>
                    <div class="">
                        <input type="submit" class="btn btn-social btn-min-width pl-1 pr-1  mr-1 mb-1 btn-info" value="<?php echo $this->lang->line('save_recipe'); ?>" />
                    </div>
                </div>               
            </div>
        </form>
    </div>
</div>


<!-- Show recipe -->
<section>
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('admin_recipe'); ?></h4>
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
                        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="printer_table">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('recipe_ar_name'); ?></th>
                                    <th><?php echo $this->lang->line('recipe_en_name'); ?></th> 
                                    <th><?php echo $this->lang->line('recipe_details'); ?></th> 
                                    <th><?php echo $this->lang->line('recipe_barcode'); ?></th> 
                                    <th><?php echo $this->lang->line('recipe_brand'); ?></th> 
                                    <th><?php echo $this->lang->line('recipe_invoice_number'); ?></th> 
                                    <th><?php echo $this->lang->line('recipe_size'); ?></th> 
                                    <th><?php echo $this->lang->line('recipe_color'); ?></th> 
                                    <th><?php echo $this->lang->line('recipe_weight'); ?></th> 
                                    <th><?php echo $this->lang->line('recipe_cost_price'); ?></th> 
                                    <th><?php echo $this->lang->line('recipe_sale_price'); ?></th> 
                                    <th><?php echo $this->lang->line('recipe_whole_price'); ?></th> 
                                    <th><?php echo $this->lang->line('recipe_expiry_date'); ?></th> 
                                    <th><?php echo $this->lang->line('recipe_qty'); ?></th> 
                                    <th><?php echo $this->lang->line('recipe_supplier'); ?></th> 
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($recipe_info) {
                                    foreach ($recipe_info as $recipe) {
                                        if ($recipe->info_disable && $recipe->rec_disable == 1) {
                                            ?>
                                            <tr>
                                                <td><?php echo $recipe->rec_ar_name; ?></td>
                                                <td><?php echo $recipe->rec_en_name; ?></td>
                                                <td><?php echo $recipe->details; ?></td>
                                                <td><?php echo $recipe->barcode; ?></td>
                                                <td><?php
                                                    if ($this->session->userdata('site_lang') == "arabic") {
                                                        echo $recipe->brand_ar_name;
                                                    } else {
                                                        echo $recipe->brand_en_name;
                                                    }
                                                    ?></td>
                                                <td><?php echo $recipe->invoice_number; ?></td>
                                                <td><?php echo $recipe->size; ?></td>
                                                <td><?php echo $recipe->color; ?></td>
                                                <td><?php echo $recipe->weight; ?></td>
                                                <td><?php echo round($recipe->cost_price); ?></td>
                                                <td><?php echo round($recipe->sale_price); ?></td>
                                                <td><?php echo round($recipe->whole_price); ?></td>
                                                <td><?php echo $recipe->expirey_date; ?></td>
                                                <td><?php echo $recipe->qty; ?></td>
                                                <td><?php echo $recipe->name; ?></td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example" >
                                                        <a href="<?php echo base_url(rest_path('Recipe/update_recipe?recipe_id=' . $recipe->id . '')); ?>" data-toggle="modal"   data-target="#edit_recipe"  class="btn btn-outline-success btn-round"><?php echo $this->lang->line('edit'); ?></a>
                                                        <a href="<?php echo base_url(rest_path('Recipe/delete_recipe?recipe_id=' . $recipe->id . '')); ?>"  data-toggle="modal"   data-target="#delete_recipe" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('delete'); ?></a>
                                                    </div>
                                                </td>

                                            </tr>   
                                            <?php
                                        }
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
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_recipe" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('edit_recipe'); ?></label>
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
        <div class="modal animated lightSpeedIn text-xs-left" id="delete_recipe" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('delete_recipe'); ?></label>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
