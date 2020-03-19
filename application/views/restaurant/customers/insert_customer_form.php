<?php $customer_id; ?>

<div class="row_<?php echo $customer_id; ?>">
    <div class="card-block pb-0">

        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('customers_fname'); ?></label>
            <div class="position-relative has-icon-left">
                <input type="text" id="fname_<?php echo $customer_id; ?>" name="fname_<?php echo $customer_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('customers_fname') ?>" required="">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>



        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('customers_lname'); ?></label>
            <div class="position-relative has-icon-left">
                <input type="text"  id="lname_<?php echo $customer_id; ?>" name="lname_<?php echo $customer_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('customers_lname') ?>">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>

        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('customers_mobile') ?></label>
            <div class="position-relative has-icon-left">
                <input type="number" id="mobile_<?php echo $customer_id; ?>" name="mobile_<?php echo $customer_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('customers_mobile') ?>" required="">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>

        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('customers_phone') ?></label>
            <div class="position-relative has-icon-left">
                <input type="number" id="phone_<?php echo $customer_id; ?>"  name="phone_<?php echo $customer_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('customers_phone') ?>">
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
                <input type="email" id="email_<?php echo $customer_id; ?>" name="email_<?php echo $customer_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('customers_email') ?>">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>


        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('customers_company') ?></label>
            <div class="position-relative has-icon-left">
                <input type="text" id="company_<?php echo $customer_id; ?>" name="company_<?php echo $customer_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('customers_company') ?>">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>

        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('customers_cash_discount') ?></label>
            <div class="position-relative has-icon-left">
                <input type="number" id="cash_discount_<?php echo $customer_id; ?>" name="cash_discount_<?php echo $customer_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('customers_cash_discount') ?>">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>

        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('customers_percentage_discount') ?></label>
            <div class="position-relative has-icon-left">
                <input type="number" id="percentage_discount_<?php echo $customer_id; ?>" name="percentage_discount_<?php echo $customer_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('customers_percentage_discount') ?>">
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
                <input type="number" id="tax_free_number_<?php echo $customer_id; ?>" name="tax_free_number_<?php echo $customer_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('customers_tax_free_number') ?>">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>

        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('customers_customer_type') ?></label>
            <div class="position-relative has-icon-left">
                <input type="text" id="customer_type_<?php echo $customer_id; ?>" name="customer_type_<?php echo $customer_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('customers_customer_type') ?>">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>

        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('customers_max_dept') ?></label>
            <div class="position-relative has-icon-left">
                <input type="number" id="max_dept_<?php echo $customer_id; ?>" name="max_dept_<?php echo $customer_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('customers_max_dept') ?>">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>

        <div class="form-group  col-xl-3">
            <label><?php echo $this->lang->line('customers_discount_limit') ?></label>
            <div class="position-relative has-icon-left">
                <input type="number" id="discount_limit_<?php echo $customer_id; ?>" name="discount_limit_<?php echo $customer_id; ?>" class="form-control" placeholder="<?php echo $this->lang->line('customers_discount_limit') ?>">
                <div class="form-control-position">
                    <i class="icon-navicon2"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card-block pt-0 pb-0">
        <div class="form-group  col-xl-2"  style="margin-top: 8px;">
            <label for="timesheetinput1"></label>
            <div class="position-relative has-icon-left">
                <div class="position-relative has-icon-left" >
                    <a onclick="delete_row_customer(<?php echo $customer_id; ?>)" class="btn btn-social btn-min-width mr-1 mb-1 btn-danger">
                        <span class="icon-plus-circle font-medium-3"></span><?php echo $this->lang->line('user_type_delete_form'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
