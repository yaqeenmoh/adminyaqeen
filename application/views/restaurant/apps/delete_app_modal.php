<p class="text-danger" style="text-align: center; font-size: 20px">
    <?php echo $this->lang->line('app_delete_message'); ?>
</p>

<?php
if ($delete_app) {
    foreach ($delete_app as $deleteApp) {
        ?>
        <form action="<?php echo base_url(rest_path('Apps/delete_app?id=' . $deleteApp->id . '')) ?>" method="post">
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg float-md-left" data-dismiss="modal" value="<?php echo $this->lang->line('app_close_delete'); ?>">
                <input type="submit" name="delete_app" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line('app_delete_yes'); ?>">
            </div>
        </form>
        <?php
    }
}
?>