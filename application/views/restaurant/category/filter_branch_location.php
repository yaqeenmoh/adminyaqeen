
<table class="table table-striped table-bordered dataex-res-constructor" id="category_table">
    <thead>
        <tr>
            <th><?php echo $this->lang->line('category_show_ar_name'); ?></th>
            <th><?php echo $this->lang->line('category_show_en_name'); ?></th> 
            <th><?php echo $this->lang->line('category_show_discount'); ?></th> 
            <th><?php echo $this->lang->line('category_show_branch'); ?></th> 
            <th><?php echo $this->lang->line('category_show_location'); ?></th> 
            <th><?php echo $this->lang->line('category_show_image'); ?></th> 
            <th></th> 
        </tr>
    </thead>
    <tbody>
        <?php
        if ($branch_loc_id) {
            foreach ($branch_loc_id as $branch_loc) {
                ?>
                <tr>
                    <td><?php echo $branch_loc->category_ar_name; ?></td> 
                    <td><?php echo $branch_loc->category_en_name; ?></td> 
                    <td><?php echo round($branch_loc->discount, 2); ?></td> 
                    <td>
                        <?php
                        if ($this->session->userdata('site_lang') == "arabic") {
                            echo $branch_loc->branch_ar_name;
                        } else {
                            echo $branch_loc->branch_en_name;
                        }
                        ?>

                    </td> 
                    <td>
                        <?php
                        if ($this->session->userdata('site_lang') == "arabic") {
                            echo $branch_loc->location_ar_name;
                        } else {
                            echo $branch_loc->location_en_name;
                        }
                        ?>
                    </td> 
                    <td>
                        <?php
                        if ($branch_loc->image == NUll) {
                            echo $this->lang->line('category_no_image');
                        } else {
                            ?>
                            <img src="<?php echo base_url('assets/lib/images/category/') . $branch_loc->image; ?>" width="50px" height="50px">
                        <?php }
                        ?>
                    </td> 
                    <td class="p-0">
                        <div class="btn-group mt-1" role="group" aria-label="Basic example">
                            <a href="Category/update_category?category_id=<?php echo $branch_loc->id; ?>" data-toggle="modal"   data-target="#edit_category"  class="btn btn-outline-success btn-round"><?php echo $this->lang->line('category_edit'); ?></a>
                            <a href="Category/delete_category?category_id=<?php echo $branch_loc->id; ?>"  data-toggle="modal"   data-target="#delete_category" class="btn btn-outline-danger btn-round"><?php echo $this->lang->line('category_delete'); ?></a>
                        </div>
                    </td>
                </tr>

                <?php
            }
        }
        ?>
    </tbody>
</table>

<script>
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
</script>