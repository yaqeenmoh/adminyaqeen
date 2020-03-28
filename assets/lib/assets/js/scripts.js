
$(function () {
    $('select').selectpicker();
});


(function (window, undefined) {
    'use strict';
})(window);
function editSection(id) {

    $.ajax({
        url: "section/edit",
        type: 'POST',
        data: {id: id},
        dataType: 'json',
        success: function (result) {
            var data = result['sections'];
            $.each(data, function (key, value) {

                $("#ar_name_edit").val(data[key].ar_name);
                $("#en_name_edit").val(data[key].en_name);
            });
        }
    });
}

/*****************************
 User Type 
 ****************************/

$("a[data-target=#edit_user_type]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#edit_user_type .modal-body").load(target, function () {
        $("#edit_user_type").modal("show");
    });
});

$("a[data-target=#delete_user_type]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#delete_user_type .modal-body").load(target, function () {
        $("#delete_user_type").modal("show");
    });
});

function add_new_insert_row_user_type() {
    var inputs = $("#insert_user_type").find($("input[type = 'text']"));
    var number = $("#insert_user_type").find($("input[type = 'number]"));
    var inputs_length = inputs.length;
    var number_length = number.length;
    var totals = (+inputs_length) + (+number_length);
    var id = totals + 1;

    $.ajax({
        url: 'User_type/get_users_type_form_by_ajax',
        data: {id: id},
        type: 'post',
        dataType: 'html',
        success: function (res) {
            $('#user_type_add_form').append(res);
            $('#users_type_form_number').val(id);
        }
    });
}

function delete_row_user_type(id) {
    $(".row_" + id + "").html("");
    var user_type_form_number = $('#users_type_form_number').val();
    var totals = user_type_form_number - 1;
    $('#users_type_form_number').val(totals);
}

function user_type_check_data() {
    var users_type_table = $('#user_type_excel_table').DataTable();

    if (!users_type_table.data().any()) {
        $('#users_type_check_data_error_message').html('<span class="text-danger" style="font-size:25px">Please Enter Data</span>');
        $('#user_type_check_excel_data').attr('type', 'button');
    }
}
/*****************************
 Users 
 ****************************/
$("a[data-target=#edit_users]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#edit_users .modal-body").load(target, function () {
        $("#edit_users").modal("show");
    });
});

function add_new_insert_row_users() {
    var inputs = $("#insert_users").find($("input[type ='text']"));
    var password = $("#insert_users").find($("input[type ='password']"));
    var inputs_length = inputs.length;
    var password_length = password.length;
    var id = (((+inputs_length) + (+password_length)) / 2) + 1;
    $.ajax({
        url: 'Users/get_users_form_by_ajax',
        data: {id: id},
        type: 'post',
        dataType: 'html',
        success: function (res) {
            $('#users_add_form').append(res);
            $('#users_form_number').val(id);
        }
    });
}

function delete_row_users(id) {
    $("#row_" + id + "").html("");
    var users_form_number = $('#users_form_number').val();
    var totals = users_form_number - 1;
    $('#users_form_number').val(totals);
}


$('#user_branch_loc_filter').change(function () {
    var branch_location_id = $(this).val();
    $.ajax({
        url: 'Users/branch_location_filter',
        data: {branch_location_id: branch_location_id},
        type: 'GET',
        dataType: 'html',
        success: function (res) {
            $('#users_table').html(res);
        }

    });
});


function users_check_data() {
    var users_table = $('#users_excel_table').DataTable();

    if (!users_table.data().any()) {
        $('#users_check_data_error_message').html('<span class="text-danger" style="font-size:25px">Please Enter Data</span>');
        $('#users_check_excel_data').attr('type', 'button');
    }
}

$('#save_users').click(function () {
    if ($('.branch_location_1').is(':checked')) {
        $(this).prop('checked', true);
        $('.branch_location_1').removeAttr('required', 'true');

    } else {
        $(this).prop('checked', false);
        $('.branch_location_1').attr('required', 'true');
    }
});

/*****************************
 Customers 
 ****************************/


$("a[data-target=#edit_customer]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#edit_customer .modal-body").load(target, function () {
        $("#edit_customer").modal("show");
    });
});

