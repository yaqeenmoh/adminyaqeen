<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('tables_add_tables') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true" style="">
        <form action="<?php echo base_url(rest_path('Tables/insert_tables')); ?>" id="insert_tables" method="post" enctype="multipart/form-data" onsubmit="tables_validation()">

            <div class="card-block pb-0">
                <div class="form-group col-xl-3">
                    <label><?php echo $this->lang->line('tables_name') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" class="form-control" id="table_name_1" name="table_name_1" placeholder="<?php echo $this->lang->line('tables_name') ?>">
                        <div id="table_name_error_message_1"></div>

                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group col-xl-3">
                    <label><?php echo $this->lang->line('tables_chair_number') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" class="form-control" id="table_chair_number_1" name="table_chair_number_1" placeholder="<?php echo $this->lang->line('tables_chair_number') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('tables_floor_select') ?></label>
                    <div class="position-relative has-icon-left">
                        <div class="input-group">
                            <div class="input-group-addon bg-white">
                                <i class="icon-navicon2"></i>
                            </div>
                            <select class="form-control" name="table_floor_1" required="true">
                                <option></option>
                                <?php
                                if ($floor) {
                                    foreach ($floor as $floors) {
                                        ?>
                                        <option value="<?php echo $floors->id ?>"><?php
                                            if ($this->session->userdata('site_lang') == "arabic") {
                                                echo $floors->ar_name;
                                            } else {
                                                echo $floors->en_name;
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

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('tables_image') ?></label>
                    <div class="position-relative has-icon-left">
                        <div class="input-group">
                            <div class="input-group-addon bg-white">
                                <i class="icon-navicon2"></i>
                            </div>
                            <select class="form-control vodiapicker" name="table_image_1" id="table_image_1">
                                <option></option>
                                <option value="barAvailable" data-thumbnail="<?php echo base_url('assets/lib/images/tables/barAvailable.png'); ?>"><?php echo $this->lang->line('tables_bar'); ?></option>
                                <option value="towChairAvailable"><?php echo $this->lang->line('tables_two_chair'); ?></option>
                                <option value="fourChairAvailable"><?php echo $this->lang->line('tables_four_chair'); ?></option>
                                <option value="sixChairAvailable"><?php echo $this->lang->line('tables_six_chair'); ?></option> 
                            </select>
                        </div>
                    </div>
                </div>

            </div>



            <div class="card-block p-0" id="tables_insert">

            </div>


            <div class="card-block pt-0">
                <div class="form-group  col-xl-2"  style="margin-top: 8px;">
                    <label for="timesheetinput1"></label>
                    <div class="">
                        <input type="submit" class="btn btn-social btn-min-width pl-1 pr-1 mr-1 mb-1 btn-info" value="<?php echo $this->lang->line('save_tables'); ?>" />
                    </div>
                </div>

                <div class="form-group  col-xl-2" style="margin-top: 8px;">
                    <label for="add"></label>
                    <div class="position-relative has-icon-left">
                        <div class="position-relative has-icon-left" >
                            <a onclick="add_tables_form()" class="btn btn-social btn-min-width mr-1 mb-1 btn-blue-grey">
                                <span class="icon-plus-circle font-medium-3"></span>
                                <?php echo $this->lang->line('tables_add_form'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="1" name="tables_form_number" id="tables_form_number"/>
        </form>
    </div>
</div>



<!-- edit x and y  tables-->
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('tables_edit_x_y_tables') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true" style="">

        <div class="card-block">
            <div class="form-group  col-xl-4">
                <label><?php echo $this->lang->line('tables_floor_select') ?></label>
                <div class="position-relative has-icon-left">
                    <div class="input-group">
                        <div class="input-group-addon bg-white">
                            <i class="icon-navicon2"></i>
                        </div>
                        <select class="form-control" id="select_floor">
                            <option></option>
                            <?php
                            if ($floor) {
                                foreach ($floor as $floors) {
                                    ?>
                                    <option value="<?php echo $floors->id ?>"><?php
                                        if ($this->session->userdata('site_lang') == "arabic") {
                                            echo $floors->ar_name;
                                        } else {
                                            echo $floors->en_name;
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



        <div class="card-block" id="draw_table">

        </div>

    </div>
</div>



<section id="constructor">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('admin_tables'); ?></h4>
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

                        <table class="table table-striped table-bordered dataex-res-constructor" id="tables_table">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('tables_show_name'); ?></th>
                                    <th><?php echo $this->lang->line('tables_show_chair_number'); ?></th> 
                                    <th><?php echo $this->lang->line('tables_show_floor'); ?></th> 
                                    <th><?php echo $this->lang->line('tables_show_image'); ?></th> 
                                    <th></th> 


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($table) {
                                    foreach ($table as $tables) {
                                        if ($tables->disable == 1) {
                                            ?>
                                            <tr>
                                                <td><?php echo $tables->name; ?></td>
                                                <td><?php echo $tables->chair_number; ?></td>
                                                <td><?php
                                                    if ($this->session->userdata('site_lang') == "arabic") {
                                                        echo $tables->ar_name;
                                                    } else {
                                                        echo $tables->en_name;
                                                    }
                                                    ?></td>
                                                <td class="p-0"><img src="<?php echo base_url('assets/lib/images/tables/' . $tables->image . ''); ?>" width="50px" height="50px"></td>
                                                <td>
                                                    <div class="btn-group mt-1" role="group" aria-label="Basic example">
                                                        <a href="Tables/update_table?table_id=<?php echo $tables->table_id ?>" data-toggle="modal"  data-target="#edit_table"  class="btn btn-outline-success btn-round"><?php echo $this->lang->line('category_edit'); ?></a>
                                                        <a href="Tables/delete_table?table_id=<?php echo $tables->table_id ?>"  data-toggle="modal"   data-target="#delete_table" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('category_delete'); ?></a>
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
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_table" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('edit_table'); ?></label>
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
        <div class="modal animated lightSpeedIn text-xs-left" data-backdrop="static" data-keyboard="false" id="delete_table" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('delete_table'); ?></label>
                    </div>
                    <div class="modal-body">   

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>