

<! –– start modal body  to delete brand ––>
<?php
if ($brandItems) {
    foreach ($brandItems as $value) {
        ?>
        <form action="Brand/deleteBrand?brand_id=<?php echo $value->id; ?>" method="post">
            <input type="radio" name="brand" value="items" 
                   checked="checked"><?php echo $this->lang->line('brand_delete_items');?><br>
            <input type="radio" name="brand" value="brand_items"><?php echo $this->lang->line('brand_delete');?><br>
         
              <div class="modal-footer">
                <input type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" value="<?php echo $this->lang->line('brand_modal_exit');?>">
                <input href="<?php echo base_url('restaurant/brand') ?>" type="submit" name="delete_brand" class="btn btn-outline-primary  " value="<?php echo $this->lang->line('brand_modal_save');?>">
            </div>
        </form>
        <?php
    }
}?>
<! –– end modal body  to delete brand ––>