
<div class="card-block card-dashboard">
    <form action="insert_brand_excel" enctype="multipart/form-data" method="post" id="brand_excel_table">
        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="brand_check_data">
            <thead>
                <tr>
                    <th scope="col"><?php echo $this->lang->line('excel_brand_ar_name'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('brand_en_name'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('excel_brand_branch_location_name'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($mydata as $key => $element) {
                    ?>
                    <tr>
                        <td> <input type="text" class="form-control" id="brand_ar_name_<?php echo $i; ?>" name="ar_name_<?php echo $i; ?>" value="<?php print $element['arabic_name']; ?>" style="border: 0px" required=""/></td>
                        <td><input type="text" class="form-control" name="en_name_<?php echo $i; ?>" value="<?php print $element['english_name']; ?>" style="border: 0px"></td>
                        <td> <?php
                            if ($branches) {
                                foreach ($branches as $branch) {
                                    ?>
                                    <label class="display-inline-block custom-control custom-checkbox ml-1">
                                        <input value="<?php echo $branch['branch_location_id']; ?>" type="checkbox" name="branch_location_id_<?php echo $i; ?>[]" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description ml-0"><?php
                                            if ($this->session->userdata('site_lang') == "arabic") {
                                                echo $branch['location_ar_name'] . "," . $branch['branch_ar_name'];
                                            } else {
                                                echo $branch['location_en_name'] . "," . $branch['location_en_name'];
                                            }
                                            ?></span>
                                    </label>
                                    <?php
                                }
                            }
                            ?>
                        </td>

                    </tr>

                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>

        <div id="brand_check_data_error_message" style="text-align: center"></div>

        <div class="form-group  col-xl-3">
            <button type="submit" onclick="brand_check_data()" id="brand_check_excel_data" name="save_excel" class="btn btn-primary" onclick="brand_excel_validation()"><?php echo $this->lang->line('brand_excel_save'); ?> </button>
        </div>

        <div class="form-group  col-xl-3">
            <a href="<?php echo base_url(rest_path('Brand')); ?>" class="btn btn-danger"><?php echo $this->lang->line('brand_excel_cancel'); ?></a>
        </div>
        <input type="hidden" value="<?php echo $i ?>" name="brand_excel_form_number"/>
    </form>
</div>

















