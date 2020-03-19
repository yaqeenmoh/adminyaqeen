

<! –– start excle to add new brand ––>
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('brand_excel_sheet') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="<?php echo base_url(rest_path('Brand/download_brand_excel')); ?>"><i class="icon-file-excel-o text-success bg-white" style="font-size: 25px;" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('brand_excel_sheet'); ?>"></i></a></li>
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>

            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true" style="">
        <div class="card-block">
            <form action="<?php echo base_url(rest_path('Brand/upload_brand_excel')) ?>" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group  col-xl-4">
                    <label><?php echo $this->lang->line('upload_user_type_excel') ?></label>
                    <div class="position-relative has-icon-left">
                        <fieldset class="form-group">
                            <label class="custom-file center-block block">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="fileURL" required="">
                                <span class="custom-file-control"></span>
                            </label>
                            <?php echo form_error('fileURL', '<span class="text-danger" style="font-size:12px;">', '</span>'); ?> 
                        </fieldset>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label for="timesheetinput1"></label>
                    <div class="position-relative has-icon-left">
                        <button type="submit" name="import" class="float-right btn btn-success"><?php echo $this->lang->line('brand_import_excel'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<! –– end excle to add new brand ––>



<! –– start form to insert new brand ––>
<div class="card ">

    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('brand_add_brand') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in" aria-expanded="true" style="">
        <form action="<?php echo base_url(rest_path('Brand/save_brand')); ?>" method="post" id="brand_form"  >
            <div class="card-block">

                <div class="form-group  col-xl-3 ">
                    <label for="ar_name"><?php echo $this->lang->line('brand_ar_name') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" id="ar_name" class="form-control"
                               placeholder="<?php echo $this->lang->line('brand_ar_name') ?>" name="ar_name_1"
                               value="<?php echo set_value('ar_name'); ?>" required="">
                               <?php echo form_error('ar_name', '<div class="text-danger">', '</div>'); ?>
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3 ">
                    <label for="en_name"><?php echo $this->lang->line('brand_en_name') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" id="en_name" class="form-control"
                               placeholder="<?php echo $this->lang->line('brand_en_name') ?>" name="en_name_1"
                               value="<?php echo set_value('en_name'); ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
                
                <div class="input-group col-xl-3">
                    <label for="select_branch_location" class="filled"><?php echo $this->lang->line('combo_select_location_branch') ?></label>
                    <?php
                    if ($branches) {
                        foreach ($branches as $branch) {
                            ?>
                            <label class="display-inline-block custom-control custom-checkbox ml-1">
                                <input value="<?php echo $branch['branch_location_id']; ?>" type="checkbox" name="branch_location_id_1[]" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0"><?php
                                    if ($this->session->userdata('site_lang') == "arabic") {
                                        echo $branch['location_ar_name'] . "," . $branch['branch_ar_name'];
                                    } else {
                                        echo $branch['location_en_name'] . "," . $branch['location_en_name'];
                                    }
                                    ?></span>
                            </label>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="card-block p-0" id="brand_add_form"></div>
            
            <div class="card-block pt-0">
                <div class="form-group  col-xl-2"  style="margin-top: 8px;">
                    <label for="add"></label>
                    <div class="position-relative has-icon-left">
                        <div class="position-relative has-icon-left" >
                            <a onclick="addNewRowBrand()" class="btn btn-social btn-min-width mr-1 mb-1 btn-blue-grey">
                                <span class="icon-plus-circle font-medium-3"></span>
                               <?php echo $this->lang->line('add_new_row'); ?></a>
                        </div>
                    </div>
                </div>
          
                <div class="form-group  col-xl-3" style="margin-top: 8px">
                    <label for="timesheetinput1"></label>
                    <div class="">
                        <input type="submit" name="brand_validation" class="btn btn-social pr-1 pl-1  mr-1 mb-1 btn-info" value="<?php echo $this->lang->line('save_add_brand'); ?>"/>
                    </div>
                </div>
            </div>
            <input type="hidden" value="1" name="brand_form_number" id="brand_form_number"/>
        </form>
    </div>
</div>

<! –– end form to add new brand––>




<! –– start table to show brand ––>
<section id="constructor">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('view_brand'); ?></h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">

                        <table class="table table-striped table-bordered dataex-res-constructor">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('brand_ar_name') ?></th>
                                    <th><?php echo $this->lang->line('brand_en_name') ?></th>
                                    <th><?php echo $this->lang->line('view_branch') ?></th>
                                    <th><?php echo $this->lang->line('view_select_area') ?></th>
                                    <th><?php echo $this->lang->line('manage') ?></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($brands_location)) {
                                    foreach ($brands_location as $brand) {
                                        if ($brand['disable'] == 1) {
                                            if ($brand['brand_id'] != 1) {
                                                ?>
                                                <tr>

                                                    <td><?php echo $brand['BrandArName'] ?></td>
                                                    <td><?php echo $brand['BrandEnName'] ?></td>

                                                    <td><?php
                                                        if ($this->session->userdata('site_lang') == "arabic") {
                                                            echo $brand['BrTyArName'];
                                                        } else {
                                                            echo $brand['BrTyEnName'];
                                                        }
                                                        ?></td>     
                                                    <td><?php
                                                        if ($this->session->userdata('site_lang') == "arabic") {
                                                            echo $brand['loc_ar_name'];
                                                        } else {
                                                            echo $brand['loc_en_name'];
                                                        }
                                                        ?></td>    

                                                    <td>
                                                        <div class = "btn-group" role = "group" aria-label = "Basic example">
                                                            <a href="Brand/update_brand?brand_id=<?php echo $brand['brand_id']; ?>" data-toggle = "modal"  data-target = "#edit_brand" class = "btn btn-outline-success btn-round"><?php echo $this->lang->line('edit_brand_btn'); ?></a>
                                                            <a href="Brand/deleteBrand?brand_id=<?php echo $brand['brand_id']; ?>" data-toggle="modal" data-target="#delete_brand"  class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('delete_brand_btn'); ?></a>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php
                                            }
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
<! –– end table to show brand ––>


<! –– start brand manage ––>
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">

        <!--Edit Modal -->
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_brand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('edit_brand'); ?></label>
                    </div>

                    <div class="modal-body">

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <div class="form-group">

        <div class="modal animated pulse text-xs-left" id="delete_brand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel38" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel38"><?php echo $this->lang->line('delete'); ?></h4>
                    </div>
                    <div class="modal-body">


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<! –– end brand manage ––>


