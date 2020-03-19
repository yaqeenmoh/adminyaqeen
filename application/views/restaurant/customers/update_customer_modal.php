<?php
if ($edit_customer) {
    foreach ($edit_customer as $update_customer) {
        ?>
        <form action="<?php echo base_url(rest_path('Customers/update_customer_information?customer_id=' . $update_customer->id . '')) ?>" method="post">
            <label><?php echo $this->lang->line('customers_fname'); ?> </label>
            <div class="form-group">
                <input type="text"  name="fname" value="<?php echo $update_customer->fname; ?>" class="form-control" required="">
            </div>

            <label><?php echo $this->lang->line('customers_lname'); ?> </label>
            <div class="form-group">
                <input type="text"  name="lname" value="<?php echo $update_customer->lname; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('customers_mobile'); ?> </label>
            <div class="form-group">
                <input type="number"  name="mobile" value="<?php echo $update_customer->mobile; ?>" class="form-control" required="">
            </div>

            <label><?php echo $this->lang->line('customers_phone'); ?> </label>
            <div class="form-group">
                <input type="number"  name="phone" value="<?php echo $update_customer->phone; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('customers_email'); ?> </label>
            <div class="form-group">
                <input type="email"  name="email" value="<?php echo $update_customer->email; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('customers_company'); ?> </label>
            <div class="form-group">
                <input type="text"  name="company" value="<?php echo $update_customer->company; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('customers_cash_discount'); ?> </label>
            <div class="form-group">
                <input type="number" step="0.01" name="cash_discount" value="<?php echo $update_customer->customer_cash_discount; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('customers_percentage_discount'); ?> </label>
            <div class="form-group">
                <input type="number" step="0.01" name="percentage_discount" value="<?php echo $update_customer->customer_percentage_discount; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('customers_tax_free_number'); ?> </label>
            <div class="form-group">
                <input type="number"  name="tax_free_number" value="<?php echo $update_customer->tax_free_number; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('customers_customer_type'); ?> </label>
            <div class="form-group">
                <input type="text"  name="customer_type" value="<?php echo $update_customer->customer_type; ?>" class="form-control">
            </div>


            <label><?php echo $this->lang->line('customers_max_dept'); ?> </label>
            <div class="form-group">
                <input type="number"  name="max_dept" value="<?php echo $update_customer->max_dept; ?>" class="form-control">
            </div>

            <label><?php echo $this->lang->line('customers_discount_limit'); ?> </label>
            <div class="form-group">
                <input type="number" step="0.01" name="discount_limit" value="<?php echo $update_customer->discount_limit; ?>" class="form-control">
            </div>


            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('customer_close_edit'); ?>">
                <input type="submit" name="edit_customers" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('customer_save_edit'); ?>">
            </div>

        </form>

        <?php
    }
}
?>

