<style>
    .ui-helper-hidden-accessible{
        display: none;
    }
</style>

<div class="form-group  col-xl-3 ">
    <label>Search</label>

    <input type="text" id="search" name="search" class="form-control"/>

</div>

<div class="form-group  col-xl-3" style="margin-top: 25px;">
    <button data-toggle="modal"  data-target="#sub_category_item_recipe"  class="btn btn-outline-success btn-round">Done</button>
</div>

<!--<label for="sub_category_items"><?php echo $this->lang->line('modifier-items') ?></label>
<select onchange="add_sub_cat_modifiers_item()"  id="sub_category_items_modifier" name="category_items_modifier" class="selectBox border-success bg-white form-control">
<option><?php echo $this->lang->line('modifier-items') ?></option>
<?php
if (!empty($items_sub_cat)) {
    foreach ($items_sub_cat as $items) {
        ?>

                    <option  name="item_id" value="<?php echo $items->id ?>">
        <?php
        if ($this->session->userdata('site_lang') == "arabic") {
            echo $items->ar_name;
        } else {
            echo $items->en_name;
        }
        ?> </option>
        <?php
    }
}
?>


</select>-->

<! –– start modal body  to add  modifier ––>

<div class="modal animated lightSpeedIn text-xs-left" id="sub_category_item_recipe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <label class="modal-title text-text-bold-600" id="myModalLabel33"><?php echo $this->lang->line('recipe_en_name'); ?></label>
            </div>

            <div class="modal-body">
                <div class="card">
                    <div class="card-body collapse in">
                        <div class="card-block">
                            <form method="post" id="add_items_modifiers" action="Modifier/save_item_modifier">
                                <input type="hidden" value="0" id="selected_sub_cat_item_id" name="modifierItemId">
                                <table class = "table">
                                    <thead>
                                        <tr>
                                            <th scope = "col"><?php echo $this->lang->line('Recipe_modifier'); ?></th>
                                            <th scope = "col"><?php echo $this->lang->line('price_modifier'); ?></th>
                                            <th scope = "col"><?php echo $this->lang->line('qty_modifier'); ?></th>
                                            <th scope = "col"><?php echo $this->lang->line('size_modifier'); ?></th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if ($recipe) {
                                        $count = 1;
                                        foreach ($recipe as $data) {
                                            ?>
                                            <tbody>
                                                <tr>  
                                                    <td>
                                                        <label class="display-inline-block custom-control custom-checkbox">
                                                            <input value="<?php echo $data->recipe_id; ?>" name="<?php echo 'recipe_id_' . $count; ?>" type="checkbox"  class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description"><?php
                                                                if ($this->session->userdata('site_lang') == "arabic") {
                                                                    echo $data->ar_name;
                                                                } else {
                                                                    echo $data->en_name;
                                                                }
                                                                ?></span>
                                                        </label>
                                                    </td>
                                                    <td> <input  name="<?php echo 'modifier_price_' . $count; ?>" class="text-center border-1 form-control form-control-sm"
                                                                 type="number" placeholder="<?php echo $this->lang->line('price_modifier'); ?>"></td>
                                                    <td><input id="modifier_qty_" name="<?php echo 'modifier_qty_' . $count; ?>" class="text-center border-1 form-control form-control-sm"
                                                               type="number"  step="0.01" placeholder="<?php echo $this->lang->line('qty_modifier'); ?>"></td>
                                                    <td><input class="text-center border-1 form-control form-control-sm"
                                                               type="text" placeholder="<?php echo $this->lang->line('size_modifier'); ?>" value="<?php echo $data->size; ?>"></td>

                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>



                                <div >
                                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('modifier_modal_exit'); ?>">
                                    <input type="submit" name="save_modifier" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('modifier_modal_save'); ?>">
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<! –– end modal body  to add  modifier ––>

<script>
    $("#search").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: 'Modifier/search',
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function (data) {
                    var resp = $.map(data, function (obj) {
                        return obj.en_name;
                    });
                    var resp_id = $.map(data, function (obj) {
                        return obj.id;
                    });

                    response(resp);
                    $('#selected_sub_cat_item_id').val(resp_id);
                }
            });
        },
        minLength: 1
    });
</script>
