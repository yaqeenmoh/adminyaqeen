<?php

class Printer_crud extends CI_Model {

    //function to insert multi printer information 
    public function insert_printer($data) {
        if ($this->db->insert_batch('printer', $data)) {
            return true;
        } else {
            return false;
        }
    }

    //function to get printer information 
    public function get_printer() {
        $this->db->order_by('printer.id', 'DESC');
        $query = $this->db->get('printer');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //function to get printer information by id
    public function get_printer_by_id($printer_id) {
        $query = $this->db->get_where('printer', array('id' => $printer_id));
        return $query->result();
    }

    //function to update printer infomration
    public function update_printer($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('printer', $data);
    }

    
    //function to delete printer 
    public function delete_printer($id) {
        $this->db->set('disable', '0');
        $this->db->where('id', $id);
        $this->db->update('printer');
    }

}
