<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modifier extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = 0) {
        $this->load->model(rest_path('main/Modifier_crud'), 'modifiers');
        $this->load->model(rest_path('modifiers/Modifier_model'), 'modifier_custome');
        $data['title'] = $this->lang->line('title-modifier');
        $data['modifiers'] = $this->modifiers->getModifier(0);
        $data['modifiers_custome'] = $this->modifier_custome->getModifierData();
        $data['page'] = rest_path('modifiers/view_modifiers');
        $this->load->view('index', $data);
    }

    public function get_items() {
        $this->load->model(rest_path('modifiers/Modifier_model'), 'modifier_custome');
        $data['items_info'] = $this->modifier_custome->getAllItems();
        $data['recipe'] = $this->modifier_custome->get_recipe();
        $this->load->view('restaurant/modifiers/add_modifier_on_items', $data);
    }

    public function get_all_category() {
        $this->load->model(rest_path('modifiers/Modifier_model'), 'modifier_custome');
        $data['all_category'] = $this->modifier_custome->get_categories();
        $this->load->view('restaurant/modifiers/add_modifier_on_category', $data);
    }

    public function get_sub_category() {
        $this->load->model(rest_path('modifiers/Modifier_model'), 'modifier_custome');
        $data['sub_category'] = $this->modifier_custome->get_sub_categories();
        $this->load->view('restaurant/modifiers/add_modifier_on_sub_cat', $data);
    }

    public function get_items_by_category() {
        $this->load->model(rest_path('modifiers/Modifier_model'), 'modifier_custome');
        $category_id = $_POST['category_id'];
        $data['items_cat'] = $this->modifier_custome->get_items_by_category_id($category_id);
        $data['recipe'] = $this->modifier_custome->get_recipe();
        $this->load->view('restaurant/modifiers/category_items_modifiers_view', $data);
    }

    public function get_items_by_sub_category() {
        $this->load->model(rest_path('modifiers/Modifier_model'), 'modifier_custome');
        $sub_category_id = $_POST['sub_cat_id'];
        $data['items_sub_cat'] = $this->modifier_custome->get_items_by_sub_category_id($sub_category_id);
        $data['recipe'] = $this->modifier_custome->get_recipe();
        $this->load->view('restaurant/modifiers/sub_category_items_modifiers_view', $data);
    }

    public function save_item_modifier() {

        $this->load->model(rest_path('main/Modifier_crud'), 'modifiers');
        $input_counter = count($_POST) - 4;
        $counter = $input_counter / 2;
        $id = $_POST['modifierItemId'];
        $item_modifier = array();
        for ($i = 1; $i <= $counter; $i++) {
            if (isset($_POST['save_modifier'])) {
                $recipe_id = $_POST['recipe_id_' . $i];
                $modifier_price = $_POST['modifier_price_' . $i];
                $modifier_qty = $_POST['modifier_qty_' . $i];
                $modifierArray = array('qty' => $modifier_qty, 'price' => $modifier_price, 'recipe_id' => $recipe_id, 'item_id' => $id);
                array_push($item_modifier, $modifierArray);
            }
        }

        $save_data = $this->modifiers->saveModifier($item_modifier);
        if ($save_data == TRUE) {
            redirect(rest_path('Modifier'));
        } else {
            echo "Eroor";
        }
    }

// function to update modifier 
    public function update_modifier() {
        $this->load->model(rest_path('main/Modifier_crud'), 'modifiers');
        $this->load->model(rest_path('modifiers/Modifier_model'), 'modifier_custome');
        $modifier_id = $_GET['modifier_id'];
        $data['modifier'] = $this->modifier_custome->get_modifier_by_id($modifier_id);
        $data['ModifierData'] = $this->modifier_custome->getModifierData();
        $this->load->view('restaurant/modifiers/update_modifier_modal', $data);
        if (isset($_POST['update_modifier'])) {
            $modifierArray = Array(
                'recipe_id' => $this->input->post('modifier_recipe_id'),
                'price' => $this->input->post('modifier_price'),
                'qty' => $this->input->post('modifier_qty'),
                'item_id' => $this->input->post('item_modifier_id'),
            );
            $this->modifiers->updateModifierData($modifier_id, $modifierArray);
            redirect(rest_path('Modifier'));
        }
    }

