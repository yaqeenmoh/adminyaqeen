<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Sub_category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(rest_path('main/Sub_category_crud'));
        $this->load->model(rest_path('main/Category_crud'));
        $this->load->model(rest_path('sub_category/Sub_category_model'));
    }

    public function index() {
        $data['title'] = $this->lang->line('sub_category');
        $data['page'] = rest_path('sub_category/view_sub_category');
        $data['sub_category'] = $this->get_sub_category_and_category();
        $data['category'] = $this->Category_crud->get_category();
        $this->load->view('index', $data);
    }

    //function to get sub category
    public function get_sub_category() {
        $data['sub_category_information'] = $this->Sub_category_crud->get_sub_category();
        return $data['sub_category_information'];
    }

    public function get_sub_category_and_category() {
        $data['sub_category'] = $this->Sub_category_model->get_sub_category_and_category();
        return $data['sub_category'];
    }

    //function to view form if user select level 1
    public function sub_level_view() {
        $level = $_GET['sub_level'];
        $data['level'] = $level;
        $data['category'] = $this->Category_crud->get_category();
        $this->load->view('restaurant/sub_category/sub_level_form', $data);
    }

    //function to view form if user select other level
    public function sub_other_level_view() {
        $other_level = $_GET['sub_level'];
        $data['level'] = $other_level;
        $data['sub_category_information'] = $this->get_sub_category();
        $this->load->view('restaurant/sub_category/sub_other_level_form', $data);
    }

    //function to load sub category form 
    public function get_sub_category_form_by_ajax() {
        $sub_category_count = $_POST['id'];
        $data['sub_category_id'] = $sub_category_count;
        $data['category'] = $this->Category_crud->get_category();
        $this->load->view('restaurant/sub_category/insert_sub_category_form', $data);
    }

    //function to get insert multi form if choose other level
    public function get_sub_category_other_level_form_by_ajax() {
        $sub_category_count = $_POST['id'];
        $data['sub_category_id'] = $sub_category_count;
        $data['sub_category_information'] = $this->get_sub_category();
        $this->load->view('restaurant/sub_category/insert_sub_category_other_level_form', $data);
    }

    //function to inset sub category data 
    public function insert_sub_category() {
        $counter = $_POST['sub_category_form_number'];
        $data = array();
        for ($i = 1; $i <= $counter; $i++) {

            $ar_name = $_POST['sub_category_ar_name_' . $i];
            $en_name = $_POST['sub_category_en_name_' . $i];
            $discount = $_POST['sub_category_discount_' . $i];
            $category = $_POST['sub_category_' . $i];

            $sub_array = array('ar_name' => $ar_name, 'en_name' => $en_name, 'discount' => $discount / 100, 'sub_level' => $category);
            array_push($data, $sub_array);
        }
        $this->Sub_category_crud->insert_sub_category($data);
        redirect(rest_path('Sub_category'));
    }

    //function to update sub category
    public function update_sub_category() {
        $sub_category_id = $_GET['sub_category_id'];
        $data['update_sub_category'] = $this->Sub_category_crud->get_sub_category_by_id($sub_category_id);
        $data['sub_category_level'] = $this->Sub_category_model->get_sub_category_and_category();
        $this->load->view('restaurant/sub_category/update_sub_category', $data);

        if (isset($_POST['save_update_sub_category'])) {
            $update_sub_category = array(
                'ar_name' => $_POST['sub_category_ar_name'],
                'en_name' => $_POST['sub_category_en_name'],
                'discount' => $_POST['sub_category_discount'],
                'sub_level' => $_POST['sub_category_category'],
            );
            $this->Sub_category_crud->update_sub_category($sub_category_id, $update_sub_category);
            redirect(rest_path('Sub_category'));
        }
    }

    //function to delete sub category
    public function delete_sub_category() {
        $sub_category_id = $_GET['sub_category_id'];
        $data['delete_sub_category'] = $this->Sub_category_crud->get_sub_category_by_id($sub_category_id);
        $this->load->view('restaurant/sub_category/delete_sub_category_model', $data);
        if (isset($_POST['delete_sub_category'])) {
            $this->Sub_category_crud->delete_sub_category($sub_category_id);
            redirect(rest_path('Sub_category'));
        }
    }

    //function to download excel template for sub category
    public function download_sub_category_excel_sheet() {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ar_name');
        $sheet->setCellValue('B1', 'en_name');
        $sheet->setCellValue('C1', 'discount');

        $writer = new Xlsx($spreadsheet);

        $filename = 'add_sub_category_template';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

        $writer->save('php://output');
    }

    //function to show excel data into table for level one
    public function upload_sub_category_excel() {
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
                $createArray = array('ar_name', 'en_name', 'discount');
                $makeArray = array('ar_name' => 'ar_name', 'en_name' => 'en_name', 'discount' => 'discount');

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
                        $discount = $SheetDataKey['discount'];

                        $ar_name = filter_var(trim($allDataInSheet[$i][$ar_name]), FILTER_SANITIZE_STRING);
                        $en_name = filter_var(trim($allDataInSheet[$i][$en_name]), FILTER_SANITIZE_STRING);
                        $discount = filter_var(trim($allDataInSheet[$i][$discount]), FILTER_SANITIZE_STRING);

                        $fetchData = array('ar_name' => $ar_name, 'en_name' => $en_name, 'discount' => $discount);
                        $data['dataInfo'] = $fetchData;
                        array_push($mydata, $fetchData);
                    }
                }
                $data['mydata'] = $mydata;
                $data['title'] = $this->lang->line('admin_sub_category');
                $data['page'] = rest_path('sub_category/display_sub_category_excel');
                $data['category'] = $this->Category_crud->get_category();
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

    //function to load view that will upload excel for level one
    public function sub_level_view_excel() {
        $level = $_GET['sub_level'];
        $data['level'] = $level;
        $this->load->view('restaurant/sub_category/one_level_excel', $data);
    }

