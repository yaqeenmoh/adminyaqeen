<?php

class Users_crud extends CI_Model {

    public function get_device() {
        $query = $this->db->get('devices');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert_users($data) {
        if ($this->db->insert_batch('users', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function update_users_by_id($user_id) {
        $query = $this->db->get_where('users', array('id' => $user_id));
        return $query->result();
    }

    public function update_users_information($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete_users_by_id($user_id) {
        $query = $this->db->get_where('users', array('id' => $user_id));
        return $query->result();
    }

    public function delete_users($id) {
        $this->db->set('disable', '0');
        $this->db->where('id', $id);
        $this->db->update('users');
    }

}
