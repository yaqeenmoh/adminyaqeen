
<div class="card-block card-dashboard">
    <form action="<?php echo base_url(rest_path('Apps/insert_app_excel'))?>" enctype="multipart/form-data" method="post">
        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="app_check_data">
            <thead>
                <tr>
                    <th scope="col"><?php echo $this->lang->line('excel_app_ar_name'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('excel_app_en_name'); ?></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;

                foreach ($mydata as $key => $element) {
                    ?>
                    <tr>
                        <td><input type="text" class="form-control" name="ar_name_<?php echo $i; ?>" value="<?php print $element['arabic_name']; ?>" style="border: 0px" required=""></td>
                        <td><input type="text" class="form-control" name="en_name_<?php echo $i; ?>" value="<?php print $element['english_name']; ?>" style="border: 0px"></td>

                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>

        <input type="hidden" value="<?php echo $i;?>" name="apps_form_number" />
        <div id="app_check_data_error_message" style="text-align: center"></div>
        <div class="form-group  col-xl-3">
            <button type="submit" onclick="app_check_data()" id="app_check_excel_data" name="save_excel" class="btn btn-primary"><?php echo $this->lang->line('excel_app_save'); ?></button>
        </div>

        <div class="form-group  col-xl-3">
            <a href="<?php echo base_url(rest_path('Apps'));?>" class="btn btn-danger"><?php echo $this->lang->line('excel_app_cancel'); ?></a>
        </div>
    </form>
</div>

