$("a[data-target=#delete_customer]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");


    $("#delete_customer .modal-body").load(target, function () {
        $("#delete_customer").modal("show");
    });
});


function add_new_insert_row_customer() {
    var inputs = $("#customer_information").find($("input[type = 'text']"));
    var inputs_length = inputs.length;
    var id = (inputs_length / 4) + 1;

    $.ajax({
        url: 'Customers/get_customers_form_by_ajax',
        data: {id: id},
        type: 'post',
        dataType: 'html',
        success: function (res) {
            $('#customers_add_form').append(res);
            $('#customers_form_numeber').val(id);
        }
    });


}

function delete_row_customer(id) {
    $(".row_" + id + "").html("");
    var customers_form_number = $('#customers_form_numeber').val();
    var Totals = customers_form_number - 1;
    $('#customers_form_numeber').val(Totals);
}

function customers_check_data() {
    var customers_table = $('#customers_excel_table').DataTable();

    if (!customers_table.data().any()) {
        $('#customers_check_data_error_message').html('<span class="text-danger" style="font-size:25px">Please Enter Data</span>');
        $('#customers_check_excel_data').attr('type', 'button');
    }
}


/*****************************
 Category
 ****************************/

$("a[data-target=#edit_category]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#edit_category .modal-body").load(target, function () {
        $("#edit_category").modal("show");
    });
});

$("a[data-target=#delete_category]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#delete_category .modal-body").load(target, function () {
        $("#delete_category").modal("show");
    });
});



function add_category_form() {
    var inputs = $("#insert_category").find($("input[type = 'text']"));
    var numbers = $("#insert_category").find($("input[type='number']"));
    var files = $("#insert_category").find($("input[type='file']"));
    var inputs_length = inputs.length;
    var number_length = numbers.length;
    var files_length = files.length;


    var collect = ((+inputs_length) + (+number_length) + (+files_length));
    var id = (collect / 4) + 1;

    $.ajax({
        url: 'Category/get_category_form_by_ajax',
        data: {id: id},
        type: 'post',
        dataType: 'html',
        success: function (res) {
            $('#category_insert_form').append(res);
            $('#category_form_number').val(id);
        }
    });
}

function delete_row_category(id) {
    $("#row_" + id + "").html("");
    var category_form_number = $('#category_form_number').val();
    var Total = category_form_number - 1;
    $('#category_form_number').val(Total);
}

$('#branch_loc_filter').change(function () {
    var branch_location_id = $(this).val();
    $.ajax({
        url: 'Category/branch_location_filter',
        data: {branch_location_id: branch_location_id},
        type: 'GET',
        dataType: 'html',
        success: function (res) {
            $('#category_table').html(res);
        }
    });
});

function category_check_data() {
    var category_table = $('#category_excel_table').DataTable();

    if (!category_table.data().any()) {
        $('#category_check_data_error_message').html('<span class="text-danger" style="font-size:25px">Please Enter Data</span>');
        $('#save_category_excel').attr('type', 'button');
    }
}

/*****************************
 Sub Category
 ****************************/

$('#sub_level').change(function () {
    var sub_level = $(this).val();
    if (sub_level == 0) {
        $.ajax({
            url: 'Sub_category/sub_level_view',
            data: {sub_level: sub_level},
            dataType: 'html',
            type: 'get',
            success: function (res) {
                $('#insert_sub_category').html(res);
            }
        });
    }
    if (sub_level == 1) {

        $.ajax({
            url: 'Sub_category/sub_other_level_view',
            data: {sub_level: sub_level},
            dataType: 'html',
            type: 'get',
            success: function (res) {
                $('#insert_sub_category').html(res);
            }
        });

    }
});


$('#sub_level_one_excel').change(function () {
    var sub_level = $(this).val();

    if (sub_level == 0) {
        $.ajax({
            url: 'Sub_category/sub_level_view_excel',
            data: {sub_level: sub_level},
            dataType: 'html',
            type: 'get',
            success: function (res) {
                $('#excel').html(res);
            }
        });
    }

    if (sub_level == 1) {
        $.ajax({
            url: 'Sub_category/sub_other_level_view_excel',
            data: {sub_level: sub_level},
            dataType: 'html',
            type: 'get',
            success: function (res) {
                $('#excel').html(res);
            }
        });
    }

});


