<?php

class Category_crud extends CI_Model {

    // function to get category
    public function get_category() {
        $query = $this->db->get('category');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //function to get category id 
    public function get_category_by_id($category_id) {
        $query = $this->db->get_where('category', array('id' => $category_id));
        return $query->result();
    }

    //function to edit category
    public function update_category_information($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('category', $data);
    }

    //funtion to delete category and sub category and item 
    public function delete_category_sub_category_item($id) {
        $this->db->set('disable', '0');
        $this->db->where('id', $id);
        $this->db->update('category');

        $this->db->set('disable', '0');
        $this->db->where('category_id', $id);
        $this->db->update('sub_category');

        $this->db->set('disable', '0');
        $this->db->where('category_id', $id);
        $this->db->update('items');
    }

    //function to delete category
    public function delete_category($id) {
        $this->db->set('disable', '0');
        $this->db->where('id', $id);
        $this->db->update('category');

        $this->db->set('disable', '1');
        $this->db->where('category_id', $id);
        $this->db->update('sub_category');

        $this->db->set('disable', '1');
        $this->db->where('category_id', $id);
        $this->db->update('items');
    }

    //function to insert category
    public function insert_category($data) {
        if ($this->db->insert_batch('category', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_printer() {
        $query = $this->db->get('printer');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
