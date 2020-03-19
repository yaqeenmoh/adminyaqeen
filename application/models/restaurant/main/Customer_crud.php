<?php

class Customer_crud extends CI_Model {

    public function get_customer_information() {
        $query = $this->db->get('customer_information');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert_customer_inforamtion($data) {
        if ($this->db->insert_batch('customer_information', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function update_customer_information_by_id($customer_id) {
        $query = $this->db->get_where('customer_information', array('id' => $customer_id));
        return $query->result();
    }

    public function update_customer_information($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('customer_information', $data);
    }

    public function delete_customer_by_id($customer_id) {
        $query = $this->db->get_where('customer_information', array('id' => $customer_id));
        return $query->result();
    }

    public function delete_customer_information($id) {
        $this->db->set('disable', '0');
        $this->db->where('id', $id);
        $this->db->update('customer_information');
    }

    public function import_customer_data($data) {
        if ($this->db->insert_batch('customer_information', $data)) {
            return true;
        } else {
            return false;
        }
    }

}
