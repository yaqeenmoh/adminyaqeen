<?php

class Items_crud extends CI_Model {

    //function to get brand
    public function get_brand() {
        $query = $this->db->get('brand');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //function to get supplier
    public function get_supplier() {
        $query = $this->db->get('supplier');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //function to get size
    public function get_size() {
        $query = $this->db->get('size');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //function to get color
    public function get_color() {
        $query = $this->db->get('color');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //function to get item type
    public function get_item_type() {
        $query = $this->db->get('item_type');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    

    public function insert_items_information($ar_name, $en_name, $details, $barcode, $invoice_number, $item_number, $tax, $tax_2, $tax_3, $size, $color, $weight, $brand, $expiry_date, $cost_price, $sale_price, $whole_price, $max_discount, $discount, $discount_statuts, $qty, $custom, $supplier, $category, $sub_category, $branch_location, $item_type, $image, $bg_color,$multi_category) {
        $items_information = array(
            'ar_name' => $ar_name,
            'en_name' => $en_name,
            'details' => $details,
            'barcode' => $barcode,
            'invoice_number' => $invoice_number,
            'item_number' => $item_number,
            'tax_1' => $tax,
            'tax_2' => $tax_2,
            'tax_3' => $tax_3,
            'image' => $image,
            'type_id' => $item_type
        );
        $this->db->insert('item_information', $items_information);
        $last_id = $this->db->insert_id();

        $items = array(
            'item_id' => $last_id,
            'size_id' => $size,
            'color_id' => $color,
            'weight' => $weight,
            'brand_id' => $brand,
            'expiry_date' => $expiry_date,
            'cost_price' => $cost_price,
            'sale_price' => $sale_price,
            'whole_price' => $whole_price,
            'supplier_id' => $supplier,
            'category_id' => $category,
            'sub_category_id' => $sub_category,
            'multi_category' => $multi_category,
            'bg_color' => $bg_color,
            'max_discount' => $max_discount,
            'discount' => $discount,
            'discount_status' => $discount_statuts,
            'qty' => $qty,
            'branch_location_id' => $branch_location,
            'custom' => $custom
        );
        $this->db->insert('items', $items);
    }

    public function insert_item_information_excel($ar_name, $en_name, $barcode, $details, $image, $invoice_number, $type_id, $item_number, $tax_1) {
        $items_information = array(
            'ar_name' => $ar_name,
            'en_name' => $en_name,
            'barcode' => $barcode,
            'details' => $details,
            'image' => $image,
            'invoice_number' => $invoice_number,
            'type_id' => $type_id,
            'item_number' => $item_number,
            'tax_1' => $tax_1
        );
        $this->db->insert('item_information', $items_information);
    }

    public function insert_items_excel($item_id, $size_id, $color_id, $weight, $brand_id, $bg_color, $expiry_date, $cost_price, $sale_price, $whole_price, $supplier_id, $category_id, $sub_category_id,  $max_discount, $discount, $discount_statuts, $qty, $branch_location_id, $custom,$multi_category) {
        $items = array(
            'item_id' => $item_id,
            'size_id' => $size_id,
            'color_id' => $color_id,
            'weight' => $weight,
            'brand_id' => $brand_id,
            'bg_color' => $bg_color,
            'expiry_date' => $expiry_date,
            'cost_price' => $cost_price,
            'sale_price' => $sale_price,
            'whole_price' => $whole_price,
            'supplier_id' => $supplier_id,
            'category_id' => $category_id,
            'sub_category_id' => $sub_category_id,
            'multi_category' => $multi_category,
            'max_discount' => $max_discount,
            'discount' => $discount,
            'discount_status' => $discount_statuts,
            'qty' => $qty,
            'branch_location_id' => $branch_location_id,
            'custom' => $custom
        );
        $this->db->insert('items', $items);
    }

    public function update_item_infomation($item_id, $data) {
        $this->db->where('id', $item_id);
        $this->db->update('item_information', $data);
    }

    public function update_items($item_id, $data) {
        $this->db->where('item_id', $item_id);
        $this->db->update('items', $data);
    }

    public function delete_item_information($item_id) {
        $this->db->set('disable', '0');
        $this->db->where('id', $item_id);
        $this->db->update('item_information');

        $this->db->set('disable', '0');
        $this->db->where('item_id', $item_id);
        $this->db->update('items');
    }

}
