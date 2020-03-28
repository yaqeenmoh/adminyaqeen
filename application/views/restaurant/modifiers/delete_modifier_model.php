
<p class="text-danger" style="text-align: center; font-size: 20px">
    <?php echo $this->lang->line('modifier_delete_message'); ?>
</p>

<?php
if ($delete_modifier) {
    foreach ($delete_modifier as $modifier) {
        ?>
        <form action="Modifier/deleteModifier?modifier_id=<?php echo $modifier->modifier_id; ?>" method="post">
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg float-md-left" data-dismiss="modal" value="<?php echo $this->lang->line('delete_modifier_btn'); ?>">
                <input type="submit" name="delete_modifier_yes" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line('modifier_delete_yes'); ?>">
                <input type="submit" name="delete_modifier_no" class="btn btn-success btn-lg" value="<?php echo $this->lang->line('modifier_delete_no'); ?>">
            </div>
        </form>
        <?php
    }
}
?>