// function to delete Modifier 
    public function deleteModifier() {
        $this->load->model(rest_path('main/Modifier_crud'), 'modifiers');
        $modifier_id = $_GET['modifier_id'];
        $this->modifiers->deleteModifierByID($modifier_id);
        redirect(rest_path('Modifier'));
    }

    public function download_modifiers_excel() {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Quantity');
        $sheet->setCellValue('B1', 'Price');

        $writer = new Xlsx($spreadsheet);

        $filename = 'add_modifier_template.xlsx';
        header('Content-Disposition: attachment;filename="' . $filename . '"');

        $writer->save('php://output');
    }

    public function upload_modifiers_excel() {
        $this->load->model(rest_path('modifiers/Modifier_model'), 'modifier_custome');
        $data = array();
        $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
        if ($this->form_validation->run() == false) {
            
        } else {
            if (!empty($_FILES['fileURL']['name'])) {
                $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

                if ($extension == 'csv') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif ($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }

                $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                $arrayCount = count($allDataInSheet);
                $flag = 0;

                $createArray = array('Price', 'Quantity');
                $makeArray = array('Price' => 'Price', 'Quantity' => 'Quantity');
                $SheetDataKey = array();
                $mydata = array();
                foreach ($allDataInSheet as $dataInSheet) {
                    foreach ($dataInSheet as $key => $value) {
                        if (in_array(trim($value), $createArray)) {
                            $value = preg_replace('/\s+/', '', $value);
                            $SheetDataKey[trim($value)] = $key;
                        }
                    }
                }
                $dataDiff = array_diff_key($makeArray, $SheetDataKey);
                if (empty($dataDiff)) {
                    $flag = 1;
                }
                if ($flag == 1) {
                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $price = $SheetDataKey['Price'];
                        $qty = $SheetDataKey['Quantity'];

                        $price = filter_var(trim($allDataInSheet[$i][$price]), FILTER_SANITIZE_STRING);
                        $qty = filter_var(trim($allDataInSheet[$i][$qty]), FILTER_SANITIZE_STRING);

                        $fetchData = array('Price' => $price, 'Quantity' => $qty);
                        $data['dataInfo'] = $fetchData;
                        array_push($mydata, $fetchData);
                    }
                }
                $data['mydata'] = $mydata;
                $data['title'] = $this->lang->line('admin_modifiers');
                $data['items_info'] = $this->modifier_custome->getAllItems();
                $data['recipe'] = $this->modifier_custome->get_recipe();
                $data['page'] = rest_path('modifiers/dispaly_modifier_excel');
                $this->load->view('index', $data);
            }
        }
    }

    public function checkFileValidation($string) {
        $file_mimes = array('text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );
        if (isset($_FILES['fileURL']['name'])) {
            $arr_file = explode('.', $_FILES['fileURL']['name']);
            $extension = end($arr_file);
            if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)) {
                return true;
            } else {
                $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
                return false;
            }
        } else {
            $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
            return false;
        }
    }

    public function insert_modifier_excel() {
        $this->load->model(rest_path('main/Modifier_crud'), 'modifiers');
        $counter = $_POST['modifier_form_number'];
        $data = array();
        for ($i = 0; $i < $counter; $i++) {
            $price = $_POST['price_' . $i];
            $qty = $_POST['qty_' . $i];
            if ($_POST['item_modifier_id_' . $i] == 0) {
                $item_id = NULL;
            } else {
                $item_id = $_POST['item_modifier_id_' . $i];
            }

            if ($_POST['recipe_id_' . $i] == 0) {
                $recipe_id = NULL;
            } else {
                $recipe_id = $_POST['recipe_id_' . $i];
            }
            
            $sub_array = array('price' => $price, 'qty' => $qty, 'item_id'=> $item_id , 'recipe_id' => $recipe_id);
            array_push($data, $sub_array);
        }

        $this->modifiers->import_modifiers_data($data);
        redirect(rest_path('Modifier'));
    }

    public function search() {
        $term = $this->input->get('term');
        $this->db->like('en_name', $term);
        $this->db->or_like('ar_name', $term);
        $data = $this->db->get("item_information")->result();
        echo json_encode($data);
    }

}
