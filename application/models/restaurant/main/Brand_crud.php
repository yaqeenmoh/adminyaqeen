<?php

class Brand_crud extends CI_Model {

// global variable for table name from database
    private $table = "brand";

    //get brand data  
    public function getBrand($id) {
        $this->db->select('* ,brand.id as brand_id, brand.ar_name as BrandArName ,brand.en_name as BrandEnName,'
                . ' branch_type.ar_name as BrTyArName,branch_type.en_name as BrTyEnName ,'
                . ' location.ar_name as loc_ar_name,'
                . 'location.en_name as loc_en_name,location.id as location_id ');
        $this->db->from($this->table);
        $this->db->join('branch_location', 'brand.branch_location_id =  branch_location.id');
        $this->db->join('branch_type', 'branch_location.branch_id = branch_type.id');
        $this->db->join('location', 'location.id = branch_location.location_id');
        if ($id > 0) {
            $this->db->where('id', (int) $id);
        }
        $sql = $this->db->get();
        return $sql->result_array();
    }

    //insert brand
    public function saveBrand($array) {
       
        $this->db->insert_batch($this->table, $array);
    }

    //get brand data 
    public function get_brand_by_id($id) {
        $query = $this->db->get_where('brand', array('id' => $id));
        return $query->result();
    }

    //update brand data 
    public function updateBrandData($id, $brandArray) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $brandArray);
    }

   //delete items thats depends on brand  

    public function deleteBrandItems($id) {
        $this->db->where('brand_id', $id);
        $this->db->set('disable', 0);
        $this->db->update('items');
    }
    
     //delete brand 

    public function deleteBrandByBrandId($brandId) {

        $this->db->where('id', $brandId);
        $this->db->set('disable', 0);
        $this->db->update($this->table);
    }
    
    //update items that depend on brand to brand_id default 1

    public function updateItemBrandToDefault($brandId) {
        $this->db->where('id', $brandId);
        $this->db->set('brand_id', 1);
        $this->db->update('items');
    }
    
       public function import_brand_data($data){
        if($this->db->insert_batch($this->table,$data)){
            return true;
        }else{
            return false;
        }
    }


}
