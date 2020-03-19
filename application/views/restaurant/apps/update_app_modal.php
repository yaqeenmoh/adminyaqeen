
<?php
if ($app) {

    foreach ($app as $value) {
        ?>

        <form action="Apps/update_app?id=<?php echo $value->id; ?>" method="post">
            <label><?php echo $this->lang->line('ar_name'); ?> </label>
            <div class="form-group">
                <input name="app_ar_name" value="<?php echo $value->ar_name; ?>"  type="text" class="form-control">
            </div>
            <label><?php echo $this->lang->line('en_name'); ?> </label>
            <div class="form-group">
                <input  name="app_en_name" value="<?php echo $value->en_name; ?>"  type="text"  class="form-control">

            </div>

            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('app_exit');?>">
                <input type="submit" name="update_app" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('app_save');?>">
            </div>


        </form>
        <?php
    }
}
