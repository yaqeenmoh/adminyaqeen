<p class="text-danger" style="text-align: center; font-size: 20px">
    <?php echo $this->lang->line('recipe_delete_message'); ?>
</p>

<?php
if ($delete_recipe) {
    foreach ($delete_recipe as $hide_recipe) {
        ?>
        <form action="<?php echo base_url(rest_path('Recipe/delete_recipe?recipe_id=' . $hide_recipe->id . '')); ?>" method="post">
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg float-md-left" data-dismiss="modal" value="<?php echo $this->lang->line('recipe_close_delete'); ?>">
                <input type="submit" name="delete_recipe" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line('recipe_delete_yes'); ?>">
            </div>
        </form>
        <?php
    }
}
?>


