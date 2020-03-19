<?php

class Sub_category_model extends CI_Model {

    public function get_sub_category_and_category() {
        $this->db->select('category.id as cat_id,sub_category.id,sub_category.disable,sub_category.ar_name as sub_ar_name, sub_category.en_name as sub_en_name,category.ar_name as cat_ar_name, category.en_name as cat_en_name, sub_category.discount,sub_category.sub_level');
        $this->db->from('sub_category');
        $this->db->join('category', 'category.id = sub_category.sub_level','left');
        $query = $this->db->get();
        return $query->result();
    }

}
