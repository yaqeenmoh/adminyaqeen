<!-- Add customers Excel sheet-->
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('customers_excel_sheet') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="<?php echo base_url(rest_path('Customers/download_customers_excel_sheet')) ?>"><i class="icon-file-excel-o text-success bg-white" style="font-size: 25px;" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('customers_download_excel'); ?>"></i></a></li>
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>

            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true" style="">
        <div class="card-block">
            <form action="<?php echo base_url(rest_path('Customers/upload_customers_excel')) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group  col-xl-4 ">
                    <label><?php echo $this->lang->line('upload_customers_excel') ?></label>
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
                            <button type="submit" name="import" class="float-right btn btn-success"><?php echo $this->lang->line('customers_import_excel'); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Add Customer -->
<div class="card ">
    <div class="card-header">
        <h2 class="content-header-title mb-0"><?php echo $this->lang->line('customers_add_customer') ?></h2>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            </ul>
        </div>
    </div>

    <div class="card-body collapse in" aria-expanded="true" style="">
        <form action="<?php echo base_url(rest_path('Customers/insert_customer_information')); ?>" method="post" id="customer_information">
            <div class="card-block pb-0">
                <div class="form-group  col-xl-3 ">
                    <label><?php echo $this->lang->line('customers_fname') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" name="fname_1" id="fname_1" class="form-control" placeholder="<?php echo $this->lang->line('customers_fname') ?>" required="">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>


                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('customers_lname') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" name="lname_1" id="lname_1" class="form-control"  placeholder="<?php echo $this->lang->line('customers_lname') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>


                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('customers_mobile') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" name="mobile_1" id="mobile_1" class="form-control"  placeholder="<?php echo $this->lang->line('customers_mobile') ?>" required="">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('customers_phone') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" name="phone_1" id="phone_1" class="form-control"  placeholder="<?php echo $this->lang->line('customers_phone') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block pb-0 pt-0">
                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('customers_email') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="email" name="email_1" id="email_1" class="form-control"  placeholder="<?php echo $this->lang->line('customers_email') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('customers_company') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" name="company_1" id="company_1" class="form-control"  placeholder="<?php echo $this->lang->line('customers_company') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('customers_cash_discount') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" name="cash_discount_1" id="cash_discount_1" class="form-control"  placeholder="<?php echo $this->lang->line('customers_cash_discount') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('customers_percentage_discount') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" name="percentage_discount_1" id="percentage_discount_1" class="form-control"  placeholder="<?php echo $this->lang->line('customers_percentage_discount') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block pb-0 pt-0">
                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('customers_tax_free_number') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" name="tax_free_number_1" id="tax_free_number_1" class="form-control"  placeholder="<?php echo $this->lang->line('customers_tax_free_number') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('customers_customer_type') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="text" name="customer_type_1" id="customer_type_1" class="form-control"  placeholder="<?php echo $this->lang->line('customers_customer_type') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('customers_max_dept') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" name="max_dept_1" id="max_dept_1" class="form-control"  placeholder="<?php echo $this->lang->line('customers_max_dept') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group  col-xl-3">
                    <label><?php echo $this->lang->line('customers_discount_limit') ?></label>
                    <div class="position-relative has-icon-left">
                        <input type="number" name="discount_limit_1" id="discount_limit_1" class="form-control"  placeholder="<?php echo $this->lang->line('customers_discount_limit') ?>">
                        <div class="form-control-position">
                            <i class="icon-navicon2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-block p-0" id="customers_add_form">
            </div>
            <div class="card-block">

                <div class="form-group  col-xl-2" style="margin-top: 8px">
                    <label for="add"></label>
                    <div class="position-relative has-icon-left">
                        <a onclick="add_new_insert_row_customer()" class="btn btn-social btn-min-width mr-1 mb-1 btn-blue-grey">
                            <span class="icon-plus-circle font-medium-3"></span>
                            <?php echo $this->lang->line('customer_add_form'); ?></a>
                    </div>
                </div>

                <div class="form-group  col-xl-3" style="margin-top: 8px">
                    <label for="timesheetinput1"></label>
                    <div class="">
                        <input type="submit" class="btn btn-social btn-min-width pr-1 pl-1 mr-1 mb-1 btn-info" value="<?php echo $this->lang->line('save_customer'); ?>"/>
                    </div>
                </div>
            </div>

            <input type="hidden" value="1" name="customers_form_numeber" id="customers_form_numeber"/>
        </form>
    </div>