//function to load view that will upload excel for other level
    public function sub_other_level_view_excel() {
        $level = $_GET['sub_level'];
        $data['level'] = $level;
        $this->load->view('restaurant/sub_category/other_level_excel', $data);
    }

    //function to show excel data into table for other level
    public function upload_sub_other_level_view_excel() {
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
                $createArray = array('ar_name', 'en_name', 'discount');
                $makeArray = array('ar_name' => 'ar_name', 'en_name' => 'en_name', 'discount' => 'discount');

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
                        $discount = $SheetDataKey['discount'];

                        $ar_name = filter_var(trim($allDataInSheet[$i][$ar_name]), FILTER_SANITIZE_STRING);
                        $en_name = filter_var(trim($allDataInSheet[$i][$en_name]), FILTER_SANITIZE_STRING);
                        $discount = filter_var(trim($allDataInSheet[$i][$discount]), FILTER_SANITIZE_STRING);

                        $fetchData = array('ar_name' => $ar_name, 'en_name' => $en_name, 'discount' => $discount);
                        $data['dataInfo'] = $fetchData;
                        array_push($mydata, $fetchData);
                    }
                }
                $data['mydata'] = $mydata;
                $data['title'] = $this->lang->line('admin_sub_category');
                $data['page'] = rest_path('sub_category/display_sub_category_other_level_excel');
                $data['sub_category_information'] = $this->get_sub_category();
                $this->load->view('index', $data);
            }
        }
    }

    // function to insert excel data into database
    public function insert_sub_category_excel() {
        $counter = $_POST['sub_category_excel_form_number'];
        $data = array();
        for ($i = 0; $i < $counter; $i++) {
            $ar_name = $_POST['ar_name_' . $i];
            $en_name = $_POST['en_name_' . $i];
            $discount = $_POST['discount_' . $i];

            $category = $_POST['category_' . $i];


            $sub_array = array('ar_name' => $ar_name, 'en_name' => $en_name, 'discount' => $discount / 100, 'sub_level' => $category);
            array_push($data, $sub_array);
        }
        $this->Sub_category_crud->insert_sub_category($data);
        redirect(rest_path('Sub_category'));
    }

}
