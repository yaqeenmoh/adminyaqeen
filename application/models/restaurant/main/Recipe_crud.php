<?php

class Recipe_crud extends CI_Model {

    //function to get brand
    public function get_brand() {
        $query = $this->db->get('brand');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //function to get supplier
    public function get_supplier() {
        $query = $this->db->get('supplier');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_recipe_by_id($recipe_id) {
        $query = $this->db->get_where('recipe', array('id' => $recipe_id));
        return $query->result();
    }

    public function update_recipe($recipe_id, $data) {
        $this->db->where('id', $recipe_id);
        $this->db->update('recipe', $data);
    }

    public function update_recipe_information($recipe_id, $data) {
        $this->db->where('recipe_id', $recipe_id);
        $this->db->update('recipe_information', $data);
    }

    public function delete_recipe($recipe_id) {
        $this->db->set('disable', '0');
        $this->db->where('id', $recipe_id);
        $this->db->update('recipe');

        $this->db->set('disable', '0');
        $this->db->where('recipe_id', $recipe_id);
        $this->db->update('recipe_information');
    }

    public function insert_recipe($data) {
        if ($this->db->insert_batch('recipe', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_recipe_information($ar_name, $en_name, $details, $barcode, $brand_id, $invoive_number, $size, $color, $weight, $cost_price, $sale_price, $whole_price, $expiry_date, $qty, $supplier) {
        $recipe = array(
            'ar_name' => $ar_name,
            'en_name' => $en_name,
            'details' => $details,
            'barcode' => $barcode,
            'brand_id' => $brand_id
        );
        $this->db->insert('recipe', $recipe);
        $last_id = $this->db->insert_id();

        $recipe_information = array(
            'invoice_number' => $invoive_number,
            'size' => $size,
            'color' => $color,
            'weight' => $weight,
            'recipe_id' => $last_id,
            'cost_price' => $cost_price,
            'sale_price' => $sale_price,
            'whole_price' => $whole_price,
            'expirey_date' => $expiry_date,
            'qty' => $qty,
            'supplier_id' => $supplier
        );
        $this->db->insert('recipe_information', $recipe_information);
    }

    public function insert_recipe_excel($ar_name, $en_name, $details, $barcode, $brand_id) {
        $recipe = array(
            'ar_name' => $ar_name,
            'en_name' => $en_name,
            'details' => $details,
            'barcode' => $barcode,
            'brand_id' => $brand_id
        );
        $this->db->insert('recipe', $recipe);
    }

    public function insert_recipe_information_excel($invoive_number, $size, $color, $weight, $cost_price, $sale_price, $whole_price, $expiry_date, $qty, $supplier, $recipe_id) {
        $recipe_information = array(
            'invoice_number' => $invoive_number,
            'size' => $size,
            'color' => $color,
            'weight' => $weight,
            'recipe_id' => $recipe_id,
            'cost_price' => $cost_price,
            'sale_price' => $sale_price,
            'whole_price' => $whole_price,
            'expirey_date' => $expiry_date,
            'qty' => $qty,
            'supplier_id' => $supplier
        );
        $this->db->insert('recipe_information', $recipe_information);
    }

}
