<?php

class Tables_model extends CI_Model {

    //function to get tables and floor 
    public function get_tables_floor_by_id($floor_id) {
        $this->db->select('floor.id,floor.ar_name,floor.en_name,tables.image,tables.id as table_id,tables.position_x,tables.position_y');
        $this->db->from('tables');
        $this->db->join('floor', 'floor.id = tables.floor_id');
        $this->db->where('floor.id', $floor_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_table() {
        $this->db->select('tables.disable,floor.id,floor.ar_name,floor.en_name,tables.image,tables.id as table_id,tables.name, tables.chair_number');
        $this->db->from('tables');
        $this->db->join('floor', 'floor.id = tables.floor_id');
        $query = $this->db->get();
        return $query->result();
    }

}
