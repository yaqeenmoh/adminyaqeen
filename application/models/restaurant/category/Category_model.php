<?php

class Category_model extends CI_Model {
    
    public function get_category() {
        $this->db->select('category.id,category.disable, category.ar_name as category_ar_name, category.en_name as category_en_name,category.discount,category.image,branch_type.en_name as branch_en_name, branch_type.ar_name as branch_ar_name,location.ar_name as location_ar_name, location.en_name as location_en_name');
        $this->db->from('branch_location');
        $this->db->join('category', 'category.branch_location_id = branch_location.id');
        $this->db->join('branch_type', 'branch_type.id = branch_location.branch_id');
        $this->db->join('location', 'location.id = branch_location.location_id');
        $this->db->order_by('branch_location.id', 'ASC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_branch_location() {
        $this->db->select('* ,branch_location.id as branch_location_id,branch_type.ar_name as branch_ar_name, branch_type.en_name as branch_en_name,location.ar_name as location_ar_name, location.en_name as location_en_name');
        $this->db->from('branch_location');
        $this->db->join('branch_type', 'branch_type.id = branch_location.branch_id');
        $this->db->join('location', 'location.id = branch_location.location_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_branch_location_by_id($id) {
        $this->db->select('category.id,category.disable, category.ar_name as category_ar_name, category.en_name as category_en_name,category.discount,category.image,branch_type.en_name as branch_en_name, branch_type.ar_name as branch_ar_name,location.ar_name as location_ar_name, location.en_name as location_en_name');
        $this->db->from('category');
        $this->db->order_by('id', 'DESC');
        $this->db->join('branch_location', 'branch_location.id = category.branch_location_id');
        $this->db->join('branch_type', 'branch_type.id = branch_location.branch_id');
        $this->db->join('location', 'location.id = branch_location.location_id');
        $this->db->where('branch_location.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

}
