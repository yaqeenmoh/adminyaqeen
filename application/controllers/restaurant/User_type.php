<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class User_type extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(rest_path('main/User_type_crud'));
        $this->load->model(rest_path('user_type/User_type_model'));
    }

    public function index() {
        $data['title'] = $this->lang->line('admin_user_type');
        $data['user_type'] = $this->get_user_type();
        $data['page'] = rest_path('user_type/view_user_type');
        $this->load->view('index', $data);
    }

    //function to show user type in view
    public function get_user_type() {
        $data['user_type'] = $this->User_type_crud->get_user_type();
        return $data['user_type'];
    }

    public function get_users_type_form_by_ajax() {
        $user_type_count = $_POST['id'];
        $data['user_type_id'] = $user_type_count;
        $this->load->view('restaurant/user_type/insert_user_type_form', $data);
    }

// function to insert new user type
    public function insert_user_type() {
        $counter = $_POST['users_type_form_number'];
        $data = array();
        for ($i = 1; $i <= $counter; $i++) {
            $name = $_POST['name_' . $i];
            $discount_percentage = $_POST['discount_percentage_' . $i];
            $sub_array = array('name' => $name, 'discount_percentage' => $discount_percentage / 100);
            array_push($data, $sub_array);
        }
        $this->User_type_crud->insert_user_type($data);
        redirect(rest_path('User_type'));
    }

//function to update user type information
    public function update_user_type() {
        $user_type_id = $_GET['user_type_id_'];
        $data['edit_user_type'] = $this->User_type_crud->update_users_type_by_id($user_type_id);
        $this->load->view('restaurant/user_type/update_user_type', $data);

        if (isset($_POST['edit_user_type'])) {
            $update_user_type = array(
                'name' => $_POST['user_name'],
                'discount_percentage' => $_POST['user_discount']
            );
            $this->User_type_crud->update_user_type($user_type_id, $update_user_type);
            redirect(rest_path('User_type'));
        }
    }

    //function to delete user type only or delete usertype with users
    public function delete_user_type() {
        $user_id = $_GET['userType_id_'];
        $data['delete_user_type'] = $this->User_type_crud->delete_users_type_by_id($user_id);
        $this->load->view('restaurant/user_type/delete_user_type_modal', $data);


        if (isset($_POST['delete_user_type_and_users'])) {
            $this->User_type_crud->delete_user_type_and_users($user_id);
            redirect(rest_path('User_type'));
        }

        if (isset($_POST['delete_user_type'])) {
            $this->User_type_crud->delete_user_type($user_id);
            redirect(rest_path('User_type'));
        }
    }

    //function to download excel template
    public function download_user_type_excel() {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'name');
        $sheet->setCellValue('B1', 'discount_percentage');

        $writer = new Xlsx($spreadsheet);

        $filename = 'add_user_type_template.Xlsx';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

        $writer->save('php://output');
    }

    //function to show excel data into table
    public function upload_user_type_excel() {
        $data = array();
        $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
        if ($this->form_validation->run() == false) {
            $data['title'] = $this->lang->line('admin_user_type');
            $data['user_type'] = $this->get_user_type();
            $data['page'] = rest_path('user_type/view_user_type');
            $this->load->view('index', $data);
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
                $createArray = array('name', 'discount_percentage');
                $makeArray = array('name' => 'name', 'discount_percentage' => 'discount_percentage');
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
                        $name = $SheetDataKey['name'];
                        $discount_percentage = $SheetDataKey['discount_percentage'];

                        $name = filter_var(trim($allDataInSheet[$i][$name]), FILTER_SANITIZE_STRING);
                        $discount_percentage = filter_var(trim($allDataInSheet[$i][$discount_percentage]), FILTER_SANITIZE_STRING);
                        $fetchData = array('name' => $name, 'discount_percentage' => $discount_percentage);
                        $data['dataInfo'] = $fetchData;
                        array_push($mydata, $fetchData);
                    }
                }
                $data['mydata'] = $mydata;
                $data['title'] = $this->lang->line('admin_user_type');
                $data['page'] = rest_path('user_type/display_user_type_excel');
                $this->load->view('index', $data);
            }
        }
    }

    //function to validate excel extension
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

    //function to insert excel data into database
    public function insert_user_type_excel() {
        $counter = $_POST['users_type_form_number'];
        $data = array();
        for ($i = 0; $i < $counter; $i++) {
            $user_type = $_POST['user_type_' . $i];
            $discount_percentage = $_POST['discount_percentage_' . $i];
            $sub_array = array('name' => $user_type, 'discount_percentage' => $discount_percentage / 100);
            array_push($data, $sub_array);
        }
        $this->User_type_crud->insert_user_type($data);
        redirect(rest_path('User_type'));
    }

}
