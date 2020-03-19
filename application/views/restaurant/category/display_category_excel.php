
<div class="card-block card-dashboard">
    <form action="<?php echo base_url(rest_path('Category/insert_category_excel')); ?>" enctype="multipart/form-data" method="post" id="excel_category">
        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="category_excel_table">
            <thead>
                <tr>
                    <th scope="col"><?php echo $this->lang->line('category_ar_name_excel_table'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('category_en_name_excel_table'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('category_discount_excel_table'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('category_branch_location_excel_table'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('category_printer_excel_table'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('category_image_excel_table'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;

                foreach ($mydata as $key => $element) {
                    ?>
                    <tr>
                        <td><input type="text" class="form-control" id="category_ar_name_<?php echo $i?>" name="ar_name_<?php echo $i; ?>" value="<?php print $element['ar_name']; ?>" style="border: 0px" required=""></td>
                        <td><input type="text" class="form-control" name="en_name_<?php echo $i; ?>" value="<?php print $element['en_name']; ?>" style="border: 0px"></td>
                        <td><input type="number" class="form-control" name="discount_<?php echo $i; ?>" value="<?php print $element['discount']; ?>" style="border: 0px"></td>

                        <td>
                            <div class="input-group">
                                <?php
                                if ($category_branch_location) {
                                    foreach ($category_branch_location as $branch_location) {
                                        ?>
                                        <fieldset>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" value="<?php echo $branch_location->branch_location_id ?>" name="branch_location_<?php echo $i; ?>[]">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">
                                                    <?php
                                                    if ($this->session->userdata('site_lang') == "arabic") {
                                                        echo '<span>';
                                                        echo $branch_location->location_ar_name;
                                                        echo '</span>';
                                                        echo '- &nbsp;';
                                                        echo '<span>';
                                                        echo $branch_location->branch_ar_name;
                                                        echo '</span>';
                                                    } else {
                                                        echo '<span>';
                                                        echo $branch_location->location_en_name;
                                                        echo '</span>';
                                                        echo '- &nbsp;';
                                                        echo '<span>';
                                                        echo $branch_location->branch_en_name;
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
                        </td>
                        <td>

                            <?php
                            if ($get_printer) {
                                foreach ($get_printer as $printer) {
                                    ?>
                                    <fieldset>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="<?php echo $printer->id ?>" name="category_printer_<?php echo $i; ?>[]">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">
                                                <?php echo $printer->name; ?>    
                                            </span>
                                        </label>

                                    </fieldset>
                                    <?php
                                }
                            }
                            ?>


                        </td>
                        <td>
                            <div class="position-relative has-icon-left">
                                <label class="custom-file center-block block">
                                    <input type="file" id="file" name="image_<?php echo $i; ?>" class="custom-file-input">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                        </td>
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        
        <input type="hidden" value="<?php echo $i;?>" name="category_excel_form_number" />
        <div id="category_check_data_error_message" style="text-align: center"></div>
        <div class="form-group  col-xl-3">
            <button type="submit" id="save_category_excel" onclick="category_check_data()" name="save_excel" class="btn btn-primary"><?php echo $this->lang->line('category_save_excel_table'); ?></button>
        </div>
        <div class="form-group  col-xl-3">
            <a href="index" class="btn btn-danger"><?php echo $this->lang->line('category_cancel_excel_table'); ?></a>
        </div>

    </form>

</div>



















