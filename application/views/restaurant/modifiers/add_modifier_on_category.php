<div class="col-xl-3">
    

<label for="category_modifier"><?php echo $this->lang->line('modifier-category') ?></label>
<select onchange="get_category_items()"  id="category_modifier" name="category_modifier" class="selectBox border-success bg-white form-control">
    <option>
    </option>
    <?php
    if (!empty($all_category)) {
        foreach ($all_category as $category) {
            ?>
            <option value="<?php echo $category->id ?>">
                <?php
                if ($this->session->userdata('site_lang') == "arabic") {
                    echo $category->ar_name;
                } else {
                    echo $category->en_name;
                }
                ?> </option>
            <?php
        }
    }
    ?>


</select>
</div>
<div id='items_category'></div>


