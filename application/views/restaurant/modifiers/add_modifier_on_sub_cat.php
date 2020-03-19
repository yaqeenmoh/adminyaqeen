<div class="col-xl-3">
   
<label for="category_modifier"><?php echo $this->lang->line('modifier-subCategory') ?></label>
<select onchange="get_sub_category_items()" id="sub_category_modifier" name="subcat" class="selectBox border-success bg-white form-control">
     <option>
    </option>
    <?php
    if (!empty($sub_category)) {
        foreach ($sub_category as $info) {
            ?>
            <option value="<?php echo $info->id; ?>">
                <?php
                if ($this->session->userdata('site_lang') == "arabic") {
                    echo $info->ar_name;
                } else {
                    echo $info->en_name;
                }
                ?> </option>
            <?php
        }
    }
    ?>


</select>
</div>
<div id='items_sub_category'></div>