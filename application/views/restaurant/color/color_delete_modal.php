
<! –– start modal body  to delete color––>
<?php
if ($colorItems) {
    foreach ($colorItems as $value) {
        ?>
        <form action="Color/delete_color?id=<?php echo $value->id; ?>" method="post">
            <input type="radio" name="color" value="items" 
                   checked="checked"><?php echo $this->lang->line('color_delete_items');?><br>
            <input type="radio" name="color" value="brand_items"><?php echo $this->lang->line('color_delete');?><br>
         
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal"><?php echo $this->lang->line('color_modal_exit');?></button>
                <button type="submit" name="delete_color" class="btn btn-outline-primary"><?php echo $this->lang->line('color_modal_save');?></button>
            </div>
        </form>
        <?php
    }
}
?>
<! –– end modal body  to delete color––>
