<table class="table table-striped table-bordered dataex-res-constructor" id="users_table">
    <thead>
        <tr>
            <th><?php echo $this->lang->line('show_users_user_name'); ?></th>
            <th><?php echo $this->lang->line('show_users_user_type'); ?></th> 
            <th><?php echo $this->lang->line('show_users_device'); ?></th> 
            <th><?php echo $this->lang->line('show_users_branch'); ?></th> 
            <th><?php echo $this->lang->line('show_users_location'); ?></th> 
            <th></th> 


        </tr>
    </thead>
    <tbody>
        <?php
        if ($branch_loc_id) {
            foreach ($branch_loc_id as $branch_loc_value) {
                if ($branch_loc_value->user_disable == 1) {
                    ?>
                    <tr>
                        <td><?php echo $branch_loc_value->username; ?></td>
                        <td><?php echo $branch_loc_value->name; ?></td>
                        <td><?php
                            if ($this->session->userdata('site_lang') == "arabic") {
                                echo $branch_loc_value->device_ar_name;
                            } else {
                                echo $branch_loc_value->device_en_name;
                            }
                            ?></td>
                        <td><?php
                            if ($this->session->userdata('site_lang') == "arabic") {
                                echo $branch_loc_value->branch_ar_name;
                            } else {
                                echo $branch_loc_value->branch_en_name;
                            }
                            ?></td>
                        <td><?php
                            if ($this->session->userdata('site_lang') == "arabic") {
                                echo $branch_loc_value->location_ar_name;
                            } else {
                                echo $branch_loc_value->location_en_name;
                            }
                            ?></td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="Users/update_users_information_by_id?id=<?php echo $branch_loc_value->user_id ?>" data-toggle="modal"   data-target="#edit_users"  class="btn btn-outline-success btn-round"><?php echo $this->lang->line('users_edit'); ?></a>
                                <a href="Users/delete_users?delete_user_id=<?php echo $branch_loc_value->user_id ?>"  data-toggle="modal"   data-target="#delete_user_type" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('users_delete'); ?></a>
                            </div>
                        </td>
                    </tr> 
                    <?php
                }
            }
        }
        ?>
    </tbody>


</table>

<script>

    $("a[data-target=#edit_users]").click(function (ev) {
        ev.preventDefault();
        var target = $(this).attr("href");

        $("#edit_users .modal-body").load(target, function () {
            $("#edit_users").modal("show");
        });
    });

    $("a[data-target=#delete_user_type]").click(function (ev) {
        ev.preventDefault();
        var target = $(this).attr("href");

        $("#delete_user_type .modal-body").load(target, function () {
            $("#delete_user_type").modal("show");
        });
    });

</script>