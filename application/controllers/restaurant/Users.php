<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(rest_path('main/User_type_crud'));
        $this->load->model(rest_path('main/Users_crud'));
        $this->load->model(rest_path('users/Users_model'));
    }

    public function index() {
        $data['title'] = $this->lang->line('users');
        $data['user_type'] = $this->get_user_type();
        $data['user_device'] = $this->get_device();
        $data['user_branch_location'] = $this->get_branch_location();
        $data['users'] = $this->get_users();
        $data['page'] = rest_path('users/view_users');
        $this->load->view('index', $data);
    }

    //function to get user type
    public function get_user_type() {
        $data['user_type'] = $this->User_type_crud->get_user_type();
        return $data['user_type'];
    }

    //function to get device 
    public function get_device() {
        $data['user_device'] = $this->Users_crud->get_device();
        return $data['user_device'];
    }

    //function to get branch and location
    public function get_branch_location() {
        $data['user_branch_location'] = $this->Users_model->get_branch_location();
        return $data['user_branch_location'];
    }

    //function to insert user information
    public function get_users_form_by_ajax() {
        $user_count = $_POST['id'];
        $data['user_id'] = $user_count;
        $data['user_type'] = $this->get_user_type();
        $data['user_device'] = $this->get_device();
        $data['user_branch_location'] = $this->get_branch_location();
        $this->load->view('restaurant/users/insert_users', $data);
    }

    //function to insert user 
    public function insert_users() {
        if (isset($_POST['save_users'])) {
            $counter = $_POST['users_form_number'];
            $data = array();
            for ($i = 1; $i <= $counter; $i++) {

                $username = $_POST['username_' . $i];
                $password = md5($_POST['password_' . $i]);
                $user_type = $_POST['user_type_' . $i];
                if ($device = $_POST['device_' . $i] == '') {
                    $device = NULL;
                } else {
                    $device = $_POST['device_' . $i];
                }

                $branch_location = $_POST['branch_location_' . $i];
                for ($x = 0; $x < count($branch_location); $x++) {
                    $branch_location_id = $branch_location[$x];
                    $sub_array = array('username' => $username, 'password' => $password, 'user_type_id' => $user_type, 'device_id' => $device, 'branch_location_id' => $branch_location_id);
                    array_push($data, $sub_array);
                }
            }
            $this->Users_crud->insert_users($data);
            redirect(rest_path('Users'));
        }
    }

    //function to get user 
    public function get_users() {
        $data['users'] = $this->Users_model->get_users();
        return $data['users'];
    }

    //function to update user information
    public function update_users_information_by_id() {
        $user_id = $_GET['id'];

        $data['user_type'] = $this->get_user_type();
        $data['user_device'] = $this->get_device();
        $data['user_branch_location'] = $this->get_branch_location();

        $data['users_information'] = $this->Users_crud->update_users_by_id($user_id);
        $this->load->view('restaurant/users/update_users_modal', $data);

        if (isset($_POST['update_user_information'])) {
            if ($_POST['update_device'] == '') {
                $update_users = array(
                    'username' => $_POST['update_username'],
                    'password' => $_POST['update_password'],
                    'user_type_id' => $_POST['update_type_user'],
                    'device_id' => NULL,
                );
                $this->Users_crud->update_users_information($user_id, $update_users);
                redirect(rest_path('Users'));
            } else {
                $update_users = array(
                    'username' => $_POST['update_username'],
                    'password' => md5($_POST['update_password']),
                    'user_type_id' => $_POST['update_type_user'],
                    'device_id' => $_POST['update_device'],
                );
                $this->Users_crud->update_users_information($user_id, $update_users);
                redirect(rest_path('Users'));
            }
        }
    }

    //function to delete user
    public function delete_users() {
        $users_id = $_GET['delete_user_id'];
        $data['delete_user'] = $this->Users_crud->delete_users_by_id($users_id);
        $this->load->view('restaurant/users/delete_users_modal', $data);

        if (isset($_POST['delete_users'])) {
            $this->Users_crud->delete_users($users_id);
            redirect(rest_path('Users'));
        }
    }

    public function branch_location_filter() {
        $branch_location_id = $_GET['branch_location_id'];
        $data['branch_loc_id'] = $this->Users_model->get_branch_location_by_id($branch_location_id);
        $this->load->view('restaurant/users/branch_location_filter', $data);
    }

    //function to download excel template
    public function download_users_excel_sheet() {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'username');
        $sheet->setCellValue('B1', 'password');

        $writer = new Xlsx($spreadsheet);

        $filename = 'add_users_template';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

        $writer->save('php://output');
    }

    //function to show excel data into table 
    public function upload_users_excel() {


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
                $createArray = array('username', 'password');
                $makeArray = array('username' => 'username', 'password' => 'password');
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
                        $username = $SheetDataKey['username'];
                        $password = $SheetDataKey['password'];

                        $username = filter_var(trim($allDataInSheet[$i][$username]), FILTER_SANITIZE_STRING);
                        $password = filter_var(trim($allDataInSheet[$i][$password]), FILTER_SANITIZE_STRING);
                        $fetchData = array('username' => $username, 'password' => $password);
                        $data['dataInfo'] = $fetchData;
                        array_push($mydata, $fetchData);
                    }
                }
                $data['mydata'] = $mydata;
                $data['user_type'] = $this->get_user_type();
                $data['user_device'] = $this->get_device();
                $data['user_branch_location'] = $this->get_branch_location();
                $data['title'] = $this->lang->line('admin_users');
                $data['page'] = rest_path('users/display_users_excel');
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
    public function insert_users_excel() {
        $counter = $_POST['users_form_number'];
        $data = array();
        for ($i = 0; $i < $counter; $i++) {
            $username = $_POST['username_' . $i];
            $password = $_POST['password_' . $i];
            $user_type = $_POST['user_type_' . $i];
            if ($device = $_POST['device_' . $i] == '') {
                $device = NULL;
            } else {
                $device = $_POST['device_' . $i];
            }
            $branch_location = $_POST['branch_location_' . $i];
            for ($x = 0; $x < count($branch_location); $x++) {
                $branch_location_id = $branch_location[$x];
                $sub_array = array('username' => $username, 'password' => $password, 'user_type_id' => $user_type, 'device_id' => $device, 'branch_location_id' => $branch_location_id);
                array_push($data, $sub_array);
            }
        }
        $this->Users_model->import_users_data($data);
        redirect(rest_path('Users'));
    }

}
