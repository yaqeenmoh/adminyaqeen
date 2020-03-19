<?php

class Sub_category_crud extends CI_Model {

    public function get_sub_category() {
        $query = $this->db->get('sub_category');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert_sub_category($data) {
        if ($this->db->insert_batch('sub_category', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_sub_category_by_id($sub_category_id) {
        $query = $this->db->get_where('sub_category', array('id' => $sub_category_id));
        return $query->result();
    }

    public function update_sub_category($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('sub_category', $data);
    }

    public function delete_sub_category($id) {
        $this->db->set('disable', '0');
        $this->db->where('id', $id);
        $this->db->update('sub_category');
    }

}
