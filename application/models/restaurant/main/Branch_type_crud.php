<?php

class Branch_type_crud extends CI_Model {

    
 // function to get category
    public function getBranch() {
        $query = $this->db->get('branch_type');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
           
        }
    }
    
   
    

   

}