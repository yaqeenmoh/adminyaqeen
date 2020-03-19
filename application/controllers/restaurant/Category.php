<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(rest_path('main/Category_crud'));
        $this->load->model(rest_path('category/Category_model'));
    }

    public function index() {
        $data['title'] = $this->lang->line('admin_category');
        $data['get_category'] = $this->get_category();
        $data['category_branch_location'] = $this->get_branch_location();
        $data['get_printer'] = $this->get_printer();
        $data['page'] = rest_path('category/view_category');
        $this->load->view('index', $data);
    }

//function to get category 
    public function get_category() {
        $data['get_category'] = $this->Category_model->get_category();
        return $data['get_category'];
    }

//function to update category
    public function update_category() {
        $category_id = $_GET['category_id'];
        $data['category_branch_location'] = $this->get_branch_location();
        $data['update_category'] = $this->Category_crud->get_category_by_id($category_id);
        $this->load->view('restaurant/category/update_category', $data);


        if (isset($_POST['save_update_category'])) {
            $imagename = $_FILES['category_image_upload']['name'];
            if (!empty($imagename)) {

                $config['upload_path'] = "assets/lib/images/category/";
                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('category_image_upload')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $success = array('image_metadata' => $this->upload->data());
                }

                $update_category = array(
                    'ar_name' => $_POST['category_ar_name'],
                    'en_name' => $_POST['category_en_name'],
                    'discount' => $_POST['category_discount'],
                    'image' => $imagename
                );
                $this->Category_crud->update_category_information($category_id, $update_category);
                redirect(rest_path('Category'));
            } else {
                $update_category = array(
                    'ar_name' => $_POST['category_ar_name'],
                    'en_name' => $_POST['category_en_name'],
                    'discount' => $_POST['category_discount'],
                    'image' => $_POST['category_image']
                );
                $this->Category_crud->update_category_information($category_id, $update_category);
                redirect(rest_path('Category'));
            }
        }
    }

//function to get branch and location
    public function get_branch_location() {
        $data['category_branch_location'] = $this->Category_model->get_branch_location();
        return $data['category_branch_location'];
    }

//function to delete category
    public function delete_category() {
        $category_id = $_GET['category_id'];

        $data['delete_category'] = $this->Category_crud->get_category_by_id($category_id);
        $this->load->view('restaurant/category/delete_category_model', $data);

        if (isset($_POST['delete_category_yes'])) {
            $this->Category_crud->delete_category_sub_category_item($category_id);
            redirect(rest_path('Category'));
        }

        if (isset($_POST['delete_category_no'])) {
            $this->Category_crud->delete_category($category_id);
            redirect(rest_path('Category'));
        }
    }

    public function branch_location_filter() {
        $branch_location_id = $_GET['branch_location_id'];
        $data['branch_loc_id'] = $this->Category_model->get_branch_location_by_id($branch_location_id);
        $this->load->view('restaurant/category/filter_branch_location', $data);
    }

    //function to get printer that would to print this category on it
    public function get_printer() {
        $data['get_printer'] = $this->Category_crud->get_printer();
        return $data['get_printer'];
    }

//function to insert category information
    public function get_category_form_by_ajax() {
        $category_count = $_POST['id'];
        $data['category_id'] = $category_count;
        $data['category_branch_location'] = $this->get_branch_location();
        $data['get_printer'] = $this->get_printer();
        $this->load->view('restaurant/category/insert_category_form', $data);
    }

//function to insert category 
    public function insert_category() {
        $counter = $_POST['category_form_number'];
        $data = array();
        for ($i = 1; $i <= $counter; $i++) {

            $config['upload_path'] = "assets/lib/images/category/";
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);

            $imagename = $_FILES['category_image_' . $i]['name'];
            $this->upload->initialize($config);


            if (!$this->upload->do_upload('category_image_' . $i)) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $success = array('image_metadata' => $this->upload->data());
            }

            $ar_name = $_POST['category_ar_name_' . $i];
            $en_name = $_POST['category_en_name_' . $i];
            $discount = $_POST['category_discount_' . $i];


            if (isset($_POST['category_printer_' . $i])) {
                $printer = json_encode($_POST['category_printer_' . $i]);
            } else {
                $printer = NULL;
            }

            if (isset($_POST['category_brnach_location_' . $i])) {
                $branch_location = $_POST['category_brnach_location_' . $i];
                foreach ($branch_location as $key => $value) {
                    $branch_location_id = $value;
                    $sub_array = array('ar_name' => $ar_name, 'en_name' => $en_name, 'discount' => $discount / 100, 'branch_location_id' => $branch_location_id, 'image' => $imagename, 'printer_id' => $printer);
                    array_push($data, $sub_array);
                }
            } else {
                $branch_location_id = NULL;
                $sub_array = array('ar_name' => $ar_name, 'en_name' => $en_name, 'discount' => $discount / 100, 'branch_location_id' => $branch_location_id, 'image' => $imagename, 'printer_id' => $printer);
                array_push($data, $sub_array);
            }
        }
        $this->Category_crud->insert_category($data);
        redirect(rest_path('Category'));
    }

//function to download excel template
    public function download_category_excel_sheet() {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ar_name');
        $sheet->setCellValue('B1', 'en_name');
        $sheet->setCellValue('C1', 'discount');

        $writer = new Xlsx($spreadsheet);

        $filename = 'add_category_template';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

        $writer->save('php://output');
    }

//function to show excel data in to table
    public function upload_category_excel() {
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
                $data['title'] = $this->lang->line('admin_category');
                $data['page'] = rest_path('category/display_category_excel');
                $data['get_printer'] = $this->get_printer();
                $data['category_branch_location'] = $this->get_branch_location();
                $this->load->view('index', $data);
            }
        }
    }

//function to check validation of excel extension
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

//function to insert the data in excel into database
    public function insert_category_excel() {
        $counter = $_POST['category_excel_form_number'];
        $data = array();
        for ($i = 0; $i < $counter; $i++) {
            $config['upload_path'] = "assets/lib/images/category/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            $imagename = $_FILES['image_' . $i]['name'];
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image_' . $i)) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $success = array('image_metadata' => $this->upload->data());
            }

            $ar_name = $_POST['ar_name_' . $i];
            $en_name = $_POST['en_name_' . $i];
            $discount = $_POST['discount_' . $i];
            if (isset($_POST['category_printer_' . $i])) {
                $printer = json_encode($_POST['category_printer_' . $i]);
            } else {
                $printer = NULL;
            }

            if (isset($_POST['branch_location_' . $i])) {
                $branch_location = $_POST['branch_location_' . $i];

                foreach ($branch_location as $key => $value) {
                    $branch_location_id = $value;
                    $sub_array = array('ar_name' => $ar_name, 'en_name' => $en_name, 'discount' => $discount / 100, 'branch_location_id' => $branch_location_id, 'image' => $imagename, 'printer_id' => $printer);
                    array_push($data, $sub_array);
                }
            } else {
                $branch_location_id = NULL;
                $sub_array = array('ar_name' => $ar_name, 'en_name' => $en_name, 'discount' => $discount / 100, 'branch_location_id' => $branch_location_id, 'image' => $imagename, 'printer_id' => $printer);
                array_push($data, $sub_array);
            }
        }
        $this->Category_crud->insert_category($data);
        redirect(rest_path('Category'));
    }

}
