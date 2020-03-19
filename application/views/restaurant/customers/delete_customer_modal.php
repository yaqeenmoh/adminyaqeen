<p class="text-danger" style="text-align: center; font-size: 20px">
    <?php echo $this->lang->line('customer_delete_message'); ?>
</p>

<?php
if ($delete_customer) {
    foreach ($delete_customer as $delete_cust) {
        ?>
        <form action="<?php echo base_url(rest_path('Customers/delete_customer_information?customer_id=' . $delete_cust->id . '')); ?>" method="post">
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg float-md-left" data-dismiss="modal" value="<?php echo $this->lang->line('customer_close_delete'); ?>">
                <input type="submit" name="delete_customer" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line('customer_delete_yes'); ?>">
            </div>
        </form>
        <?php
    }
}
?>