function add_sub_category_other_level_form() {
    var inputs = $("#insert_sub_category").find($("input[type = 'text']"));
    var numbers = $("#insert_sub_category").find($("input[type = 'number']"));
    var inputs_length = inputs.length;
    var numbers_length = numbers.length;
    var id = (((+inputs_length) + (+numbers_length)) / 3) + 1;

    $.ajax({
        url: 'Sub_category/get_sub_category_other_level_form_by_ajax',
        data: {id: id},
        type: 'post',
        dataType: 'html',
        success: function (res) {
            $('#insert_sub_category').append(res);
            $('#sub_category_other_form_number').val(id);
        }
    });
}

function add_sub_category_form() {
    var inputs = $("#insert_sub_category").find($("input[type = 'text']"));
    var numbers = $("#insert_sub_category").find($("input[type = 'number']"));
    var inputs_length = inputs.length;
    var numbers_length = numbers.length;
    var id = (((+inputs_length) + (+numbers_length)) / 3) + 1;

    $.ajax({
        url: 'Sub_category/get_sub_category_form_by_ajax',
        data: {id: id},
        type: 'post',
        dataType: 'html',
        success: function (res) {
            $('#insert_sub_category').append(res);
            $('#sub_category_form_number').val(id);
        }
    });
}


function delete_row_sub_category_other_level(id) {
    $("#row_" + id + "").html("");
    var form_number_other_level = $('#sub_category_other_form_number').val();
    var totals = form_number_other_level - 1;
    $('#sub_category_other_form_number').val(totals);
}

function delete_row_sub_category(id) {
    $("#row_" + id + "").html("");
    var form_number_other_level = $('#sub_category_form_number').val();
    var totals = form_number_other_level - 1;
    $('#sub_category_form_number').val(totals);
}


$("a[data-target=#edit_sub_category]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#edit_sub_category .modal-body").load(target, function () {
        $("#edit_sub_category").modal("show");
    });
});

$("a[data-target=#delete_sub_category]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#delete_sub_category .modal-body").load(target, function () {
        $("#delete_sub_category").modal("show");
    });
});

function sub_category_check_data() {
    var sub_category_table = $('#sub_category_check_data').DataTable();

    if (!sub_category_table.data().any()) {
        $('#sub_category_check_data_error_message').html('<span class="text-danger" style="font-size:25px">Please Enter Data</span>');
        $('#sub_cat_check_excel_data').attr('type', 'button');
    }
}


/*****************************
 Tables
 ****************************/
function add_tables_form() {
    var inputs = $("#insert_tables").find($("input[type = 'text']"));
    var numbers = $("#insert_tables").find($("input[type = 'number']"));
    var inputs_length = inputs.length;
    var numbers_length = numbers.length;
    var id = (((+inputs_length) + (+numbers_length)) / 2) + 1;

    $.ajax({
        url: 'Tables/get_tables_form_by_ajax',
        data: {id: id},
        type: 'post',
        dataType: 'html',
        success: function (res) {
            $('#tables_insert').append(res);
            $('#tables_form_number').val(id);
        }
    });
}


$('#select_floor').change(function () {
    var floor = $(this).val();
    $.ajax({
        url: 'Tables/get_tables_floor',
        data: {floor: floor},
        type: 'get',
        success: function (res) {
            $('#draw_table').html(res);
        }
    });
});


$("a[data-target=#edit_table]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#edit_table .modal-body").load(target, function () {
        $("#edit_table").modal("show");
    });
});

$("a[data-target=#delete_table]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#delete_table .modal-body").load(target, function () {
        $("#delete_table").modal("show");
    });
});

function delete_row_tables(id) {
    $('.row_' + id).html("");
    var table_form_number = $('#tables_form_number').val();
    var Totals = table_form_number - 1;
    $('#tables_form_number').val(Totals);

}

/*****************************
 Printer
 ****************************/

function add_new_insert_row_printer() {
    var inputs = $("#insert_printer").find($("input[type = 'text']"));
    var inputs_length = inputs.length / 2;
    var id = inputs_length + 1;

    $.ajax({
        url: 'Printer/get_printer_form_by_ajax',
        data: {id: id},
        type: 'post',
        dataType: 'html',
        success: function (res) {
            $('#printer_add_form').append(res);
            $('#printers_form_number').val(id);
        }
    });
}

