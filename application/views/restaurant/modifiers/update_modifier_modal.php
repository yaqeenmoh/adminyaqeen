

<! –– start modal body  to edit modifier ––>
<?php
if ($modifier) {
    foreach ($modifier as $value) {
        ?>
        <form action="Modifier/update_modifier?modifier_id=<?php echo $value->id; ?>" method="post">
            <label><?php echo $this->lang->line('modifier-price'); ?> </label>
            <div class="form-group">
                <input type="text" name="modifier_price" value="<?php echo round($value->modifier_price, 3); ?>" class="form-control">

            </div>
            <label><?php echo $this->lang->line('modifier-qty'); ?> </label>
            <div class="form-group">
                <input type="text" name="modifier_qty" value="<?php echo ($value->modifier_qty); ?>" class="form-control">

            </div>
            <div class="form-group">
                <input type="hidden" name="item_modifier_id" value="<?php echo ($value->item_modifier_id); ?>" class="form-control">

            </div>
            <div class="form-group">
                <input type="hidden" name="modifier_recipe_id" value="<?php echo ($value->recipe_id); ?>" class="form-control">

            </div>


            <label><?php echo $this->lang->line('item_en_name'); ?> </label>
            <div class="form-group">



                <select  name="item_en_name" class="selectBox border-success bg-white form-control">

                    <?php
                    if (!empty($items)) {
                        foreach ($items as $item) {
                            ?>
                            <option value="<?php echo $item->id ?>">
                                <?php
                           
                                    echo '<span>';
                                    echo $item->en_name;
                                }
                                ?> </option>
                            <?php
                        }
                    }
                    ?>
                </select>

            <label><?php echo $this->lang->line('item_ar_name'); ?> </label>
            <div class="form-group">



                <select  name="item_ar_name" class="selectBox border-success bg-white form-control">

                    <?php
                    if (!empty($items)) {
                        foreach ($items as $item) {
                            ?>
                            <option value="<?php echo $item->id ?>">
                                <?php
                                    echo '<span>';
                                    echo $item->ar_name;
                              
                                ?> </option>
                            <?php
                        
                    }
                    }
                    ?>
                </select>
                <label><?php echo $this->lang->line('recipe_ar_name'); ?> </label>
                
                <select  name="item_ar_name" class="selectBox border-success bg-white form-control">

                    <?php
                    if (!empty($recipes)) {
                        foreach ($recipes as $recipe) {
                            ?>
                            <option value="<?php echo $recipe->id ?>">
                                <?php
                                    echo '<span>';
                                    echo $recipe->ar_name;
                              
                                ?> </option>
                            <?php
                        
                    }
                    }
                    ?>
                </select>
                
                <label><?php echo $this->lang->line('recipe_en_name'); ?> </label>
                
                <select  name="recipe_en_name" class="selectBox border-success bg-white form-control">

                    <?php
                    if (!empty($recipes)) {
                        foreach ($recipes as $recipe) {
                            ?>
                            <option value="<?php echo $recipe->id ?>">
                                <?php
                                    echo '<span>';
                                    echo $recipe->en_name;
                              
                                ?> </option>
                            <?php
                        
                    }
                    }
                    ?>
                </select>





            </div>


               


            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('modifier_modal_exit'); ?>">
                <input type="submit" name="update_modifier" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('modifier_modal_save'); ?>">
            </div>
        </form>

        <?php
    }
?>
<! –– end modal body  to edit brand ––>