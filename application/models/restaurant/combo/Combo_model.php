<?php

class Combo_model extends CI_Model {

    public function getBranch_location() {
        $this->db->select('* ,branch_location.id as branch_location_id,'
                . 'branch_type.ar_name as branch_ar_name,'
                . ' branch_type.en_name as branch_en_name,'
                . 'location.id as location_id,location.ar_name as location_ar_name,'
                . ' location.en_name as location_en_name');
        $this->db->from('branch_location');
        $this->db->join('branch_type', 'branch_type.id = branch_location.branch_id');
        $this->db->join('location', 'location.id = branch_location.location_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getItemsByComboId($id) {
        $this->db->select('items.id as item_id,item_information.ar_name as item_ar_name ,'
                . 'item_information.en_name as item_en_name,combo.id as combo_id');
        $this->db->from('combo_items');
        $this->db->join('combo', 'combo.id =combo_items.combo_id');
        $this->db->join('items', 'items.id =combo_items.item_id');
        $this->db->join('item_information', 'item_information.id = items.item_id');
        $this->db->where('combo_items.combo_id', (int) $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getItems() {
        $this->db->select('items.id as item_id ');
        $this->db->select('item_information.ar_name as item_ar_name,item_information.en_name as item_en_name ');
        $this->db->from('items');
        $this->db->join('item_information', 'item_information.id = items.item_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getItemsByItemId($id) {
        $this->db->select('items.id as item_id ');
        $this->db->select('item_information.ar_name as item_ar_name,item_information.en_name as item_en_name ');
        $this->db->from('items');
        $this->db->join('item_information', 'item_information.id = items.item_id');
        $this->db->where('items.id', (int) $id);
        $query = $this->db->get();
        return $query->result();
    }

}
