<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Recipe extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(rest_path('main/Recipe_crud'));
        $this->load->model(rest_path('recipe/Recipe_model'));
    }

    public function index() {
        $data['title'] = $this->lang->line('admin_recipe');
        $data['page'] = rest_path('recipe/view_recipe');
        $data['brand'] = $this->get_brand();
        $data['supplier'] = $this->get_supplier();
        $data['recipe_info'] = $this->get_recipe_information();
        $this->load->view('index', $data);
    }

    //function to get brand 
    public function get_brand() {
        $data['brand'] = $this->Recipe_crud->get_brand();
        return $data['brand'];
    }

    //function to get supplier
    public function get_supplier() {
        $data['supplier'] = $this->Recipe_crud->get_supplier();
        return $data['supplier'];
    }

    //function to get all recipe information
    public function get_recipe_information() {
        $data['recipe_info'] = $this->Recipe_model->get_recipe_information();
        return $data['recipe_info'];
    }

    public function insert_recipe() {
       
        $ar_name = $_POST['recipe_ar_name_1'];
        $en_name = $_POST['recipe_en_name_1'];
        $details = $_POST['recipe_details_1'];
        $barcode = $_POST['recipe_barcode_1'];
        $brand_id = $_POST['recipe_brand_1'];

        $invoive_number = $_POST['recipe_invoice_number_1'];
        $size = $_POST['recipe_size_1'];
        $color = $_POST['recipe_color_1'];
        $weight = $_POST['recipe_weight_1'];
        $cost_price = $_POST['recipe_cost_price_1'];
        $sale_price = $_POST['recipe_sale_price_1'];
        $whole_price = $_POST['recipe_whole_price_1'];
        $expiry_date = $_POST['recipe_expiry_date_1'];
        $qty = $_POST['recipe_qty_1'];
        $supplier = $_POST['recipe_supplier_1'];

        $this->Recipe_crud->insert_recipe_information($ar_name, $en_name, $details, $barcode, $brand_id, $invoive_number, $size, $color, $weight, $cost_price, $sale_price, $whole_price, $expiry_date, $qty, $supplier);
        redirect(rest_path('Recipe'));
    }

    public function update_recipe() {
        $recipe_id = $_GET['recipe_id'];
        $data['edit_recipe'] = $this->Recipe_model->get_recipe_by_id($recipe_id);
        $data['brand'] = $this->get_brand();
        $data['supplier'] = $this->get_supplier();
        $this->load->view('restaurant/recipe/update_recipe', $data);


        if (isset($_POST['edit_recipe'])) {
            $update_recipe = array(
                'en_name' => $_POST['recipe_en_name'],
                'ar_name' => $_POST['recipe_ar_name'],
                'details' => $_POST['recipe_details'],
                'barcode' => $_POST['recipe_barcode'],
                'brand_id' => $_POST['recipe_brand']
            );
            $this->Recipe_crud->update_recipe($recipe_id, $update_recipe);

            if (!empty($_POST['recipe_expiry_date_new'])) {
                $update_recipe_information = array(
                    'invoice_number' => $_POST['recipe_invoice_number'],
                    'size' => $_POST['recipe_size'],
                    'color' => $_POST['recipe_color'],
                    'weight' => $_POST['recipe_weight'],
                    'cost_price' => $_POST['recipe_cost_price'],
                    'sale_price' => $_POST['recipe_sale_price'],
                    'whole_price' => $_POST['recipe_whole_price'],
                    'expirey_date' => $_POST['recipe_expiry_date_new'],
                    'qty' => $_POST['recipe_qty'],
                    'supplier_id' => $_POST['recipe_supplier']
                );
            } else {
                $update_recipe_information = array(
                    'invoice_number' => $_POST['recipe_invoice_number'],
                    'size' => $_POST['recipe_size'],
                    'color' => $_POST['recipe_color'],
                    'weight' => $_POST['recipe_weight'],
                    'cost_price' => $_POST['recipe_cost_price'],
                    'sale_price' => $_POST['recipe_sale_price'],
                    'whole_price' => $_POST['recipe_whole_price'],
                    'expirey_date' => $_POST['recipe_expiry_date'],
                    'qty' => $_POST['recipe_qty'],
                    'supplier_id' => $_POST['recipe_supplier']
                );
            }

            $this->Recipe_crud->update_recipe_information($recipe_id, $update_recipe_information);
            redirect(rest_path('Recipe'));
        }
    }

    public function delete_recipe() {
        $recipe_id = $_GET['recipe_id'];
        $data['delete_recipe'] = $this->Recipe_crud->get_recipe_by_id($recipe_id);
        $this->load->view('restaurant/recipe/delete_recipe', $data);

        if (isset($_POST['delete_recipe'])) {
            $this->Recipe_crud->delete_recipe($recipe_id);
            redirect(rest_path('Recipe'));
        }
    }

    public function download_recipe_excel() {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ar_name');
        $sheet->setCellValue('B1', 'en_name');
        $sheet->setCellValue('C1', 'details');
        $sheet->setCellValue('D1', 'barcode');
        $sheet->setCellValue('E1', 'invoice_number');
        $sheet->setCellValue('F1', 'size');
        $sheet->setCellValue('G1', 'color');
        $sheet->setCellValue('H1', 'weight');
        $sheet->setCellValue('I1', 'cost_price');
        $sheet->setCellValue('J1', 'sale_price');
        $sheet->setCellValue('K1', 'whole_price');
        $sheet->setCellValue('L1', 'qty');

        $writer = new Xlsx($spreadsheet);

        $filename = 'add_recipe_template';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

        $writer->save('php://output');
    }

    //function to show excel data into table for level one
    public function upload_recipe_excel() {
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
                $createArray = array('ar_name', 'en_name', 'details', 'barcode', 'invoice_number', 'size', 'color', 'weight', 'cost_price', 'sale_price', 'whole_price', 'qty');
                $makeArray = array('ar_name' => 'ar_name', 'en_name' => 'en_name', 'details' => 'details', 'barcode' => 'barcode', 'invoice_number' => 'invoice_number', 'size' => 'size', 'color' => 'color', 'weight' => 'weight', 'cost_price' => 'cost_price', 'sale_price' => 'sale_price', 'whole_price' => 'whole_price', 'qty' => 'qty');

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
                        $ar_name = $SheetDataKey['ar_name'];
                        $en_name = $SheetDataKey['en_name'];
                        $details = $SheetDataKey['details'];
                        $barcode = $SheetDataKey['barcode'];
                        $invoice_number = $SheetDataKey['invoice_number'];
                        $size = $SheetDataKey['size'];
                        $color = $SheetDataKey['color'];
                        $weight = $SheetDataKey['weight'];
                        $cost_price = $SheetDataKey['cost_price'];
                        $sale_price = $SheetDataKey['sale_price'];
                        $whole_price = $SheetDataKey['whole_price'];
                        $qty = $SheetDataKey['qty'];

                        $ar_name = filter_var(trim($allDataInSheet[$i][$ar_name]), FILTER_SANITIZE_STRING);
                        $en_name = filter_var(trim($allDataInSheet[$i][$en_name]), FILTER_SANITIZE_STRING);
                        $details = filter_var(trim($allDataInSheet[$i][$details]), FILTER_SANITIZE_STRING);
                        $barcode = filter_var(trim($allDataInSheet[$i][$barcode]), FILTER_SANITIZE_STRING);
                        $invoice_number = filter_var(trim($allDataInSheet[$i][$invoice_number]), FILTER_SANITIZE_STRING);
                        $size = filter_var(trim($allDataInSheet[$i][$size]), FILTER_SANITIZE_STRING);
                        $color = filter_var(trim($allDataInSheet[$i][$color]), FILTER_SANITIZE_STRING);
                        $weight = filter_var(trim($allDataInSheet[$i][$weight]), FILTER_SANITIZE_STRING);
                        $cost_price = filter_var(trim($allDataInSheet[$i][$cost_price]), FILTER_SANITIZE_STRING);
                        $sale_price = filter_var(trim($allDataInSheet[$i][$sale_price]), FILTER_SANITIZE_STRING);
                        $whole_price = filter_var(trim($allDataInSheet[$i][$whole_price]), FILTER_SANITIZE_STRING);
                        $qty = filter_var(trim($allDataInSheet[$i][$qty]), FILTER_SANITIZE_STRING);

                        $fetchData = array('ar_name' => $ar_name, 'en_name' => $en_name, 'details' => $details, 'barcode' => $barcode, 'invoice_number' => $invoice_number, 'size' => $size, 'color' => $color, 'weight' => $weight, 'cost_price' => $cost_price, 'sale_price' => $sale_price, 'whole_price' => $whole_price, 'qty' => $qty);
                        $data['dataInfo'] = $fetchData;
                        array_push($mydata, $fetchData);
                    }
                }
                $data['mydata'] = $mydata;
                $data['title'] = $this->lang->line('admin_recipe');
                $data['page'] = rest_path('recipe/display_recipe_excel');
                $data['brand'] = $this->get_brand();
                $data['supplier'] = $this->get_supplier();
                $this->load->view('index', $data);
            }
        }
    }

    //function to checke validation for excel extension
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

    public function insert_recipe_excel() {
        $counter = $_POST['recipe_form_number'];

        for ($i = 0; $i < $counter; $i++) {
            $ar_name = $_POST['recipe_ar_name_' . $i];
            $en_name = $_POST['recipe_en_name' . $i];
            $details = $_POST['recipe_details_' . $i];
            $barcode = $_POST['recipe_barcode_' . $i];

            if ($_POST['recipe_brand_' . $i] == 0) {
                $brand_id = NULL;
            } else {
                $brand_id = $_POST['recipe_brand_' . $i];
            }

            $invoice_number = $_POST['recipe_invoice_number_' . $i];
            $size = $_POST['recipe_size_' . $i];
            $color = $_POST['recipe_color_' . $i];
            $weight = $_POST['recipe_weight_' . $i];
            $cost_price = $_POST['recipe_cost_price_' . $i];
            $sale_price = $_POST['recipe_sale_price_' . $i];
            $whole_price = $_POST['recipe_whole_price_' . $i];
            $qty = $_POST['recipe_qty_' . $i];

            if ($_POST['recipe_supplier_' . $i] == 0) {
                $supplier = NULL;
            } else {
                $supplier = $_POST['recipe_supplier_' . $i];
            }
            $expiry_date = $_POST['recipe_expiry_date_' . $i];


            $this->Recipe_crud->insert_recipe_excel($ar_name, $en_name, $details, $barcode, $brand_id);
            $recipe_id = $this->db->insert_id();
            $this->Recipe_crud->insert_recipe_information_excel($invoice_number, $size, $color, $weight, $cost_price, $sale_price, $whole_price, $expiry_date, $qty, $supplier, $recipe_id);
        }
        redirect(rest_path('Recipe'));
    }

}
