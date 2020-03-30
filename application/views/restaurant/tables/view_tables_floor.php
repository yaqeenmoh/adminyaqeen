<div class="col-xl-3 col-md-6 col-sm-12">
    <div class="card" style="height: 500px; width: 950px; overflow-x: auto; overflow-y: auto;">
        <div class="card-body" >

            <?php
            $i = 0;
            if ($floor_id) {
                foreach ($floor_id as $floor) {
                    if ($floor->position_x && $floor->position_y != NULL) {
                        ?>

                        <div id="mydiv_<?php echo $i; ?>" style="position: absolute; z-index: 9;top: <?php echo $floor->position_x; ?>px;left: <?php echo $floor->position_y; ?>px">
                            <img src="<?php echo base_url('assets/lib/images/tables/' . $floor->image . ''); ?>" width="150px">
                            <input type="hidden" value="<?php echo $floor->table_id; ?>" id="table_id_<?php echo $i; ?>"/>
                        </div>


                        <?php
                        $i = $i + 1;
                    } else {
                        ?>
                        <div id="mydiv_<?php echo $i; ?>" style="position: absolute; z-index: 9;">
                            <img src="<?php echo base_url('assets/lib/images/tables/' . $floor->image . ''); ?>" width="150px">
                            <input type="hidden" value="<?php echo $floor->table_id; ?>" id="table_id_<?php echo $i; ?>"/>
                        </div>
                        <?php
                    }
                }
            }
            ?>
            <input type="hidden" value="<?php echo $i; ?>" id="counter"/>
            <div class="card-block pb-0">

            </div>
        </div>
    </div>
</div>


<div class="col-xl-3 col-md-6 col-sm-12" style="top: 455px">
    <form action="Tables/update_x_y" method="post" id="update_x_y">
        <div class="position-relative has-icon-left">
            <div class="position-relative has-icon-left">
                <a  onclick="document.getElementById('update_x_y').submit()" class="btn btn-social btn-min-width mr-1 mb-1 btn-info">
                    <span class="icon-save font-medium-3"></span>
                    <?php echo $this->lang->line('save_tables'); ?></a>
            </div>
        </div>
    </form>
</div>



<script>
    var table_count = $('#counter').val();
    console.log('table_count',table_count);

    for (var x = 0; x < table_count; x++) {

        dragElement(document.getElementById("mydiv_" + x));

        function dragElement(elmnt) {
            var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
            if (document.getElementById(elmnt.id + "header")) {
                /* if present, the header is where you move the DIV from:*/
                document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
            } else {
                /* otherwise, move the DIV from anywhere inside the DIV:*/
                elmnt.onmousedown = dragMouseDown;
            }


            function dragMouseDown(e) {
                e = e || window.event;
                e.preventDefault();
                // get the mouse cursor position at startup:
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = closeDragElement;
                // call a function whenever the cursor moves:
                document.onmousemove = elementDrag;
            }


            var table_id = $('#table_id_' + x).val();
            function elementDrag(e) {

                e = e || window.event;
                e.preventDefault();
                // calculate the new cursor position:
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
                // set the element's new position:
                var top = elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
                var left = elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";

                $.ajax({
                    url: 'Tables/update_x_y',
                    data: {top: top, left: left, table_id: table_id},
                    type: 'get',
                    success: function () {

                    }

                });

            }

            function closeDragElement() {
                /* stop moving when mouse button is released:*/
                document.onmouseup = null;
                document.onmousemove = null;
            }
        }


    }

</script>