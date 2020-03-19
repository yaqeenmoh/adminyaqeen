<! –– start excle to add new modifier ––>
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('modifier_excel_sheet') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="Modifier/download_modifiers_excel"><i class="icon-file-excel-o text-success bg-white" style="font-size: 25px;" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('modifier_download_excel'); ?>"></i></a></li>
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>

            </ul>
        </div>
    </div>
  
    <div class="card-body collapse in" aria-expanded="true" style="">
        <div class="card-block">
            <form action="Modifier/upload_modifiers_excel" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group  col-xl-4">
                    <label><?php echo $this->lang->line('upload_modifier_excel') ?></label>
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
                        <button type="submit" name="import" class="float-right btn btn-success"><?php echo $this->lang->line('import_modifier') ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<! –– end excle to add new modifier ––>



<! –– start form to insert new modifier ––>
<div class="card ">

    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('modifier_add_modifier') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>


            </ul>
        </div>
    </div>
    <div class="card-body collapse in" aria-expanded="true" style="">

        <div class="card-block">
            <p>



            <div class="form-group  col-xl-2 ">
                <label for="modifier"><?php echo $this->lang->line('Modifier_type') ?></label>
                <select id="select_modifier_type" name="modifier_type" class="selectBox border-success bg-white form-control">
                    <option>Add Modifier On</option>
                    <option id="items" value='items'><?php echo $this->lang->line('modifiers_items') ?></option>";
                    <option id="category" value='category'><?php echo $this->lang->line('modifiers_category') ?></option>";
                    <option id="subcategory" value='subcategory'><?php echo $this->lang->line('modifiers_sub_category') ?></option>";

                </select>

            </div>
            <div class="form-group " id="add_modifier_form">

            </div>


        </div>
    </div>

</div>


<! –– end form to add new modifier––>




<! –– start table to show modifier ––>
<section id="constructor">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('view_modifier'); ?></h4>
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
                                    <th><?php echo $this->lang->line('recipe_ar_name') ?></th>
                                    <th><?php echo $this->lang->line('recipe_en_name') ?></th>
                                    <th><?php echo $this->lang->line('modifier-price') ?></th>
                                    <th><?php echo $this->lang->line('modifier-qty') ?></th>
                                    <th><?php echo $this->lang->line('item_ar_name') ?></th>
                                    <th><?php echo $this->lang->line('manage') ?></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($modifiers_custome)) {
                                    foreach ($modifiers_custome as $value) {
                                        if ($value->modifier_disable == 1) {
                                            ?>
                                            <tr>

                                                <td><?php echo $value->recipe_ar_name; ?></td>
                                                <td><?php echo $value->recipe_en_name; ?></td>
                                                <td><?php echo round($value->modifier_price, 3); ?></td>
                                                <td><?php echo $value->modifier_qty; ?></td>
                                                <td><?php echo $value->items_ar_name; ?></td>



                                                <td>
                                                    <div class = "btn-group" role = "group" aria-label = "Basic example">
                                                        <a href="Modifier/update_modifier?modifier_id=<?php echo $value->modifier_id; ?>" data-toggle = "modal"  data-target = "#edit_modifier" class = "btn btn-outline-success btn-round"><?php echo $this->lang->line('edit_modifier_btn'); ?></a>
                                                        <a href="Modifier/deleteModifier?modifier_id=<?php echo $value->modifier_id; ?>" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('delete_modifier_btn'); ?></a>
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
<! –– end table to show modifier ––>


<! –– start modifier manage ––>
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">

        <!--Edit Modal -->
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_modifier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('edit_modifier'); ?></label>
                    </div>

                    <div class="modal-body">

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<! –– end modifier manage ––>


