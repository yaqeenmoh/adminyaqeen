<div class="form-group" id='combo_select_id'>
    <?php
    if ($name) {
        
            ?>
            <label class="display-inline-block custom-control custom-checkbox">
                <input id="item_id_check" name='item_combo_id_[]' value="<?php echo $item_id;?>"  type="checkbox" checked="checked" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span id="selcted_items" class="custom-control-description"><?php
                                echo $name;
                               
                 ?></span>
            </label>
   
            <?php
        }
  
    ?>
</div>