</div>


<!-- Show Customers-->
<section id="constructor">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $this->lang->line('admin_customers'); ?></h4>
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

                        <table class="table table-striped table-bordered dataex-res-constructor" id="customer_table">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('customers_fname'); ?></th>
                                    <th><?php echo $this->lang->line('customers_lname'); ?></th> 
                                    <th><?php echo $this->lang->line('customers_mobile'); ?></th> 
                                    <th><?php echo $this->lang->line('customers_phone'); ?></th> 
                                    <th><?php echo $this->lang->line('customers_email'); ?></th>
                                    <th></th>
                                    <th><?php echo $this->lang->line('customers_company'); ?></th> 
                                    <th><?php echo $this->lang->line('customers_cash_discount'); ?></th> 
                                    <th><?php echo $this->lang->line('customers_percentage_discount'); ?></th> 
                                    <th><?php echo $this->lang->line('customers_tax_free_number'); ?></th> 
                                    <th><?php echo $this->lang->line('customers_customer_type'); ?></th> 
                                    <th><?php echo $this->lang->line('customers_visit_number_permanent'); ?></th> 
                                    <th><?php echo $this->lang->line('customers_visit_number_specific'); ?></th> 
                                    <th><?php echo $this->lang->line('customers_total_point'); ?></th>
                                    <th><?php echo $this->lang->line('customers_max_dept'); ?></th> 
                                    <th><?php echo $this->lang->line('customers_discount_limit'); ?></th> 



                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($customer_information) {
                                    foreach ($customer_information as $cust_info) {
                                        if ($cust_info->disable == 1) {
                                            ?>
                                            <tr>
                                                <td><?php echo $cust_info->fname; ?></td>
                                                <td><?php echo $cust_info->lname; ?></td>
                                                <td><?php echo $cust_info->mobile; ?></td>
                                                <td><?php echo $cust_info->phone; ?></td>
                                                <td><?php echo $cust_info->email; ?></td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="<?php echo base_url(rest_path('Customers/update_customer_information?customer_id=' . $cust_info->id . '')); ?>" data-toggle="modal"   data-target="#edit_customer"  class="btn btn-outline-success btn-round"><?php echo $this->lang->line('customer_edit'); ?></a>
                                                        <a href="<?php echo base_url(rest_path('Customers/delete_customer_information?customer_id=' . $cust_info->id . '')); ?>"  data-toggle="modal"   data-target="#delete_customer" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('customer_delete'); ?></a>
                                                    </div>
                                                </td>
                                                <td><?php echo $cust_info->company; ?></td>
                                                <td><?php echo $cust_info->customer_cash_discount; ?></td>
                                                <td><?php echo $cust_info->customer_percentage_discount; ?></td>
                                                <td><?php echo $cust_info->tax_free_number; ?></td>
                                                <td><?php echo $cust_info->customer_type; ?></td>
                                                <td><?php echo $cust_info->visit_number_permanent; ?></td>
                                                <td><?php echo $cust_info->visit_number_specific; ?></td>
                                                <td><?php echo $cust_info->total_point; ?></td>
                                                <td><?php echo $cust_info->max_dept; ?></td>
                                                <td><?php echo $cust_info->discount_limit; ?></td>

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
        <div class="modal animated lightSpeedIn text-xs-left" id="edit_customer" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('edit_customer'); ?></label>
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
        <div class="modal animated lightSpeedIn text-xs-left" id="delete_customer" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('delete_customer'); ?></label>
                    </div>

                    <div class="modal-body">


                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


