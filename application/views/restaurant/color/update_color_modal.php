<! –– start modal body  to edit color––>
<?php
if ($color) {

    foreach ($color as $value) {
        ?>

        <form action="Color/update_color?id=<?php echo $value->id; ?>" method="post">
            <label><?php echo $this->lang->line('ar_name'); ?> </label>
            <div class="form-group">
                <input name="color_ar_name" value="<?php echo $value->ar_name; ?>"  type="text" class="form-control">
            </div>
            <label><?php echo $this->lang->line('en_name'); ?> </label>
            <div class="form-group">
                <input  name="color_en_name" value="<?php echo $value->en_name; ?>"  type="text"  class="form-control">

            </div>

            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('color_modal_exit');?>">
                <input type="submit" name="update_color" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('color_modal_save');?>">
            </div>


        </form>
        <?php
    }
}?>
<! –– end modal body  to edit color––>