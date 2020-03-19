<!-- Add users Excel sheet-->
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('users_excel_sheet') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="<?php echo base_url(rest_path('Users/download_users_excel_sheet')); ?>"><i class="icon-file-excel-o text-success bg-white" style="font-size: 25px;" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('users_download_excel'); ?>"></i></a></li>
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>

            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true" style="">
        <div class="card-block">
            <form action="<?php echo base_url(rest_path('Users/upload_users_excel')); ?>" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group  col-xl-4">
                    <label><?php echo $this->lang->line('upload_users_excel') ?></label>
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
                            <button type="submit" name="import" class="float-right btn btn-success"><?php echo $this->lang->line('users_import_excel'); ?></button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Add user -->
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('users_add_user') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>

            </ul>
        </div>
    </div>


    <div class="card-body collapse in" aria-expanded="true" style="">
        <form action="<?php echo base_url(rest_path('Users/insert_users')); ?>" method="post" id="insert_users">
            <div class="card-block pb-0" id="form_hide">
                <div class="form-group  col-xl-5 ">
                    <label><?php echo $this->lang->line('users_user_name') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" id="username_1" name="username_1" class="form-control" placeholder="<?php echo $this->lang->line('users_user_name') ?>" required="">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>


                <div class="form-group  col-xl-5">
                    <label><?php echo $this->lang->line('users_user_password') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="password" id="password_1" name="password_1" class="form-control"  placeholder="<?php echo $this->lang->line('users_user_password') ?>" required="">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-block pb-0 pt-0">

                <div class="form-group  col-xl-5">
                    <label><?php echo $this->lang->line('users_user_type') ?></label>
                    <div class="position-relative has-icon-left">
                        <div class="input-group">
                            <div class="input-group-addon bg-white">
                                <i class="icon-navicon2"></i>
                            </div>
                            <select class="form-control" name="user_type_1" required="true">
                                <option></option>
                                <?php
                                if ($user_type) {
                                    foreach ($user_type as $usersType) {
                                        if ($usersType->disable == 1) {
                                            ?>
                                            <option value="<?php echo $usersType->id ?>"><?php echo $usersType->name; ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group  col-xl-5">
                    <label><?php echo $this->lang->line('users_device') ?></label>
                    <div class="position-relative has-icon-left">
                        <div class="input-group">
                            <div class="input-group-addon bg-white">
                                <i class="icon-navicon2"></i>
                            </div>
                            <select class="form-control" name="device_1" id="device_1">
                                <option></option>
                                <?php
                                if ($user_device) {
                                    foreach ($user_device as $device) {
                                        ?>
                                        <option value="<?php echo $device->id ?>"><?php
                                            if ($this->session->userdata('site_lang') == "arabic") {
                                                echo $device->ar_name;
                                            } else {
                                                echo $device->en_name;
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
            </div>


            <div class="card-block pb-0 pt-0">
                <div class="form-group col-xl-5" >
                    <label><?php echo $this->lang->line('users_branch') ?></label>

                    <?php
                    if ($user_branch_location) {
                        foreach ($user_branch_location as $branch_location) {
                            ?>
                            <fieldset>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input branch_location_1" value="<?php echo $branch_location->branch_location_id ?>" name="branch_location_1[]" id="branch_location_1">
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
            </div>

            <div class="card-block p-0" id="users_add_form">   </div>

            <div class="card-block p-0">

                <div class="form-group  col-xl-2" style="margin-top: 8px;">
                    <label for="add"></label>
                    <div class="position-relative has-icon-left">
                        <a onclick="add_new_insert_row_users()" class="btn btn-social btn-min-width mr-1 mb-1 btn-blue-grey">
                            <span class="icon-plus-circle font-medium-3"></span>
                            <?php echo $this->lang->line('users_add_form'); ?></a>
                    </div>
                </div>

                <div class="form-group  col-xl-2"  style="margin-top: 8px;">
                    <label for="timesheetinput1"></label>
                    <div class="position-relative has-icon-left">
                        <div class="position-relative has-icon-left" >
                            <input type="submit" value="<?php echo $this->lang->line('save_users'); ?>" class="btn btn-social btn-min-width pl-1 pr-1 mr-1 mb-1 btn-info" name="save_users" id="save_users"/>
                        </div>

                    </div>
                </div>
            </div>

            <input type="hidden" value="1" name="users_form_number" id="users_form_number"/>
        </form>
    </div>
</div>









<!-- Show users-->
<section id="constructor">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('admin_users'); ?></h4>
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
                                <select class="form-control" id="user_branch_loc_filter">
                                    <option value="0"><?php echo $this->lang->line('users_select_branch_location'); ?></option>
                                    <?php
                                    if ($user_branch_location) {
                                        foreach ($user_branch_location as $branch_location) {
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
                        <table class="table table-striped table-bordered dataex-res-constructor" id="users_table">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('show_users_user_name'); ?></th>
                                    <th><?php echo $this->lang->line('show_users_user_type'); ?></th> 
                                    <th><?php echo $this->lang->line('show_users_device'); ?></th> 
                                    <th><?php echo $this->lang->line('show_users_branch'); ?></th> 
                                    <th><?php echo $this->lang->line('show_users_location'); ?></th> 
                                    <th></th> 


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($users) {
                                    foreach ($users as $users_information) {

                                        if ($users_information->user_disable == 1) {
                                            ?>
                                            <tr>
                                                <td><?php echo $users_information->username; ?></td>
                                                <td><?php echo $users_information->name; ?></td>
                                                <td><?php
                                                    if ($this->session->userdata('site_lang') == "arabic") {
                                                        echo $users_information->device_ar_name;
                                                    } else {
                                                        echo $users_information->device_en_name;
                                                    }
                                                    ?></td>
                                                <td><?php
                                                    if ($this->session->userdata('site_lang') == "arabic") {
                                                        echo $users_information->branch_ar_name;
                                                    } else {
                                                        echo $users_information->branch_en_name;
                                                    }
                                                    ?></td>
                                                <td><?php
                                                    if ($this->session->userdata('site_lang') == "arabic") {
                                                        echo $users_information->location_ar_name;
                                                    } else {
                                                        echo $users_information->location_en_name;
                                                    }
                                                    ?></td>

                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="Users/update_users_information_by_id?id=<?php echo $users_information->user_id ?>" data-toggle="modal"   data-target="#edit_users"  class="btn btn-outline-success btn-round"><?php echo $this->lang->line('users_edit'); ?></a>
                                                        <a href="Users/delete_users?delete_user_id=<?php echo $users_information->user_id ?>"  data-toggle="modal"   data-target="#delete_user_type" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('users_delete'); ?></a>
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
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_users" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('edit_users'); ?></label>
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
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('delete_users'); ?></label>
                    </div>
                    <div class="modal-body">   

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



