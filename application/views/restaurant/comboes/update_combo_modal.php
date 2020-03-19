
<?php
if ($combo_info) {
    foreach ($combo_info as $info) {

        $startdatetime = new DateTime($info->start_date);
        $enddatetime = new DateTime($info->end_date);
        ?>

        <form action="Combo/update_combo?combo_id=<?php echo $info->combo_id; ?>" method="post">

            <label><?php echo $this->lang->line('combo_name'); ?> </label>
            <div class="form-group">
                <input name="combo_name" value="<?php echo $info->combo_name; ?>"  type="text" class="form-control">
            </div>

            <label><?php echo $this->lang->line('combo_price'); ?> </label>
            <div class="form-group">
                <input  name="combo_price" value="<?php echo round($info->combo_price, 3); ?>"  type="text"  class="form-control">

            </div>

            <label><?php echo $this->lang->line('combo_endDate'); ?> </label>
            <div class="form-group">
                <input id="combo_end_date" type="datetime-local"  name="combo_endDate" value="<?php echo $enddatetime->format('m-d-Y'); ?>" class="form-control">

            </div>

            <label><?php echo $this->lang->line('combo_items'); ?> </label>
            <div class="form-group" id='combo_select_id'>
                <?php
                if ($combo_items) {
                    foreach ($combo_items as $item) {
                        ?>
                        <label class="display-inline-block custom-control custom-checkbox">
                            <input id="item_id_check" name='item_combo_id_[]' value="<?php echo $item->item_id; ?>"  type="checkbox" checked="checked" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span id="selcted_items" class="custom-control-description"><?php
                                if ($this->session->userdata('site_lang') == "arabic") {
                                    echo $item->item_ar_name;
                                } else {
                                    echo $item->item_en_name;
                                }
                                ?></span>
                        </label>
                        <?php
                    }
                }
                ?>
            </div>

                   <div class="form-group col-xl-5 mr-1">
                    <label class="mt-2" for="items"><?php echo $this->lang->line('combo_addItems'); ?></label>
                    <div class="form-group" >
                        <input type="text" id="search_update" name="search" class="form-control" placeholder="Search"/>
                        <input type="hidden"  id="combo_item_id" />
                        <div id="auto_complete_items_update">
                            <ul>
                            
                            </ul>
                        </div>
                        
                        <div id="combo_item_ids_update">
                           
                        </div>
                        <div id="combo_item_name_update">
                           
                        </div>

                    </div>
                </div>
   

            <div class = "modal-footer">
                <input type = "reset" class = "btn btn-outline-secondary btn-lg" data-dismiss = "modal" value = "<?php echo $this->lang->line('combo_exit'); ?>">
                <input type = "submit" name = "update_combo" class = "btn btn-outline-primary btn-lg" value = "<?php echo $this->lang->line('combo_save'); ?>">
            </div>


        </form>

        <?php
    }
}
?>
<script>
    $("#search_update").autocomplete({
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
                $('#auto_complete_items_update > ul').html('');
                for (i = 0; i < count; i++) {
                    var id = parseInt(resp[i]);
                    var combo_name = id.toString().length;
                    var combo_total_length = (combo_name) + 1;
                    var combo_final_name = resp[i].substr(combo_total_length);
                    $('#auto_complete_items_update > ul').append('<li id="combo_name__update' + id + '"><a onclick="combo_item(' + id + ')" id="combo_id_update' + id + '" class="text-primary">' + combo_final_name + '</a></li>');

                }
            }
        });
    },
    minLength: 1
});


function combo_item(combo_id) {
    var ids = [];
    var combo_item = combo_id;
    ids.push(combo_item);

//    $('#combo_item_ids_update').append(combo_item + ',');

    $('#combo_item_id').val(combo_item);
    var name = $('#combo_name__update' + combo_item).text();
    $('#search_update').val(name);

//    $('#selcted_items').append(name + ',');


    $.ajax({
        url: "Combo/add_new_items",
        type: 'GET',
        data: {name: name,item_id:combo_item},
        success: function (result) {
              $('#combo_select_id').append(result);
            
        }

    });


}

</script>
