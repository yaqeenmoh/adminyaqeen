<!-- Add category Excel sheet-->
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('sub_category_excel_sheet') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="<?php echo base_url(rest_path('Sub_category/download_sub_category_excel_sheet')) ?>"><i class="icon-file-excel-o text-success bg-white" style="font-size: 25px;" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('sub_category_download_excel'); ?>"></i></a></li>
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>

            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true" style="">

        <div class="card-block">
            <div class="form-group col-xl-3">
                <label><?php echo $this->lang->line('sub_category_choose_level') ?></label>
                <select class="form-control" id="sub_level_one_excel">
                    <option></option>
                    <option value="0"><?php echo $this->lang->line('sub_category_level_1'); ?></option>
                    <option value="1"><?php echo $this->lang->line('sub_category_other_level'); ?></option>
                </select>
            </div>

        </div>

        <div class="card-block" id="excel">

        </div>
    </div>
</div>




<! –– start form to insert new sub category ––>

<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('add_sub_category') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in" aria-expanded="true" style="">
        <div class="card-block">
            <div class="form-group col-xl-3">
                <label><?php echo $this->lang->line('sub_category_choose_level') ?></label>
                <select class="form-control" id="sub_level">
                    <option></option>
                    <option value="0"><?php echo $this->lang->line('sub_category_level_1'); ?></option>
                    <option value="1"><?php echo $this->lang->line('sub_category_other_level'); ?></option>

                </select>
            </div>
        </div>

        <div class="card-block" id="sub_level_form">
            <form action="<?php echo base_url(rest_path('Sub_category/insert_sub_category'));?>" method="post" id="insert_sub_category">

            </form>
        </div>
    </div>
</div>
<! –– end form to insert new sub category ––>


<section id="constructor">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('admin_sub_category'); ?></h4>
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

                        <table class="table table-striped table-bordered dataex-res-constructor" id="sub_category_table">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('sub_category_show_ar_name'); ?></th>
                                    <th><?php echo $this->lang->line('sub_category_show_en_name'); ?></th> 
                                    <th><?php echo $this->lang->line('sub_category_show_discount'); ?></th> 
                                    <th></th> 


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($sub_category) {
                                    foreach ($sub_category as $sub_cat) {
                                        if ($sub_cat->disable == 1) {
                                            ?>
                                            <tr>
                                                <td><?php echo $sub_cat->sub_ar_name; ?></td>
                                                <td><?php echo $sub_cat->sub_en_name; ?></td>
                                                <td><?php echo round($sub_cat->discount, 2); ?></td>

                                                <td>
                                                    <div class="btn-group mt-1" role="group" aria-label="Basic example">
                                                        <a href="<?php echo base_url(rest_path('Sub_category/update_sub_category?sub_category_id=' . $sub_cat->id . '')) ?>" data-toggle="modal"   data-target="#edit_sub_category"  class="btn btn-outline-success btn-round"><?php echo $this->lang->line('sub_category_edit'); ?></a>
                                                        <a href="<?php echo base_url(rest_path('Sub_category/delete_sub_category?sub_category_id=' . $sub_cat->id . '')); ?>"  data-toggle="modal"   data-target="#delete_sub_category" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('sub_category_delete'); ?></a>
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
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_sub_category" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('edit_sub_category'); ?></label>
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
        <div class="modal animated lightSpeedIn text-xs-left" data-backdrop="static" data-keyboard="false" id="delete_sub_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('delete_sub_category'); ?></label>
                    </div>
                    <div class="modal-body">   

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>