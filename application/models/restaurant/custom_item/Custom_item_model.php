<?php

class Custom_item_model extends CI_Model {

    public function get_items() {
        $this->db->select('items.id, item_information.id as item_info_id,items.custom, item_information.ar_name, item_information.en_name');
        $this->db->from('items');
        $this->db->join('item_information', 'item_information.id = items.item_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_custom_item() {
        $this->db->select('custom_item.id,custom_item.disable,item_information.ar_name as item_ar_name, item_information.en_name as item_en_name,recipe.ar_name as rec_ar_name, recipe.en_name as rec_en_name, custom_item.custom_option,custom_item.minimum,custom_item.maximum');
        $this->db->from('custom_item');
        $this->db->join('items', 'items.id = custom_item.item_id');
        $this->db->join('item_information', 'item_information.id = items.item_id');
        $this->db->join('recipe', 'recipe.id = custom_item.recipe_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_custom_item_by_id($custom_id) {
        $this->db->select('custom_item.id,custom_item.item_id,custom_item.recipe_id,custom_item.minimum,custom_item.maximum,item_information.ar_name as item_ar_name, item_information.en_name as item_en_name,recipe.ar_name as rec_ar_name, recipe.en_name as rec_en_name, custom_item.custom_option');
        $this->db->from('custom_item');
        $this->db->join('items', 'items.id = custom_item.item_id');
        $this->db->join('item_information', 'item_information.id = items.item_id');
        $this->db->join('recipe', 'recipe.id = custom_item.recipe_id');
        $this->db->where('custom_item.id',$custom_id);
        $query = $this->db->get();
        return $query->result();
    }

}
