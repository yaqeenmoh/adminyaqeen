

<?php

class Modifier_crud extends CI_Model {

    // global variable for table name from database
    private $table = "item_modifier";

    //get Modifier 
    public function getModifier($id) {
        $this->db->select('*');
        $this->db->from($this->table);
        if ($id > 0) {
            $this->db->where('id', (int) $id);
        }
        $sql = $this->db->get();
        return $sql->result();
    }

    //insert Modifier

    public function saveModifier($array) {
        if($this->db->insert_batch($this->table, $array)) {
            return true;
        } else {
            return false;
        }
    }

   
    //update Modifier data 

    public function updateModifierData($modifier_id, $modifierArray) {
        $this->db->where('id', $modifier_id);
        $this->db->update($this->table, $modifierArray);
    }

    //delete Modifier  make disable coloum = 0

    public function deleteModifierByID($modifier_id) {
        $this->db->where('id', $modifier_id);
        $this->db->set('disable', 0);
        $this->db->update($this->table);
    }

    public function import_modifiers_data($data) {
        if ($this->db->insert_batch('item_modifier', $data)) {
            return true;
        } else {
            return false;
        }
    }

}
