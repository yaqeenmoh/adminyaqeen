<?php

class Modifier_model extends CI_Model {

    // global variable for table name from database
    private $table = "item_modifier";

    //get Modifier data 
    public function getModifierData() {
        $this->db->select('item_modifier.id as modifier_id,item_modifier.price as modifier_price,'
                . 'item_modifier.qty as modifier_qty,item_modifier.recipe_id as recipe_id,'
                . 'recipe.en_name as recipe_en_name,recipe.ar_name as recipe_ar_name,'
                . 'item_modifier.disable as modifier_disable,items.id as items_id,'
                . 'item_information.ar_name as items_ar_name,item_information.en_name as items_en_name');
        $this->db->from($this->table);
        $this->db->join('recipe', 'recipe.id = item_modifier.recipe_id');
        $this->db->join('items', 'items.id = item_modifier.item_id');
        $this->db->join('item_information', 'item_information.id = items.item_id');
        $sql = $this->db->get();
        return $sql->result();
    }

    //get Modifier data by modifier id
    public function get_modifier_by_id($id) {
        $this->db->select('item_modifier.*,item_modifier.id as modifier_id,'
                . 'item_modifier.price as modifier_price,'
                . 'item_modifier.qty as modifier_qty,item_modifier.item_id as item_modifier_id,'
                . 'recipe.en_name as recipe_en_name,recipe.ar_name as recipe_ar_name,'
                . 'item_modifier.recipe_id as recipe_id,'
                . 'item_information.ar_name as items_ar_name,item_information.en_name as items_en_name');
        $this->db->from('item_modifier');
        $this->db->join('recipe', 'recipe.id = item_modifier.recipe_id');
        $this->db->join('items', 'items.id = item_modifier.item_id');
        $this->db->join('item_information', 'item_information.id = items.item_id');
        $this->db->where('item_modifier.id', $id);
        $sql = $this->db->get();

        return $sql->result();
    }

    public function get_categories() {

        $this->db->select('*');
        $this->db->from('category');
        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_sub_categories() {

        $this->db->select('*');
        $this->db->from('sub_category');
        $sql = $this->db->get();
        return $sql->result();
    }

    public function getAllItems() {
        $this->db->select('*');
        $this->db->from('items');
        $this->db->join('item_information', 'item_information.id = items.item_id');
        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_recipe() {
        $this->db->select('*,recipe.id as recipe_id,recipe_information.size as recipe_size');
        $this->db->from('recipe');
        $this->db->join('recipe_information', 'recipe_information.recipe_id = recipe.id');
        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_items_by_category_id($id) {
        $this->db->select('*,');
        $this->db->from('items');
        $this->db->join('item_information', 'item_information.id = items.item_id');
        $this->db->where('category_id', (int) $id);
        $sql = $this->db->get();
        return $sql->result();
    }
    public function get_items_by_sub_category_id($id) {
        $this->db->select('*,');
        $this->db->from('items');
        $this->db->join('item_information', 'item_information.id = items.item_id');
        $this->db->where('sub_category_id', (int) $id);
        $sql = $this->db->get();
        return $sql->result();
    }

}
