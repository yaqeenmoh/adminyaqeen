<?php

class Brand_model extends CI_Model {

    
 public function getBranchById(){
        $this->db->select('* ,branch_location.id as branch_location_id,'
                . 'branch_type.ar_name as branch_ar_name,'
                . ' branch_type.en_name as branch_en_name,'
                . 'location.id as location_id,location.ar_name as location_ar_name,'
                . ' location.en_name as location_en_name');
        $this->db->from('branch_location');
        $this->db->join('branch_type','branch_type.id = branch_location.branch_id');
        $this->db->join('location','location.id = branch_location.location_id');
        $query = $this->db->get();
        return $query->result_array();
    
    }
    
    public function getBrandByBranchLocation(){
         $this->db->select('*,brand.id as brand_id, brand.ar_name as BrandArName ,brand.en_name as BrandEnName,'
                . ' branch_type.ar_name as BrTyArName,branch_type.en_name as BrTyEnName ,'
                . ' location.ar_name as loc_ar_name,'
                . 'location.en_name as loc_en_name,location.id as location_id ');
        $this->db->from('brand');
        $this->db->join('branch_location', 'branch_location.id = brand.branch_location_id','left');
        $this->db->join('branch_type','branch_type.id = branch_location.branch_id','left');
        $this->db->join('location','location.id = branch_location.location_id','left');
        $this->db->order_by("brand_id", "DESC");
        $query = $this->db->get();
        return $query->result_array();
    }



}