function delete_row_printer(id) {
    $(".row_" + id + "").html("");
    var printer_form_total = $('#printers_form_number').val();
    var Totals = printer_form_total - 1;
    $('#printers_form_number').val(Totals);
}


$("a[data-target=#edit_printer]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#edit_printer .modal-body").load(target, function () {
        $("#edit_printer").modal("show");
    });
});


$("a[data-target=#delete_printer]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#delete_printer .modal-body").load(target, function () {
        $("#delete_printer").modal("show");
    });
});


function ecxel_printer_check_table() {
    var table = $('#excel_printer_table').DataTable();

    if (!table.data().any()) {
        $('#excel_check_data_error_message').html('<span class="text-danger" style="font-size:25px">Please Enter Data</span>');
        $('#printer_save_excel').attr('type', 'button');
    }
}


/*****************************
 Custom item
 ****************************/

$("a[data-target=#custom_item]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#custom_item .modal-body").load(target, function () {
        $("#custom_item").modal("show");
    });
});

$("a[data-target=#delete_custom_item]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#delete_custom_item .modal-body").load(target, function () {
        $("#delete_custom_item").modal("show");
    });
});

$("a[data-target=#edit_custom_item]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#edit_custom_item .modal-body").load(target, function () {
        $("#edit_custom_item").modal("show");
    });
});

/*****************************
 Recipe
 ****************************/
function add_new_insert_row_recipe() {
    var inputs = $("#insert_recipe").find($("input"));
    var selects = $("#insert_recipe").find($("select"));
    var inputs_length = inputs.length;
    var select_length = selects.length;
    var id = ((+inputs_length) + (+select_length)) / 15;

    $.ajax({
        url: 'Recipe/get_recipe_form_by_ajax',
        data: {id: id},
        type: 'post',
        dataType: 'html',
        success: function (res) {
            $('#recipe_add_form').append(res);
        }
    });
}

function delete_recipe_form(recipe_id) {
    $(".row_" + recipe_id + "").html("");
}

$("a[data-target=#edit_recipe]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#edit_recipe .modal-body").load(target, function () {
        $("#edit_recipe").modal("show");
    });
});


$("a[data-target=#delete_recipe]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#delete_recipe .modal-body").load(target, function () {
        $("#delete_recipe").modal("show");
    });
});

function recipe_check_data() {
    var recipe_table = $('#recipe_check_data').DataTable();

    if (!recipe_table.data().any()) {
        $('#recipe_check_data_error_message').html('<span class="text-danger" style="font-size:25px">Please Enter Data</span>');
        $('#recipe_check_excel_data').attr('type', 'button');
    }
}

/*****************************
 Items
 ****************************/

$("a[data-target=#edit_items]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#edit_items .modal-body").load(target, function () {
        $("#edit_items").modal("show");
    });
});

$("a[data-target=#delete_items]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    $("#delete_items .modal-body").load(target, function () {
        $("#delete_items").modal("show");
    });
});




$('#multi_category').change(function () {
    var multi_id = $(this).val();
    $('#multi_category_id').val(multi_id);
});

function items_check_data() {
    var items_table = $('#items_check_data').DataTable();

    if (!items_table.data().any()) {
        $('#items_check_data_error_message').html('<span class="text-danger" style="font-size:25px">Please Enter Data</span>');
        $('#items_check_excel_data').attr('type', 'button');
    }
}



/*********************Brand**************************/
// edit brand
$("a[data-target=#edit_brand]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    // load the url and show modal on success
    $("#edit_brand .modal-body").load(target, function () {
        $("#edit_brand").modal("show");
    });
});

//delete brand
$("a[data-target=#delete_brand]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    // load the url and show modal on success
    $("#delete_brand .modal-body").load(target, function () {
        $("#delete_brand").modal("show");
    });
});


function addNewRowBrand() {
    var inputs = $("#brand_form").find($("input[type = 'text']"));
    var inputs_length = inputs.length;
    var id = (inputs_length / 2) + 1;

    $.ajax({
        url: "brand/addNewBrand",
        type: 'POST',
        data: {id: id},
        success: function (result) {
            $('#brand_add_form').append(result);
            $('#brand_form_number').val(id);

        }

    });
}

