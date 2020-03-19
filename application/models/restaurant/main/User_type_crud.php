<?php

class User_type_crud extends CI_Model {

    public function insert_user_type($array) {
        if ($this->db->insert_batch('user_type', $array)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_user_type() {
        $this->db->order_by('id','DESC');
        $query = $this->db->get('user_type');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function update_users_type_by_id($user_type_id) {
        $query = $this->db->get_where('user_type', array('id' => $user_type_id));
        return $query->result();
    }

    public function update_user_type($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('user_type', $data);
    }

    public function delete_users_type_by_id($user_type_id) {
        $query = $this->db->get_where('user_type', array('id' => $user_type_id));
        return $query->result();
    }

    public function delete_user_type_and_users($id) {
        $this->db->set('disable', '0');
        $this->db->where('id', $id);
        $this->db->update('user_type');

        $this->db->set('disable', '0');
        $this->db->where('user_type_id', $id);
        $this->db->update('users');
    }

    public function delete_user_type($id) {
        $this->db->set('disable', '0');
        $this->db->where('id', $id);
        $this->db->update('user_type');

        $this->db->set('user_type_id', '1');
        $this->db->where('user_type_id', $id);
        $this->db->update('users');
    }
    
     public function import_user_type_data($data) {
      if ($this->db->insert_batch('user_type', $data)) {
            return true;
        } else {
            return false;
        }
    }

}
