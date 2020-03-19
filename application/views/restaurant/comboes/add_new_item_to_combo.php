<div class="form-group" id='combo_select_ids'>
    <?php
    if ($combo_name) {
        ?>
        <label class="display-inline-block custom-control custom-checkbox">
            <input id="item_id_check" name='item_combo_id_' value="<?php echo $combo_id; ?>"  type="checkbox" checked="checked" class="custom-control-input">
            <span class="custom-control-indicator"></span>
            <span id="selcted_items" class="custom-control-description"><?php
                echo $combo_name;
                ?></span>
        </label>

        <?php
        
    }
    
    ?>
    
</div>