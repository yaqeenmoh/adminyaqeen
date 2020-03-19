<style>
    .ui-helper-hidden-accessible{
        display: none;
    }
</style>


<div class="card-block">

    <div class="form-group  col-xl-5">
        <label><?php echo $this->lang->line('custom_item_recipe_search'); ?> </label>
        <input type="text" id="search_recipe" name="search_recipe" placeholder="<?php echo $this->lang->line('custom_item_search'); ?>" class="form-control">
    </div>

    <div class="form-group col-xl-3" style="margin-top: 27px" id="search_recipe_done">
        <label for="timesheetinput1"></label>

    </div>

</div>

<div class="card-block p-0" style="margin-top: -21px; margin-left: 25px;">
    <ul id="recipe">

    </ul>
</div>


<form action="Custom_item/insert_custom_item" method="post">
    <input type="hidden" id="recipe_id" name="recipe_id"/>
    <input type="hidden" value="<?php echo $_GET['item_id']; ?>" name="item_id"/>
    <div class="card-block" id="recipy_option_1"></div>



    <div class="modal-footer">
        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="<?php echo $this->lang->line('custom_item_close'); ?>">
        <input type="submit" name="save_recipe_option" class="btn btn-outline-primary btn-lg" value="<?php echo $this->lang->line('custom_item_save'); ?>">
    </div>

</form>

