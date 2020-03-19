<?php

class Tables_crud extends CI_Model {

    public function get_floor() {
        $query = $this->db->get('floor');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert_tables($data) {
        if ($this->db->insert_batch('tables', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function update_table($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('tables', $data);
    }

    public function get_table_by_id($table_id) {
        $query = $this->db->get_where('tables', array('id' => $table_id));
        return $query->result();
    }
    
    public function delete_table($id) {
        $this->db->set('disable', '0');
        $this->db->where('id', $id);
        $this->db->update('tables');

    }

}
