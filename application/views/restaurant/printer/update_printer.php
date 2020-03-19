<?php
if ($edit_printer) {
    foreach ($edit_printer as $update_printer) {
        ?>

        <form action="<?php echo base_url(rest_path('Printer/update_printer?printer_id_=' . $update_printer->id . '')); ?>" method="post">



            <label><?php echo $this->lang->line('printer_name'); ?> </label>
            <div class="form-group">
                <input type="text"  name="printer_name" value="<?php echo $update_printer->name; ?>" class="form-control" required="">

            </div>

            <label><?php echo $this->lang->line('printer_code'); ?> </label>
            <div class="form-group">
                <input type="text"  name="printer_code" value="<?php echo $update_printer->printer_id ?>" class="form-control" required="">
            </div>


            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('printer_close_edit'); ?>">
                <input type="submit" name="edit_printer" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('printer_save_edit'); ?>">
            </div>


        </form>

        <?php
    }
}
?>