function delete_row_added_brand(id) {
    $(".row_brand" + id + "").html("");
}

function brand_check_data() {
    var brand_table = $('#brand_check_data').DataTable();

    if (!brand_table.data().any()) {
        $('#brand_check_data_error_message').html('<span class="text-danger" style="font-size:25px">Please Enter Data</span>');
        $('#brand_check_excel_data').attr('type', 'button');
    }
}
/*********************Color**************************/
// edit color
$("a[data-target=#edit_color]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    // load the url and show modal on success
    $("#edit_color .modal-body").load(target, function () {
        $("#edit_color").modal("show");
    });
});

//delete color
$("a[data-target=#delete_color]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    // load the url and show modal on success
    $("#delete_color .modal-body").load(target, function () {
        $("#delete_color").modal("show");
    });
});


function addNewRowColor() {

    var inputs = $("#color_form").find($("input"));
    var inputs_length = inputs.length / 2;
    var id = parseInt(inputs_length + 1);
    $.ajax({
        url: "Color/addNewColor",
        type: 'POST',
        data: {id: id},
        success: function (result) {
            $('#color_add_form').append(result);

        }

    });
}

function delete_row_added_color(id) {
    $(".row_color_" + id + "").html("");
}

function color_check_data() {
    var color_table = $('#color_check_data').DataTable();

    if (!color_table.data().any()) {
        $('#color_check_data_error_message').html('<span class="text-danger" style="font-size:25px">Please Enter Data</span>');
        $('#color_check_excel_data').attr('type', 'button');
    }
}

/*********************APPS**************************/
//edit app
$("a[data-target=#edit_app]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    // load the url and show modal on success
    $("#edit_app .modal-body").load(target, function () {
        $("#edit_app").modal("show");
    });
});

$("a[data-target=#delete_app]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    // load the url and show modal on success
    $("#delete_app .modal-body").load(target, function () {
        $("#delete_app").modal("show");
    });
});



function addNewRowApps() {
    var inputs = $("#app_form").find($("input"));
    var inputs_length = inputs.length / 2;
    var id = parseInt(inputs_length + 1);


    $.ajax({
        url: "Apps/addNewApp",
        type: 'POST',
        data: {id: id},
        success: function (result) {
            $('#app_add_form').append(result);
        }
    });
}

//delete added app row
function delete_row_added_app(id) {
    $(".row_app" + id + "").html("");
    $('.row_app').empty();
}

function app_check_data() {
    var app_table = $('#app_check_data').DataTable();

    if (!app_table.data().any()) {
        $('#app_check_data_error_message').html('<span class="text-danger" style="font-size:25px">Please Enter Data</span>');
        $('#app_check_excel_data').attr('type', 'button');
    }
}

/*********************Modifiers**************************/


//edit Modifier
$("a[data-target=#edit_modifier]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    // load the url and show modal on success
    $("#edit_modifier .modal-body").load(target, function () {
        $("#edit_modifier").modal("show");
    });
});
//delete modifier
$("a[data-target=#delete_modifier]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");


    $("#delete_modifier .modal-body").load(target, function () {
        $("#delete_modifier").modal("show");
    });
});



$('#select_modifier_type').change(function () {

    var select_type = $(this).val();

    if (select_type == "items") {
        $.ajax({
            url: 'Modifier/get_items',
            type: 'POST',
            success: function (result) {
                $('#add_modifier_form').html(result);


            }
        });
    }
    if (select_type == "category") {
        $.ajax({
            url: 'Modifier/get_all_category',
            type: 'POST',
            success: function (result) {
                $('#add_modifier_form').html(result);

            }
        });
    }
    if (select_type == "subcategory") {
        $.ajax({
            url: 'Modifier/get_sub_category',
            type: 'POST',
            success: function (result) {
                $('#add_modifier_form').html(result);


            }
        });
    }


});
function add_modifiers_item() {
    var item_id = $("#items_modifier option:selected").val();
    $('#selected_item_id').val(item_id);
    $('#item_recipe').modal('show');

}


