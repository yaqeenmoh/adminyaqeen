<?php

class Items_model extends CI_Model {

    //function to get branch location
    public function get_branch_location() {
        $this->db->select('* ,branch_location.id as branch_location_id,branch_type.ar_name as branch_ar_name, branch_type.en_name as branch_en_name,location.ar_name as location_ar_name, location.en_name as location_en_name');
        $this->db->from('branch_location');
        $this->db->join('branch_type', 'branch_type.id = branch_location.branch_id');
        $this->db->join('location', 'location.id = branch_location.location_id');
        $query = $this->db->get();
        return $query->result();
    }

    //function to get all item information
    public function get_item_information() {
        $this->db->select('item_information.id,item_information.ar_name,item_information.en_name,item_information.details,item_information.barcode,item_information.invoice_number,item_information.item_number,item_information.tax_1,item_type.name,size.ar_name as size_ar_name,size.en_name as size_en_name,color.ar_name as color_ar_name, color.en_name as color_en_name,items.weight,brand.ar_name as brand_ar_name, brand.en_name as brand_en_name,items.expiry_date,items.cost_price,items.sale_price,items.whole_price,supplier.name as supplier_name,category.ar_name as category_ar_name,category.en_name as category_en_name,sub_category.ar_name as sub_category_ar_name, sub_category.en_name as sub_category_en_name,items.max_discount,items.discount,items.discount_status,items.qty,branch_type.ar_name as branch_ar_name, branch_type.en_name as branch_en_name,location.ar_name as loc_ar_name, location.en_name as loc_en_name,items.custom,items.bg_color,item_information.image');
        $this->db->from('item_information');
        $this->db->join('items', 'items.item_id = item_information.id');
        $this->db->join('item_type', 'item_type.id = item_information.type_id', 'left');
        $this->db->join('size', 'size.id = items.size_id', 'left');
        $this->db->join('color', 'color.id = items.color_id', 'left');
        $this->db->join('brand', 'brand.id = items.brand_id', 'left');
        $this->db->join('supplier', 'supplier.id = items.supplier_id', 'left');
        $this->db->join('category', 'category.id = items.category_id', 'left');
        $this->db->join('sub_category', 'sub_category.id = items.sub_category_id', 'left');
        $this->db->join('branch_location', 'branch_location.id = items.branch_location_id', 'left');
        $this->db->join('branch_type', 'branch_type.id = branch_location.branch_id', 'left');
        $this->db->join('location', 'location.id = branch_location.location_id', 'left');
        
        $query = $this->db->get();
        return $query->result();
    }

    //function to get item information by id
    public function get_item_information_by_id($item_id) {
        $this->db->select('item_information.id,item_information.ar_name,item_information.en_name,item_information.details,item_information.barcode,item_information.invoice_number,item_information.item_number,item_information.tax_1,item_type.name,size.ar_name as size_ar_name,size.en_name as size_en_name,color.ar_name as color_ar_name, color.en_name as color_en_name,items.weight,brand.ar_name as brand_ar_name, brand.en_name as brand_en_name,items.expiry_date,items.cost_price,items.sale_price,items.whole_price,supplier.name as supplier_name,category.ar_name as category_ar_name,category.en_name as category_en_name,sub_category.ar_name as sub_category_ar_name, sub_category.en_name as sub_category_en_name,items.max_discount,items.discount,items.discount_status,items.qty,branch_type.ar_name as branch_ar_name, branch_type.en_name as branch_en_name,location.ar_name as loc_ar_name, location.en_name as loc_en_name,items.custom,items.bg_color,item_information.image,items.brand_id,item_information.type_id,items.size_id,items.color_id,items.supplier_id,items.category_id,items.sub_category_id,items.branch_location_id');
        $this->db->from('item_information');
        $this->db->join('items', 'items.item_id = item_information.id');
        $this->db->join('item_type', 'item_type.id = item_information.type_id', 'left');
        $this->db->join('size', 'size.id = items.size_id', 'left');
        $this->db->join('color', 'color.id = items.color_id', 'left');
        $this->db->join('brand', 'brand.id = items.brand_id', 'left');
        $this->db->join('supplier', 'supplier.id = items.supplier_id', 'left');
        $this->db->join('category', 'category.id = items.category_id', 'left');
        $this->db->join('sub_category', 'sub_category.id = items.sub_category_id', 'left');
        $this->db->join('branch_location', 'branch_location.id = items.branch_location_id', 'left');
        $this->db->join('branch_type', 'branch_type.id = branch_location.branch_id', 'left');
        $this->db->join('location', 'location.id = branch_location.location_id', 'left');
        $this->db->where('item_information.id', $item_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_items_and_item_information_by_id($item_id) {
        $this->db->select('item_information.id,items.item_id');
        $this->db->from('item_information');
        $this->db->join('items', 'items.item_id = item_information.id');
        $this->db->where('item_information.id', $item_id);
        $query = $this->db->get();
        return $query->result();
    }

}
