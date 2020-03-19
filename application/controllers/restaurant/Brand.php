<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Brand extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(rest_path('main/Brand_crud'), 'brands');
        $this->load->model(rest_path('brand/Brand_model'), 'brands_location');
    }

    public function index($id = 0) {
        $this->load->library('form_validation');
        $data['title'] = $this->lang->line('title-brand');
        $data['brands'] = $this->brands->getBrand(0);
        $data['brands_location'] = $this->brands_location->getBrandByBranchLocation();
        $data['branches'] = $this->brands_location->getBranchById();
        $data['page'] = rest_path('brands/view_brands');
        $this->load->view('index', $data);
    }

    public function addNewBrand() {
        $data['id'] = $_POST['id'];
        $data['brands'] = $this->brands->getBrand(0);
        $data['brands_location'] = $this->brands_location->getBrandByBranchLocation();
        $data['branches'] = $this->brands_location->getBranchById();
        $this->load->view('restaurant/brands/add_new_brands', $data);
    }

    public function save_brand() {

        if (isset($_POST['brand_validation'])) {
            $counter = $_POST['brand_form_number'];
            $data_array = array();
            for ($i = 1; $i <= $counter; $i++) {
                $ar_name = $this->input->post('ar_name_' . $i);
                $en_name = $this->input->post('en_name_' . $i);

                if (isset($_POST['branch_location_id_' . $i])) {
                    $location = $this->input->post('branch_location_id_' . $i);
                    foreach ($location as $key => $value) {
                        $branch_location = $value;
                        $sub_array = array('ar_name' => $ar_name, 'en_name' => $en_name, 'branch_location_id' => $branch_location);
                        array_push($data_array, $sub_array);
                    }
                } else {
                    $branch_location = NULL;
                    $sub_array = array('ar_name' => $ar_name, 'en_name' => $en_name, 'branch_location_id' => $branch_location);
                    array_push($data_array, $sub_array);
                }
            }
            $this->brands->saveBrand($data_array);
            redirect(rest_path('Brand'));
        }
    }

    // function to update brand 
    public function update_brand() {
        $brand_id = $_GET['brand_id'];
        $data['brand'] = $this->brands->get_brand_by_id($brand_id);
        $data['branches'] = $this->brands_location->getBranchById();
        $this->load->view('restaurant/brands/update_brand_model', $data);

        if (isset($_POST['update_brand'])) {
            $brandArray = Array(
                'ar_name' => $this->input->post('brand_ar_name'),
                'en_name' => $this->input->post('brand_en_name'),
                'branch_location_id' => $this->input->post('update_branch_location'),
            );
            $this->brands->updateBrandData($brand_id, $brandArray);
            redirect(rest_path('Brand'));
        }
    }

// function to delete brand whether delete items that depends on brand or delete brand only 
    public function deleteBrand() {

        $brand_id = $_GET['brand_id'];
        $data['brandItems'] = $this->brands->get_brand_by_id($brand_id);
        $this->load->view('restaurant/brands/brand_delete_modal', $data);
        if (isset($_POST['delete_brand'])) {
            if (isset($_POST['brand'])) {
                $this->brands->deleteBrandByBrandId($brand_id);
                $this->brands->deleteBrandItems($brand_id);
                redirect(rest_path('Brand'));
            } else {
                $this->brands->deleteBrandByBrandId($brand_id);
                $this->db->brands->updateItemBrandToDefault($brand_id);
                redirect(rest_path('Brand'));
            }
        }
    }

    public function download_brand_excel() {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'arabic_name');
        $sheet->setCellValue('B1', 'english_name');

        $writer = new Xlsx($spreadsheet);

        $filename = 'add_brand_template.Xlsx';
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

        $writer->save('php://output');
    }

    public function upload_brand_excel() {
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
                $createArray = array('arabic_name', 'english_name');
                $makeArray = array('arabic_name' => 'arabic_name', 'english_name' => 'english_name');
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
                        $ar_name = $SheetDataKey['arabic_name'];
                        $en_name = $SheetDataKey['english_name'];

                        $ar_name = filter_var(trim($allDataInSheet[$i][$ar_name]), FILTER_SANITIZE_STRING);
                        $en_name = filter_var(trim($allDataInSheet[$i][$en_name]), FILTER_SANITIZE_STRING);
                        $fetchData = array('arabic_name' => $ar_name, 'english_name' => $en_name);
                        $data['dataInfo'] = $fetchData;
                        array_push($mydata, $fetchData);
                    }
                }
                $data['mydata'] = $mydata;
                $data['title'] = $this->lang->line('title-brand');
                $data['branches'] = $this->brands_location->getBranchById();
                $data['page'] = rest_path('brands/dispaly_brand_excel');
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
                $this->form_validation->set_message('checkFileValidation', $this->lang->line('excel_choose_correct_file'));
                return false;
            }
        } else {
            $this->form_validation->set_message('checkFileValidation', $this->lang->line('excel_choose_file'));
            return false;
        }
    }

    public function insert_brand_excel() {
        $counter = $_POST['brand_excel_form_number'];
        $data = array();

        for ($i = 0; $i < $counter; $i++) {
            $ar_name = $_POST['ar_name_' . $i];
            $en_name = $_POST['en_name_' . $i];

            if (isset($_POST['branch_location_id_' . $i])) {
                $branch_location = $_POST['branch_location_id_' . $i];
                foreach ($branch_location as $key => $value) {
                    $branch_location_id = $value;
                    $sub_array = array('ar_name' => $ar_name, 'en_name' => $en_name, 'branch_location_id' => $branch_location_id);
                    array_push($data, $sub_array);
                }
            } else {
                $branch_location_id = NULL;
                $sub_array = array('ar_name' => $ar_name, 'en_name' => $en_name, 'branch_location_id' => $branch_location_id);
                array_push($data, $sub_array);
            }
        }
        $this->brands->import_brand_data($data);
        redirect(rest_path('Brand'));
    }

}
