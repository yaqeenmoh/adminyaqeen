<p class="text-danger" style="text-align: center; font-size: 20px">
    <?php echo $this->lang->line('printer_delete_message'); ?>
</p>

<?php
if ($delete_printer) {
    foreach ($delete_printer as $deletePrinter) {
        ?>
        <form action="<?php echo base_url(rest_path('Printer/delete_printer?printer_id_=' . $deletePrinter->id . '')) ?>" method="post">
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg float-md-left" data-dismiss="modal" value="<?php echo $this->lang->line('printer_close_delete'); ?>">
                <input type="submit" name="delete_printer" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line('printer_delete_yes'); ?>">
            </div>
        </form>
        <?php
    }
}
?>


