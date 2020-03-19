<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Customers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(rest_path('main/Customer_crud'));
    }

    public function index() {
        $data['title'] = $this->lang->line('customers');
        $data['customer_information'] = $this->get_customer_information();
        $data['page'] = rest_path('customers/view_customer');
        $this->load->view('index', $data);
    }

    //function to get customer information
    public function get_customer_information() {
        $data['customer_information'] = $this->Customer_crud->get_customer_information();
        return $data['customer_information'];
    }

    public function get_customers_form_by_ajax() {
        $customer_count = $_POST['id'];
        $data['customer_id'] = $customer_count;
        $this->load->view('restaurant/customers/insert_customer_form', $data);
    }

    //function to insert customer information
    public function insert_customer_information() {
        $counter = $_POST['customers_form_numeber'];
        $data = array();
        for ($i = 1; $i <= $counter; $i++) {

            $fname = $_POST['fname_' . $i];
            $lname = $_POST['lname_' . $i];
            $mobile = $_POST['mobile_' . $i];
            $phone = $_POST['phone_' . $i];
            $email = $_POST['email_' . $i];
            $company = $_POST['company_' . $i];
            $cash_discount = $_POST['cash_discount_' . $i];
            $percentage_discount = $_POST['percentage_discount_' . $i];
            $tax_free_number = $_POST['tax_free_number_' . $i];
            $customer_type = $_POST['customer_type_' . $i];
            $max_dept = $_POST['max_dept_' . $i];
            $discount_limit = $_POST['discount_limit_' . $i];

            $sub_array = array('fname' => $fname, 'lname' => $lname, 'mobile' => $mobile, 'phone' => $phone, 'email' => $email, 'company' => $company, 'customer_cash_discount' => $cash_discount, 'customer_percentage_discount' => $percentage_discount / 100, 'tax_free_number' => $tax_free_number, 'customer_type' => $customer_type, 'max_dept' => $max_dept, 'discount_limit' => $discount_limit);
            array_push($data, $sub_array);
        }
        $this->Customer_crud->insert_customer_inforamtion($data);
        redirect(rest_path('Customers'));
    }

    //function to update customer information
    public function update_customer_information() {
        $customer_id = $_GET['customer_id'];
        $data['edit_customer'] = $this->Customer_crud->update_customer_information_by_id($customer_id);
        $this->load->view('restaurant/customers/update_customer_modal', $data);

        if (isset($_POST['edit_customers'])) {
            $update_customer = array(
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'mobile' => $_POST['mobile'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'company' => $_POST['company'],
                'customer_cash_discount' => $_POST['cash_discount'],
                'customer_percentage_discount' => $_POST['percentage_discount'],
                'tax_free_number' => $_POST['tax_free_number'],
                'customer_type' => $_POST['customer_type'],
                'max_dept' => $_POST['max_dept'],
                'discount_limit' => $_POST['discount_limit'],
            );
            $this->Customer_crud->update_customer_information($customer_id, $update_customer);
            redirect(rest_path('Customers'));
        }
    }

    //function to delete customer information
    public function delete_customer_information() {
        $customer_id = $_GET['customer_id'];
        $data['delete_customer'] = $this->Customer_crud->delete_customer_by_id($customer_id);
        $this->load->view('restaurant/customers/delete_customer_modal', $data);

        if (isset($_POST['delete_customer'])) {
            $this->Customer_crud->delete_customer_information($customer_id);
            redirect(rest_path('Customers'));
        }
    }

    //function to download excel template for customer
    public function download_customers_excel_sheet() {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'fname');
        $sheet->setCellValue('B1', 'lname');
        $sheet->setCellValue('C1', 'mobile');
        $sheet->setCellValue('D1', 'phone');
        $sheet->setCellValue('E1', 'email');
        $sheet->setCellValue('F1', 'company');
        $sheet->setCellValue('G1', 'customer_cash_discount');
        $sheet->setCellValue('H1', 'customer_percentage_discount');
        $sheet->setCellValue('I1', 'tax_free_number');
        $sheet->setCellValue('J1', 'customer_type');
        $sheet->setCellValue('K1', 'max_dept');
        $sheet->setCellValue('L1', 'discount_limit');


        $writer = new Xlsx($spreadsheet);

        $filename = 'add_customers_template';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

        $writer->save('php://output');
    }

    //function to show excel data into table 
    public function upload_customers_excel() {
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
                $createArray = array('fname', 'lname', 'mobile', 'phone', 'email', 'company', 'customer_cash_discount', 'customer_percentage_discount', 'tax_free_number', 'customer_type', 'max_dept', 'discount_limit');
                $makeArray = array('fname' => 'fname', 'lname' => 'lname', 'mobile' => 'mobile', 'phone' => 'phone', 'email' => 'email', 'company' => 'company', 'customer_cash_discount' => 'customer_cash_discount', 'customer_percentage_discount' => 'customer_percentage_discount', 'tax_free_number' => 'tax_free_number', 'customer_type' => 'customer_type', 'max_dept' => 'max_dept', 'discount_limit' => 'discount_limit');
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
                        $fname = $SheetDataKey['fname'];
                        $lname = $SheetDataKey['lname'];
                        $mobile = $SheetDataKey['mobile'];
                        $phone = $SheetDataKey['phone'];
                        $email = $SheetDataKey['email'];
                        $company = $SheetDataKey['company'];
                        $customer_cash_discount = $SheetDataKey['customer_cash_discount'];
                        $customer_percentage_discount = $SheetDataKey['customer_percentage_discount'];
                        $tax_free_number = $SheetDataKey['tax_free_number'];
                        $customer_type = $SheetDataKey['customer_type'];
                        $max_dept = $SheetDataKey['max_dept'];
                        $discount_limit = $SheetDataKey['discount_limit'];


                        $fname = filter_var(trim($allDataInSheet[$i][$fname]), FILTER_SANITIZE_STRING);
                        $lname = filter_var(trim($allDataInSheet[$i][$lname]), FILTER_SANITIZE_STRING);
                        $mobile = filter_var(trim($allDataInSheet[$i][$mobile]), FILTER_SANITIZE_STRING);
                        $phone = filter_var(trim($allDataInSheet[$i][$phone]), FILTER_SANITIZE_STRING);
                        $email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_STRING);
                        $company = filter_var(trim($allDataInSheet[$i][$company]), FILTER_SANITIZE_STRING);
                        $customer_cash_discount = filter_var(trim($allDataInSheet[$i][$customer_cash_discount]), FILTER_SANITIZE_STRING);
                        $customer_percentage_discount = filter_var(trim($allDataInSheet[$i][$customer_percentage_discount]), FILTER_SANITIZE_STRING);
                        $tax_free_number = filter_var(trim($allDataInSheet[$i][$tax_free_number]), FILTER_SANITIZE_STRING);
                        $customer_type = filter_var(trim($allDataInSheet[$i][$customer_type]), FILTER_SANITIZE_STRING);
                        $max_dept = filter_var(trim($allDataInSheet[$i][$max_dept]), FILTER_SANITIZE_STRING);
                        $discount_limit = filter_var(trim($allDataInSheet[$i][$discount_limit]), FILTER_SANITIZE_STRING);

                        $fetchData = array('fname' => $fname, 'lname' => $lname, 'mobile' => $mobile, 'phone' => $phone, 'email' => $email, 'company' => $company, 'customer_cash_discount' => $customer_cash_discount, 'customer_percentage_discount' => $customer_percentage_discount, 'tax_free_number' => $tax_free_number, 'customer_type' => $customer_type, 'max_dept' => $max_dept, 'discount_limit' => $discount_limit);
                        $data['dataInfo'] = $fetchData;
                        array_push($mydata, $fetchData);
                    }
                }

                $data['mydata'] = $mydata;
                $data['title'] = $this->lang->line('admin_user_type');
                $data['page'] = rest_path('customers/display_customer_excel');
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

    //function to insert excel data into database
    public function insert_customer_excel() {
        $counter = $_POST['customers_form_number'];
        $data = array();
        for ($i = 0; $i < $counter; $i++) {
            $fname = $_POST['fname_' . $i];
            $lname = $_POST['lname_' . $i];
            $mobile = $_POST['mobile_' . $i];
            $phone = $_POST['phone_' . $i];
            $email = $_POST['email_' . $i];
            $company = $_POST['company_' . $i];
            $customer_cash_discount = $_POST['cash_discount_' . $i];
            $customer_percentage_discount = $_POST['percentage_discount_' . $i];
            $tax_free_number = $_POST['tax_free_number_' . $i];
            $customer_type = $_POST['customer_type_' . $i];
            $max_dept = $_POST['max_dept_' . $i];
            $discount_limit = $_POST['discount_limit_' . $i];

            $sub_array = array('fname' => $fname, 'lname' => $lname, 'mobile' => $mobile, 'phone' => $phone, 'email' => $email, 'company' => $company, 'customer_cash_discount' => $customer_cash_discount, 'customer_percentage_discount' => $customer_percentage_discount / 100, 'tax_free_number' => $tax_free_number, 'customer_type' => $customer_type, 'max_dept' => $max_dept, 'discount_limit' => $discount_limit);
            array_push($data, $sub_array);
        }
        $this->Customer_crud->import_customer_data($data);
        redirect(rest_path('Customers'));
    }

}
