<div class="row_combo_<?php echo $new_id_row_combo; ?> card-block" id="app_card_collapse">
    <div class="form-group  col-xl-3 ">
        <label for="combo_name"><?php echo $this->lang->line('combo_name') ?></label>
        <div  class="position-relative has-icon-left">
            <input type="text" id="combo_name_" class="form-control"
                   placeholder="<?php echo $this->lang->line('combo_name') ?>" name="combo_name_<?php echo $new_id_row_combo; ?>"
                   value="" required="">

            <div class="form-control-position">
                <i class="icon-navicon2"></i>
            </div>
        </div>
    </div>


    <div class="form-group  col-xl-3">
        <label for="combo_price"><?php echo $this->lang->line('combo_price') ?></label>
        <div class="position-relative has-icon-left">
            <input type="number" id="combo_price_" class="form-control"
                   placeholder="<?php echo $this->lang->line('combo_price') ?>" name="combo_price_<?php echo $new_id_row_combo; ?>"
                   value="" required="">


            <div class="form-control-position">
                <i class="icon-navicon2"></i>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-3 mr-1">
        <label for="timesheetinput1"><?php echo $this->lang->line('combo_satrtDate') ?></label>
        <div class='input-group date' id='datetimepicker8'>
            <input id="combo_satrtDate_" type='datetime-local' class="form-control" name="combo_satrtDate_<?php echo $new_id_row_combo; ?>"/>
            <span class="input-group-addon">
                <span class="icon-calendar5"></span>
            </span>
        </div>
    </div>
    <div class="form-group col-xl-3 mr-1">
        <label for="timesheetinput1"><?php echo $this->lang->line('combo_endDate') ?></label>
        <div class='input-group date' id='datetimepicker8'>
            <input id="combo_endDate_" type='datetime-local' class="form-control" name="combo_endDate_<?php echo $new_id_row_combo; ?>"/>
            <span class="input-group-addon">
                <span class="icon-calendar5"></span>
            </span>
        </div>
    </div>
    <div class="input-group col-xl-3">
        <label for="select_branch_location" class="filled"><?php echo $this->lang->line('combo_select_location_branch') ?></label>
        <?php
        if ($branch_location) {
            foreach ($branch_location as $row) {
                ?>
                <label class="display-inline-block custom-control custom-radio ml-1">
                    <input value="<?php echo $row->branch_location_id; ?>" type="radio" name="branch_locatio_combo_<?php echo $new_id_row_combo; ?>" class="custom-control-input" required="">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description ml-0"><?php
                        if ($this->session->userdata('site_lang') == "arabic") {
                            echo $row->location_ar_name . "," . $row->branch_ar_name;
                        } else {
                            echo $row->location_en_name . "," . $row->branch_en_name;
                        }
                        ?></span>
                </label>

                <?php
            }
        }
        ?>
    </div>
    <div class="form-group col-xl-3 mr-1">
        <label class="mt-2" for="items"><?php echo $this->lang->line('combo_addItems'); ?></label>
        <div class="form-group" >
            <input type="text" id="search_add_multiple_combo" name="search" class="form-control" placeholder="Search"/>
            <input type="hidden"  id="combo_item_id_new" />
            <div id="auto_complete_items_new">
                <ul>

                </ul>
            </div>

            <!--          <div class="form-group" id='combo_select_id'>
            
                                    </div>-->
            <!--            <div id="combo_item_name_update">
            
                        </div>-->

        </div>
    </div>
    <div class="row">
        <div class="form-group  col-xl-2 mt-2" align="center">
            <div class="position-relative has-icon-left">

                <a onclick="delete_row_added_combo(<?php echo $new_id_row_combo; ?>)" class="btn btn-social btn-min-width mr-1 mb-1 btn-danger"><span class="icon-minus4 font-medium-3"></span>Delete</a>
            </div>
        </div>
    </div>

    <div id="combo_select_ids"> 
      
    </div>
</div>
<div class="card-block p-0" id="combo_add_form"></div>

<script>
    $("#search_add_multiple_combo").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: 'Combo/search_combo_items',
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function (data) {
                    var resp = $.map(data, function (obj) {
                        var name_id = obj.id + '_' + obj.en_name;
                        return name_id;
                    });

                    var count = resp.length;
                    $('#auto_complete_items_new > ul').html('');
                    for (i = 0; i < count; i++) {
                        var id = parseInt(resp[i]);
                        var combo_name = id.toString().length;
                        var combo_total_length = (combo_name) + 1;
                        var combo_final_name = resp[i].substr(combo_total_length);
                        $('#auto_complete_items_new > ul').append('<li id="combo_name_new' + id + '"><a onclick="combo_item_new(' + id + ')" id="combo_id_new' + id + '" class="text-primary">' + combo_final_name + '</a></li>');

                    }
                }
            });
        },
        minLength: 1
    });


    function combo_item_new(combo_id) {
        var combo_item = combo_id;
        $('#combo_item_id').val(combo_item);
        var name = $('#combo_name_' + combo_item).text();
        $('#search').val(name);



        $.ajax({
            url: "Combo/add_new_item_to_combo",
            type: 'GET',
            data: {combo_name: name, combo_id: combo_item},
            success: function (result) {
                $('#combo_select_ids').append(result);
            }

        });






//    alert(6)
//    var ids = [];
//    var combo_item = combo_id;
//    ids.push(combo_item);
//
////    $('#combo_item_ids_update').append(combo_item + ',');
//
//    $('#combo_item_id_new').val(combo_item);
//    var name = $('#combo_name_new' + combo_item).text();
//    $('#search_add_multiple_combo').val(name);
//
////    $('#selcted_items').append(name + ',');
//
//
//    $.ajax({
//        url: "Combo/add_new_item_multiple",
//        type: 'GET',
//        data: {name: name,item_id:combo_item},
//        success: function (result) {
//              $('#combo_select_id').append(result);
//            
//        }
//
//    });


    }

</script>