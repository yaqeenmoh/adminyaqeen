
<div class="card-block card-dashboard">
    <form action="insert_modifier_excel" enctype="multipart/form-data" method="post">
        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="app_check_data">
            <thead>
                <tr>
                    <th scope="col"><?php echo $this->lang->line('modifier-price'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('modifier-qty'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('modifier_item_name'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('modifier-qty'); ?></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($mydata as $key => $element) {
                    ?>
                    <tr>
                        <td><input type="text" class="form-control" name="price_<?php echo $i; ?>" value="<?php print $element['Price']; ?>" style="border: 0px"></td>
                        <td><input type="text" class="form-control" name="qty_<?php echo $i; ?>" value="<?php print $element['Quantity']; ?>" style="border: 0px"></td>
                        <td>
                            <select  id="items_modifier" name="item_modifier_id_<?php echo $i; ?>" class="form-control" style="border: 0px">
                                <option value="0"></option>
                                <?php
                                if (!empty($items_info)) {
                                    foreach ($items_info as $info) {
                                        ?>
                                        <option value="<?php echo $info->id; ?>">
                                            <?php
                                            if ($this->session->userdata('site_lang') == "arabic") {
                                                echo $info->ar_name;
                                            } else {
                                                echo $info->en_name;
                                            }
                                            ?> </option>
                                            <?php
                                    }
                                }
                                ?></select>
                        </td>
                        <td><select id="recipe_modifier" name="recipe_id_<?php echo $i; ?>"
                                     class="form-control" style="border: 0px">
                                <option value="0"></option>
                                <?php
                                if (!empty($recipe)) {
                                    foreach ($recipe as $data) {
                                        ?>
                                        <option value="<?php echo $data->id; ?>">
                                            <?php
                                            if ($this->session->userdata('site_lang') == "arabic") {
                                                echo $data->ar_name;
                                            } else {
                                                echo $data->en_name;
                                            }
                                            ?> </option>
                                            <?php
                                    }
                                }
                                ?></select></td>
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        <input type="hidden" value="<?php echo $i; ?>" name="modifier_form_number" />
        <div id="modifier_check_data_error_message" style="text-align: center"></div>
        <div class="form-group  col-xl-3">
            <button type="submit" onclick="modifier_check_data()" id="modifier_check_excel_data" name="save_excel" class="btn btn-primary"><?php echo $this->lang->line('modifier_excel_save'); ?></button>
        </div>

        <div class="form-group  col-xl-3">
            <a href="<?php echo base_url(rest_path('Modifier')); ?>" class="btn btn-danger"><?php echo $this->lang->line('modifier_excel_cancel'); ?></a>
        </div>
    </form>
</div>














