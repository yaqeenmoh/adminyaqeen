
<div class="card-block card-dashboard">
    <form action="<?php echo base_url(rest_path('Printer/insert_printer_excel'));?>" enctype="multipart/form-data" method="post" id="excel_printer">
       
        <table class="table table-striped table-bordered dataex-res-constructor text-center" id="excel_printer_table">
            <thead>
                <tr>
                    <th scope="col"><?php echo $this->lang->line('printer_name_excel_table'); ?></th>
                    <th scope="col"><?php echo $this->lang->line('printer_code_excel_table'); ?></th>
                </tr>
            </thead>
            <tbody>
              
                <?php
                $i = 0;

                foreach ($mydata as $key => $element) {
                    ?>
                    <tr>
                        <td><input type="text" class="form-control" id="name_<?php echo $i; ?>" name="name_<?php echo $i; ?>" value="<?php print $element['name']; ?>" style="border: 0px" required=""> </td>
                        <td><input type="text" class="form-control" id="code_<?php echo $i; ?>" name="code_<?php echo $i; ?>" value="<?php print $element['code']; ?>" style="border: 0px" required=""> </td>
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        
        <input type="hidden" value="<?php echo $i?>" name="printer_form_number" />
            
        <div id="excel_check_data_error_message" style="text-align: center"></div>
            
        <div class="form-group  col-xl-3">
            <button type="submit" name="printer_save_excel" onclick="ecxel_printer_check_table()" class="btn btn-primary" id="printer_save_excel"><?php echo $this->lang->line('printer_save_excel_table'); ?></button>
        </div>

        <div class="form-group  col-xl-3">
            <a href="<?php echo base_url(rest_path('Printer'));?>" class="btn btn-danger"><?php echo $this->lang->line('printer_cancel_excel_table'); ?></a>
        </div>
        
    </form>
</div>

















