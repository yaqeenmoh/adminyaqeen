

<?php

class Combo_crud extends CI_Model {

    // global variable for table name from database
    private $table = "combo";

    public function getCombo($id) {
        $this->db->select('combo.disable as combo_disable,combo.id as combo_id, combo.name as combo_name ,'
                . 'combo.cost as combo_cost,combo.price as combo_price,'
                . 'combo.start_date,combo.end_date,'
                . ' branch_type.ar_name as branch_type_ar_name,branch_type.en_name as branch_type_en_name,'
                . ' location.ar_name as loc_ar_name,'
                . 'location.en_name as loc_en_name,location.id as location_id,'
                . 'combo.location_branch_id');
        $this->db->from('combo');
        $this->db->join('branch_location', 'combo.location_branch_id =  branch_location.id');
        $this->db->join('branch_type', 'branch_location.branch_id = branch_type.id');
        $this->db->join('location', 'location.id = branch_location.location_id');
        $sql = $this->db->get();
        return $sql->result();
    }

    public function getComboByComboId($id) {
        $this->db->select('combo.disable as combo_disable,combo.id as combo_id, combo.name as combo_name ,'
                . 'combo.cost as combo_cost,combo.price as combo_price,combo.location_branch_id,combo.start_date,combo.end_date');
        $this->db->from('combo');
        $this->db->join('branch_location', 'combo.location_branch_id =  branch_location.id');
        $this->db->join('branch_type', 'branch_location.branch_id = branch_type.id');
        $this->db->join('location', 'location.id = branch_location.location_id');
        $this->db->where('combo.id', (int) $id);
        $sql = $this->db->get();
        return $sql->result();
    }

    //insert combo

//    public function saveCombo($data_array, $item_array) {
//
//
//        $this->db->insert_batch($this->table, $data_array);
//        $comboId = $this->db->insert_id();
//        $comboItems = array(
//            'combo_id' => $comboId,
//            'item_id' => $itemArray
//        );
//        $this->db->insert_batch('combo_items', $item_array);
//    }

    
    
    
    
    
    
    public function saveCombo($data_array) {
        $this->db->insert_batch($this->table, $data_array);
        $comboId = $this->db->insert_id();
        return $comboId ;
    }

    
    
    
    
    public function saveComboItems($combo_items_data) {
        $this->db->insert('combo_items', $combo_items_data);
        
    }

    
    
    
    
    
    
    
    //update application data 

    public function updateComboData($id, $comboArray) {
        $this->db->where('id', $id);
        $this->db->update('combo', $comboArray);
    }

    public function insert_combo_items($comboItems) {
        if ($this->db->insert_batch('combo_items', $comboItems)) {
            return true;
        } else {
            return false;
        }
    }

    //delete application 

    public function deleteComboBycomboId($combo_id) {
        $this->db->where('id', $combo_id);
        $this->db->set('disable', 0);
        $this->db->update($this->table);
    }

}
