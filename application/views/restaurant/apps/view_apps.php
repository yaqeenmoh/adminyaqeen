
<! –– start excle to add new apps ––>
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('app_excel_sheet') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="<?php echo base_url(rest_path('Apps/download_apps_excel')); ?>"><i class="icon-file-excel-o text-success bg-white" style="font-size: 25px;" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('app_download_excel'); ?>"></i></a></li>
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true" style="">
        <div class="card-block">
            <form action="<?php echo base_url(rest_path('Apps/upload_apps_excel')) ?>" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group  col-xl-4">
                    <label><?php echo $this->lang->line('app_download_excel') ?></label>
                    <div class="position-relative has-icon-left">
                        <fieldset class="form-group">
                            <label class="custom-file center-block block">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="fileURL" required="">
                                <span class="custom-file-control"></span>
                            </label>

                        </fieldset>
                    </div>
                </div>

                <div class="form-group  col-xl-3" style="margin-top: 8px; ">
                    <label for="timesheetinput1"></label>
                    <div class="position-relative has-icon-left">
                        <button type="submit" name="import" class="float-right btn btn-success"><?php echo $this->lang->line('brand_import_excel'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<! –– end excle to add new apps ––>


<! –– start form to add new app ––>
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('add_app') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>
    <div  class="card-body collapse in" aria-expanded="true" style="">
        <form action="<?php echo base_url(rest_path('Apps/save_app')) ?>" method="post" id="app_form" >
            <div class="card-block" id="app_card_collapse">
                <div class="form-group  col-xl-3 ">
                    <label for="app_ar_name_"><?php echo $this->lang->line('app_ar_name') ?></label>
                    <div  class="position-relative has-icon-left">
                        <input type="text" id="app_ar_name_" class="form-control"
                               placeholder="<?php echo $this->lang->line('app_ar_name') ?>" name="app_ar_name_1"
                               value="" required="">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>


                <div class="form-group  col-xl-3 ">
                    <label for="ap_en_name_"><?php echo $this->lang->line('app_en_name') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" id="ap_en_name_" class="form-control"
                               placeholder="<?php echo $this->lang->line('app_en_name') ?>" name="app_en_name_1"
                               value="">


                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block p-0" id="app_add_form"></div>

            <div class="card-block pt-0">
                <div class="form-group  col-xl-2" style="margin-top: 8px;">
                    <label for="add"></label>
                    <div class="position-relative has-icon-left">
                        <div class="position-relative has-icon-left" >
                            <a onclick="addNewRowApps()" class="btn btn-social btn-min-width mr-1 mb-1 btn-blue-grey">
                                <span class="icon-plus-circle font-medium-3"></span>
                                <?php echo $this->lang->line('add_new_row'); ?></a>
                        </div>
                    </div>
                </div>

                <div class="form-group col-xl-3" style="margin-top: 8px">
                    <label for="timesheetinput1"></label>
                    <div class="">
                        <input type="submit" name="app_validation" value="<?php echo $this->lang->line('save_add_app'); ?>" class="btn btn-social btn-min-width pl-1 pr-1 mr-1 mb-1 btn-info"/>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<! –– end form to add new app––>

<! –– start table to show apps ––>
<section id="constructor">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('view_apps'); ?></h4>
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
                                    <th><?php echo $this->lang->line('app_ar_name') ?></th>
                                    <th><?php echo $this->lang->line('app_en_name') ?></th>
                                    <th><?php echo $this->lang->line('manage') ?></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($apps)) {
                                    foreach ($apps as $app) {
                                        if ($app['disable'] == 1) {
                                            ?>
                                            <tr>

                                                <td><?php echo $app['ar_name'] ?></td>
                                                <td><?php echo $app['en_name'] ?></td>

                                                <td>
                                                    <div class = "btn-group" role = "group" aria-label = "Basic example">
                                                        <a href="Apps/update_app?id=<?php echo $app['id']; ?>" data-toggle = "modal"  data-target = "#edit_app" class = "btn btn-outline-success btn-round"><?php echo $this->lang->line('edit_app_btn'); ?></a>
                                                        <a href="Apps/delete_app?id=<?php echo $app['id']; ?>" data-toggle = "modal"  data-target = "#delete_app" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('delete_app_btn'); ?></a>
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
<! –– end table to show apps ––>

<! –– start app manage ––>
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">

        <!-- edit Modal -->
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_app" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('edit_app_btn'); ?></label>
                    </div>

                    <div class="modal-body">



                    </div>


                </div>
            </div>
        </div>
    </div>

</div>
<! –– end app manage ––>


<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal animated lightSpeedIn text-xs-left" data-backdrop="static" data-keyboard="false" id="delete_app" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('delete_app'); ?></label>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>