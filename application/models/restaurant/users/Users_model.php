<?php

class Users_model extends CI_Model {

    public function get_branch_location() {
        $this->db->select('* ,branch_location.id as branch_location_id,branch_type.ar_name as branch_ar_name, branch_type.en_name as branch_en_name,location.ar_name as location_ar_name, location.en_name as location_en_name');
        $this->db->from('branch_location');
        $this->db->join('branch_type', 'branch_type.id = branch_location.branch_id');
        $this->db->join('location', 'location.id = branch_location.location_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_users() {
        $this->db->select('users.id as user_id,users.username as username,user_type.name as name, users.disable as user_disable,devices.ar_name as device_ar_name, devices.en_name as device_en_name,branch_type.ar_name as branch_ar_name, branch_type.en_name as branch_en_name,location.ar_name as location_ar_name, location.en_name as location_en_name');
        $this->db->from('users');
        $this->db->order_by('branch_location.id', 'ASC');
        $this->db->join('user_type', 'user_type.id = users.user_type_id');
        $this->db->join('devices', 'devices.id = users.device_id', 'left');
        $this->db->join('branch_location', 'branch_location.id = users.branch_location_id');
        $this->db->join('branch_type', 'branch_type.id = branch_location.branch_id');
        $this->db->join('location', 'location.id = branch_location.location_id');
        $query = $this->db->get();
        return $query->result();
    }



    
    public function import_users_data($data) {
        if ($this->db->insert_batch('users', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_branch_location_by_id($id) {
        $this->db->select('users.id as user_id,users.username as username,user_type.name as name, users.disable as user_disable,devices.ar_name as device_ar_name, devices.en_name as device_en_name,branch_type.ar_name as branch_ar_name, branch_type.en_name as branch_en_name,location.ar_name as location_ar_name, location.en_name as location_en_name');
        $this->db->from('users');
        $this->db->order_by('users.id', 'DESC');
        $this->db->join('user_type', 'user_type.id = users.user_type_id');
        $this->db->join('devices', 'devices.id = users.device_id', 'left');
        $this->db->join('branch_location', 'branch_location.id = users.branch_location_id');
        $this->db->join('branch_type', 'branch_type.id = branch_location.branch_id');
        $this->db->join('location', 'location.id = branch_location.location_id');
        $this->db->order_by("user_id", "DESC");
        $this->db->where('branch_location.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

}
