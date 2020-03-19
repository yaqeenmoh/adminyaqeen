
<?php
if ($update_table) {
    foreach ($update_table as $updateTable) {
        ?>
        <form action="Tables/update_table?table_id=<?php echo $updateTable->id ?>" method="post">
            <label><?php echo $this->lang->line('edit_table_name'); ?> </label>
            <div class="form-group">
                <input type="text" name="table_name" value="<?php echo $updateTable->name; ?>" class="form-control">

            </div>

            <label><?php echo $this->lang->line('edit_table_chair_number'); ?> </label>
            <div class="form-group">
                <input type="number" name="table_chair_number" value="<?php echo $updateTable->chair_number; ?>" class="form-control">

            </div>

            <label><?php echo $this->lang->line('edit_table_floor'); ?> </label>
            <div class="form-group">
                <select class="form-control" name="table_floor">
                    <?php
                    if ($floor) {
                        foreach ($floor as $floors) {
                            ?>
                            <option value="<?php echo $floors->id ?>" <?php
                            if ($floors->id == $updateTable->floor_id) {
                                echo 'selected';
                            }
                            ?>>
                                        <?php
                                        if ($this->session->userdata('site_lang') == "arabic") {
                                            echo $floors->ar_name;
                                        } else {
                                            echo $floors->en_name;
                                        }
                                        ?>
                            </option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <label><?php echo $this->lang->line('edit_table_image'); ?> </label>
            <div class="form-group">
                <select class="form-control" name="table_image">
                    <option></option>

                    <option value="barAvailable.png" <?php if ($updateTable->image == "barAvailable.png") {
                echo 'selected';
            } ?>><?php echo $this->lang->line('tables_bar'); ?></option>
                    <option value="towChairAvailable.png" <?php if ($updateTable->image == "towChairAvailable.png") {
                echo 'selected';
            } ?>><?php echo $this->lang->line('tables_two_chair'); ?></option>
                    <option value="fourChairAvailable.png" <?php if ($updateTable->image == "fourChairAvailable.png") {
                echo 'selected';
            } ?>><?php echo $this->lang->line('tables_four_chair'); ?></option>
                    <option value="sixChairAvailable.png" <?php if ($updateTable->image == "sixChairAvailable.png") {
                echo 'selected';
            } ?>><?php echo $this->lang->line('tables_six_chair'); ?></option> 
                </select>
            </div>


            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('table_edit_close'); ?>">
                <input type="submit" name="save_update_table" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('table_edit_save'); ?>">
            </div>
        </form>
        <?php
    }
}
?>





