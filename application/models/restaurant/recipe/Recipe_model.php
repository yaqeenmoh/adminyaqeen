<?php

class Recipe_model extends CI_Model {

    //function to get all recipe information
    public function get_recipe_information() {
        $this->db->select('recipe.id,recipe.ar_name as rec_ar_name,recipe.en_name as rec_en_name,recipe.details,recipe.barcode,recipe_information.invoice_number,recipe_information.size,recipe_information.color,recipe_information.weight,recipe_information.expirey_date,recipe_information.cost_price,recipe_information.sale_price,recipe_information.whole_price,recipe_information.qty,brand.en_name as brand_en_name,brand.ar_name as brand_ar_name,supplier.name,recipe_information.disable as info_disable,recipe.disable as rec_disable ');
        $this->db->from('recipe');
        $this->db->join('recipe_information', 'recipe.id = recipe_information.recipe_id','left');
        $this->db->join('brand', 'brand.id = recipe.brand_id','left');
        $this->db->join('supplier', 'supplier.id = recipe_information.supplier_id','left');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_recipe_by_id($recipe_id) {
        $this->db->select('recipe.brand_id,recipe.id,recipe.ar_name as rec_ar_name,recipe.en_name as rec_en_name,recipe.details,recipe.barcode,recipe_information.invoice_number,recipe_information.size,recipe_information.color,recipe_information.weight,recipe_information.expirey_date,recipe_information.cost_price,recipe_information.sale_price,recipe_information.whole_price,recipe_information.qty,brand.en_name as brand_en_name,brand.ar_name as brand_ar_name,supplier.name,recipe_information.supplier_id');
        $this->db->from('recipe');
        $this->db->join('recipe_information', 'recipe.id = recipe_information.recipe_id','left');
        $this->db->join('brand', 'brand.id = recipe.brand_id', 'left');
        $this->db->join('supplier', 'supplier.id = recipe_information.supplier_id', 'left');
        $this->db->where('recipe.id', $recipe_id);
        $query = $this->db->get();
        return $query->result();
    }

}
