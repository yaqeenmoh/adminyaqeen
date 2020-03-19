
<div class="card-block card-dashboard">
    <form action="<?php echo base_url(rest_path('Customers/insert_customer_excel')); ?>" enctype="multipart/form-data" method="post" id="customer_excel">
        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="customers_excel_table">
            <thead>
                <tr>
                    <th scope="col"><?php echo $this->lang->line('customers_fname'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('customers_lname'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('customers_mobile'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('customers_phone'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('customers_email'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('customers_company'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('customers_cash_discount'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('customers_percentage_discount'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('customers_tax_free_number'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('customers_customer_type'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('customers_max_dept'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('customers_discount_limit'); ?></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;

                foreach ($mydata as $key => $element) {
                    ?>
                    <tr>
                        <td><input type="text" id="fname_<?php echo $i; ?>" class="form-control" name="fname_<?php echo $i; ?>" value="<?php print $element['fname']; ?>" style="border: 0px" required=""></td>
                        <td><input type="text" id="lname_<?php echo $i; ?>"  class="form-control" name="lname_<?php echo $i; ?>" value="<?php print $element['lname']; ?>" style="border: 0px"></td>
                        <td> <input type="text" id="mobile_<?php echo $i; ?>"  class="form-control" name="mobile_<?php echo $i; ?>" value="<?php print $element['mobile']; ?>" style="border: 0px" required=""></td>
                        <td><input type="text" id="phone_<?php echo $i; ?>"  class="form-control" name="phone_<?php echo $i; ?>" value="<?php print $element['phone']; ?>" style="border: 0px"></td>
                        <td><input type="text" id="email_<?php echo $i; ?>"  class="form-control" name="email_<?php echo $i; ?>" value="<?php print $element['email']; ?>" style="border: 0px"></td>
                        <td><input type="text" id="company_<?php echo $i; ?>"  class="form-control" name="company_<?php echo $i; ?>" value="<?php print $element['company']; ?>" style="border: 0px"></td>
                        <td><input type="text" id="cash_discount_<?php echo $i; ?>"  class="form-control" name="cash_discount_<?php echo $i; ?>" value="<?php print $element['customer_cash_discount']; ?>" style="border: 0px"></td>
                        <td><input type="text" id="percentage_discount_<?php echo $i; ?>"  class="form-control" name="percentage_discount_<?php echo $i; ?>" value="<?php print $element['customer_percentage_discount']; ?>" style="border: 0px"></td>
                        <td><input type="text" id="tax_free_number_<?php echo $i; ?>"  class="form-control" name="tax_free_number_<?php echo $i; ?>" value="<?php print $element['tax_free_number']; ?>" style="border: 0px" ></td>
                        <td><input type="text" id="customer_type_<?php echo $i; ?>"  class="form-control" name="customer_type_<?php echo $i; ?>" value="<?php print $element['customer_type']; ?>" style="border: 0px"></td>
                        <td><input type="text" id="max_dept_<?php echo $i; ?>"  class="form-control" name="max_dept_<?php echo $i; ?>" value="<?php print $element['max_dept']; ?>" style="border: 0px"></td>
                        <td><input type="text" id="discount_limit_<?php echo $i; ?>"  class="form-control" name="discount_limit_<?php echo $i; ?>" value="<?php print $element['discount_limit']; ?>" style="border: 0px"></td>

                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        
        <input type="hidden" value="<?php echo $i; ?>" name="customers_form_number"/>
        <div id="customers_check_data_error_message" style="text-align: center"></div>
        <div class="form-group  col-xl-3">
            <button type="submit" onclick="customers_check_data()" id="customers_check_excel_data" name="save_excel_customer" class="btn btn-primary"><?php echo $this->lang->line('user_type_save_excel_table'); ?></button>
        </div>

        <div class="form-group  col-xl-3">
            <a href="<?php echo base_url(rest_path('Customers')) ?>" class="btn btn-danger"><?php echo $this->lang->line('user_type_cancel_excel_table'); ?></a>
        </div>
    </form>
</div>


















