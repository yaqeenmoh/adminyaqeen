<?php

class Custom_item_crud extends CI_Model {

    public function insert_custom_item($data) {
        $query = $this->db->insert_batch('custom_item', $data);
        if ($query > 0) {
            $test = TRUE;
        } else {
            $test = FALSE;
        }
        return $test;
    }

    public function delete_custom_item($custom_id) {
        $this->db->set('disable', '0');
        $this->db->where('id', $custom_id);
        $this->db->update('custom_item');
    }

    public function get_recipe() {
        $query = $this->db->get('recipe');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function update_custom_item($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('custom_item', $data);
    }

}
