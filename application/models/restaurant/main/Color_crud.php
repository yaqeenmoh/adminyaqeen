

<?php

class Color_crud extends CI_Model {

// global variable for table name from database
    private $table = "color";

//get color data
    public function getColor($id) {
        $this->db->select('*');
        $this->db->from($this->table);
        if ($id > 0) {
            $this->db->where('id', (int) $id);
        }
        $sql = $this->db->get();
        return $sql->result_array();
    }

//insert color data 
    public function saveColor($array) {
        if ($this->db->insert_batch('color', $array)) {
            return true;
        } else {
            return false;
        }
    }

//get color data 

    public function get_color_by_id($id) {
        $query = $this->db->get_where('color', array('id' => $id));
        return $query->result();
    }

//update color data 

    public function updatColorData($id, $brandArray) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $brandArray);
    }

//delete items thats depends on color 

    public function deleteColorItems($color_id) {
        $this->db->where('brand_id', $color_id);
        $this->db->set('disable', 0);
        $this->db->update('items');
    }

//delete color 
    public function deleteColorByColorId($color_id) {
        $this->db->where('id', $color_id);
        $this->db->set('disable', 0);
        $this->db->update($this->table);
    }

//update items that depend on color to color_id default 1

    public function updateItemsColorToDefault($color_id) {
        $this->db->where('id', $color_id);
        $this->db->set('color_id', 1);
        $this->db->update('items');
    }

}
