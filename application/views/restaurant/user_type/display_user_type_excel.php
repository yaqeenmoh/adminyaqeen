
<div class="card-block card-dashboard">
    <form action="<?php echo base_url(rest_path('User_type/insert_user_type_excel')); ?>" enctype="multipart/form-data" method="post" id="excel_user_type">
        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="user_type_excel_table">
            <thead>
                <tr>
                    <th scope="col"><?php echo $this->lang->line('user_type_name_excel_table'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('user_type_percentage_excel_table'); ?></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;

                foreach ($mydata as $key => $element) {
                    ?>
                    <tr>
                        <td><input type="text" id="user_type_<?php echo $i; ?>" class="form-control" name="user_type_<?php echo $i; ?>" value="<?php print $element['name']; ?>" style="border: 0px" required=""> </td>
                        <td><input type="text" id="discount_percentage_<?php echo $i; ?>" class="form-control" name="discount_percentage_<?php echo $i; ?>" value="<?php print $element['discount_percentage']; ?>" style="border: 0px"> </td>

                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>

        <input type="hidden" value="<?php echo $i?>" name="users_type_form_number" />
        <div id="users_type_check_data_error_message" style="text-align: center"></div>
        <div class="form-group  col-xl-3">
            <button type="submit" onclick="user_type_check_data()" id="user_type_check_excel_data" name="save_excel" class="btn btn-primary"><?php echo $this->lang->line('user_type_save_excel_table'); ?></button>
        </div>

        <div class="form-group  col-xl-3">
            <a href="<?php echo base_url(rest_path('User_type'))?>" class="btn btn-danger"><?php echo $this->lang->line('user_type_cancel_excel_table'); ?></a>
        </div>
    </form>
</div>


