<script>
    $("#search_recipe").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: 'Custom_item/search_recipe',
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function (data) {
                    var resp = $.map(data, function (obj) {
                        var name = obj.id + '_' + obj.en_name;
                        return name;
                    });


                    var count = resp.length;
                    $('#recipe').html('');
                    for (i = 0; i < count; i++) {
                        var id = parseInt(resp[i]);
                        var length_name = id.toString().length;
                        var total = (+length_name) + 1;
                        var recipe_name = resp[i].substr(total);
                        $('#recipe').append('<li id="recipe_name_'+id+'"><a  class="text-primary" onclick="get_recipe_id(' + id + ')" >' + recipe_name + '</a></li>');
                    }



                }
            });
        },
        minLength: 1
    });




    function get_recipe_id(resp_id) {
        $('#recipe_id').val(resp_id);
        var name = $('#recipe_name_'+resp_id).text();
        $('#search_recipe').val(name);
        $('#search_recipe_done').html(' <button type="button" id="search_recipe_done" class="float-right btn btn-outline-primary btn-round"><?php echo $this->lang->line('custom_item_done'); ?></button>');

    }


    $('#search_recipe_done').click(function () {

        var html = '';
        html += '<hr>';
        html += '<div class="row">';

        html += '<div class="form-group  col-xl-3">';
        html += '<label><?php echo $this->lang->line('custom_item_option'); ?></label>';
        html += '<div class="position-relative has-icon-left">';
        html += '<input type="text" name="option_1_1" class="form-control" placeholder="<?php echo $this->lang->line('custom_item_option'); ?>" >';
        html += '<div class="form-control-position">';
        html += '<i class="icon-navicon2"></i>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        html += '<div class="form-group  col-xl-3 p-0">';
        html += '<label><?php echo $this->lang->line('custom_item_option_price'); ?></label>';
        html += '<input type="number" step="0.01"  name="option1_price_1" class="form-control" placeholder="<?php echo $this->lang->line('custom_item_option_price'); ?>" >';
        html += '</div>';


        html += '<div class="form-group  col-xl-3">';
        html += '<label><?php echo $this->lang->line('custom_item_option_2'); ?></label>';
        html += '<div class="position-relative has-icon-left">';
        html += '<input type="text" name="option_2_1" class="form-control" placeholder="<?php echo $this->lang->line('custom_item_option_2'); ?>" >';
        html += '<div class="form-control-position">';
        html += '<i class="icon-navicon2"></i>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        html += '<div class="form-group  col-xl-3 p-0">';
        html += '<label><?php echo $this->lang->line('custom_item_option_price_2'); ?></label>';
        html += '<input type="number" step="0.01" name="option2_price_1" class="form-control" placeholder="<?php echo $this->lang->line('custom_item_option_price_2'); ?>" >';
        html += '</div>';

        html += '<div class="form-group  col-xl-3">';
        html += '<label><?php echo $this->lang->line('custom_item_option_3'); ?></label>';
        html += '<div class="position-relative has-icon-left">';
        html += '<input type="text" name="option_3_1" class="form-control" placeholder="<?php echo $this->lang->line('custom_item_option_3'); ?>" >';
        html += '<div class="form-control-position">';
        html += '<i class="icon-navicon2"></i>';
        html += '</div>';
        html += '</div>';
        html += '</div>';


        html += '<div class="form-group  col-xl-3 p-0">';
        html += '<label><?php echo $this->lang->line('custom_item_option_price_3'); ?></label>';
        html += '<input type="number" step="0.01" name="option3_price_1" class="form-control" placeholder="<?php echo $this->lang->line('custom_item_option_price_3'); ?>" >';
        html += '</div>';



        html += '<div class="form-group  col-xl-3">';
        html += '<label><?php echo $this->lang->line('custom_item_option_minimum'); ?></label>';
        html += '<input type="number" name="option_minimum_1" class="form-control" placeholder="<?php echo $this->lang->line('custom_item_option_minimum'); ?>" >';
        html += '</div>';

        html += '<div class="form-group  col-xl-3">';
        html += '<label><?php echo $this->lang->line('custom_item_option_maximum'); ?></label>';
        html += '<input type="number" name="option_maximum_1" class="form-control" placeholder="<?php echo $this->lang->line('custom_item_option_maximum'); ?>" >';
        html += '</div>';



        html += '<div id="recipy_option_multi"></div>';

        html += '<div class="form-group  col-xl-3">';
        html += '<label for="add"></label>';
        html += '<div class="position-relative has-icon-left">';
        html += '<a onclick="add_recipe_option()" class="btn btn-social btn-min-width mr-1 mb-1 btn-blue-grey">';
        html += '<span class="icon-plus-circle font-medium-3"></span>';
        html += '<?php echo $this->lang->line('custom_item_add_form'); ?> </a>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('#recipy_option_1').html(html);
    });


    function add_recipe_option() {

        var inputs = $("#recipy_option_multi").find($("input"));
        var inputs_length = inputs.length / 6;
        var form_id = inputs_length + 1;
        var id = form_id + 1;
        var html = '';


        html += '<div class="card-block p-0 row_' + id + '">';

        html += '<div class="form-group  col-xl-3">';
        html += '<label><?php echo $this->lang->line('custom_item_option'); ?></label>';
        html += '<div class="position-relative has-icon-left">';
        html += '<input type="text"  name="option_1_' + id + '" class="form-control" placeholder="Option 1" >';
        html += '<div class="form-control-position">';
        html += '<i class="icon-navicon2"></i>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        html += '<div class="form-group  col-xl-3 p-0">';
        html += '<label><?php echo $this->lang->line('custom_item_option_price'); ?></label>';
        html += '<input type="number" step="0.01" name="option1_price_' + id + '" class="form-control" placeholder="Price" >';
        html += '</div>';

        html += '<div class="form-group  col-xl-3">';
        html += '<label><?php echo $this->lang->line('custom_item_option_2'); ?></label>';
        html += '<div class="position-relative has-icon-left">';
        html += '<input type="text" name="option_2_' + id + '" class="form-control" placeholder="Option 2" >';
        html += '<div class="form-control-position">';
        html += '<i class="icon-navicon2"></i>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        html += '<div class="form-group  col-xl-3 p-0">';
        html += '<label><?php echo $this->lang->line('custom_item_option_price_2'); ?></label>';
        html += '<input type="number" step="0.01" name="option2_price_' + id + '" class="form-control" placeholder="Price" >';
        html += '</div>';

        html += '<div class="form-group  col-xl-3">';
        html += '<label><?php echo $this->lang->line('custom_item_option_3'); ?></label>';
        html += '<div class="position-relative has-icon-left">';
        html += '<input type="text"  name="option_3_' + id + '" class="form-control" placeholder="Option 3" >';
        html += '<div class="form-control-position">';
        html += '<i class="icon-navicon2"></i>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        html += '<div class="form-group  col-xl-3 p-0">';
        html += '<label><?php echo $this->lang->line('custom_item_option_price_3'); ?></label>';
        html += '<input type="number" step="0.01" name="option3_price_' + id + '" class="form-control" placeholder="Price" >';
        html += '</div>';

        html += '<div class="form-group  col-xl-3">';
        html += '<label><?php echo $this->lang->line('custom_item_option_minimum'); ?></label>';
        html += '<input type="number" name="option_minimum_' + id + '" class="form-control" placeholder="<?php echo $this->lang->line('custom_item_option_minimum'); ?>" >';
        html += '</div>';

        html += '<div class="form-group  col-xl-3">';
        html += '<label><?php echo $this->lang->line('custom_item_option_maximum'); ?></label>';
        html += '<input type="number" name="option_maximum_' + id + '" class="form-control" placeholder="<?php echo $this->lang->line('custom_item_option_maximum'); ?>" >';
        html += '</div>';

        html += '<div class="form-group  col-xl-3" style="margin-top: 8px;">';
        html += '<label for="add"></label>';
        html += '<div class="position-relative has-icon-left">';
        html += '<a onclick="delete_recipe_option(' + id + ')" class="btn btn-social btn-min-width mr-1 mb-1 btn-danger">';
        html += '<span class="icon-plus-circle font-medium-3"></span>';
        html += '<?php echo $this->lang->line('custom_item_delete_form'); ?></a>';
        html += '</div>';
        html += '</div>';

        html += '</div>';

        $('#recipy_option_multi').append(html);
    }

    function delete_recipe_option(form_id) {
        $('.row_' + form_id).hide();
    }

</script>
