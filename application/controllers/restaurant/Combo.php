<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Combo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(rest_path('main/Combo_crud'), 'comboes');
        $this->load->model(rest_path('combo/Combo_model'), 'custome_combo');
        $this->load->model(rest_path('main/Combo_items_crud'), 'combo_items');
    }

    public function index() {
        $data['title'] = $this->lang->line('title-combo');
        $data['comboes'] = $this->comboes->getCombo(0);
        $data['branch_location'] = $this->custome_combo->getBranch_location();
        $data['items'] = $this->custome_combo->getItems();
        $data['page'] = rest_path('comboes/view_comboes');
        $this->load->view('index', $data);
    }

    public function add_new_items() {
        $data['item_id'] = $this->input->get('item_id');
        $data['name'] = $this->input->get('name');
        $this->load->view('restaurant/comboes/add_new_items', $data);
    }

    public function add_new_item_to_combo() {

        $data['combo_name'] = $this->input->get('combo_name');
        $data['combo_id'] = $this->input->get('combo_id');
        $this->load->view('restaurant/comboes/add_new_item_to_combo', $data);
    }

    public function add_new_item_multiple() {
        $data['combo_name'] = $this->input->get('combo_name');
        $data['combo_id'] = $this->input->get('combo_id');
        $this->load->view('restaurant/comboes/add_new_item_to_combo', $data);
    }

    public function save_combo() {


        $counter = $_POST['combo_form_number'];
        $form_counter=(int)$counter;

        $data_array = array();
 
        for ($i = 1; $i <= $form_counter; $i++) {

            if (isset($_POST['combo_validation'])) {
                $combo_name = $this->input->post('combo_name_' . $i);
                $combo_price = $this->input->post('combo_price_' . $i);
                $combo_start_date = $this->input->post('combo_satrtDate_' . $i);
                $combo_end_date = $this->input->post('combo_endDate_' . $i);


                $combo_branch_location = $this->input->post('branch_location_combo_' . $i);
                foreach ($combo_branch_location as $key => $value) {
                    $combo_branch_location_id = $value;
                    $sub_array = array('name' => $combo_name, 'price' => $combo_price,
                        'start_date' => $combo_start_date, 'end_date' => $combo_end_date,
                        'location_branch_id' => $combo_branch_location_id);
                    array_push($data_array, $sub_array);
                }
                

                $items_combo = $this->input->post('item_combo_id_' . $i);
                foreach ($items_combo as $key => $val) {
                    $items_combo_ids = $val;
                    var_dump($items_combo_ids);
                    
                    
                   
                }
            }
        }
        
     
         $this->comboes->saveCombo($data_array, $items_combo_ids);
    
        redirect(rest_path('Combo'));
    }

    public function addNewCombo() {
        $data['new_id_row_combo'] = $_POST['id'];
        $data['comboes'] = $this->comboes->getCombo(0);
        $data['branch_location'] = $this->custome_combo->getBranch_location();
        $data['items'] = $this->custome_combo->getItems();
        $this->load->view('restaurant/comboes/add_new_combos', $data);
    }

// function to update combo

    public function update_combo() {
        $combo_id = $_GET['combo_id'];
        $data['combo_info'] = $this->comboes->getComboByComboId($combo_id);
        $data['combo_branch_location'] = $this->custome_combo->getBranch_location();
        $data['combo_items'] = $this->custome_combo->getItemsByComboId($combo_id);
        $data['items'] = $this->custome_combo->getItems();

        $this->load->view('restaurant/comboes/update_combo_modal', $data);

        if (isset($_POST['combo_name'])) {
            $comboArray = array(
                'name' => $_POST['combo_name'],
                'price' => $_POST['combo_price'],
                'end_date' => $_POST['combo_endDate'],
            );
            $this->comboes->updateComboData($combo_id, $comboArray);
            if (isset($_POST['item_combo_id_'])) {

                $item_array = $_POST['item_combo_id_'];

                foreach ($item_array as $key => $val) {
                    $item_id = $val;
                    $this->combo_items->insert_combo_items($item_id, $combo_id);
                }
                redirect(rest_path('Combo'));
            } else {
                echo 'ERROR';
            }

            redirect(rest_path('Combo'));
        }
    }

// function to delete combo 

    public function delete_combo() {
        $combo_id = $_GET['combo_id'];
        $data['delete_combo'] = $this->comboes->getComboByComboId($combo_id);
        $this->load->view('restaurant/comboes/delete_combo_model', $data);

        if (isset($_POST['delete_combo_yes'])) {
            $this->comboes->deleteComboBycomboId($combo_id);
            $this->combo_items->delete_items_by_comboId($combo_id);
            redirect(rest_path('Combo'));
        } else {

            if (isset($_POST['delete_combo_no'])) {
                redirect(rest_path('Combo'));
            }
        }
    }

    public function search_combo_items() {
        $term = $this->input->get('term');
        $this->db->like('en_name', $term);
        $this->db->or_like('ar_name', $term);
        $data = $this->db->get("item_information")->result();
        echo json_encode($data);
    }

    public function search_multi_combo_items() {
        $term = $this->input->get('term');
        $this->db->like('en_name', $term);
        $this->db->or_like('ar_name', $term);
        $data = $this->db->get("item_information")->result();
        echo json_encode($data);
    }

}
