

<?php

class App_crud extends CI_Model {

    // global variable for table name from database
//    private $table = "applications";

    //get application data  
    public function getApp($id) {
        $this->db->select('*');
        $this->db->from('applications');
        if ($id > 0) {
            $this->db->where('id', (int) $id);
        }
        $sql = $this->db->get();
        return $sql->result_array();
    }

    //insert application

    public function saveApp($dataArray) {
       
       if ($this->db->insert_batch('applications', $dataArray)) {
            return true;
        } else {
            return false;
        }
        
    }

    //get application data 

    public function get_app_by_id($id) {
        $query = $this->db->get_where('applications', array('id' => $id));
        return $query->result();
    }

    //update application data 

    public function updateAppData($id, $appArray) {
        $this->db->where('id', $id);
        $this->db->update('applications', $appArray);
    }
    
    //delete application 

    public function deleteAppByAppId($color_id) {        
        $this->db->set('disable', '0');
        $this->db->where('id', $color_id);
        $this->db->update('applications');

    }
    
   

}
