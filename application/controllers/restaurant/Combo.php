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
        $combo_counter = (int) $counter;
        $data_array = array();
        for ($i = 1; $i <= $combo_counter; $i++) {

            if (isset($_POST['combo_validation'])) {
                $combo_name = $this->input->post('combo_name_' . $i);
                $combo_price = $this->input->post('combo_price_' . $i);
                $combo_start_date = $this->input->post('combo_satrtDate_' . $i);
                $combo_end_date = $this->input->post('combo_endDate_' . $i);
                $combo_branch_location = $this->input->post('branch_location_combo_' . $i);
                $items_counter = $this->input->post('combo_item_id_counter');


                $sub_array = array('name' => $combo_name, 'price' => $combo_price,
                    'start_date' => $combo_start_date, 'end_date' => $combo_end_date,
                    'location_branch_id' => $combo_branch_location);
                array_push($data_array, $sub_array);
            }
        }
        $comboId = $this->comboes->saveCombo($data_array);
        
        for ($j = 1; $i < $items_counter; $j++) {
            $items_combo = $this->input->post('item_combo_id_' . $i);
            var_dump($items_combo);
            die();
        }
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
                $item_id = $_POST['item_combo_id_'];
                foreach ($item_id as $val) {
                    $items_array = array("combo_id" => $combo_id,
                        "item_id" => $val);
                    $this->combo_items->insert_combo_items($items_array);
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
        $this->comboes->deleteComboBycomboId($combo_id);
        $this->combo_items->delete_items_by_comboId($combo_id);
        redirect(rest_path('Combo'));
    }

    public function search_combo_items() {
        $term = $this->input->get('term');
        $this->db->like('en_name', $term);
        $this->db->or_like('ar_name', $term);
        $data = $this->db->get("item_information")->result();
        echo json_encode($data);
    }

}
