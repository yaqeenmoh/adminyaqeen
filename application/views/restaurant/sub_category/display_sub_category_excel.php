
<div class="card-block card-dashboard">
    <form action="<?php echo base_url(rest_path('Sub_category/insert_sub_category_excel')) ?>" enctype="multipart/form-data" method="post" id="sub_category_excel_table">
        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="sub_category_check_data">
            <thead>
                <tr>
                    <th scope="col"><?php echo $this->lang->line('sub_category_ar_name_excel_table'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('sub_category_en_name_excel_table'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('sub_category_discount_excel_table'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('sub_category_category_excel_table'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;

                foreach ($mydata as $key => $element) {
                    ?>
                    <tr>
                        <td><input type="text" class="form-control" id="ar_name_<?php echo $i; ?>" name="ar_name_<?php echo $i; ?>" value="<?php print $element['ar_name']; ?>" style="border: 0px" required=""></td>
                        <td><input type="text" class="form-control" name="en_name_<?php echo $i; ?>" value="<?php print $element['en_name']; ?>" style="border: 0px"></td>
                        <td><input type="number" class="form-control" name="discount_<?php echo $i; ?>" value="<?php print $element['discount']; ?>" style="border: 0px"></td>

                        <td>
                            <div class="input-group">
                                <select class="form-control" name="category_<?php echo $i; ?>">
                                    <option><?php echo $this->lang->line('sub_category_select_category'); ?></option>
                                    <?php
                                    if ($category) {
                                        foreach ($category as $category_value) {
                                            ?>
                                            <option value="<?php echo $category_value->id; ?>">
                                                <?php
                                                if ($this->session->userdata('site_lang') == "arabic") {
                                                    echo $category_value->ar_name;
                                                } else {
                                                    echo $category_value->en_name;
                                                }
                                                ?>

                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                        </td>

                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>

        <input type="hidden" value="<?php echo $i; ?>" name="sub_category_excel_form_number"/>

        <div id="sub_category_check_data_error_message" style="text-align: center"></div>

        <div class="form-group  col-xl-3">
            <button type="submit" onclick="sub_category_check_data()" id="sub_cat_check_excel_data" class="btn btn-primary"><?php echo $this->lang->line('sub_category_save_excel_table'); ?></button>
        </div>
        <div class="form-group  col-xl-3">
            <a href="<?php echo base_url(rest_path('Sub_category')); ?>" class="btn btn-danger"><?php echo $this->lang->line('sub_category_cancel_excel_table'); ?></a>
        </div>

    </form>

</div>



