function get_category_items() {
    var category_id = $("#category_modifier option:selected").val();
    $.ajax({
        url: 'Modifier/get_items_by_category',
        type: 'POST',
        data: {category_id: category_id},
        success: function (data) {
            $('#items_category').html(data);

        }
    });
}

function add_cat_modifiers_item() {
    var item_id = $("#category_items_modifier option:selected").val();
    $('#selected_cat_item_id').val(item_id);
    $('#category_item_recipe').modal('show');

}


function get_sub_category_items() {
    var sub_cat_id = $("#sub_category_modifier option:selected").val();
    $.ajax({
        url: 'Modifier/get_items_by_sub_category',
        type: 'POST',
        data: {sub_cat_id: sub_cat_id},
        success: function (data) {
            $('#items_sub_category').html(data);


        }
    });
}
function add_sub_cat_modifiers_item() {
    var item_id = $("#sub_category_items_modifier option:selected").val();
    $('#selected_sub_cat_item_id').val(item_id);
    $('#sub_category_item_recipe').modal('show');

}

function modifier_check_data() {
    var modifier_table = $('#app_check_data').DataTable();

    if (!modifier_table.data().any()) {
        $('#modifier_check_data_error_message').html('<span class="text-danger" style="font-size:25px">Please Enter Data</span>');
        $('#modifier_check_excel_data').attr('type', 'button');
    }
}
/*********************Combo**************************/

// edit Combo
$("a[data-target=#edit_combo]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");

    // load the url and show modal on success
    $("#edit_combo .modal-body").load(target, function () {
        $("#edit_combo").modal("show");
    });
});

//delete combo
$("a[data-target=#delete_combo]").click(function (ev) {
    ev.preventDefault();
    var target = $(this).attr("href");


    $("#delete_combo .modal-body").load(target, function () {
        $("#delete_combo").modal("show");
    });
});




function items_combo_add() {
    var combo = $('#items_combo').text();
    $('#search_items_combo').val(combo);
}

var item_id = $("#new_items_combo option:selected").val();

$('add_items_').val(item_id);

function addNewRowCombos() {
    var inputs = $("#combo_form").find($("input[type = 'text']"));
    var inputs_number = $("#combo_form").find($("input[type = 'number']"));
    var inputs_date = $("#combo_form").find($("input[type = 'datetime-local']"));
    var inputs_length = inputs.length;
    var inputs_number_length = inputs_number.length;
    var inputs_date_length = inputs_date.length;
    var total = ((+inputs_length) + (+inputs_number_length) + (+inputs_date_length)) / 5;
    var id = total + 1;



    $.ajax({
        url: "combo/addNewCombo",
        type: 'POST',
        data: {id: id},
        success: function (result) {
            $('#combo_add_form').append(result);
            $('#combo_form_number').val(id);
        }

    });

}

//delete combo added row
function delete_row_added_combo(id) {
    $(".row_combo_" + id + "").hide();
    $('.row_combo_').empty();
}

$("#search").autocomplete({
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
                $('#auto_complete_items > ul').html('');
                for (i = 0; i < count; i++) {
                    var id = parseInt(resp[i]);
                    var combo_name = id.toString().length;
                    var combo_total_length = (+combo_name) + 1;
                    var combo_final_name = resp[i].substr(combo_total_length);
                    $('#auto_complete_items > ul').append('<li id="combo_name_' + id + '"><a onclick="combo_item(' + id + ')" id="combo_id_' + id + '" class="text-primary">' + combo_final_name + '</a></li>');

                }
            }
        });
    },
    minLength: 1
});


var counter = 0;
function combo_item(combo_id) {
    var combo_item = combo_id;
    var item_id = $('#combo_item_id').val();
    if (item_id.length > 0) {
        var item_ids = item_id + '_' + combo_item;
        $('#combo_item_id').val(item_ids);
    } else {
        $('#combo_item_id').val(combo_item);
    }
    var name = $('#combo_name_' + combo_item).text();
    $('#search').val(name);
    counter++;
    $('#combo_item_id_counter').val(counter);

    $.ajax({
        url: "Combo/add_new_item_to_combo",
        type: 'GET',
        data: {combo_name: name, combo_id: combo_item},
        success: function (result) {
            $('#combo_select_ids').append(result);
        }

    });


}

