<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Printer extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(rest_path('main/Printer_crud'));
        $this->load->model(rest_path('printer/Printer_model'));
    }

    public function index() {
        $data['title'] = $this->lang->line('admin_printer');
        $data['get_printer'] = $this->get_printer();
        $data['page'] = rest_path('printer/view_printer');
        $this->load->view('index', $data);
    }

//function to get printer
    public function get_printer() {
        $data['get_printer'] = $this->Printer_crud->get_printer();
        return $data['get_printer'];
    }

//function to load view for insert infinity form
    public function get_printer_form_by_ajax() {
        $printer_count = $_POST['id'];
        $data['printer_id'] = $printer_count;
        $this->load->view('restaurant/printer/insert_printer_form', $data);
    }

//function to insert new printer
    public function insert_printer() {
        $counter = $_POST['printers_form_number'];
        $data = array();
        for ($i = 1; $i <= $counter; $i++) {
            $name = $_POST['name_' . $i];
            $code = $_POST['printer_code_' . $i];
            $sub_array = array('name' => $name, 'printer_id' => $code);
            array_push($data, $sub_array);
        }
        $this->Printer_crud->insert_printer($data);
        redirect(rest_path('Printer'));
    }

//function to update printer infromation
    public function update_printer() {

        $printer_id = $_GET['printer_id_'];
        $data['edit_printer'] = $this->Printer_crud->get_printer_by_id($printer_id);
        $this->load->view('restaurant/printer/update_printer', $data);


        if (isset($_POST['edit_printer'])) {
            $update_printer = array(
                'name' => $_POST['printer_name'],
                'printer_id' => $_POST['printer_code']
            );
            $this->Printer_crud->update_printer($printer_id, $update_printer);
            redirect(rest_path('Printer'));
        }
    }

//function to delete printer
    public function delete_printer() {
        $printer_id = $_GET['printer_id_'];
        $data['delete_printer'] = $this->Printer_crud->get_printer_by_id($printer_id);
        $this->load->view('restaurant/printer/delete_printer_modal', $data);

        if (isset($_POST['delete_printer'])) {
            $this->Printer_crud->delete_printer($printer_id);
            redirect(rest_path('Printer'));
        }
    }

//function to download excel template
    public function download_printer_excel() {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'name');
        $sheet->setCellValue('B1', 'code');

        $writer = new Xlsx($spreadsheet);

        $filename = 'add_printer_template';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

        $writer->save('php://output');
    }

//function to upload excel and show the information in excel
    public function upload_printer_excel() {
        $data = array();
        $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
        if ($this->form_validation->run() == false) {
            $data['title'] = $this->lang->line('admin_printer');
            $data['get_printer'] = $this->get_printer();
            $data['page'] = rest_path('printer/view_printer');
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
                $createArray = array('name', 'code');
                $makeArray = array('name' => 'name', 'code' => 'code');
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
                        $printer_code = $SheetDataKey['code'];

                        $name = filter_var(trim($allDataInSheet[$i][$name]), FILTER_SANITIZE_STRING);
                        $printer_code = filter_var(trim($allDataInSheet[$i][$printer_code]), FILTER_SANITIZE_STRING);
                        $fetchData = array('name' => $name, 'code' => $printer_code);
                        $data['dataInfo'] = $fetchData;
                        array_push($mydata, $fetchData);
                    }
                }
                $data['mydata'] = $mydata;
                $data['title'] = $this->lang->line('admin_printer');
                $data['page'] = rest_path('printer/display_printer_excel');
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
                $this->form_validation->set_message('checkFileValidation', $this->lang->line('excel_choose_correct_file'));
                return false;
            }
        } else {
            $this->form_validation->set_message('checkFileValidation', $this->lang->line('excel_choose_file'));
            return false;
        }
    }

//function to insert printer excel information 
    public function insert_printer_excel() {
        $counter = $_POST['printer_form_number'];
        $data = array();
        for ($i = 0; $i < $counter; $i++) {
            $name = $_POST['name_' . $i];
            $code = $_POST['code_' . $i];
            $sub_array = array('name' => $name, 'printer_id' => $code);
            array_push($data, $sub_array);
        }
        $this->Printer_crud->insert_printer($data);
        redirect(rest_path('Printer'));
    }

}
