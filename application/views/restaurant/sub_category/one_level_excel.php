<form action="<?php echo base_url(rest_path('Sub_category/upload_sub_category_excel'))?>" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div class="form-group  col-xl-4">
        <label><?php echo $this->lang->line('upload_sub_category_excel') ?></label>
        <div class="position-relative has-icon-left">
            <fieldset class="form-group">
                <label class="custom-file center-block block">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="fileURL" required="">
                    <span class="custom-file-control"></span>
                </label>
                
            </fieldset>
        </div>
    </div>


    <div class="form-group  col-xl-3" style="margin-top: 8px">
        <label for="timesheetinput1"></label>
        <div class="position-relative has-icon-left">
            <div class="position-relative has-icon-left">
                <button type="submit" class="float-right btn btn-success"><?php echo $this->lang->line('sub_category_import_excel'); ?></button>
            </div>
        </div>
    </div>
</form>