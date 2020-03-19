<!-- Show cutome item -->
<section>
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('admin_custom_item'); ?></h4>
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
                                    <th><?php echo $this->lang->line('custom_item_ar_name'); ?></th>
                                    <th><?php echo $this->lang->line('custom_item_en_name'); ?></th> 
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($custom_item) {
                                    foreach ($custom_item as $custom) {
                                        if ($custom->custom == 1) {
                                            ?>

                                            <tr>
                                                <td><?php echo $custom->ar_name; ?></td>
                                                <td><?php echo $custom->en_name; ?></td>
                                                <td> <a href="Custom_item/add_custom_option?item_id=<?php echo $custom->id; ?>"  data-toggle="modal"   data-target="#custom_item" class="btn btn-outline-success btn-round"><?php echo $this->lang->line('custom_item_add_option'); ?></a></td>
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



<!-- Show printer -->
<section>
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('custom_item_details'); ?></h4>
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

                        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="custom_item_table">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('custom_item_name'); ?></th>
                                    <th><?php echo $this->lang->line('custom_item_recipe'); ?></th> 
                                    <th><?php echo $this->lang->line('custom_item_option'); ?></th> 
                                    <th><?php echo $this->lang->line('custom_item_minimum'); ?></th> 
                                    <th><?php echo $this->lang->line('custom_item_maximum'); ?></th> 
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($custom_item_details) {
                                    foreach ($custom_item_details as $custom_item) {
                                        if($custom_item->disable == 1){
                                        ?>
                                        <tr>
                                            <td><?php
                                                if ($this->session->userdata('site_lang') == "arabic") {
                                                    echo $custom_item->item_ar_name;
                                                } else {
                                                    echo $custom_item->item_en_name;
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($this->session->userdata('site_lang') == "arabic") {
                                                    echo $custom_item->rec_ar_name;
                                                } else {
                                                    echo $custom_item->rec_en_name;
                                                }
                                                ?></td>
                                            <td><?php
                                                $option = $custom_item->custom_option;
                                                $decode_data = json_decode($option);
                                                foreach ($decode_data as $key => $value) {
                                                    echo $key;
                                                    echo '&nbsp; -> &nbsp;';
                                                    echo $value;
                                                    echo '<br>';
                                                }
                                                ?></td>
                                            <td><?php echo $custom_item->minimum;?></td>
                                            <td><?php echo $custom_item->maximum;?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="Custom_item/edit_custom_item?custom_item_id=<?php echo $custom_item->id;?>" data-toggle="modal"   data-target="#edit_custom_item"  class="btn btn-outline-success btn-round"><?php echo $this->lang->line('edit'); ?></a>
                                                    <a href="Custom_item/delete_custom_item?custom_item_id=<?php echo $custom_item->id;?>"  data-toggle="modal"   data-target="#delete_custom_item" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('delete'); ?></a>
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



<!-- Add custom Modal popup -->
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal animated lightSpeedIn text-xs-left" id="custom_item" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('custom_item_add_option_recipe'); ?></label>
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
        <div class="modal animated lightSpeedIn text-xs-left" id="delete_custom_item" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('custom_item_delete_option_recipe'); ?></label>
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
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_custom_item" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('custom_item_edit_option_recipe'); ?></label>
                    </div>

                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

