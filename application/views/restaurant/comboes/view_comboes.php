

<! –– start form to add new combo ––>
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('add_combo') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>
    <div  class="card-body collapse in" aria-expanded="true" style="">
        <form method="post" id="combo_form" action="Combo/save_combo">
            <div class="card-block pb-0 pt-0" id="app_card_collapse">
                <div class="form-group  col-xl-3 ">
                    <label for="combo_name"><?php echo $this->lang->line('combo_name') ?></label>
                    <div  class="position-relative has-icon-left">
                        <input type="text" id="combo_name_1" class="form-control"
                               placeholder="<?php echo $this->lang->line('combo_name') ?>" name="combo_name_1"
                               value="" required="" >

                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>


                <div class="form-group  col-xl-3">
                    <label for="combo_price"><?php echo $this->lang->line('combo_price') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" id="combo_price_" class="form-control"
                               placeholder="<?php echo $this->lang->line('combo_price') ?>" name="combo_price_1"
                               value="" required="">


                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 mr-1">
                    <label for="timesheetinput1"><?php echo $this->lang->line('combo_satrtDate') ?></label>
                    <div class='input-group date' id='datetimepicker8'>
                        <input id="combo_satrtDate_" type='datetime-local' class="form-control" name="combo_satrtDate_1"/>
                        <span class="input-group-addon">
                            <span class="icon-calendar5"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group col-xl-3 mr-1">
                    <label for="timesheetinput1"><?php echo $this->lang->line('combo_endDate') ?></label>
                    <div class='input-group date' id='datetimepicker8'>
                        <input id="combo_endDate_" type='datetime-local' class="form-control" name="combo_endDate_1"/>
                        <span class="input-group-addon">
                            <span class="icon-calendar5"></span>
                        </span>
                    </div>
                </div>



                <div class="input-group  col-xl-3 ml-3">
                    <label><?php echo $this->lang->line('items_branch_location') ?></label>
                    <?php
                    if ($branch_location) {
                        foreach ($branch_location as $value_location) {
                            ?>
                            <fieldset>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="<?php echo $value_location->branch_location_id ?>" name="branch_location_combo_1">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">
                                        <?php
                                        if ($this->session->userdata('site_lang') == "arabic") {
                                            echo '<span>';
                                            echo $value_location->location_ar_name;
                                            echo '</span>';
                                            echo '- &nbsp;';
                                            echo '<span>';
                                            echo $value_location->branch_ar_name;
                                            echo '</span>';
                                        } else {
                                            echo '<span>';
                                            echo $value_location->location_en_name;
                                            echo '</span>';
                                            echo '- &nbsp;';
                                            echo '<span>';
                                            echo $value_location->branch_en_name;
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
            <div class="card-block pb-0 pt-0">


                <div class="form-group col-xl-3 mr-1">
                    <label class="mt-2" for="items"><?php echo $this->lang->line('combo_addItems'); ?></label>
                    <div class="form-group" >
                        <input type="text" id="search" name="search" class="form-control" placeholder="Search"/>
                        <input type="hidden" id="combo_item_id" name="combo_item_id" />
                        <input type="hidden" id="combo_item_id_counter" name="combo_item_id_counter" />
                        <div id="auto_complete_items">
                            <ul>

                            </ul>
                        </div>


                        <div class="form-group" id='combo_select_ids'>

                        </div>

                    </div>
                </div>
            </div>



            <div class="card-block p-0" id="combo_add_form"></div>

            <div class="card-block pt-0">

                <div class="form-group  col-xl-2" style="margin-top: 8px;">
                    <label for="add"></label>
                    <div class="position-relative has-icon-left">
                        <div class="position-relative has-icon-left" >
                            <a onclick="addNewRowCombos()"  id="add_combo_plus" class="btn btn-social btn-min-width mr-1 mb-1 btn-blue-grey">
                                <span class="icon-plus-circle font-medium-3"></span>
                                <?php echo $this->lang->line('add_new_row'); ?></a>
                        </div>
                    </div>
                </div>


                <div class="form-group  col-xl-3" style="margin-top: 8px">
                    <label for="timesheetinput1"></label>
                    <div>
                        <input type="submit" name="combo_validation" class="btn btn-social btn-min-width pl-1 pr-1 mr-1 mb-1 btn-info" value="<?php echo $this->lang->line('save_add_combo'); ?>" />
                    </div>

                </div>
            </div>
            <input type="hidden" value="1" id="combo_form_number" name="combo_form_number"/>
        </form>
    </div>
</div>

<! –– end form to add new combo––>



<! –– start table to show combo ––>
<section id="constructor">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('view_comboes'); ?></h4>
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
                                    <th><?php echo $this->lang->line('combo_name') ?></th>
                                    <th><?php echo $this->lang->line('combo_price') ?></th>
                                    <th><?php echo $this->lang->line('combo_branch') ?></th>
                                    <th><?php echo $this->lang->line('combo_location') ?></th>
                                    <th><?php echo $this->lang->line('combo_satrtDate') ?></th>
                                    <th><?php echo $this->lang->line('combo_endDate') ?></th>
                                    <th><?php echo $this->lang->line('manage') ?></th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($comboes)) {

                                    foreach ($comboes as $combo) {
                                        if ($combo->combo_disable == 1) {
                                            ?>
                                            <tr>
                                                <td><?php echo $combo->combo_name ?></td>
                                                <td><?php echo round($combo->combo_price, 3) ?></td>
                                                <td><?php
                                                    if ($this->session->userdata('site_lang') == "arabic") {
                                                        echo $combo->branch_type_ar_name;
                                                    } else {
                                                        echo $combo->branch_type_en_name;
                                                    }
                                                    ?></td>  
                                                <td><?php
                                                    if ($this->session->userdata('site_lang') == "arabic") {
                                                        echo $combo->loc_ar_name;
                                                    } else {
                                                        echo $combo->loc_en_name;
                                                    }
                                                    ?></td>
                                                <td><?php echo $combo->start_date; ?></td>  
                                                <td><?php echo $combo->end_date; ?></td>  

                                                <td>
                                                    <div class = "btn-group" role = "group" aria-label = "Basic example">
                                                        <a href="Combo/update_combo?combo_id=<?php echo $combo->combo_id; ?>"
                                                           data-toggle = "modal"  data-target = "#edit_combo" class = "btn btn-outline-success btn-round">Details</a>
                                                        <a href="Combo/delete_combo?combo_id=<?php echo $combo->combo_id; ?>"
                                                           class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('delete_combo_btn'); ?></a>
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
<! –– end table to show combo ––>

<! –– start combo manage ––>
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">

        <!-- edit Modal -->
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_combo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('edit_combo_btn'); ?></label>
                    </div>

                    <div class="modal-body">



                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- delete combo-->
    <div class="form-group">

        <div class="modal animated pulse text-xs-left" id="delete_combo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel38" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel38"><?php echo $this->lang->line('delete_combo_btn'); ?></h4>
                    </div>
                    <div class="modal-body">


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<! –– end combo manage ––>