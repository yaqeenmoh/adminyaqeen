
<!-- Add user type Excel sheet-->
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('user_type_excel_sheet') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="<?php echo base_url(rest_path('User_type/download_user_type_excel')); ?>"><i class="icon-file-excel-o text-success bg-white" style="font-size: 25px;" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('user_type_download_excel'); ?>"></i></a></li>
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>

            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true" style="">
        <div class="card-block">
            <form action="<?php echo base_url(rest_path('User_type/upload_user_type_excel')) ?>" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group  col-xl-4">
                    <label><?php echo $this->lang->line('upload_user_type_excel') ?></label>
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
                        <button type="submit" name="import" class="float-right btn btn-success"><?php echo $this->lang->line('import_user_type'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- Add user type-->
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('add_user_type') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>


    <div class="card-body collapse in" aria-expanded="true" style=""> 
        <form action="<?php echo base_url(rest_path('User_type/insert_user_type')); ?>" method="post" id="insert_user_type">
            <div class="card-block pb-0">
                <div class="form-group  col-xl-3 ">
                    <label><?php echo $this->lang->line('user_type') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text"  class="form-control" id="name_1" name="name_1" placeholder="<?php echo $this->lang->line('user_type') ?>" required="">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>

                </div>


                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('user_discount') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" class="form-control" id="discount_percentage_1" name="discount_percentage_1" step="0.01" placeholder="<?php echo $this->lang->line('user_discount') ?>">
                        <div class="form-control-position">
                            <i class="icon-percent"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-block p-0" id="user_type_add_form">

            </div>


            <div class="card-block">

                <div class="form-group  col-xl-2" style="margin-top: 8px">
                    <label for="add"></label>
                    <div class="position-relative has-icon-left">
                        <a onclick="add_new_insert_row_user_type()" class="btn btn-social btn-min-width mr-1 mb-1 btn-blue-grey">
                            <span class="icon-plus-circle font-medium-3"></span>
                            <?php echo $this->lang->line('user_type_add_form'); ?></a>
                    </div>
                </div>

                <div class="form-group  col-xl-3" style="margin-top: 8px">
                    <label for="timesheetinput1"></label>
                    <div class="">
                        <input type="submit" class="btn btn-social btn-min-width pr-1 pl-1 mr-1 mb-1 btn-info" value="<?php echo $this->lang->line('save_user_type'); ?>" />
                    </div>
                </div>
            </div>
            <input type="hidden" value="1" name="users_type_form_number" id="users_type_form_number"/>
        </form>
    </div>

</div>


<!-- Show user type-->
<section>
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('admin_user_type'); ?></h4>
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

                        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="user_type_table">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('user_type'); ?></th>
                                    <th><?php echo $this->lang->line('user_discount'); ?></th> 
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($user_type) {
                                    foreach ($user_type as $value) {
                                        if ($value->disable == 1) {
                                            ?>

                                            <tr>
                                                <td id="user_name_<?php echo $value->id; ?>"><?php echo $value->name; ?></td>
                                                <td><span id="user_discount_<?php echo $value->id; ?>"><?php echo round($value->discount_percentage, 2); ?></span></td>

                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="<?php echo base_url(rest_path('User_type/update_user_type?user_type_id_=' . $value->id . '')); ?>" data-toggle="modal"   data-target="#edit_user_type"  class="btn btn-outline-success btn-round"><?php echo $this->lang->line('user_type_edit'); ?></a>
                                                        <a href="<?php echo base_url(rest_path('User_type/delete_user_type?userType_id_=' . $value->id . '')); ?>"  data-toggle="modal"   data-target="#delete_user_type" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('user_type_delete'); ?></a>
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
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_user_type" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('edit_user_type'); ?></label>
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
        <div class="modal animated lightSpeedIn text-xs-left" data-backdrop="static" data-keyboard="false" id="delete_user_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('delete_user_type'); ?></label>
                    </div>
                    <div class="modal-body">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>








