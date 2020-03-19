<!-- Add category Excel sheet-->
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('category_excel_sheet') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="<?php echo base_url(rest_path('Category/download_category_excel_sheet')); ?>"><i class="icon-file-excel-o text-success bg-white" style="font-size: 25px;" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('category_download_excel'); ?>"></i></a></li>
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>

            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true" style="">
        <div class="card-block">
            <form action="<?php echo base_url(rest_path('Category/upload_category_excel')); ?>" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group  col-xl-4">
                    <label><?php echo $this->lang->line('upload_category_excel') ?></label>
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
                            <button type="submit" name="import" class="float-right btn btn-success"><?php echo $this->lang->line('category_import_excel'); ?></button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<! –– start form to insert new category ––>
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('add_category') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in" aria-expanded="true" style="">
        <form action="<?php echo base_url(rest_path('Category/insert_category')); ?>" method="post" id="insert_category" enctype="multipart/form-data"> 
            <div class="card-block pb-0">
                <div class="form-group  col-xl-3 mr-1">
                    <label><?php echo $this->lang->line('category_insert_ar_name') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" id="category_ar_name_1" name="category_ar_name_1" class="form-control" placeholder="<?php echo $this->lang->line('category_insert_ar_name') ?>" required="">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group  col-xl-3 mr-1">
                    <label for="timesheetinput1"><?php echo $this->lang->line('category_insert_en_name') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" id="category_en_name_1"  name="category_en_name_1" class="form-control" placeholder="<?php echo $this->lang->line('category_insert_en_name') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group  col-xl-3 mr-1">
                    <label for="timesheetinput1"><?php echo $this->lang->line('category_insert_discount') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" step="0.01" id="category_discount_1"  name="category_discount_1" class="form-control" placeholder="<?php echo $this->lang->line('category_insert_discount') ?>">
                        <div class="form-control-position">
                            <i class="icon-percent"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card-block">
                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('category_insert_branch_location') ?></label>
                    <?php
                    if ($category_branch_location) {
                        foreach ($category_branch_location as $branch_location) {
                            ?>
                            <fieldset>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="<?php echo $branch_location->branch_location_id ?>" name="category_brnach_location_1[]" id="category_brnach_location_1">
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
                    <label><?php echo $this->lang->line('category_insert_printer') ?></label>
                    <?php
                    if ($get_printer) {
                        foreach ($get_printer as $printer) {
                            ?>
                            <fieldset>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="<?php echo $printer->id ?>" name="category_printer_1[]" id="category_printer_1">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">
                                        <?php echo $printer->name; ?>    
                                    </span>
                                </label>

                            </fieldset>
                            <?php
                        }
                    }
                    ?>

                </div>

                <div class="form-group  col-xl-3 mr-1">
                    <label for="timesheetinput1"><?php echo $this->lang->line('category_insert_img') ?></label>
                    <div class="position-relative has-icon-left">
                        <label class="custom-file center-block block">
                            <input type="file" id="category_image_1" name="category_image_1" class="custom-file-input">
                            <span class="custom-file-control"></span>
                        </label>
                    </div>
                </div>

            </div>

            <div class="card-block p-0" id="category_insert_form">

            </div>

            <div class="card-block p-0">

                <div class="form-group  col-xl-2"  style="margin-top: 8px;">
                    <label for="add"></label>
                    <div class="position-relative has-icon-left">
                        <div class="position-relative has-icon-left" >
                            <a onclick="add_category_form()" class="btn btn-social btn-min-width mr-1 mb-1 btn-blue-grey">
                                <span class="icon-plus-circle font-medium-3"></span>
                                <?php echo $this->lang->line('category_add_form'); ?></a>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3" style="margin-top: 8px">
                    <label for="add"></label>
                    <div class="">
                        <input type="submit" value="<?php echo $this->lang->line('save_category'); ?>" class="btn btn-social btn-min-width pr-1 pl-1 mr-1 mb-1 btn-info" />
                    </div>
                </div>
            </div>
            <input type="hidden" value="1" id="category_form_number" name="category_form_number" />
        </form>
    </div>
</div>
<! –– end form to insert new category ––>


<section id="constructor">
    <div class="row">

        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('admin_category'); ?></h4>
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
                        <div class="row">
                            <div class="form-group col-xl-4">
                                <select class="form-control" id="branch_loc_filter">
                                    <option value="0"><?php echo $this->lang->line('category_select_branch_location'); ?></option>
                                    <?php
                                    if ($category_branch_location) {
                                        foreach ($category_branch_location as $branch_location) {
                                            ?>
                                            <option value="<?php echo $branch_location->branch_location_id ?>"> <?php
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
                                                ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <table class="table table-striped table-bordered dataex-res-constructor" id="category_table">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('category_show_ar_name'); ?></th>
                                    <th><?php echo $this->lang->line('category_show_en_name'); ?></th> 
                                    <th><?php echo $this->lang->line('category_show_discount'); ?></th> 
                                    <th><?php echo $this->lang->line('category_show_branch'); ?></th> 
                                    <th><?php echo $this->lang->line('category_show_location'); ?></th> 
                                    <th><?php echo $this->lang->line('category_show_image'); ?></th> 
                                    <th></th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($get_category) {
                                    foreach ($get_category as $category) {
                                        if ($category->disable == 1) {
                                            ?>

                                            <tr>
                                                <td><?php echo $category->category_ar_name; ?></td> 
                                                <td><?php echo $category->category_en_name; ?></td> 
                                                <td><?php echo round($category->discount, 2); ?></td> 
                                                <td>
                                                    <?php
                                                    if ($this->session->userdata('site_lang') == "arabic") {
                                                        echo $category->branch_ar_name;
                                                    } else {
                                                        echo $category->branch_en_name;
                                                    }
                                                    ?>

                                                </td> 
                                                <td>
                                                    <?php
                                                    if ($this->session->userdata('site_lang') == "arabic") {
                                                        echo $category->location_ar_name;
                                                    } else {
                                                        echo $category->location_en_name;
                                                    }
                                                    ?>
                                                </td> 
                                                <td>
                                                    <?php
                                                    if ($category->image == NUll) {
                                                        echo $this->lang->line('category_no_image');
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo base_url('assets/lib/images/category/') . $category->image; ?>" width="50px" height="50px">
                                                    <?php }
                                                    ?>
                                                </td> 
                                                <td class="p-0">
                                                    <div class="btn-group mt-1" role="group" aria-label="Basic example">
                                                        <a href="<?php echo base_url(rest_path('Category/update_category?category_id=' . $category->id . '')); ?>" data-toggle="modal"   data-target="#edit_category"  class="btn btn-outline-success btn-round"><?php echo $this->lang->line('category_edit'); ?></a>
                                                        <a href="<?php echo base_url(rest_path('Category/delete_category?category_id=' . $category->id . '')); ?>"  data-toggle="modal"   data-target="#delete_category" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('category_delete'); ?></a>
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
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_category" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('edit_category'); ?></label>
                    </div>
                    <div class="modal-body">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Delete Modal popup -->
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal animated lightSpeedIn text-xs-left" data-backdrop="static" data-keyboard="false" id="delete_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('delete_category'); ?></label>
                    </div>
                    <div class="modal-body">   

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>