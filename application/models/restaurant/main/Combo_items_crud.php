

<?php

class Combo_items_crud extends CI_Model {

    // global variable for table name from database
    private $table = "combo_items";

    //update combo items data 

    public function delete_combo_items($item_id) {
        $this->db->where('item_id', $item_id);
        $this->db->delete('combo_items');
    }

    public function insert_combo_items($item_id,$combo_id) {
      $combo_items_array=array('item_id'=>$item_id,'combo_id'=>$combo_id);
        if ($this->db->insert('combo_items', $combo_items_array)) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_items_by_comboId($combo_id){
        $this->db->where('combo_id', $combo_id);
        $this->db->set('disable', 0);
        $this->db->update($this->table);
    }

}
